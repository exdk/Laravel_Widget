<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyTrandocRequest;
use App\Http\Requests\StoreTrandocRequest;
use App\Http\Requests\UpdateTrandocRequest;
use App\Models\Trandoc;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TrandocController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('trandoc_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $trandocs = Trandoc::all();

        return view('admin.trandocs.index', compact('trandocs'));
    }

    public function create()
    {
        abort_if(Gate::denies('trandoc_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.trandocs.create');
    }

    public function store(StoreTrandocRequest $request)
    {
        $trandoc = Trandoc::create($request->all());

        return redirect()->route('admin.trandocs.index');
    }

    public function edit(Trandoc $trandoc)
    {
        abort_if(Gate::denies('trandoc_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.trandocs.edit', compact('trandoc'));
    }

    public function update(UpdateTrandocRequest $request, Trandoc $trandoc)
    {
        $trandoc->update($request->all());

        return redirect()->route('admin.trandocs.index');
    }

    public function show(Trandoc $trandoc)
    {
        abort_if(Gate::denies('trandoc_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.trandocs.show', compact('trandoc'));
    }

    public function destroy(Trandoc $trandoc)
    {
        abort_if(Gate::denies('trandoc_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $trandoc->delete();

        return back();
    }

    public function massDestroy(MassDestroyTrandocRequest $request)
    {
        Trandoc::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
