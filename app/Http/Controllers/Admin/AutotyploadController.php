<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyAutotyploadRequest;
use App\Http\Requests\StoreAutotyploadRequest;
use App\Http\Requests\UpdateAutotyploadRequest;
use App\Models\Autotypload;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AutotyploadController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('autotypload_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $autotyploads = Autotypload::all();

        return view('admin.autotyploads.index', compact('autotyploads'));
    }

    public function create()
    {
        abort_if(Gate::denies('autotypload_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.autotyploads.create');
    }

    public function store(StoreAutotyploadRequest $request)
    {
        $autotypload = Autotypload::create($request->all());

        return redirect()->route('admin.autotyploads.index');
    }

    public function edit(Autotypload $autotypload)
    {
        abort_if(Gate::denies('autotypload_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.autotyploads.edit', compact('autotypload'));
    }

    public function update(UpdateAutotyploadRequest $request, Autotypload $autotypload)
    {
        $autotypload->update($request->all());

        return redirect()->route('admin.autotyploads.index');
    }

    public function show(Autotypload $autotypload)
    {
        abort_if(Gate::denies('autotypload_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.autotyploads.show', compact('autotypload'));
    }

    public function destroy(Autotypload $autotypload)
    {
        abort_if(Gate::denies('autotypload_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $autotypload->delete();

        return back();
    }

    public function massDestroy(MassDestroyAutotyploadRequest $request)
    {
        Autotypload::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
