<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyRfqcountryRequest;
use App\Http\Requests\StoreRfqcountryRequest;
use App\Http\Requests\UpdateRfqcountryRequest;
use App\Models\Apoint;
use App\Models\Bpoit;
use App\Models\Good;
use App\Models\Pack;
use App\Models\Rfq;
use App\Models\Rfqcountry;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RfqcountryController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('rfqcountry_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rfqcountries = Rfqcountry::with(['rfq', 'apoint', 'bpoint', 'good', 'pack', 'team'])->get();

        return view('admin.rfqcountries.index', compact('rfqcountries'));
    }

    public function create()
    {
        abort_if(Gate::denies('rfqcountry_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rfqs = Rfq::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $apoints = Apoint::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $bpoints = Bpoit::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $goods = Good::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $packs = Pack::pluck('type', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.rfqcountries.create', compact('apoints', 'bpoints', 'goods', 'packs', 'rfqs'));
    }

    public function store(StoreRfqcountryRequest $request)
    {
        $rfqcountry = Rfqcountry::create($request->all());

        return redirect()->route('admin.rfqcountries.index');
    }

    public function edit(Rfqcountry $rfqcountry)
    {
        abort_if(Gate::denies('rfqcountry_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rfqs = Rfq::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $apoints = Apoint::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $bpoints = Bpoit::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $goods = Good::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $packs = Pack::pluck('type', 'id')->prepend(trans('global.pleaseSelect'), '');

        $rfqcountry->load('rfq', 'apoint', 'bpoint', 'good', 'pack', 'team');

        return view('admin.rfqcountries.edit', compact('apoints', 'bpoints', 'goods', 'packs', 'rfqcountry', 'rfqs'));
    }

    public function update(UpdateRfqcountryRequest $request, Rfqcountry $rfqcountry)
    {
        $rfqcountry->update($request->all());

        return redirect()->route('admin.rfqcountries.index');
    }

    public function show(Rfqcountry $rfqcountry)
    {
        abort_if(Gate::denies('rfqcountry_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rfqcountry->load('rfq', 'apoint', 'bpoint', 'good', 'pack', 'team');

        return view('admin.rfqcountries.show', compact('rfqcountry'));
    }

    public function destroy(Rfqcountry $rfqcountry)
    {
        abort_if(Gate::denies('rfqcountry_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rfqcountry->delete();

        return back();
    }

    public function massDestroy(MassDestroyRfqcountryRequest $request)
    {
        Rfqcountry::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
