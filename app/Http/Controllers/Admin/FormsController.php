<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyFormsRequest;
use App\Http\Requests\StoreFormsRequest;
use App\Http\Requests\UpdateFormsRequest;
use App\Models\Forms;
use App\Models\FormsItems;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FormsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('forms_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $forms = Forms::all();

        return view('admin.forms.index', compact('forms'));
    }

    public function create()
    {
        abort_if(Gate::denies('forms_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('admin.forms.create');
    }

    public function store(StoreFormsRequest $request)
    {
        $form_id = Forms::create($request->all())->id;
        return redirect()->route('admin.forms.edit', $from_id);
    }

    public function edit(Forms $form)
    {
       abort_if(Gate::denies('forms_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

       $all_elements = FormsItems::where('form_id', $form->id)->get()->toArray();

       $formItems = array();
        foreach($all_elements as $element){

            $formItems[$element['parrent_id']][] = $element;
        }
        
        return view('admin.forms.edit', array_merge(compact('form'), ['formItems'=>$formItems]));
    }

    public function update(UpdateFormsRequest $request, Forms $form)
    {
        $form->update($request->all());
        return redirect()->route('admin.forms.index');
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
