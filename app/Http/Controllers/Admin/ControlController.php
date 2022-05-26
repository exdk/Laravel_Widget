<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyControlRequest;
use App\Http\Requests\StoreControlRequest;
use App\Http\Requests\UpdateControlRequest;
use App\Models\Control;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ControlController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('control_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $controls = Control::all();

        return view('admin.controls.index', compact('controls'));
    }

    public function create()
    {
        abort_if(Gate::denies('control_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.controls.create');
    }

    public function store(StoreControlRequest $request)
    {
        $control = Control::create($request->all());

        return redirect()->route('admin.controls.index');
    }

    public function edit(Control $control)
    {
        abort_if(Gate::denies('control_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.controls.edit', compact('control'));
    }

    public function update(UpdateControlRequest $request, Control $control)
    {
        $control->update($request->all());

        return redirect()->route('admin.controls.index');
    }

    public function show(Control $control)
    {
        abort_if(Gate::denies('control_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.controls.show', compact('control'));
    }

    public function destroy(Control $control)
    {
        abort_if(Gate::denies('control_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $control->delete();

        return back();
    }

    public function massDestroy(MassDestroyControlRequest $request)
    {
        Control::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
