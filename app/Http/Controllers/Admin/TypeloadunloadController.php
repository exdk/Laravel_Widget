<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyTypeloadunloadRequest;
use App\Http\Requests\StoreTypeloadunloadRequest;
use App\Http\Requests\UpdateTypeloadunloadRequest;
use App\Models\Typeloadunload;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TypeloadunloadController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('typeloadunload_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $typeloadunloads = Typeloadunload::all();

        return view('admin.typeloadunloads.index', compact('typeloadunloads'));
    }

    public function create()
    {
        abort_if(Gate::denies('typeloadunload_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.typeloadunloads.create');
    }

    public function store(StoreTypeloadunloadRequest $request)
    {
        $typeloadunload = Typeloadunload::create($request->all());

        return redirect()->route('admin.typeloadunloads.index');
    }

    public function edit(Typeloadunload $typeloadunload)
    {
        abort_if(Gate::denies('typeloadunload_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.typeloadunloads.edit', compact('typeloadunload'));
    }

    public function update(UpdateTypeloadunloadRequest $request, Typeloadunload $typeloadunload)
    {
        $typeloadunload->update($request->all());

        return redirect()->route('admin.typeloadunloads.index');
    }

    public function show(Typeloadunload $typeloadunload)
    {
        abort_if(Gate::denies('typeloadunload_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.typeloadunloads.show', compact('typeloadunload'));
    }

    public function destroy(Typeloadunload $typeloadunload)
    {
        abort_if(Gate::denies('typeloadunload_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $typeloadunload->delete();

        return back();
    }

    public function massDestroy(MassDestroyTypeloadunloadRequest $request)
    {
        Typeloadunload::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
