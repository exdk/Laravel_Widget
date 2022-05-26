<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyStatuszayaRequest;
use App\Http\Requests\StoreStatuszayaRequest;
use App\Http\Requests\UpdateStatuszayaRequest;
use App\Models\Statuszaya;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class StatuszayaController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('statuszaya_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $statuszayas = Statuszaya::all();

        return view('admin.statuszayas.index', compact('statuszayas'));
    }

    public function create()
    {
        abort_if(Gate::denies('statuszaya_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.statuszayas.create');
    }

    public function store(StoreStatuszayaRequest $request)
    {
        $statuszaya = Statuszaya::create($request->all());

        return redirect()->route('admin.statuszayas.index');
    }

    public function edit(Statuszaya $statuszaya)
    {
        abort_if(Gate::denies('statuszaya_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.statuszayas.edit', compact('statuszaya'));
    }

    public function update(UpdateStatuszayaRequest $request, Statuszaya $statuszaya)
    {
        $statuszaya->update($request->all());

        return redirect()->route('admin.statuszayas.index');
    }

    public function show(Statuszaya $statuszaya)
    {
        abort_if(Gate::denies('statuszaya_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.statuszayas.show', compact('statuszaya'));
    }

    public function destroy(Statuszaya $statuszaya)
    {
        abort_if(Gate::denies('statuszaya_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $statuszaya->delete();

        return back();
    }

    public function massDestroy(MassDestroyStatuszayaRequest $request)
    {
        Statuszaya::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
