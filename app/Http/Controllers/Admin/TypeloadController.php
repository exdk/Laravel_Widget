<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyTypeloadRequest;
use App\Http\Requests\StoreTypeloadRequest;
use App\Http\Requests\UpdateTypeloadRequest;
use App\Models\Typeload;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TypeloadController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('typeload_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $typeloads = Typeload::all();

        return view('admin.typeloads.index', compact('typeloads'));
    }

    public function create()
    {
        abort_if(Gate::denies('typeload_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.typeloads.create');
    }

    public function store(StoreTypeloadRequest $request)
    {
        $typeload = Typeload::create($request->all());

        return redirect()->route('admin.typeloads.index');
    }

    public function edit(Typeload $typeload)
    {
        abort_if(Gate::denies('typeload_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.typeloads.edit', compact('typeload'));
    }

    public function update(UpdateTypeloadRequest $request, Typeload $typeload)
    {
        $typeload->update($request->all());

        return redirect()->route('admin.typeloads.index');
    }

    public function show(Typeload $typeload)
    {
        abort_if(Gate::denies('typeload_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.typeloads.show', compact('typeload'));
    }

    public function destroy(Typeload $typeload)
    {
        abort_if(Gate::denies('typeload_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $typeload->delete();

        return back();
    }

    public function massDestroy(MassDestroyTypeloadRequest $request)
    {
        Typeload::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
