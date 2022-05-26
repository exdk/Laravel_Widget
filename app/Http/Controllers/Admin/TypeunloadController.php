<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyTypeunloadRequest;
use App\Http\Requests\StoreTypeunloadRequest;
use App\Http\Requests\UpdateTypeunloadRequest;
use App\Models\Typeunload;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TypeunloadController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('typeunload_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $typeunloads = Typeunload::all();

        return view('admin.typeunloads.index', compact('typeunloads'));
    }

    public function create()
    {
        abort_if(Gate::denies('typeunload_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.typeunloads.create');
    }

    public function store(StoreTypeunloadRequest $request)
    {
        $typeunload = Typeunload::create($request->all());

        return redirect()->route('admin.typeunloads.index');
    }

    public function edit(Typeunload $typeunload)
    {
        abort_if(Gate::denies('typeunload_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.typeunloads.edit', compact('typeunload'));
    }

    public function update(UpdateTypeunloadRequest $request, Typeunload $typeunload)
    {
        $typeunload->update($request->all());

        return redirect()->route('admin.typeunloads.index');
    }

    public function show(Typeunload $typeunload)
    {
        abort_if(Gate::denies('typeunload_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.typeunloads.show', compact('typeunload'));
    }

    public function destroy(Typeunload $typeunload)
    {
        abort_if(Gate::denies('typeunload_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $typeunload->delete();

        return back();
    }

    public function massDestroy(MassDestroyTypeunloadRequest $request)
    {
        Typeunload::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
