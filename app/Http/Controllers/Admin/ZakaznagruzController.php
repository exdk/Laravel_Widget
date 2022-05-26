<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyZakaznagruzRequest;
use App\Http\Requests\StoreZakaznagruzRequest;
use App\Http\Requests\UpdateZakaznagruzRequest;
use App\Models\Adr;
use App\Models\Custom;
use App\Models\Gruz;
use App\Models\Ltlftl;
use App\Models\PerevozchikPerevoz;
use App\Models\Pointload;
use App\Models\Titilegruz;
use App\Models\Trandoc;
use App\Models\Trebovan;
use App\Models\Typekuzova;
use App\Models\Typeload;
use App\Models\Typeolpatum;
use App\Models\Typeunload;
use App\Models\Unitma;
use App\Models\User;
use App\Models\Valutand;
use App\Models\Valutum;
use App\Models\Zakazgrup;
use App\Models\Zakaznagruz;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ZakaznagruzController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('zakaznagruz_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $zakaznagruzs = Zakaznagruz::with(['gruz', 'unit', 'grutype', 'pointload', 'cload', 'typekuzovs', 'typeloads', 'type_unloads', 'ltlftl', 'trebs', 'trandocs', 'adr', 'valnd', 'kurator_1', 'kromezakazs', 'perevozkromes', 'dop_1_val', 'dop_1_typ', 'dop_1_tam', 'dop_2_val', 'dop_2_typ', 'dop_2_tam', 'dop_3_val', 'dop_3_typ', 'dop_3_tam', 'dop_4_val', 'dop_4_typ', 'dop_4_tam', 'dop_5_val', 'dop_5_typ', 'dop_5_tam'])->get();

        return view('admin.zakaznagruzs.index', compact('zakaznagruzs'));
    }

    public function create()
    {
        abort_if(Gate::denies('zakaznagruz_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $gruzs = Gruz::pluck('gruz', 'id')->prepend(trans('global.pleaseSelect'), '');

        $units = Unitma::pluck('titleru', 'id')->prepend(trans('global.pleaseSelect'), '');

        $grutypes = Titilegruz::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $pointloads = Pointload::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $cloads = Pointload::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $typekuzovs = Typekuzova::pluck('korot', 'id');

        $typeloads = Typeload::pluck('title', 'id');

        $type_unloads = Typeunload::pluck('kor', 'id');

        $ltlftls = Ltlftl::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $trebs = Trebovan::pluck('title', 'id');

        $trandocs = Trandoc::pluck('title', 'id');

        $adrs = Adr::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $valnds = Valutand::pluck('code', 'id')->prepend(trans('global.pleaseSelect'), '');

        $kurator_1s = User::pluck('surname', 'id')->prepend(trans('global.pleaseSelect'), '');

        $kromezakazs = Zakazgrup::pluck('title', 'id');

        $perevozkromes = PerevozchikPerevoz::pluck('title', 'id');

        $dop_1_vals = Valutum::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $dop_1_typs = Typeolpatum::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $dop_1_tams = Custom::pluck('address', 'id')->prepend(trans('global.pleaseSelect'), '');

        $dop_2_vals = Valutum::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $dop_2_typs = Typeolpatum::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $dop_2_tams = Custom::pluck('address', 'id')->prepend(trans('global.pleaseSelect'), '');

        $dop_3_vals = Valutum::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $dop_3_typs = Typeolpatum::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $dop_3_tams = Custom::pluck('address', 'id')->prepend(trans('global.pleaseSelect'), '');

        $dop_4_vals = Valutum::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $dop_4_typs = Typeolpatum::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $dop_4_tams = Custom::pluck('address', 'id')->prepend(trans('global.pleaseSelect'), '');

        $dop_5_vals = Valutum::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $dop_5_typs = Typeolpatum::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $dop_5_tams = Custom::pluck('address', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.zakaznagruzs.create', compact('gruzs', 'units', 'grutypes', 'pointloads', 'cloads', 'typekuzovs', 'typeloads', 'type_unloads', 'ltlftls', 'trebs', 'trandocs', 'adrs', 'valnds', 'kurator_1s', 'kromezakazs', 'perevozkromes', 'dop_1_vals', 'dop_1_typs', 'dop_1_tams', 'dop_2_vals', 'dop_2_typs', 'dop_2_tams', 'dop_3_vals', 'dop_3_typs', 'dop_3_tams', 'dop_4_vals', 'dop_4_typs', 'dop_4_tams', 'dop_5_vals', 'dop_5_typs', 'dop_5_tams'));
    }

    public function store(StoreZakaznagruzRequest $request)
    {
        $zakaznagruz = Zakaznagruz::create($request->all());
        $zakaznagruz->typekuzovs()->sync($request->input('typekuzovs', []));
        $zakaznagruz->typeloads()->sync($request->input('typeloads', []));
        $zakaznagruz->type_unloads()->sync($request->input('type_unloads', []));
        $zakaznagruz->trebs()->sync($request->input('trebs', []));
        $zakaznagruz->trandocs()->sync($request->input('trandocs', []));
        $zakaznagruz->kromezakazs()->sync($request->input('kromezakazs', []));
        $zakaznagruz->perevozkromes()->sync($request->input('perevozkromes', []));

        return redirect()->route('admin.zakaznagruzs.index');
    }

    public function edit(Zakaznagruz $zakaznagruz)
    {
        abort_if(Gate::denies('zakaznagruz_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $gruzs = Gruz::pluck('gruz', 'id')->prepend(trans('global.pleaseSelect'), '');

        $units = Unitma::pluck('titleru', 'id')->prepend(trans('global.pleaseSelect'), '');

        $grutypes = Titilegruz::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $pointloads = Pointload::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $cloads = Pointload::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $typekuzovs = Typekuzova::pluck('korot', 'id');

        $typeloads = Typeload::pluck('title', 'id');

        $type_unloads = Typeunload::pluck('kor', 'id');

        $ltlftls = Ltlftl::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $trebs = Trebovan::pluck('title', 'id');

        $trandocs = Trandoc::pluck('title', 'id');

        $adrs = Adr::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $valnds = Valutand::pluck('code', 'id')->prepend(trans('global.pleaseSelect'), '');

        $kurator_1s = User::pluck('surname', 'id')->prepend(trans('global.pleaseSelect'), '');

        $kromezakazs = Zakazgrup::pluck('title', 'id');

        $perevozkromes = PerevozchikPerevoz::pluck('title', 'id');

        $dop_1_vals = Valutum::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $dop_1_typs = Typeolpatum::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $dop_1_tams = Custom::pluck('address', 'id')->prepend(trans('global.pleaseSelect'), '');

        $dop_2_vals = Valutum::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $dop_2_typs = Typeolpatum::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $dop_2_tams = Custom::pluck('address', 'id')->prepend(trans('global.pleaseSelect'), '');

        $dop_3_vals = Valutum::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $dop_3_typs = Typeolpatum::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $dop_3_tams = Custom::pluck('address', 'id')->prepend(trans('global.pleaseSelect'), '');

        $dop_4_vals = Valutum::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $dop_4_typs = Typeolpatum::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $dop_4_tams = Custom::pluck('address', 'id')->prepend(trans('global.pleaseSelect'), '');

        $dop_5_vals = Valutum::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $dop_5_typs = Typeolpatum::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $dop_5_tams = Custom::pluck('address', 'id')->prepend(trans('global.pleaseSelect'), '');

        $zakaznagruz->load('gruz', 'unit', 'grutype', 'pointload', 'cload', 'typekuzovs', 'typeloads', 'type_unloads', 'ltlftl', 'trebs', 'trandocs', 'adr', 'valnd', 'kurator_1', 'kromezakazs', 'perevozkromes', 'dop_1_val', 'dop_1_typ', 'dop_1_tam', 'dop_2_val', 'dop_2_typ', 'dop_2_tam', 'dop_3_val', 'dop_3_typ', 'dop_3_tam', 'dop_4_val', 'dop_4_typ', 'dop_4_tam', 'dop_5_val', 'dop_5_typ', 'dop_5_tam');

        return view('admin.zakaznagruzs.edit', compact('gruzs', 'units', 'grutypes', 'pointloads', 'cloads', 'typekuzovs', 'typeloads', 'type_unloads', 'ltlftls', 'trebs', 'trandocs', 'adrs', 'valnds', 'kurator_1s', 'kromezakazs', 'perevozkromes', 'dop_1_vals', 'dop_1_typs', 'dop_1_tams', 'dop_2_vals', 'dop_2_typs', 'dop_2_tams', 'dop_3_vals', 'dop_3_typs', 'dop_3_tams', 'dop_4_vals', 'dop_4_typs', 'dop_4_tams', 'dop_5_vals', 'dop_5_typs', 'dop_5_tams', 'zakaznagruz'));
    }

    public function update(UpdateZakaznagruzRequest $request, Zakaznagruz $zakaznagruz)
    {
        $zakaznagruz->update($request->all());
        $zakaznagruz->typekuzovs()->sync($request->input('typekuzovs', []));
        $zakaznagruz->typeloads()->sync($request->input('typeloads', []));
        $zakaznagruz->type_unloads()->sync($request->input('type_unloads', []));
        $zakaznagruz->trebs()->sync($request->input('trebs', []));
        $zakaznagruz->trandocs()->sync($request->input('trandocs', []));
        $zakaznagruz->kromezakazs()->sync($request->input('kromezakazs', []));
        $zakaznagruz->perevozkromes()->sync($request->input('perevozkromes', []));

        return redirect()->route('admin.zakaznagruzs.index');
    }

    public function show(Zakaznagruz $zakaznagruz)
    {
        abort_if(Gate::denies('zakaznagruz_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $zakaznagruz->load('gruz', 'unit', 'grutype', 'pointload', 'cload', 'typekuzovs', 'typeloads', 'type_unloads', 'ltlftl', 'trebs', 'trandocs', 'adr', 'valnd', 'kurator_1', 'kromezakazs', 'perevozkromes', 'dop_1_val', 'dop_1_typ', 'dop_1_tam', 'dop_2_val', 'dop_2_typ', 'dop_2_tam', 'dop_3_val', 'dop_3_typ', 'dop_3_tam', 'dop_4_val', 'dop_4_typ', 'dop_4_tam', 'dop_5_val', 'dop_5_typ', 'dop_5_tam');

        return view('admin.zakaznagruzs.show', compact('zakaznagruz'));
    }

    public function destroy(Zakaznagruz $zakaznagruz)
    {
        abort_if(Gate::denies('zakaznagruz_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $zakaznagruz->delete();

        return back();
    }

    public function massDestroy(MassDestroyZakaznagruzRequest $request)
    {
        Zakaznagruz::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
