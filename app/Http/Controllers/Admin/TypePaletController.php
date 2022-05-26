<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyTypePaletRequest;
use App\Http\Requests\StoreTypePaletRequest;
use App\Http\Requests\UpdateTypePaletRequest;
use App\Models\TypePalet;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TypePaletController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('type_palet_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $typePalets = TypePalet::all();

        return view('admin.typePalets.index', compact('typePalets'));
    }

    public function create()
    {
        abort_if(Gate::denies('type_palet_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.typePalets.create');
    }

    public function store(StoreTypePaletRequest $request)
    {
        $typePalet = TypePalet::create($request->all());

        return redirect()->route('admin.type-palets.index');
    }

    public function edit(TypePalet $typePalet)
    {
        abort_if(Gate::denies('type_palet_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.typePalets.edit', compact('typePalet'));
    }

    public function update(UpdateTypePaletRequest $request, TypePalet $typePalet)
    {
        $typePalet->update($request->all());

        return redirect()->route('admin.type-palets.index');
    }

    public function show(TypePalet $typePalet)
    {
        abort_if(Gate::denies('type_palet_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.typePalets.show', compact('typePalet'));
    }

    public function destroy(TypePalet $typePalet)
    {
        abort_if(Gate::denies('type_palet_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $typePalet->delete();

        return back();
    }

    public function massDestroy(MassDestroyTypePaletRequest $request)
    {
        TypePalet::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
