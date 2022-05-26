<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Mycompan;
use App\Models\Role;
use App\Models\Team;
use App\Models\Typedolgnosti;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;

class UsersController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::with(['firma', 'dolgno', 'roles', 'team', 'media'])->where('team_id', '=', auth()->user()->team_id)->get();

       // $users = User::with(['firma', 'dolgno', 'roles', 'team', 'media'])->get();

        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        abort_if(Gate::denies('user_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $firmas = Mycompan::pluck('hortname', 'id')->prepend(trans('global.pleaseSelect'), '');

        $dolgnos = Typedolgnosti::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $roles = Role::pluck('title', 'id');

        $teams = Team::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.users.create', compact('firmas', 'dolgnos', 'roles', 'teams'));
    }

    public function store(StoreUserRequest $request)
    {
        $user = User::create($request->all());
        $user->roles()->sync($request->input('roles', []));
        if ($request->input('photo', false)) {
            $user->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $user->id]);
        }

        return redirect()->route('admin.users.index');
    }

    public function edit(User $user)
    {
        abort_if(Gate::denies('user_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $firmas = Mycompan::pluck('hortname', 'id')->prepend(trans('global.pleaseSelect'), '');

        $dolgnos = Typedolgnosti::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $roles = Role::pluck('title', 'id');

        $teams = Team::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $user->load('firma', 'dolgno', 'roles', 'team');

        return view('admin.users.edit', compact('firmas', 'dolgnos', 'roles', 'teams', 'user'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update($request->all());
        $user->roles()->sync($request->input('roles', []));
        if ($request->input('photo', false)) {
            if (!$user->photo || $request->input('photo') !== $user->photo->file_name) {
                if ($user->photo) {
                    $user->photo->delete();
                }
                $user->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
            }
        } elseif ($user->photo) {
            $user->photo->delete();
        }
		
		$update_arr = ["rfi_start" => 0, "rfi_end" => 0, "rfq_start" => 0, "rfq_end" => 0, "tms_attached" => 0, "tms_status_changed" => 0, 'rfi_alert' => 0, 'new_rfi' => 0];
		if($request->input('notifications', false))
		{
			foreach($request->input('notifications', false) as $key => $notification)
			{
				$update_arr[$key] = 1;
			}
			
		}
		$user->notifications_settings()->update($update_arr);
        return redirect()->route('admin.users.index');
    }

    public function show(User $user)
    {
        abort_if(Gate::denies('user_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user->load('firma', 'dolgno', 'roles', 'team', 'userUserAlerts');

        return view('admin.users.show', compact('user'));
    }

    public function destroy(User $user)
    {
        abort_if(Gate::denies('user_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user->delete();

        return back();
    }

    public function massDestroy(MassDestroyUserRequest $request)
    {
        User::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('user_create') && Gate::denies('user_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new User();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
	
	public function uploadUsers(Request $r)
	{

		//$validator = Validator::make(Input::all(), $rules);
		//try {
			$path1 = $r->file('file')->store('temp');
			$path = storage_path('app').'/'.$path1;  
			$data= Excel::toArray(new \App\Imports\UsersImport, $path);
			foreach($data[0] as $key => $row)
			{
				if($key != 0)
				{
					$registerController = new \App\Http\Controllers\Auth\RegisterController();
					$password = bin2hex(openssl_random_pseudo_bytes(4));
					$email = $row[7];
					$user = [
						'name' => explode(" ", $row[5])[1],
						'email' => $email,
						'password' => $password,
						'dzen' => 'tran'
					];
					$registered_user = $registerController->create($user);
					$registered_user->emailto = $row[7];
					$registered_user->verified = 1;
					$registered_user->mobile = $row[6];
					$registered_user->verified_at = Carbon::now()->format('d.m.Y H:i:s');
					$registered_user->save();
					
					$html = view('emails.account_created', compact('email', 'password'))->render();
					$SMTPBZController = new SMTPBZController();
					$ans = $SMTPBZController->send_mail("Ваш аккаунт зарегистрирован", $email, $html);
					
					$storeMycompanRequest = new \App\Http\Requests\StoreMycompanRequest();
					$data = [
						'hortname' => $row[0],
						'innkpp' => $row[1],
						'uradres' => $row[2],
						'innogrn' => $row[3],
						'kpp' => $row[4]
					];
					$storeMycompanRequest->replace($data);
					$mycompanController = new MycompanController();
					$mycompanController->store($storeMycompanRequest, $registered_user->role);
				}
			}
			
            // Excel::import($path, function ($reader) { 

                // foreach ($reader->toArray() as $row) {
                    // echo($row);
                // }
            // });
            return ["success" => "yes"];
        //} catch (\Exception $e) {
        //    return ["success" => "no"];
        //}
		
	}
}
