<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFormsItemsRequest;
use App\Http\Requests\UpdateFormsItemsRequest;
use App\Models\Forms;
use App\Models\FormsItems;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FormsItemsController extends Controller
{
    
    public function store(StoreFormsItemsRequest $request)
    {
        
       $item = FormsItems::create($request->all());
       $form_id = $request->get('form_id');

       $all_elements = FormsItems::where('form_id', $form_id)->get()->toArray();
 
       $formItems = array();
        foreach($all_elements as $element){
            $formItems[$element['parrent_id']][] = $element;
        }

        
        switch($request->get('item_type')){

            case "0":
                return view('admin.formsItems.container', array_merge(compact('item'), ['formItems'=>$formItems]) );
                break;

            case "1":
                $form_item = $item;
                return view('admin.formsItems.item', array_merge(compact('form_item'), ['formItems'=>$formItems]));
                break;

            default:
                $form_value = $item;
                return view('admin.formsItems.value', array_merge(compact('form_value'), ['formItems'=>$formItems]));
                break;


        }
        
    }

    public function update(Request $request, $formItemid)
    {
        $request->validate([
            'name'=>'required',
            'value'=>'required'
        ]); 

        $name = $request->input('name');
        $value = $request->input('value');

        $form_item = FormsItems::find($formItemid);
        $form_item->$name = $value;
        $form_item->save();

        return true;
    }

    public function destroy($formsItemid)
    {
        abort_if(Gate::denies('forms_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $form_item = FormsItems::find($formsItemid);
        $form_item->delete();

        return true;
    }

   
}
