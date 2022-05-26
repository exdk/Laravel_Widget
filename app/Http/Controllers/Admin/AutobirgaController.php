<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyAutobirgaRequest;
use App\Http\Requests\StoreAutobirgaRequest;
use App\Http\Requests\UpdateAutobirgaRequest;
use App\Models\Adr;
use App\Models\Autobirga;
use App\Models\Autotypload;
use App\Models\Country;
use App\Models\Typekuzova;
use App\Models\Typeload;
use App\Models\Typeolpatum;
use App\Models\User;
use App\Models\Valutum;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AutobirgaController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('autobirga_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $autobirgas = Autobirga::with(['typekuz', 'typeloads', 'adrs', 'fromcou', 'dop_1_val', 'dop_1_typ', 'dop_2_val', 'dop_2_typ', 'dop_3_val', 'dop_3_typ', 'dop_4_val', 'dop_4_typ', 'dop_5_val', 'dop_5_typ', 'dop_6_val', 'dop_6_typ', 'dop_7_val', 'dop_7_typ', 'dop_8_val', 'dop_8_typ', 'dop_9_typ', 'dop_9_val', 'dop_10_val', 'dop_10_typ', 'type_load', 'oplataval', 'contact'])->get();

        return view('admin.autobirgas.index', compact('autobirgas'));
    }

    public function create()
    {
        abort_if(Gate::denies('autobirga_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $typekuzs = Typekuzova::pluck('typekuzova', 'id')->prepend(trans('global.pleaseSelect'), '');

        $typeloads = Typeload::pluck('title', 'id');

        $adrs = Adr::pluck('title', 'id');

        $fromcous = Country::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $dop_1_vals = Valutum::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $dop_1_typs = Typeolpatum::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $dop_2_vals = Valutum::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $dop_2_typs = Typeolpatum::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $dop_3_vals = Valutum::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $dop_3_typs = Typeolpatum::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $dop_4_vals = Valutum::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $dop_4_typs = Typeolpatum::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $dop_5_vals = Valutum::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $dop_5_typs = Typeolpatum::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $dop_6_vals = Valutum::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $dop_6_typs = Typeolpatum::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $dop_7_vals = Valutum::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $dop_7_typs = Typeolpatum::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $dop_8_vals = Valutum::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $dop_8_typs = Typeolpatum::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $dop_9_typs = Typeolpatum::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $dop_9_vals = Valutum::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $dop_10_vals = Valutum::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $dop_10_typs = Typeolpatum::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $type_loads = Autotypload::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $oplatavals = Valutum::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $contacts = User::pluck('surname', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.autobirgas.create', compact('typekuzs', 'typeloads', 'adrs', 'fromcous', 'dop_1_vals', 'dop_1_typs', 'dop_2_vals', 'dop_2_typs', 'dop_3_vals', 'dop_3_typs', 'dop_4_vals', 'dop_4_typs', 'dop_5_vals', 'dop_5_typs', 'dop_6_vals', 'dop_6_typs', 'dop_7_vals', 'dop_7_typs', 'dop_8_vals', 'dop_8_typs', 'dop_9_typs', 'dop_9_vals', 'dop_10_vals', 'dop_10_typs', 'type_loads', 'oplatavals', 'contacts'));
    }

    public function store(StoreAutobirgaRequest $request)
    {
        $autobirga = Autobirga::create($request->all());
        $autobirga->typeloads()->sync($request->input('typeloads', []));
        $autobirga->adrs()->sync($request->input('adrs', []));

        return redirect()->route('admin.autobirgas.index');
    }

    public function edit(Autobirga $autobirga)
    {
        abort_if(Gate::denies('autobirga_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $typekuzs = Typekuzova::pluck('typekuzova', 'id')->prepend(trans('global.pleaseSelect'), '');

        $typeloads = Typeload::pluck('title', 'id');

        $adrs = Adr::pluck('title', 'id');

        $fromcous = Country::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $dop_1_vals = Valutum::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $dop_1_typs = Typeolpatum::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $dop_2_vals = Valutum::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $dop_2_typs = Typeolpatum::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $dop_3_vals = Valutum::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $dop_3_typs = Typeolpatum::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $dop_4_vals = Valutum::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $dop_4_typs = Typeolpatum::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $dop_5_vals = Valutum::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $dop_5_typs = Typeolpatum::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $dop_6_vals = Valutum::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $dop_6_typs = Typeolpatum::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $dop_7_vals = Valutum::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $dop_7_typs = Typeolpatum::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $dop_8_vals = Valutum::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $dop_8_typs = Typeolpatum::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $dop_9_typs = Typeolpatum::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $dop_9_vals = Valutum::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $dop_10_vals = Valutum::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $dop_10_typs = Typeolpatum::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $type_loads = Autotypload::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $oplatavals = Valutum::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $contacts = User::pluck('surname', 'id')->prepend(trans('global.pleaseSelect'), '');

        $autobirga->load('typekuz', 'typeloads', 'adrs', 'fromcou', 'dop_1_val', 'dop_1_typ', 'dop_2_val', 'dop_2_typ', 'dop_3_val', 'dop_3_typ', 'dop_4_val', 'dop_4_typ', 'dop_5_val', 'dop_5_typ', 'dop_6_val', 'dop_6_typ', 'dop_7_val', 'dop_7_typ', 'dop_8_val', 'dop_8_typ', 'dop_9_typ', 'dop_9_val', 'dop_10_val', 'dop_10_typ', 'type_load', 'oplataval', 'contact');

        return view('admin.autobirgas.edit', compact('typekuzs', 'typeloads', 'adrs', 'fromcous', 'dop_1_vals', 'dop_1_typs', 'dop_2_vals', 'dop_2_typs', 'dop_3_vals', 'dop_3_typs', 'dop_4_vals', 'dop_4_typs', 'dop_5_vals', 'dop_5_typs', 'dop_6_vals', 'dop_6_typs', 'dop_7_vals', 'dop_7_typs', 'dop_8_vals', 'dop_8_typs', 'dop_9_typs', 'dop_9_vals', 'dop_10_vals', 'dop_10_typs', 'type_loads', 'oplatavals', 'contacts', 'autobirga'));
    }

    public function update(UpdateAutobirgaRequest $request, Autobirga $autobirga)
    {
        $autobirga->update($request->all());
        $autobirga->typeloads()->sync($request->input('typeloads', []));
        $autobirga->adrs()->sync($request->input('adrs', []));

        return redirect()->route('admin.autobirgas.index');
    }

    public function show(Autobirga $autobirga)
    {
        abort_if(Gate::denies('autobirga_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $autobirga->load('typekuz', 'typeloads', 'adrs', 'fromcou', 'dop_1_val', 'dop_1_typ', 'dop_2_val', 'dop_2_typ', 'dop_3_val', 'dop_3_typ', 'dop_4_val', 'dop_4_typ', 'dop_5_val', 'dop_5_typ', 'dop_6_val', 'dop_6_typ', 'dop_7_val', 'dop_7_typ', 'dop_8_val', 'dop_8_typ', 'dop_9_typ', 'dop_9_val', 'dop_10_val', 'dop_10_typ', 'type_load', 'oplataval', 'contact');

        return view('admin.autobirgas.show', compact('autobirga'));
    }

    public function destroy(Autobirga $autobirga)
    {
        abort_if(Gate::denies('autobirga_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $autobirga->delete();

        return back();
    }

    public function massDestroy(MassDestroyAutobirgaRequest $request)
    {
        Autobirga::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
