<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPartnerbRequest;
use App\Http\Requests\StorePartnerbRequest;
use App\Http\Requests\UpdatePartnerbRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PartnerbController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('partnerb_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.partnerbs.index');
    }

    public function create()
    {
        abort_if(Gate::denies('partnerb_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.partnerbs.create');
    }

    public function store(StorePartnerbRequest $request)
    {
        $partnerb = Partnerb::create($request->all());

        return redirect()->route('admin.partnerbs.index');
    }

    public function edit(Partnerb $partnerb)
    {
        abort_if(Gate::denies('partnerb_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.partnerbs.edit', compact('partnerb'));
    }

    public function update(UpdatePartnerbRequest $request, Partnerb $partnerb)
    {
        $partnerb->update($request->all());

        return redirect()->route('admin.partnerbs.index');
    }

    public function show(Partnerb $partnerb)
    {
        abort_if(Gate::denies('partnerb_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.partnerbs.show', compact('partnerb'));
    }

    public function destroy(Partnerb $partnerb)
    {
        abort_if(Gate::denies('partnerb_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $partnerb->delete();

        return back();
    }

    public function massDestroy(MassDestroyPartnerbRequest $request)
    {
        Partnerb::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
