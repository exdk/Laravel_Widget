<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyOfferaRequest;
use App\Http\Requests\StoreOfferaRequest;
use App\Http\Requests\UpdateOfferaRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OfferaController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('offera_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.offeras.index');
    }

    public function create()
    {
        abort_if(Gate::denies('offera_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.offeras.create');
    }

    public function store(StoreOfferaRequest $request)
    {
        $offera = Offera::create($request->all());

        return redirect()->route('admin.offeras.index');
    }

    public function edit(Offera $offera)
    {
        abort_if(Gate::denies('offera_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.offeras.edit', compact('offera'));
    }

    public function update(UpdateOfferaRequest $request, Offera $offera)
    {
        $offera->update($request->all());

        return redirect()->route('admin.offeras.index');
    }

    public function show(Offera $offera)
    {
        abort_if(Gate::denies('offera_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.offeras.show', compact('offera'));
    }

    public function destroy(Offera $offera)
    {
        abort_if(Gate::denies('offera_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $offera->delete();

        return back();
    }

    public function massDestroy(MassDestroyOfferaRequest $request)
    {
        Offera::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
