<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCatwareRequest;
use App\Http\Requests\StoreCatwareRequest;
use App\Http\Requests\UpdateCatwareRequest;
use App\Models\Catware;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CatwareController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('catware_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $catware = Catware::all();

        return view('admin.catware.index', compact('catware'));
    }

    public function create()
    {
        abort_if(Gate::denies('catware_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.catware.create');
    }

    public function store(StoreCatwareRequest $request)
    {
        $catware = Catware::create($request->all());

        return redirect()->route('admin.catware.index');
    }

    public function edit(Catware $catware)
    {
        abort_if(Gate::denies('catware_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.catware.edit', compact('catware'));
    }

    public function update(UpdateCatwareRequest $request, Catware $catware)
    {
        $catware->update($request->all());

        return redirect()->route('admin.catware.index');
    }

    public function show(Catware $catware)
    {
        abort_if(Gate::denies('catware_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.catware.show', compact('catware'));
    }

    public function destroy(Catware $catware)
    {
        abort_if(Gate::denies('catware_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $catware->delete();

        return back();
    }

    public function massDestroy(MassDestroyCatwareRequest $request)
    {
        Catware::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
