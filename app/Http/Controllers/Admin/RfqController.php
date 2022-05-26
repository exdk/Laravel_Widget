<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyRfqRequest;
use App\Http\Requests\StoreRfqRequest;
use App\Http\Requests\UpdateRfqRequest;
use App\Models\Contactperson;
use App\Models\Rfq;
use App\Models\RfqRoutes;
use App\Models\RfqRouteFields;
use App\Models\RfqRouteValues;
use App\Models\Team;
use App\Models\Transport;
use App\Models\Pointload;
use App\Models\Visibility;
use App\Models\Mycompan;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class RfqController extends Controller
{
    use MediaUploadingTrait;
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('rfq_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // Companies where authed user in
        $my_company_ids = Mycompan::where('team_id', auth()->user()->team_id)->pluck('id')->toArray();
        // User role id
        $user_role = Auth::user()->roles[0]->toArray()['id'];
        // Get all RFQ items
        $rfqs = Rfq::with(['typetrs', 'contact', 'contact_2', 'team', 'media', 'rfq_routes', 'rfqVisiblility'])
        ->where(function ($query) use ($user_role, $my_company_ids){
             if($user_role != 1){
                 $query->whereIn('id', Visibility::select(['item_id'])
                        // Visibility for RFQ
                        ->where('item_type', '=', '0')
                        // Visibility to user_id or users_companys
                        ->where(function($query2) use ($my_company_ids) {
                            $query2->where('user_id', '=', Auth::id())
                                  ->orWhereIn('company_id',  $my_company_ids);
                        })
                );
             }
        })->get();

       
        

        

        $transports = Transport::get();
        $contactpeople = Contactperson::get();
        $teams = Team::get();
        $cartypes = ['Тент', 'Изотерм', 'Термос'];

        return view('admin.rfqs.index', compact('contactpeople', 'rfqs', 'teams', 'transports', 'cartypes'));
    }

    public function create()
    {
        abort_if(Gate::denies('rfq_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $typetrs = Transport::pluck('type', 'id');
        $contacts = Contactperson::pluck('fio', 'id')->prepend(trans('global.pleaseSelect'), '');
        $contact_2s = Contactperson::pluck('fio', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.rfqs.create', compact('contact_2s', 'contacts', 'typetrs'));
    }

    public function store(StoreRfqRequest $request)
    {
        $rfq = Rfq::create($request->all());
        $rfq->typetrs()->sync($request->input('typetrs', []));
        foreach ($request->input('applications', []) as $file) {
            $rfq->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('applications');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $rfq->id]);
        }

        // Add visibility to owner
        $user_id =  $request->user()->id;
        Visibility::create(['item_type'=>0, 'item_id'=>$rfq->id, 'company_id'=>0, 'user_id'=>$user_id, 'vtype'=>1]);

        return redirect()->route('admin.rfqs.index');
    }

    public function edit(Rfq $rfq)
    {
        abort_if(Gate::denies('rfq_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $typetrs = Transport::pluck('type', 'id');

        $contacts = Contactperson::pluck('fio', 'id')->prepend(trans('global.pleaseSelect'), '');

        $contact_2s = Contactperson::pluck('fio', 'id')->prepend(trans('global.pleaseSelect'), '');

        $visibility_companies = Mycompan::pluck('hortname', 'id')->toArray();
        $visibility_users = User::select('surname','name', 'oth', 'id')->get()->toArray();

        $points = Pointload::all()->toArray();

        $rfq->load('typetrs', 'contact', 'contact_2', 'team', 'rfq_routes', 'routes_additional_fields');
        $cartypes = ['Тент', 'Изотерм', 'Термос'];

        return view('admin.rfqs.edit', compact('contact_2s', 'contacts', 'rfq', 'typetrs', 'points' , 'cartypes', 'visibility_companies', 'visibility_users'));
    }

    public function update(UpdateRfqRequest $request, Rfq $rfq)
    {
        $rfq->update($request->all());
        $rfq->typetrs()->sync($request->input('typetrs', []));
        if (count($rfq->applications) > 0) {
            foreach ($rfq->applications as $media) {
                if (!in_array($media->file_name, $request->input('applications', []))) {
                    $media->delete();
                }
            }
        }
        $media = $rfq->applications->pluck('file_name')->toArray();
        foreach ($request->input('applications', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $rfq->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('applications');
            }
        }

        return redirect()->route('admin.rfqs.index');
    }

    public function show(Rfq $rfq)
    {
        abort_if(Gate::denies('rfq_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        //$rfq->load('typetrs', 'contact', 'contact_2', 'team', 'rfq_routes', 'routes_additional_fields');
        $rfq->load('typetrs', 'contact', 'contact_2', 'team', 'rfq_routes');
        $cartypes = ['Тент', 'Изотерм', 'Термос'];
        $points = Pointload::all()->toArray();
		$total_budget = 0;
		foreach($rfq->rfq_routes as $route)
		{
			$total_budget += $route->target_rate*$route->value_per_month;
		}

        $rfq_routes = RfqRoutes::with('additional_fields', 'point_start_info', 'point_end_info')->where('rfq_id', $rfq->id)->get();
        return view('admin.rfqs.show', compact('rfq', 'cartypes', 'points', 'total_budget', 'rfq_routes'));
    }

    public function destroy(Rfq $rfq)
    {
        //abort_if(Gate::denies('rfq_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rfq->delete();

        return back();
    }

    public function massDestroy(MassDestroyRfqRequest $request)
    {
        Rfq::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    // ----------------------------- RFQ routes
    public function addRfqRoute(Request $request){
		//dd($request->all());
         RfqRoutes::create([
            'rfq_id'=>$request->get('rfq_id'), 
            'point_start'=>$request->get('point_start'),
            'point_end'=>$request->get('point_end'),
            'car_type'=>$request->get('car_type'),
            'car_canweight'=>$request->get('car_canweight'),
            'car_canvalue'=>$request->get('car_canvalue'),
            'DAP_DDP'=>$request->get('DAP_DDP'),
            'DAP_DDP_code'=>$request->get('DAP_DDP_code'),
            'lead_time'=>$request->get('lead_time'),
            'сargo_name'=>$request->get('сargo_name'),
            'сargo_package'=>$request->get('сargo_package'),
            'сargo_package_weight'=>$request->get('сargo_package_weight'),
            'value_per_month'=>$request->get('value_per_month'),
            'otif'=>$request->get('otif'),
            'urgency'=>$request->get('urgency'),
			'target_rate' => $request->get("target_rate")
        ]);

        return '+';
    }

    public function removeRfqRoute(Request $request){
         $rfq_route = RfqRoutes::where('id', $request->get('rfqr_id'));
         $rfq_route->delete();
         return '+';
    }
    // ----------------------------- [END] RFQ routes

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('rfq_create') && Gate::denies('rfq_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Rfq();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }

    // ------------------------------ Visibility
    public function addVisibility(Request $request){
        abort_if(Gate::denies('rfq_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $company_id = $request->get('company_id');
        $user_id = $request->get('user_id');
        $item_type = 0;
        $item_id = $request->get('rfq_id');

        $newVisibility = Visibility::create(['item_type'=>$item_type, 'item_id'=>$item_id, 'company_id'=>$company_id, 'user_id'=>$user_id, 'vtype'=>0]);
        return '+';

    }

    public function removeVisibility(Request $request){
         abort_if(Gate::denies('rfq_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
         $visibility = Visibility::where('id', $request->get('visibility_id'));
         $visibility->delete();
         return '+';
    }
    // ------------------------------ [END] Visibility

    // ------------------------------ RFQ status
    public function changeStatus(Request $request){
        abort_if(Gate::denies('rfq_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $rfq_id = $request->get('rfq_id');
        $status = $request->get('status');

        $rfq = Rfq::where('id', $rfq_id)->first();
        $rfq->status = $status;
        $rfq->save();

        return back();
    }
    // ------------------------------ [END] RFQ status

    public function saveRouteValue(Request $request){
        $rfq_route_id = $request->get('rfq_route_id');
        $tarif = $request->get('tarif');
        $quota = $request->get('quota');

        $my_company_ids = Mycompan::where('team_id', auth()->user()->team_id)->pluck('id')->toArray();

        $RfqRouteValue = RfqRouteValues::where('company_id', '=', $my_company_ids)->where('rfq_route_id', '=', $rfq_route_id)->first();
        if($RfqRouteValue === null){
            RfqRouteValues::create(['rfq_route_id'=>$rfq_route_id, 'tarif'=>$tarif, 'quota'=>$quota, 'company_id'=>$my_company_ids[0]]);
        }else{
            $RfqRouteValue->quota = $quota;
            $RfqRouteValue->tarif = $tarif;
            $RfqRouteValue->save();
        }
        return "+";
    }

    public function showRouteValues(Request $request){
        abort_if(Gate::denies('rfq_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $rfq_route_id = $request->get('rfq_route_id');
        $rfq_sort_type = $request->get('rfq_route_sort_type');

        
        switch($rfq_sort_type){
            case "0":
                $rfq_route_values = RfqRouteValues::with('company')->where('rfq_route_id', '=', $rfq_route_id)->orderBy('quota', 'DESC')->get()->toArray();
                break;
            case "1":
                 $rfq_route_values = RfqRouteValues::with('company')->where('rfq_route_id', '=', $rfq_route_id)->orderBy('tarif', 'DESC')->get()->toArray();
                break;  
            default:
                 $rfq_route_values = RfqRouteValues::with('company')->where('rfq_route_id', '=', $rfq_route_id)->orderBy('quota', 'DESC')->get()->toArray();
                break;      
        }
        

        return view('admin.rfqs.showValues', array_merge(compact('rfq_route_values'),['rfq_sort_type'=>$rfq_sort_type, 'rfq_route_id'=>$rfq_route_id]));
    }

    // ---------------------- Additional Route Fields
    public function addRouteAdditionalFields(Request $request){
        abort_if(Gate::denies('rfq_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rfq_id = $request->get('rfq_id');
        $title = $request->get('title');

        RfqRouteFields::create(['rfq_id'=>$rfq_id, 'rfq_route_id'=>0, 'title'=>$title, 'value'=>'-']);
        return '+';
    }


    public function removeRouteAdditionalFields(Request $request){
        abort_if(Gate::denies('rfq_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rfq_route_field = Visibility::where('id', $request->get('id'));
        $rfq_route_field->delete();
        return '+';
    }

    public function changeRouteAdditionalFields(Request $request){
        abort_if(Gate::denies('rfq_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $id = $request->get('id');
        $name = $request->get('name');
        $value = $request->get('value');
        
        $rfq_route_field = RfqRouteFields::where('id',$id)->first();
        $rfq_route_field->$name = $value;
        $rfq_route_field->save();
        return '+';

    }
    // ---------------------- [END] Additional Route Fields
}
