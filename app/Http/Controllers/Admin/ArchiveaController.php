<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyArchiveaRequest;
use App\Http\Requests\StoreArchiveaRequest;
use App\Http\Requests\UpdateArchiveaRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ArchiveaController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('archivea_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.archiveas.index');
    }

    public function create()
    {
        abort_if(Gate::denies('archivea_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.archiveas.create');
    }

    public function store(StoreArchiveaRequest $request)
    {
        $archivea = Archivea::create($request->all());

        return redirect()->route('admin.archiveas.index');
    }

    public function edit(Archivea $archivea)
    {
        abort_if(Gate::denies('archivea_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.archiveas.edit', compact('archivea'));
    }

    public function update(UpdateArchiveaRequest $request, Archivea $archivea)
    {
        $archivea->update($request->all());

        return redirect()->route('admin.archiveas.index');
    }

    public function show(Archivea $archivea)
    {
        abort_if(Gate::denies('archivea_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.archiveas.show', compact('archivea'));
    }

    public function destroy(Archivea $archivea)
    {
        abort_if(Gate::denies('archivea_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $archivea->delete();

        return back();
    }

    public function massDestroy(MassDestroyArchiveaRequest $request)
    {
        Archivea::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
