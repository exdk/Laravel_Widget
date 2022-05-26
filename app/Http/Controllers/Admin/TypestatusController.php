<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyTypestatusRequest;
use App\Http\Requests\StoreTypestatusRequest;
use App\Http\Requests\UpdateTypestatusRequest;
use App\Models\Typestatus;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TypestatusController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('typestatus_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $typestatuses = Typestatus::with(['team'])->get();

        return view('admin.typestatuses.index', compact('typestatuses'));
    }

    public function create()
    {
        abort_if(Gate::denies('typestatus_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.typestatuses.create');
    }

    public function store(StoreTypestatusRequest $request)
    {
        $typestatus = Typestatus::create($request->all());

        return redirect()->route('admin.typestatuses.index');
    }

    public function edit(Typestatus $typestatus)
    {
        abort_if(Gate::denies('typestatus_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $typestatus->load('team');

        return view('admin.typestatuses.edit', compact('typestatus'));
    }

    public function update(UpdateTypestatusRequest $request, Typestatus $typestatus)
    {
        $typestatus->update($request->all());

        return redirect()->route('admin.typestatuses.index');
    }

    public function show(Typestatus $typestatus)
    {
        abort_if(Gate::denies('typestatus_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $typestatus->load('team');

        return view('admin.typestatuses.show', compact('typestatus'));
    }

    public function destroy(Typestatus $typestatus)
    {
        abort_if(Gate::denies('typestatus_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $typestatus->delete();

        return back();
    }

    public function massDestroy(MassDestroyTypestatusRequest $request)
    {
        Typestatus::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
