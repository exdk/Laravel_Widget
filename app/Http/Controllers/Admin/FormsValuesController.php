<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyFormsRequest;
use App\Http\Requests\StoreFormsRequest;
use App\Http\Requests\UpdateFormsRequest;
use App\Models\Forms;
use App\Models\FormsItems;
use App\Models\FormsValues;
use App\Models\Mycompan;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/*added*/
use App\Http\Requests\StorePartnergroupRequest;
use App\Http\Requests\StorePartnerBbRequest;
use Carbon\Carbon;

class FormsValuesController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('forms_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $forms = Forms::all();

        return view('admin.formsValues.index', compact('forms'));
    }

    public function results(Request $request)
    {
        abort_if(Gate::denies('forms_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $form_id =$request->get('form_id');
        $user_id = $request->user()->id;
		$rfi_id = $request->get('rfi_id');

        $forms_results = FormsValues::where('form_id','=', $form_id)->where('rfi_id', $rfi_id)->get()->toArray();
        $forms = Forms::where('id', $form_id)->get();
		$all_elements = FormsItems::where('form_id', $form_id)->get()->toArray();
		#dd($forms_results);
		$formItems = array();
        $answers_points = array();
        $all_items = array();
		foreach($all_elements as $element){
            $formItems[$element['parrent_id']][] = $element;
            $answers_points[$element['id']] = $element['points'];
            $all_items[$element['id']] = $element;
        }
		
        $forms_result = array();
        $results = array();
        foreach($forms_results as $result){
            if((!isset($results[$result['form_id']]))||(!in_array($result['user_id'], $results[$result['form_id']]))){
                $results[$result['form_id']][] = $result['user_id'];
            }
        }
		
        foreach($forms as $form){
			if(isset($results[$form_id])){
				foreach($results[$form_id] as $result_user_id){
					$result_points = "0";
					foreach($forms_results as $value)
					{
						if($value['user_id'] == $result_user_id)
						{
							if(!isset($all_items[$value['item_id']]['placeholder'])) continue;
							$Answers[$value['item_id']] = ['value'=>$value['value'], 'question'=>$all_items[$all_items[$value['item_id']]['parrent_id']]['placeholder'] ];

							if(isset($answers_points[$value['item_id']])){
								$result_points += $answers_points[$value['item_id']];
							}
						}
					}
					$form['user_id'] = $result_user_id;
					$user = \DB::table("users")->where('id', $result_user_id)->first();
					$mycompan = \DB::table("mycompans")->where('team_id', $user->team_id)->first();
					if($mycompan)
					{
						$company_name = $mycompan->hortname;
						$company_id = $mycompan->id;
					}
					else
					{
						$company_name = "";
						$company_id = null;
					}
					$form["company_name"] = $company_name;
					$form["company_id"] = $company_id;
					$form["result_points"] = $result_points;
					$forms_result[] = $form->toArray();
				}
			}
        }
		
		usort($forms_result, function ($a, $b) {return ($a["result_points"] - $b["result_points"]);});
		$forms_result = array_reverse($forms_result);
        return view('admin.formsValues.index',  ['form_id'=>$form_id, 'forms'=>$forms_result]);
    }
	
	public function addPartners(Request $request)
	{
		$partnerBbController = new PartnerBbController();
		foreach($request->get('ids') as $id)
		{
			$storePartnerBbRequest = new StorePartnerBbRequest();
			$data = [
				'status' => 0,
				"partner_id" => $id,
				"typedogovor" => "1",
				"dogovor_number" => null,
				"dogovor_start" => Carbon::now()->format("d.m.Y"),
				"dogovor_end" => Carbon::now()->addYear()->format("d.m.Y"),
				"valuta_id" => null,
				"description" => null,
				"contactperson" => null,
				"telefon" => null
			];
			$storePartnerBbRequest->replace($data);
			$partnerBbController->store($storePartnerBbRequest);
		}
		return ["status" => "ok"];
	}
	
	public function addPartnersGroup(Request $request)
	{
		$partnergroupController = new PartnergroupController();
		$storePartnergroupRequest = new StorePartnergroupRequest();
		
		$partners = $partnergroupController->getPartners();
		$ids = [];
		
		foreach($partners as $id => $partner)
		{
			if(in_array($partner, $request->get('ids')) && !in_array($id, $ids))
			{
				$ids[] = $id;
			}
		}
		
		$data = [
			'title' => $request->get('groupName'),
			'partners' => $ids
		];
		$storePartnergroupRequest->replace($data);
		$partnergroupController->store($storePartnergroupRequest);
		return ["status" => "ok"];
	}

    public function store(StoreFormsValuesRequest $request)
    {
        $form = Forms::create($request->all());

        return redirect()->route('admin.formsValues.index');
    }

    public function edit (Request $request, $form_id)
    {
        abort_if(Gate::denies('forms_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
		$rfi_id = $request->get("rfi_id");
		if(!$rfi_id)
		{
			abort(404);
		}
        $user_id = $request->user()->id;
        $form = Forms::where('id', $form_id)->first()->toArray();

        $all_elements = FormsItems::where('form_id', $form_id)->get()->toArray();

        $formItems = array();
        $answers_points = array();
        foreach($all_elements as $element){
            $formItems[$element['parrent_id']][] = $element;
            $answers_points[$element['id']] = $element['points'];
        }
		
		//dump($answers_points);
		
        $result_points = "0";
        $values = FormsValues::where('form_id', $form_id)->where('rfi_id', $rfi_id)->where('user_id', $user_id)->get()->toArray();
        $Answers = array();
		
		//dd($values);
		
        foreach($values as $key=>$value){
            $Answers[$value['item_id']] = $value['value'];
			if(isset($answers_points[$value['item_id']]))
			{
				$result_points += $answers_points[$value['item_id']];
			}
        } 

        

        return view('admin.formsValues.edit', array_merge(compact('form'), ['result_points'=>$result_points, 'formItems'=>$formItems, 'answers'=>$Answers, "rfi_id" => $rfi_id]));
    }

    public function save(Request $request){
        $values = $request->all();
        $form_id = $values['form_id'];
		$rfi_id = $values['rfi_id'];
        $user_id = $request->user()->id;

        FormsValues::where('user_id', $user_id)->where('form_id', $form_id)->delete();

        foreach($values as $key=>$value){
            if(($key == '_method')||($key =='_token')||($key == 'form_id')) continue;
        
            $item_id = 0;

            $key_info = explode('_', $key);
            if((isset($key_info[1]))&&($key_info[0]=="item")){
                $item_id = $key_info[1];
                $value = $value;
            }else if((isset($key_info[1]))&&($key_info[0]=="radio")){
                $value_info = explode('_', $value);
                if((isset($value_info[1]))&&($value_info[0]=="item")){
                    $item_id = $value_info[1];
                    $value = 1;
                }
            }

            if ($value == 'on') $value = 1;

            FormsValues::create(array(
                'user_id'=> $user_id,
                'form_id'=> $form_id,
                'item_id'=>$item_id,
                'value'=>$value,
				'rfi_id' => $rfi_id
            ));
            
        }
        return back();
    }

    public function update(Request $request, Forms $form)
    {
        $form->update($request->all());

        return redirect()->route('admin.forms.index');
    }

    public function showResult(Request $request)
    {
        abort_if(Gate::denies('forms_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $form_id =$request->get('form_id');
        $user_id = $request->get('user_id');
        
        $form = Forms::where('id', $form_id)->first()->toArray();

        $all_elements = FormsItems::where('form_id', $form_id)->get()->toArray();

        $formItems = array();
        $answers_points = array();
        $all_items = array();
        foreach($all_elements as $element){
            $formItems[$element['parrent_id']][] = $element;
            $answers_points[$element['id']] = $element['points'];
            $all_items[$element['id']] = $element;
        }

        $result_points = "0";
        $values = FormsValues::where('form_id', $form_id)->where('user_id', $user_id)->get()->toArray();
        $Answers = array();

        foreach($values as $key=>$value){
            if(!isset($all_items[$value['item_id']]['placeholder'])) continue;
            $Answers[$value['item_id']] = ['value'=>$value['value'], 'question'=>$all_items[$all_items[$value['item_id']]['parrent_id']]['placeholder'] ];

            if(isset($answers_points[$value['item_id']])){
                $result_points += $answers_points[$value['item_id']];
            }
        } 
        return view('admin.formsValues.show', ['user_id'=>$user_id  ,'result_points'=>$result_points, 'answers'=>$Answers, 'form_name'=>$form['title']]);
    }

    public function destroy(Forms $form)
    {
        abort_if(Gate::denies('forms_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $form->delete();

        return back();
    }

    public function massDestroy(MassDestroyFormsRequest $request)
    {
        Adr::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
