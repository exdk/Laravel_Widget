<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyRfiRequest;
use App\Http\Requests\StoreRfiRequest;
use App\Http\Requests\UpdateRfiRequest;
use App\Models\Contactperson;
use App\Models\Rfi;
use App\Models\Transport;
use App\Models\Forms;
use App\Models\FormsItems;
use App\Models\FormsValues;
use App\Models\User;
use App\Models\Mycompan;
use App\Models\RfisAccess;
use App\Models\GruzOwner;
use App\Models\Partnergroup;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Auth;
use App\Models\UserAlert;

class RfiController extends Controller
{
    use MediaUploadingTrait;
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('rfi_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rfis = Rfi::with(['typetrans', 'contact', 'contact_2', 'id_1', 'team', 'media', 'access_groups'])->get();
        $user_id = $request->get('user_id');
        return view('admin.rfis.index', array_merge(compact('rfis'), ['user_id'=>$user_id]));
    }

    public function create()
    {
        abort_if(Gate::denies('rfi_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $typetrans = Transport::pluck('type', 'id');

        $contacts = Contactperson::pluck('fio', 'id')->prepend(trans('global.pleaseSelect'), '');

        $contact_2s = Contactperson::pluck('fio', 'id')->prepend(trans('global.pleaseSelect'), '');

        $id_1s = Forms::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');
		
        return view('admin.rfis.create', compact('contact_2s', 'contacts', 'id_1s', 'typetrans'));
    }

    public function store(StoreRfiRequest $request)
    {
        $rfi = Rfi::create($request->all());
        $rfi->typetrans()->sync($request->input('typetrans', []));
        foreach ($request->input('applications', []) as $file) {
            $rfi->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('applications');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $rfi->id]);
        }
		$current_user = Auth::user();
		if($current_user->notifications_settings->new_rfi == 1)
		{
			$SMTPBZController = new SMTPBZController();
			$role = \DB::table('mycompans')  
					->where('mycompans.team_id','=',$rfi->team_id)
					->first();
					
			$gruzowner_name = "Неизвестен";
			if($role)
			{
				$gruzowner_name = $role->hortname;
			}
			$typetrans_arr = [];
			foreach($rfi->typetrans as $typetrans)
			{
				$typetrans_arr[] = $typetrans->type;
			}
			$html = view('emails.rfi_start', compact('rfi', 'typetrans_arr', 'gruzowner_name'))->render();
			
			$alert = UserAlert::create(["alert_text" => "Вы создали новый RFI", "alert_link" => "/admin/rfis/".$rfi->id]);
			$user_user_alert = [$current_user->id];
			$alert->users()->sync($user_user_alert);
			$ans = $SMTPBZController->send_mail("Вы создали новый RFI", $current_user->email, $html);
		}
		
        return redirect()->route('admin.rfis.index');
    }

    public function edit(Rfi $rfi)
    {
        abort_if(Gate::denies('rfi_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $access_users = array();
        $access_companies = array();
        foreach($rfi->access_groups->toArray() as $item){
            if($item['company_id'] != 0) $access_companies[] = $item['company_id'];
            if($item['partner_id'] != 0) $access_users[] = $item['partner_id'];

        }
        
        $typetrans = Transport::pluck('type', 'id');

        $transporters = \DB::table('mycompans')->where('company_role','3')->whereNull('deleted_at')->get();
		$groups_transports = Partnergroup::with(['partners', 'team'])->get();
	
        $contacts = Contactperson::pluck('fio', 'id')->prepend(trans('global.pleaseSelect'), '');

        $contact_2s = Contactperson::pluck('fio', 'id')->prepend(trans('global.pleaseSelect'), '');

        $id_1s = Forms::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');
		
        $rfi->load('typetrans', 'contact', 'contact_2', 'id_1', 'team');
        if(isset($rfi->id_1->id)){
          $all_elements = FormsItems::where('form_id', $rfi->id_1->id)->get()->toArray();
        }else{
             $all_elements = array();
        }

       $formItems = array();
        foreach($all_elements as $element){

            $formItems[$element['parrent_id']][] = $element;
        }

        return view('admin.rfis.edit', array_merge(compact('contact_2s', 'contacts', 'id_1s', 'rfi', 'typetrans', 'groups_transports', 'transporters'), ['formItems'=>$formItems, 'access_users'=>$access_users, 'access_companies'=>$access_companies] ));
    }

    public function update(UpdateRfiRequest $request, Rfi $rfi)
    {
        $groups_transporters = $request->get('groups_transports');
        $transporters = $request->get('transporters');
        RfisAccess::where('rfi_id', $rfi->id)->delete();
        foreach($groups_transporters as $item){
            RfisAccess::create(['rfi_id'=>$rfi->id, 'partner_id'=>0, 'company_id'=>$item]);
        }

        foreach($transporters as $item){
            RfisAccess::create(['rfi_id'=>$rfi->id, 'partner_id'=>$item, 'company_id'=>0]);
        }

        $rfi->update($request->all());
        $rfi->typetrans()->sync($request->input('typetrans', []));
        if (count($rfi->applications) > 0) {
            foreach ($rfi->applications as $media) {
                if (!in_array($media->file_name, $request->input('applications', []))) {
                    $media->delete();
                }
            }
        }
        $media = $rfi->applications->pluck('file_name')->toArray();
        foreach ($request->input('applications', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $rfi->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('applications');
            }
        }

        return redirect()->route('admin.rfis.edit', $rfi->id);
    }

    public function show(Request $request, Rfi $rfi)
    {
        abort_if(Gate::denies('rfi_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rfi->load('typetrans', 'contact', 'contact_2', 'id_1', 'team');

        $user_id = Auth::user()->id;
        
        $form = Forms::where('id', $rfi->id_1_id)->first()->toArray();

        $all_elements = FormsItems::where('form_id', $rfi->id_1_id)->get()->toArray();

        $formItems = array();
        $answers_points = array();
        $all_items = array();
        foreach($all_elements as $element){
            $formItems[$element['parrent_id']][] = $element;
            $answers_points[$element['id']] = $element['points'];
            $all_items[$element['id']] = $element;
        }

        $result_points = "0";

		$values = FormsValues::where('form_id', $rfi->id_1_id)->where('user_id', $user_id)->where('rfi_id', $rfi->id)->get()->toArray();
        $Answers = array();

        foreach($values as $key=>$value){
            if(!isset($all_items[$value['item_id']]['placeholder'])) continue;
            $Answers[$value['item_id']] = ['value'=>$value['value'], 'question'=>$all_items[$all_items[$value['item_id']]['parrent_id']]['placeholder'] ];

            if(isset($answers_points[$value['item_id']])){
                $result_points += $answers_points[$value['item_id']];
            }
        } 


        return view('admin.rfis.show',  array_merge(compact('rfi', 'form'), ['user_id'=>$user_id  ,'result_points'=>$result_points, 'answers'=>$Answers, 'form_name'=>$form['title']]));
    }

    public function destroy(Rfi $rfi)
    {
        abort_if(Gate::denies('rfi_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rfi->delete();

        return back();
    }

    public function massDestroy(MassDestroyRfiRequest $request)
    {
        Rfi::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('rfi_create') && Gate::denies('rfi_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Rfi();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
