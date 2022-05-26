<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyMyaRequest;
use App\Http\Requests\StoreMyaRequest;
use App\Http\Requests\UpdateMyaRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MyaController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('mya_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.myas.index');
    }

    public function create()
    {
        abort_if(Gate::denies('mya_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.myas.create');
    }

    public function store(StoreMyaRequest $request)
    {
        $mya = Mya::create($request->all());

        return redirect()->route('admin.myas.index');
    }

    public function edit(Mya $mya)
    {
        abort_if(Gate::denies('mya_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.myas.edit', compact('mya'));
    }

    public function update(UpdateMyaRequest $request, Mya $mya)
    {
        $mya->update($request->all());

        return redirect()->route('admin.myas.index');
    }

    public function show(Mya $mya)
    {
        abort_if(Gate::denies('mya_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.myas.show', compact('mya'));
    }

    public function destroy(Mya $mya)
    {
        abort_if(Gate::denies('mya_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $mya->delete();

        return back();
    }

    public function massDestroy(MassDestroyMyaRequest $request)
    {
        Mya::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
