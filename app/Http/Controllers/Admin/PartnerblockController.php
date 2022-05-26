<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyPartnerblockRequest;
use App\Http\Requests\StorePartnerblockRequest;
use App\Http\Requests\UpdatePartnerblockRequest;
use App\Models\Mycompanall;
use App\Models\Partnerblock;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PartnerblockController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('partnerblock_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $partnerblocks = Partnerblock::with(['partner', 'team'])->get();

        return view('admin.partnerblocks.index', compact('partnerblocks'));
    }

    public function create()
    {
        abort_if(Gate::denies('partnerblock_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $partners = Mycompanall::pluck('hortname', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.partnerblocks.create', compact('partners'));
    }

    public function store(StorePartnerblockRequest $request)
    {
        $partnerblock = Partnerblock::create($request->all());

        return redirect()->route('admin.partnerblocks.index');
    }

    public function edit(Partnerblock $partnerblock)
    {
        abort_if(Gate::denies('partnerblock_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $partners = Mycompanall::pluck('hortname', 'id')->prepend(trans('global.pleaseSelect'), '');

        $partnerblock->load('partner', 'team');

        return view('admin.partnerblocks.edit', compact('partnerblock', 'partners'));
    }

    public function update(UpdatePartnerblockRequest $request, Partnerblock $partnerblock)
    {
        $partnerblock->update($request->all());

        return redirect()->route('admin.partnerblocks.index');
    }

    public function show(Partnerblock $partnerblock)
    {
        abort_if(Gate::denies('partnerblock_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $partnerblock->load('partner', 'team');

        return view('admin.partnerblocks.show', compact('partnerblock'));
    }

    public function destroy(Partnerblock $partnerblock)
    {
        abort_if(Gate::denies('partnerblock_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $partnerblock->delete();

        return back();
    }

    public function massDestroy(MassDestroyPartnerblockRequest $request)
    {
        Partnerblock::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
