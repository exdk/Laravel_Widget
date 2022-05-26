<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPartneriRequest;
use App\Http\Requests\StorePartneriRequest;
use App\Http\Requests\UpdatePartneriRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PartneriController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('partneri_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.partneris.index');
    }

    public function create()
    {
        abort_if(Gate::denies('partneri_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.partneris.create');
    }

    public function store(StorePartneriRequest $request)
    {
        $partneri = Partneri::create($request->all());

        return redirect()->route('admin.partneris.index');
    }

    public function edit(Partneri $partneri)
    {
        abort_if(Gate::denies('partneri_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.partneris.edit', compact('partneri'));
    }

    public function update(UpdatePartneriRequest $request, Partneri $partneri)
    {
        $partneri->update($request->all());

        return redirect()->route('admin.partneris.index');
    }

    public function show(Partneri $partneri)
    {
        abort_if(Gate::denies('partneri_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.partneris.show', compact('partneri'));
    }

    public function destroy(Partneri $partneri)
    {
        abort_if(Gate::denies('partneri_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $partneri->delete();

        return back();
    }

    public function massDestroy(MassDestroyPartneriRequest $request)
    {
        Partneri::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
