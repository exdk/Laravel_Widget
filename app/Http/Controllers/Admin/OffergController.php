<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyOffergRequest;
use App\Http\Requests\StoreOffergRequest;
use App\Http\Requests\UpdateOffergRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OffergController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('offerg_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.offergs.index');
    }

    public function create()
    {
        abort_if(Gate::denies('offerg_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.offergs.create');
    }

    public function store(StoreOffergRequest $request)
    {
        $offerg = Offerg::create($request->all());

        return redirect()->route('admin.offergs.index');
    }

    public function edit(Offerg $offerg)
    {
        abort_if(Gate::denies('offerg_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.offergs.edit', compact('offerg'));
    }

    public function update(UpdateOffergRequest $request, Offerg $offerg)
    {
        $offerg->update($request->all());

        return redirect()->route('admin.offergs.index');
    }

    public function show(Offerg $offerg)
    {
        abort_if(Gate::denies('offerg_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.offergs.show', compact('offerg'));
    }

    public function destroy(Offerg $offerg)
    {
        abort_if(Gate::denies('offerg_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $offerg->delete();

        return back();
    }

    public function massDestroy(MassDestroyOffergRequest $request)
    {
        Offerg::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
