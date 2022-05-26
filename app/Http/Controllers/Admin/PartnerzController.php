<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPartnerzRequest;
use App\Http\Requests\StorePartnerzRequest;
use App\Http\Requests\UpdatePartnerzRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PartnerzController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('partnerz_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.partnerzs.index');
    }

    public function create()
    {
        abort_if(Gate::denies('partnerz_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.partnerzs.create');
    }

    public function store(StorePartnerzRequest $request)
    {
        $partnerz = Partnerz::create($request->all());

        return redirect()->route('admin.partnerzs.index');
    }

    public function edit(Partnerz $partnerz)
    {
        abort_if(Gate::denies('partnerz_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.partnerzs.edit', compact('partnerz'));
    }

    public function update(UpdatePartnerzRequest $request, Partnerz $partnerz)
    {
        $partnerz->update($request->all());

        return redirect()->route('admin.partnerzs.index');
    }

    public function show(Partnerz $partnerz)
    {
        abort_if(Gate::denies('partnerz_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.partnerzs.show', compact('partnerz'));
    }

    public function destroy(Partnerz $partnerz)
    {
        abort_if(Gate::denies('partnerz_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $partnerz->delete();

        return back();
    }

    public function massDestroy(MassDestroyPartnerzRequest $request)
    {
        Partnerz::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
