<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAdrRequest;
use App\Http\Requests\StoreAdrRequest;
use App\Http\Requests\UpdateAdrRequest;
use App\Models\Adr;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdrController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('adr_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $adrs = Adr::all();

        return view('admin.adrs.index', compact('adrs'));
    }

    public function create()
    {
        abort_if(Gate::denies('adr_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.adrs.create');
    }

    public function store(StoreAdrRequest $request)
    {
        $adr = Adr::create($request->all());

        return redirect()->route('admin.adrs.index');
    }

    public function edit(Adr $adr)
    {
        abort_if(Gate::denies('adr_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.adrs.edit', compact('adr'));
    }

    public function update(UpdateAdrRequest $request, Adr $adr)
    {
        $adr->update($request->all());

        return redirect()->route('admin.adrs.index');
    }

    public function show(Adr $adr)
    {
        abort_if(Gate::denies('adr_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.adrs.show', compact('adr'));
    }

    public function destroy(Adr $adr)
    {
        abort_if(Gate::denies('adr_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $adr->delete();

        return back();
    }

    public function massDestroy(MassDestroyAdrRequest $request)
    {
        Adr::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
