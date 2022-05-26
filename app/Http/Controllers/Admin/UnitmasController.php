<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyUnitmaRequest;
use App\Http\Requests\StoreUnitmaRequest;
use App\Http\Requests\UpdateUnitmaRequest;
use App\Models\Unitma;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UnitmasController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('unitma_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $unitmas = Unitma::all();

        return view('admin.unitmas.index', compact('unitmas'));
    }

    public function create()
    {
        abort_if(Gate::denies('unitma_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.unitmas.create');
    }

    public function store(StoreUnitmaRequest $request)
    {
        $unitma = Unitma::create($request->all());

        return redirect()->route('admin.unitmas.index');
    }

    public function edit(Unitma $unitma)
    {
        abort_if(Gate::denies('unitma_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.unitmas.edit', compact('unitma'));
    }

    public function update(UpdateUnitmaRequest $request, Unitma $unitma)
    {
        $unitma->update($request->all());

        return redirect()->route('admin.unitmas.index');
    }

    public function show(Unitma $unitma)
    {
        abort_if(Gate::denies('unitma_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.unitmas.show', compact('unitma'));
    }

    public function destroy(Unitma $unitma)
    {
        abort_if(Gate::denies('unitma_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $unitma->delete();

        return back();
    }

    public function massDestroy(MassDestroyUnitmaRequest $request)
    {
        Unitma::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
