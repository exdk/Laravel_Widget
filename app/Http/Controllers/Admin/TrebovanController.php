<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyTrebovanRequest;
use App\Http\Requests\StoreTrebovanRequest;
use App\Http\Requests\UpdateTrebovanRequest;
use App\Models\Trebovan;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TrebovanController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('trebovan_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $trebovans = Trebovan::all();

        return view('admin.trebovans.index', compact('trebovans'));
    }

    public function create()
    {
        abort_if(Gate::denies('trebovan_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.trebovans.create');
    }

    public function store(StoreTrebovanRequest $request)
    {
        $trebovan = Trebovan::create($request->all());

        return redirect()->route('admin.trebovans.index');
    }

    public function edit(Trebovan $trebovan)
    {
        abort_if(Gate::denies('trebovan_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.trebovans.edit', compact('trebovan'));
    }

    public function update(UpdateTrebovanRequest $request, Trebovan $trebovan)
    {
        $trebovan->update($request->all());

        return redirect()->route('admin.trebovans.index');
    }

    public function show(Trebovan $trebovan)
    {
        abort_if(Gate::denies('trebovan_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.trebovans.show', compact('trebovan'));
    }

    public function destroy(Trebovan $trebovan)
    {
        abort_if(Gate::denies('trebovan_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $trebovan->delete();

        return back();
    }

    public function massDestroy(MassDestroyTrebovanRequest $request)
    {
        Trebovan::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
