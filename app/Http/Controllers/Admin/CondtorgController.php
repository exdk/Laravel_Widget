<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCondtorgRequest;
use App\Http\Requests\StoreCondtorgRequest;
use App\Http\Requests\UpdateCondtorgRequest;
use App\Models\Condtorg;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CondtorgController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('condtorg_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $condtorgs = Condtorg::all();

        return view('admin.condtorgs.index', compact('condtorgs'));
    }

    public function create()
    {
        abort_if(Gate::denies('condtorg_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.condtorgs.create');
    }

    public function store(StoreCondtorgRequest $request)
    {
        $condtorg = Condtorg::create($request->all());

        return redirect()->route('admin.condtorgs.index');
    }

    public function edit(Condtorg $condtorg)
    {
        abort_if(Gate::denies('condtorg_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.condtorgs.edit', compact('condtorg'));
    }

    public function update(UpdateCondtorgRequest $request, Condtorg $condtorg)
    {
        $condtorg->update($request->all());

        return redirect()->route('admin.condtorgs.index');
    }

    public function show(Condtorg $condtorg)
    {
        abort_if(Gate::denies('condtorg_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.condtorgs.show', compact('condtorg'));
    }

    public function destroy(Condtorg $condtorg)
    {
        abort_if(Gate::denies('condtorg_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $condtorg->delete();

        return back();
    }

    public function massDestroy(MassDestroyCondtorgRequest $request)
    {
        Condtorg::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
