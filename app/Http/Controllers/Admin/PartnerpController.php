<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPartnerpRequest;
use App\Http\Requests\StorePartnerpRequest;
use App\Http\Requests\UpdatePartnerpRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PartnerpController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('partnerp_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.partnerps.index');
    }

    public function create()
    {
        abort_if(Gate::denies('partnerp_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.partnerps.create');
    }

    public function store(StorePartnerpRequest $request)
    {
        $partnerp = Partnerp::create($request->all());

        return redirect()->route('admin.partnerps.index');
    }

    public function edit(Partnerp $partnerp)
    {
        abort_if(Gate::denies('partnerp_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.partnerps.edit', compact('partnerp'));
    }

    public function update(UpdatePartnerpRequest $request, Partnerp $partnerp)
    {
        $partnerp->update($request->all());

        return redirect()->route('admin.partnerps.index');
    }

    public function show(Partnerp $partnerp)
    {
        abort_if(Gate::denies('partnerp_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.partnerps.show', compact('partnerp'));
    }

    public function destroy(Partnerp $partnerp)
    {
        abort_if(Gate::denies('partnerp_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $partnerp->delete();

        return back();
    }

    public function massDestroy(MassDestroyPartnerpRequest $request)
    {
        Partnerp::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
