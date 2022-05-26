@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.assignedTransport.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.assigned-transports.update", [$assignedTransport->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="first_date_loading">{{ trans('cruds.assignedTransport.fields.first_date_loading') }}</label>
                <input class="form-control date {{ $errors->has('first_date_loading') ? 'is-invalid' : '' }}" type="text" name="first_date_loading" id="first_date_loading" value="{{ old('first_date_loading', $assignedTransport->first_date_loading) }}">
                @if($errors->has('first_date_loading'))
                    <span class="text-danger">{{ $errors->first('first_date_loading') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assignedTransport.fields.first_date_loading_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="statys_vtoroe_bronirovanie">{{ trans('cruds.assignedTransport.fields.statys_vtoroe_bronirovanie') }}</label>
                <input class="form-control {{ $errors->has('statys_vtoroe_bronirovanie') ? 'is-invalid' : '' }}" type="text" name="statys_vtoroe_bronirovanie" id="statys_vtoroe_bronirovanie" value="{{ old('statys_vtoroe_bronirovanie', $assignedTransport->statys_vtoroe_bronirovanie) }}">
                @if($errors->has('statys_vtoroe_bronirovanie'))
                    <span class="text-danger">{{ $errors->first('statys_vtoroe_bronirovanie') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assignedTransport.fields.statys_vtoroe_bronirovanie_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="tip_pogryzki_vtoroe_bronirovanie">{{ trans('cruds.assignedTransport.fields.tip_pogryzki_vtoroe_bronirovanie') }}</label>
                <input class="form-control {{ $errors->has('tip_pogryzki_vtoroe_bronirovanie') ? 'is-invalid' : '' }}" type="text" name="tip_pogryzki_vtoroe_bronirovanie" id="tip_pogryzki_vtoroe_bronirovanie" value="{{ old('tip_pogryzki_vtoroe_bronirovanie', $assignedTransport->tip_pogryzki_vtoroe_bronirovanie) }}">
                @if($errors->has('tip_pogryzki_vtoroe_bronirovanie'))
                    <span class="text-danger">{{ $errors->first('tip_pogryzki_vtoroe_bronirovanie') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assignedTransport.fields.tip_pogryzki_vtoroe_bronirovanie_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="bronirovanie_zabronirovano">{{ trans('cruds.assignedTransport.fields.bronirovanie_zabronirovano') }}</label>
                <input class="form-control {{ $errors->has('bronirovanie_zabronirovano') ? 'is-invalid' : '' }}" type="text" name="bronirovanie_zabronirovano" id="bronirovanie_zabronirovano" value="{{ old('bronirovanie_zabronirovano', $assignedTransport->bronirovanie_zabronirovano) }}">
                @if($errors->has('bronirovanie_zabronirovano'))
                    <span class="text-danger">{{ $errors->first('bronirovanie_zabronirovano') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assignedTransport.fields.bronirovanie_zabronirovano_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="status_yroven_perevozki">{{ trans('cruds.assignedTransport.fields.status_yroven_perevozki') }}</label>
                <input class="form-control {{ $errors->has('status_yroven_perevozki') ? 'is-invalid' : '' }}" type="text" name="status_yroven_perevozki" id="status_yroven_perevozki" value="{{ old('status_yroven_perevozki', $assignedTransport->status_yroven_perevozki) }}">
                @if($errors->has('status_yroven_perevozki'))
                    <span class="text-danger">{{ $errors->first('status_yroven_perevozki') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assignedTransport.fields.status_yroven_perevozki_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="statys_kem_razmeshcheno_yroven_perevozki">{{ trans('cruds.assignedTransport.fields.statys_kem_razmeshcheno_yroven_perevozki') }}</label>
                <input class="form-control {{ $errors->has('statys_kem_razmeshcheno_yroven_perevozki') ? 'is-invalid' : '' }}" type="text" name="statys_kem_razmeshcheno_yroven_perevozki" id="statys_kem_razmeshcheno_yroven_perevozki" value="{{ old('statys_kem_razmeshcheno_yroven_perevozki', $assignedTransport->statys_kem_razmeshcheno_yroven_perevozki) }}">
                @if($errors->has('statys_kem_razmeshcheno_yroven_perevozki'))
                    <span class="text-danger">{{ $errors->first('statys_kem_razmeshcheno_yroven_perevozki') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assignedTransport.fields.statys_kem_razmeshcheno_yroven_perevozki_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="status_yroven_postavki">{{ trans('cruds.assignedTransport.fields.status_yroven_postavki') }}</label>
                <input class="form-control {{ $errors->has('status_yroven_postavki') ? 'is-invalid' : '' }}" type="text" name="status_yroven_postavki" id="status_yroven_postavki" value="{{ old('status_yroven_postavki', $assignedTransport->status_yroven_postavki) }}">
                @if($errors->has('status_yroven_postavki'))
                    <span class="text-danger">{{ $errors->first('status_yroven_postavki') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assignedTransport.fields.status_yroven_postavki_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="status_kem_razmeshcheno_yroven_postavki">{{ trans('cruds.assignedTransport.fields.status_kem_razmeshcheno_yroven_postavki') }}</label>
                <input class="form-control {{ $errors->has('status_kem_razmeshcheno_yroven_postavki') ? 'is-invalid' : '' }}" type="text" name="status_kem_razmeshcheno_yroven_postavki" id="status_kem_razmeshcheno_yroven_postavki" value="{{ old('status_kem_razmeshcheno_yroven_postavki', $assignedTransport->status_kem_razmeshcheno_yroven_postavki) }}">
                @if($errors->has('status_kem_razmeshcheno_yroven_postavki'))
                    <span class="text-danger">{{ $errors->first('status_kem_razmeshcheno_yroven_postavki') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assignedTransport.fields.status_kem_razmeshcheno_yroven_postavki_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="id_gryppi_perevozok">{{ trans('cruds.assignedTransport.fields.id_gryppi_perevozok') }}</label>
                <input class="form-control {{ $errors->has('id_gryppi_perevozok') ? 'is-invalid' : '' }}" type="text" name="id_gryppi_perevozok" id="id_gryppi_perevozok" value="{{ old('id_gryppi_perevozok', $assignedTransport->id_gryppi_perevozok) }}">
                @if($errors->has('id_gryppi_perevozok'))
                    <span class="text-danger">{{ $errors->first('id_gryppi_perevozok') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assignedTransport.fields.id_gryppi_perevozok_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="tip">{{ trans('cruds.assignedTransport.fields.tip') }}</label>
                <input class="form-control {{ $errors->has('tip') ? 'is-invalid' : '' }}" type="text" name="tip" id="tip" value="{{ old('tip', $assignedTransport->tip) }}">
                @if($errors->has('tip'))
                    <span class="text-danger">{{ $errors->first('tip') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assignedTransport.fields.tip_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="dopolnitelnie_novera_gryzootpravitelya">{{ trans('cruds.assignedTransport.fields.dopolnitelnie_novera_gryzootpravitelya') }}</label>
                <input class="form-control {{ $errors->has('dopolnitelnie_novera_gryzootpravitelya') ? 'is-invalid' : '' }}" type="text" name="dopolnitelnie_novera_gryzootpravitelya" id="dopolnitelnie_novera_gryzootpravitelya" value="{{ old('dopolnitelnie_novera_gryzootpravitelya', $assignedTransport->dopolnitelnie_novera_gryzootpravitelya) }}">
                @if($errors->has('dopolnitelnie_novera_gryzootpravitelya'))
                    <span class="text-danger">{{ $errors->first('dopolnitelnie_novera_gryzootpravitelya') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assignedTransport.fields.dopolnitelnie_novera_gryzootpravitelya_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="dopolnitelniy_n_gryzootpravitelay_2">{{ trans('cruds.assignedTransport.fields.dopolnitelniy_n_gryzootpravitelay_2') }}</label>
                <input class="form-control {{ $errors->has('dopolnitelniy_n_gryzootpravitelay_2') ? 'is-invalid' : '' }}" type="text" name="dopolnitelniy_n_gryzootpravitelay_2" id="dopolnitelniy_n_gryzootpravitelay_2" value="{{ old('dopolnitelniy_n_gryzootpravitelay_2', $assignedTransport->dopolnitelniy_n_gryzootpravitelay_2) }}">
                @if($errors->has('dopolnitelniy_n_gryzootpravitelay_2'))
                    <span class="text-danger">{{ $errors->first('dopolnitelniy_n_gryzootpravitelay_2') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assignedTransport.fields.dopolnitelniy_n_gryzootpravitelay_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="dopolnitelniy_n_gryzootpravitelya_3">{{ trans('cruds.assignedTransport.fields.dopolnitelniy_n_gryzootpravitelya_3') }}</label>
                <input class="form-control {{ $errors->has('dopolnitelniy_n_gryzootpravitelya_3') ? 'is-invalid' : '' }}" type="text" name="dopolnitelniy_n_gryzootpravitelya_3" id="dopolnitelniy_n_gryzootpravitelya_3" value="{{ old('dopolnitelniy_n_gryzootpravitelya_3', $assignedTransport->dopolnitelniy_n_gryzootpravitelya_3) }}">
                @if($errors->has('dopolnitelniy_n_gryzootpravitelya_3'))
                    <span class="text-danger">{{ $errors->first('dopolnitelniy_n_gryzootpravitelya_3') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assignedTransport.fields.dopolnitelniy_n_gryzootpravitelya_3_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="kolonka">{{ trans('cruds.assignedTransport.fields.kolonka') }}</label>
                <input class="form-control {{ $errors->has('kolonka') ? 'is-invalid' : '' }}" type="text" name="kolonka" id="kolonka" value="{{ old('kolonka', $assignedTransport->kolonka) }}">
                @if($errors->has('kolonka'))
                    <span class="text-danger">{{ $errors->first('kolonka') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assignedTransport.fields.kolonka_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="start">{{ trans('cruds.assignedTransport.fields.start') }}</label>
                <input class="form-control {{ $errors->has('start') ? 'is-invalid' : '' }}" type="text" name="start" id="start" value="{{ old('start', $assignedTransport->start) }}">
                @if($errors->has('start'))
                    <span class="text-danger">{{ $errors->first('start') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assignedTransport.fields.start_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="mesto_naznacheniya">{{ trans('cruds.assignedTransport.fields.mesto_naznacheniya') }}</label>
                <input class="form-control {{ $errors->has('mesto_naznacheniya') ? 'is-invalid' : '' }}" type="text" name="mesto_naznacheniya" id="mesto_naznacheniya" value="{{ old('mesto_naznacheniya', $assignedTransport->mesto_naznacheniya) }}">
                @if($errors->has('mesto_naznacheniya'))
                    <span class="text-danger">{{ $errors->first('mesto_naznacheniya') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assignedTransport.fields.mesto_naznacheniya_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="transportnoe_sredstvo_trebovanie">{{ trans('cruds.assignedTransport.fields.transportnoe_sredstvo_trebovanie') }}</label>
                <input class="form-control {{ $errors->has('transportnoe_sredstvo_trebovanie') ? 'is-invalid' : '' }}" type="text" name="transportnoe_sredstvo_trebovanie" id="transportnoe_sredstvo_trebovanie" value="{{ old('transportnoe_sredstvo_trebovanie', $assignedTransport->transportnoe_sredstvo_trebovanie) }}">
                @if($errors->has('transportnoe_sredstvo_trebovanie'))
                    <span class="text-danger">{{ $errors->first('transportnoe_sredstvo_trebovanie') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assignedTransport.fields.transportnoe_sredstvo_trebovanie_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="vibrosi_co_2">{{ trans('cruds.assignedTransport.fields.vibrosi_co_2') }}</label>
                <input class="form-control {{ $errors->has('vibrosi_co_2') ? 'is-invalid' : '' }}" type="text" name="vibrosi_co_2" id="vibrosi_co_2" value="{{ old('vibrosi_co_2', $assignedTransport->vibrosi_co_2) }}">
                @if($errors->has('vibrosi_co_2'))
                    <span class="text-danger">{{ $errors->first('vibrosi_co_2') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assignedTransport.fields.vibrosi_co_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="ves">{{ trans('cruds.assignedTransport.fields.ves') }}</label>
                <input class="form-control {{ $errors->has('ves') ? 'is-invalid' : '' }}" type="text" name="ves" id="ves" value="{{ old('ves', $assignedTransport->ves) }}">
                @if($errors->has('ves'))
                    <span class="text-danger">{{ $errors->first('ves') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assignedTransport.fields.ves_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="obem">{{ trans('cruds.assignedTransport.fields.obem') }}</label>
                <input class="form-control {{ $errors->has('obem') ? 'is-invalid' : '' }}" type="text" name="obem" id="obem" value="{{ old('obem', $assignedTransport->obem) }}">
                @if($errors->has('obem'))
                    <span class="text-danger">{{ $errors->first('obem') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assignedTransport.fields.obem_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="dlina">{{ trans('cruds.assignedTransport.fields.dlina') }}</label>
                <input class="form-control {{ $errors->has('dlina') ? 'is-invalid' : '' }}" type="text" name="dlina" id="dlina" value="{{ old('dlina', $assignedTransport->dlina) }}">
                @if($errors->has('dlina'))
                    <span class="text-danger">{{ $errors->first('dlina') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assignedTransport.fields.dlina_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="pozicii">{{ trans('cruds.assignedTransport.fields.pozicii') }}</label>
                <input class="form-control {{ $errors->has('pozicii') ? 'is-invalid' : '' }}" type="text" name="pozicii" id="pozicii" value="{{ old('pozicii', $assignedTransport->pozicii) }}">
                @if($errors->has('pozicii'))
                    <span class="text-danger">{{ $errors->first('pozicii') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assignedTransport.fields.pozicii_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="registracionniy_n">{{ trans('cruds.assignedTransport.fields.registracionniy_n') }}</label>
                <input class="form-control {{ $errors->has('registracionniy_n') ? 'is-invalid' : '' }}" type="text" name="registracionniy_n" id="registracionniy_n" value="{{ old('registracionniy_n', $assignedTransport->registracionniy_n) }}">
                @if($errors->has('registracionniy_n'))
                    <span class="text-danger">{{ $errors->first('registracionniy_n') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assignedTransport.fields.registracionniy_n_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="vnytrenniy_kommentariy_k_perevozke">{{ trans('cruds.assignedTransport.fields.vnytrenniy_kommentariy_k_perevozke') }}</label>
                <input class="form-control {{ $errors->has('vnytrenniy_kommentariy_k_perevozke') ? 'is-invalid' : '' }}" type="text" name="vnytrenniy_kommentariy_k_perevozke" id="vnytrenniy_kommentariy_k_perevozke" value="{{ old('vnytrenniy_kommentariy_k_perevozke', $assignedTransport->vnytrenniy_kommentariy_k_perevozke) }}">
                @if($errors->has('vnytrenniy_kommentariy_k_perevozke'))
                    <span class="text-danger">{{ $errors->first('vnytrenniy_kommentariy_k_perevozke') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assignedTransport.fields.vnytrenniy_kommentariy_k_perevozke_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="statys">{{ trans('cruds.assignedTransport.fields.statys') }}</label>
                <input class="form-control {{ $errors->has('statys') ? 'is-invalid' : '' }}" type="text" name="statys" id="statys" value="{{ old('statys', $assignedTransport->statys) }}">
                @if($errors->has('statys'))
                    <span class="text-danger">{{ $errors->first('statys') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assignedTransport.fields.statys_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="pribitie">{{ trans('cruds.assignedTransport.fields.pribitie') }}</label>
                <input class="form-control {{ $errors->has('pribitie') ? 'is-invalid' : '' }}" type="text" name="pribitie" id="pribitie" value="{{ old('pribitie', $assignedTransport->pribitie) }}">
                @if($errors->has('pribitie'))
                    <span class="text-danger">{{ $errors->first('pribitie') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assignedTransport.fields.pribitie_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="otbitie">{{ trans('cruds.assignedTransport.fields.otbitie') }}</label>
                <input class="form-control {{ $errors->has('otbitie') ? 'is-invalid' : '' }}" type="text" name="otbitie" id="otbitie" value="{{ old('otbitie', $assignedTransport->otbitie) }}">
                @if($errors->has('otbitie'))
                    <span class="text-danger">{{ $errors->first('otbitie') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assignedTransport.fields.otbitie_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="tip_pogryzki">{{ trans('cruds.assignedTransport.fields.tip_pogryzki') }}</label>
                <input class="form-control {{ $errors->has('tip_pogryzki') ? 'is-invalid' : '' }}" type="text" name="tip_pogryzki" id="tip_pogryzki" value="{{ old('tip_pogryzki', $assignedTransport->tip_pogryzki) }}">
                @if($errors->has('tip_pogryzki'))
                    <span class="text-danger">{{ $errors->first('tip_pogryzki') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assignedTransport.fields.tip_pogryzki_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="statysi_razmestit_otslezhivanie_gryza">{{ trans('cruds.assignedTransport.fields.statysi_razmestit_otslezhivanie_gryza') }}</label>
                <input class="form-control {{ $errors->has('statysi_razmestit_otslezhivanie_gryza') ? 'is-invalid' : '' }}" type="text" name="statysi_razmestit_otslezhivanie_gryza" id="statysi_razmestit_otslezhivanie_gryza" value="{{ old('statysi_razmestit_otslezhivanie_gryza', $assignedTransport->statysi_razmestit_otslezhivanie_gryza) }}">
                @if($errors->has('statysi_razmestit_otslezhivanie_gryza'))
                    <span class="text-danger">{{ $errors->first('statysi_razmestit_otslezhivanie_gryza') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assignedTransport.fields.statysi_razmestit_otslezhivanie_gryza_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="nazvanie_kompanii_start">{{ trans('cruds.assignedTransport.fields.nazvanie_kompanii_start') }}</label>
                <input class="form-control {{ $errors->has('nazvanie_kompanii_start') ? 'is-invalid' : '' }}" type="text" name="nazvanie_kompanii_start" id="nazvanie_kompanii_start" value="{{ old('nazvanie_kompanii_start', $assignedTransport->nazvanie_kompanii_start) }}">
                @if($errors->has('nazvanie_kompanii_start'))
                    <span class="text-danger">{{ $errors->first('nazvanie_kompanii_start') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assignedTransport.fields.nazvanie_kompanii_start_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="gorod_start">{{ trans('cruds.assignedTransport.fields.gorod_start') }}</label>
                <input class="form-control {{ $errors->has('gorod_start') ? 'is-invalid' : '' }}" type="text" name="gorod_start" id="gorod_start" value="{{ old('gorod_start', $assignedTransport->gorod_start) }}">
                @if($errors->has('gorod_start'))
                    <span class="text-danger">{{ $errors->first('gorod_start') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assignedTransport.fields.gorod_start_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="gorod_mesto_naznacheniya">{{ trans('cruds.assignedTransport.fields.gorod_mesto_naznacheniya') }}</label>
                <input class="form-control {{ $errors->has('gorod_mesto_naznacheniya') ? 'is-invalid' : '' }}" type="text" name="gorod_mesto_naznacheniya" id="gorod_mesto_naznacheniya" value="{{ old('gorod_mesto_naznacheniya', $assignedTransport->gorod_mesto_naznacheniya) }}">
                @if($errors->has('gorod_mesto_naznacheniya'))
                    <span class="text-danger">{{ $errors->first('gorod_mesto_naznacheniya') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assignedTransport.fields.gorod_mesto_naznacheniya_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="nazvanie_kompanii_mesto_naznacheniya">{{ trans('cruds.assignedTransport.fields.nazvanie_kompanii_mesto_naznacheniya') }}</label>
                <input class="form-control {{ $errors->has('nazvanie_kompanii_mesto_naznacheniya') ? 'is-invalid' : '' }}" type="text" name="nazvanie_kompanii_mesto_naznacheniya" id="nazvanie_kompanii_mesto_naznacheniya" value="{{ old('nazvanie_kompanii_mesto_naznacheniya', $assignedTransport->nazvanie_kompanii_mesto_naznacheniya) }}">
                @if($errors->has('nazvanie_kompanii_mesto_naznacheniya'))
                    <span class="text-danger">{{ $errors->first('nazvanie_kompanii_mesto_naznacheniya') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assignedTransport.fields.nazvanie_kompanii_mesto_naznacheniya_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="spravochnaya_tsena_perevozki">{{ trans('cruds.assignedTransport.fields.spravochnaya_tsena_perevozki') }}</label>
                <input class="form-control {{ $errors->has('spravochnaya_tsena_perevozki') ? 'is-invalid' : '' }}" type="text" name="spravochnaya_tsena_perevozki" id="spravochnaya_tsena_perevozki" value="{{ old('spravochnaya_tsena_perevozki', $assignedTransport->spravochnaya_tsena_perevozki) }}">
                @if($errors->has('spravochnaya_tsena_perevozki'))
                    <span class="text-danger">{{ $errors->first('spravochnaya_tsena_perevozki') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assignedTransport.fields.spravochnaya_tsena_perevozki_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="valyuta_ogovorennoy_tseni_perevozki">{{ trans('cruds.assignedTransport.fields.valyuta_ogovorennoy_tseni_perevozki') }}</label>
                <input class="form-control {{ $errors->has('valyuta_ogovorennoy_tseni_perevozki') ? 'is-invalid' : '' }}" type="text" name="valyuta_ogovorennoy_tseni_perevozki" id="valyuta_ogovorennoy_tseni_perevozki" value="{{ old('valyuta_ogovorennoy_tseni_perevozki', $assignedTransport->valyuta_ogovorennoy_tseni_perevozki) }}">
                @if($errors->has('valyuta_ogovorennoy_tseni_perevozki'))
                    <span class="text-danger">{{ $errors->first('valyuta_ogovorennoy_tseni_perevozki') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assignedTransport.fields.valyuta_ogovorennoy_tseni_perevozki_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="n_perevozki">{{ trans('cruds.assignedTransport.fields.n_perevozki') }}</label>
                <input class="form-control {{ $errors->has('n_perevozki') ? 'is-invalid' : '' }}" type="text" name="n_perevozki" id="n_perevozki" value="{{ old('n_perevozki', $assignedTransport->n_perevozki) }}">
                @if($errors->has('n_perevozki'))
                    <span class="text-danger">{{ $errors->first('n_perevozki') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assignedTransport.fields.n_perevozki_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="transporeonid">{{ trans('cruds.assignedTransport.fields.transporeonid') }}</label>
                <input class="form-control {{ $errors->has('transporeonid') ? 'is-invalid' : '' }}" type="text" name="transporeonid" id="transporeonid" value="{{ old('transporeonid', $assignedTransport->transporeonid) }}">
                @if($errors->has('transporeonid'))
                    <span class="text-danger">{{ $errors->first('transporeonid') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assignedTransport.fields.transporeonid_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="nomera_postavki">{{ trans('cruds.assignedTransport.fields.nomera_postavki') }}</label>
                <input class="form-control {{ $errors->has('nomera_postavki') ? 'is-invalid' : '' }}" type="text" name="nomera_postavki" id="nomera_postavki" value="{{ old('nomera_postavki', $assignedTransport->nomera_postavki) }}">
                @if($errors->has('nomera_postavki'))
                    <span class="text-danger">{{ $errors->first('nomera_postavki') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assignedTransport.fields.nomera_postavki_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="id_postavki">{{ trans('cruds.assignedTransport.fields.id_postavki') }}</label>
                <input class="form-control {{ $errors->has('id_postavki') ? 'is-invalid' : '' }}" type="text" name="id_postavki" id="id_postavki" value="{{ old('id_postavki', $assignedTransport->id_postavki) }}">
                @if($errors->has('id_postavki'))
                    <span class="text-danger">{{ $errors->first('id_postavki') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assignedTransport.fields.id_postavki_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="kategorii">{{ trans('cruds.assignedTransport.fields.kategorii') }}</label>
                <input class="form-control {{ $errors->has('kategorii') ? 'is-invalid' : '' }}" type="text" name="kategorii" id="kategorii" value="{{ old('kategorii', $assignedTransport->kategorii) }}">
                @if($errors->has('kategorii'))
                    <span class="text-danger">{{ $errors->first('kategorii') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assignedTransport.fields.kategorii_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="gryzootpravitel">{{ trans('cruds.assignedTransport.fields.gryzootpravitel') }}</label>
                <input class="form-control {{ $errors->has('gryzootpravitel') ? 'is-invalid' : '' }}" type="text" name="gryzootpravitel" id="gryzootpravitel" value="{{ old('gryzootpravitel', $assignedTransport->gryzootpravitel) }}">
                @if($errors->has('gryzootpravitel'))
                    <span class="text-danger">{{ $errors->first('gryzootpravitel') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assignedTransport.fields.gryzootpravitel_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="bronirovaniya_ne_zabronirovano_ypravlenie_vremennimi_oknami">{{ trans('cruds.assignedTransport.fields.bronirovaniya_ne_zabronirovano_ypravlenie_vremennimi_oknami') }}</label>
                <input class="form-control {{ $errors->has('bronirovaniya_ne_zabronirovano_ypravlenie_vremennimi_oknami') ? 'is-invalid' : '' }}" type="text" name="bronirovaniya_ne_zabronirovano_ypravlenie_vremennimi_oknami" id="bronirovaniya_ne_zabronirovano_ypravlenie_vremennimi_oknami" value="{{ old('bronirovaniya_ne_zabronirovano_ypravlenie_vremennimi_oknami', $assignedTransport->bronirovaniya_ne_zabronirovano_ypravlenie_vremennimi_oknami) }}">
                @if($errors->has('bronirovaniya_ne_zabronirovano_ypravlenie_vremennimi_oknami'))
                    <span class="text-danger">{{ $errors->first('bronirovaniya_ne_zabronirovano_ypravlenie_vremennimi_oknami') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assignedTransport.fields.bronirovaniya_ne_zabronirovano_ypravlenie_vremennimi_oknami_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="otdel_planirovaniya">{{ trans('cruds.assignedTransport.fields.otdel_planirovaniya') }}</label>
                <input class="form-control {{ $errors->has('otdel_planirovaniya') ? 'is-invalid' : '' }}" type="text" name="otdel_planirovaniya" id="otdel_planirovaniya" value="{{ old('otdel_planirovaniya', $assignedTransport->otdel_planirovaniya) }}">
                @if($errors->has('otdel_planirovaniya'))
                    <span class="text-danger">{{ $errors->first('otdel_planirovaniya') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assignedTransport.fields.otdel_planirovaniya_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="dispetcher_gryzootpravitelya">{{ trans('cruds.assignedTransport.fields.dispetcher_gryzootpravitelya') }}</label>
                <input class="form-control {{ $errors->has('dispetcher_gryzootpravitelya') ? 'is-invalid' : '' }}" type="text" name="dispetcher_gryzootpravitelya" id="dispetcher_gryzootpravitelya" value="{{ old('dispetcher_gryzootpravitelya', $assignedTransport->dispetcher_gryzootpravitelya) }}">
                @if($errors->has('dispetcher_gryzootpravitelya'))
                    <span class="text-danger">{{ $errors->first('dispetcher_gryzootpravitelya') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assignedTransport.fields.dispetcher_gryzootpravitelya_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="dispetcher_perevozchika">{{ trans('cruds.assignedTransport.fields.dispetcher_perevozchika') }}</label>
                <input class="form-control {{ $errors->has('dispetcher_perevozchika') ? 'is-invalid' : '' }}" type="text" name="dispetcher_perevozchika" id="dispetcher_perevozchika" value="{{ old('dispetcher_perevozchika', $assignedTransport->dispetcher_perevozchika) }}">
                @if($errors->has('dispetcher_perevozchika'))
                    <span class="text-danger">{{ $errors->first('dispetcher_perevozchika') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assignedTransport.fields.dispetcher_perevozchika_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="statys_eta">{{ trans('cruds.assignedTransport.fields.statys_eta') }}</label>
                <input class="form-control {{ $errors->has('statys_eta') ? 'is-invalid' : '' }}" type="text" name="statys_eta" id="statys_eta" value="{{ old('statys_eta', $assignedTransport->statys_eta) }}">
                @if($errors->has('statys_eta'))
                    <span class="text-danger">{{ $errors->first('statys_eta') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assignedTransport.fields.statys_eta_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="eta_tip">{{ trans('cruds.assignedTransport.fields.eta_tip') }}</label>
                <input class="form-control {{ $errors->has('eta_tip') ? 'is-invalid' : '' }}" type="text" name="eta_tip" id="eta_tip" value="{{ old('eta_tip', $assignedTransport->eta_tip) }}">
                @if($errors->has('eta_tip'))
                    <span class="text-danger">{{ $errors->first('eta_tip') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assignedTransport.fields.eta_tip_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="raznitsa_s_eta">{{ trans('cruds.assignedTransport.fields.raznitsa_s_eta') }}</label>
                <input class="form-control {{ $errors->has('raznitsa_s_eta') ? 'is-invalid' : '' }}" type="text" name="raznitsa_s_eta" id="raznitsa_s_eta" value="{{ old('raznitsa_s_eta', $assignedTransport->raznitsa_s_eta) }}">
                @if($errors->has('raznitsa_s_eta'))
                    <span class="text-danger">{{ $errors->first('raznitsa_s_eta') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assignedTransport.fields.raznitsa_s_eta_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="postavki">{{ trans('cruds.assignedTransport.fields.postavki') }}</label>
                <input class="form-control {{ $errors->has('postavki') ? 'is-invalid' : '' }}" type="text" name="postavki" id="postavki" value="{{ old('postavki', $assignedTransport->postavki) }}">
                @if($errors->has('postavki'))
                    <span class="text-danger">{{ $errors->first('postavki') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assignedTransport.fields.postavki_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="vlozheniya">{{ trans('cruds.assignedTransport.fields.vlozheniya') }}</label>
                <input class="form-control {{ $errors->has('vlozheniya') ? 'is-invalid' : '' }}" type="text" name="vlozheniya" id="vlozheniya" value="{{ old('vlozheniya', $assignedTransport->vlozheniya) }}">
                @if($errors->has('vlozheniya'))
                    <span class="text-danger">{{ $errors->first('vlozheniya') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assignedTransport.fields.vlozheniya_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="data_pogryzki">{{ trans('cruds.assignedTransport.fields.data_pogryzki') }}</label>
                <input class="form-control date {{ $errors->has('data_pogryzki') ? 'is-invalid' : '' }}" type="text" name="data_pogryzki" id="data_pogryzki" value="{{ old('data_pogryzki', $assignedTransport->data_pogryzki) }}">
                @if($errors->has('data_pogryzki'))
                    <span class="text-danger">{{ $errors->first('data_pogryzki') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assignedTransport.fields.data_pogryzki_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="period_zagryzki">{{ trans('cruds.assignedTransport.fields.period_zagryzki') }}</label>
                <input class="form-control timepicker {{ $errors->has('period_zagryzki') ? 'is-invalid' : '' }}" type="text" name="period_zagryzki" id="period_zagryzki" value="{{ old('period_zagryzki', $assignedTransport->period_zagryzki) }}">
                @if($errors->has('period_zagryzki'))
                    <span class="text-danger">{{ $errors->first('period_zagryzki') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assignedTransport.fields.period_zagryzki_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="data_razgryzki">{{ trans('cruds.assignedTransport.fields.data_razgryzki') }}</label>
                <input class="form-control date {{ $errors->has('data_razgryzki') ? 'is-invalid' : '' }}" type="text" name="data_razgryzki" id="data_razgryzki" value="{{ old('data_razgryzki', $assignedTransport->data_razgryzki) }}">
                @if($errors->has('data_razgryzki'))
                    <span class="text-danger">{{ $errors->first('data_razgryzki') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assignedTransport.fields.data_razgryzki_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="period_razgryzki">{{ trans('cruds.assignedTransport.fields.period_razgryzki') }}</label>
                <input class="form-control timepicker {{ $errors->has('period_razgryzki') ? 'is-invalid' : '' }}" type="text" name="period_razgryzki" id="period_razgryzki" value="{{ old('period_razgryzki', $assignedTransport->period_razgryzki) }}">
                @if($errors->has('period_razgryzki'))
                    <span class="text-danger">{{ $errors->first('period_razgryzki') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assignedTransport.fields.period_razgryzki_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="poslednie_izmeneniya">{{ trans('cruds.assignedTransport.fields.poslednie_izmeneniya') }}</label>
                <input class="form-control datetime {{ $errors->has('poslednie_izmeneniya') ? 'is-invalid' : '' }}" type="text" name="poslednie_izmeneniya" id="poslednie_izmeneniya" value="{{ old('poslednie_izmeneniya', $assignedTransport->poslednie_izmeneniya) }}">
                @if($errors->has('poslednie_izmeneniya'))
                    <span class="text-danger">{{ $errors->first('poslednie_izmeneniya') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assignedTransport.fields.poslednie_izmeneniya_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="krayniy_srok">{{ trans('cruds.assignedTransport.fields.krayniy_srok') }}</label>
                <input class="form-control datetime {{ $errors->has('krayniy_srok') ? 'is-invalid' : '' }}" type="text" name="krayniy_srok" id="krayniy_srok" value="{{ old('krayniy_srok', $assignedTransport->krayniy_srok) }}">
                @if($errors->has('krayniy_srok'))
                    <span class="text-danger">{{ $errors->first('krayniy_srok') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assignedTransport.fields.krayniy_srok_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="otslezhivanie">{{ trans('cruds.assignedTransport.fields.otslezhivanie') }}</label>
                <input class="form-control {{ $errors->has('otslezhivanie') ? 'is-invalid' : '' }}" type="text" name="otslezhivanie" id="otslezhivanie" value="{{ old('otslezhivanie', $assignedTransport->otslezhivanie) }}">
                @if($errors->has('otslezhivanie'))
                    <span class="text-danger">{{ $errors->first('otslezhivanie') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assignedTransport.fields.otslezhivanie_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="opredelennie_mesta_zagryzki">{{ trans('cruds.assignedTransport.fields.opredelennie_mesta_zagryzki') }}</label>
                <input class="form-control {{ $errors->has('opredelennie_mesta_zagryzki') ? 'is-invalid' : '' }}" type="text" name="opredelennie_mesta_zagryzki" id="opredelennie_mesta_zagryzki" value="{{ old('opredelennie_mesta_zagryzki', $assignedTransport->opredelennie_mesta_zagryzki) }}">
                @if($errors->has('opredelennie_mesta_zagryzki'))
                    <span class="text-danger">{{ $errors->first('opredelennie_mesta_zagryzki') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assignedTransport.fields.opredelennie_mesta_zagryzki_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="pochtoviy_indeks_start">{{ trans('cruds.assignedTransport.fields.pochtoviy_indeks_start') }}</label>
                <input class="form-control {{ $errors->has('pochtoviy_indeks_start') ? 'is-invalid' : '' }}" type="text" name="pochtoviy_indeks_start" id="pochtoviy_indeks_start" value="{{ old('pochtoviy_indeks_start', $assignedTransport->pochtoviy_indeks_start) }}">
                @if($errors->has('pochtoviy_indeks_start'))
                    <span class="text-danger">{{ $errors->first('pochtoviy_indeks_start') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assignedTransport.fields.pochtoviy_indeks_start_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="region_start">{{ trans('cruds.assignedTransport.fields.region_start') }}</label>
                <input class="form-control {{ $errors->has('region_start') ? 'is-invalid' : '' }}" type="text" name="region_start" id="region_start" value="{{ old('region_start', $assignedTransport->region_start) }}">
                @if($errors->has('region_start'))
                    <span class="text-danger">{{ $errors->first('region_start') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assignedTransport.fields.region_start_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="strana_start">{{ trans('cruds.assignedTransport.fields.strana_start') }}</label>
                <input class="form-control {{ $errors->has('strana_start') ? 'is-invalid' : '' }}" type="text" name="strana_start" id="strana_start" value="{{ old('strana_start', $assignedTransport->strana_start) }}">
                @if($errors->has('strana_start'))
                    <span class="text-danger">{{ $errors->first('strana_start') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assignedTransport.fields.strana_start_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="kommentariy_start">{{ trans('cruds.assignedTransport.fields.kommentariy_start') }}</label>
                <input class="form-control {{ $errors->has('kommentariy_start') ? 'is-invalid' : '' }}" type="text" name="kommentariy_start" id="kommentariy_start" value="{{ old('kommentariy_start', $assignedTransport->kommentariy_start) }}">
                @if($errors->has('kommentariy_start'))
                    <span class="text-danger">{{ $errors->first('kommentariy_start') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assignedTransport.fields.kommentariy_start_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="dta_statysa_vtoroe_bronirovanie">{{ trans('cruds.assignedTransport.fields.dta_statysa_vtoroe_bronirovanie') }}</label>
                <input class="form-control date {{ $errors->has('dta_statysa_vtoroe_bronirovanie') ? 'is-invalid' : '' }}" type="text" name="dta_statysa_vtoroe_bronirovanie" id="dta_statysa_vtoroe_bronirovanie" value="{{ old('dta_statysa_vtoroe_bronirovanie', $assignedTransport->dta_statysa_vtoroe_bronirovanie) }}">
                @if($errors->has('dta_statysa_vtoroe_bronirovanie'))
                    <span class="text-danger">{{ $errors->first('dta_statysa_vtoroe_bronirovanie') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assignedTransport.fields.dta_statysa_vtoroe_bronirovanie_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="statys_data_statysa_yroven_perevozki">{{ trans('cruds.assignedTransport.fields.statys_data_statysa_yroven_perevozki') }}</label>
                <input class="form-control date {{ $errors->has('statys_data_statysa_yroven_perevozki') ? 'is-invalid' : '' }}" type="text" name="statys_data_statysa_yroven_perevozki" id="statys_data_statysa_yroven_perevozki" value="{{ old('statys_data_statysa_yroven_perevozki', $assignedTransport->statys_data_statysa_yroven_perevozki) }}">
                @if($errors->has('statys_data_statysa_yroven_perevozki'))
                    <span class="text-danger">{{ $errors->first('statys_data_statysa_yroven_perevozki') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assignedTransport.fields.statys_data_statysa_yroven_perevozki_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="data_statysa">{{ trans('cruds.assignedTransport.fields.data_statysa') }}</label>
                <input class="form-control date {{ $errors->has('data_statysa') ? 'is-invalid' : '' }}" type="text" name="data_statysa" id="data_statysa" value="{{ old('data_statysa', $assignedTransport->data_statysa) }}">
                @if($errors->has('data_statysa'))
                    <span class="text-danger">{{ $errors->first('data_statysa') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assignedTransport.fields.data_statysa_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="opredelennie_mesta_razgryzki">{{ trans('cruds.assignedTransport.fields.opredelennie_mesta_razgryzki') }}</label>
                <input class="form-control {{ $errors->has('opredelennie_mesta_razgryzki') ? 'is-invalid' : '' }}" type="text" name="opredelennie_mesta_razgryzki" id="opredelennie_mesta_razgryzki" value="{{ old('opredelennie_mesta_razgryzki', $assignedTransport->opredelennie_mesta_razgryzki) }}">
                @if($errors->has('opredelennie_mesta_razgryzki'))
                    <span class="text-danger">{{ $errors->first('opredelennie_mesta_razgryzki') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assignedTransport.fields.opredelennie_mesta_razgryzki_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="pochtoviy_indeks_mesto_naznacheniya">{{ trans('cruds.assignedTransport.fields.pochtoviy_indeks_mesto_naznacheniya') }}</label>
                <input class="form-control {{ $errors->has('pochtoviy_indeks_mesto_naznacheniya') ? 'is-invalid' : '' }}" type="text" name="pochtoviy_indeks_mesto_naznacheniya" id="pochtoviy_indeks_mesto_naznacheniya" value="{{ old('pochtoviy_indeks_mesto_naznacheniya', $assignedTransport->pochtoviy_indeks_mesto_naznacheniya) }}">
                @if($errors->has('pochtoviy_indeks_mesto_naznacheniya'))
                    <span class="text-danger">{{ $errors->first('pochtoviy_indeks_mesto_naznacheniya') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assignedTransport.fields.pochtoviy_indeks_mesto_naznacheniya_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="region_mesto_naznacheniya">{{ trans('cruds.assignedTransport.fields.region_mesto_naznacheniya') }}</label>
                <input class="form-control {{ $errors->has('region_mesto_naznacheniya') ? 'is-invalid' : '' }}" type="text" name="region_mesto_naznacheniya" id="region_mesto_naznacheniya" value="{{ old('region_mesto_naznacheniya', $assignedTransport->region_mesto_naznacheniya) }}">
                @if($errors->has('region_mesto_naznacheniya'))
                    <span class="text-danger">{{ $errors->first('region_mesto_naznacheniya') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assignedTransport.fields.region_mesto_naznacheniya_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="zabronirovano_s_vtoroe_bronirovanie">{{ trans('cruds.assignedTransport.fields.zabronirovano_s_vtoroe_bronirovanie') }}</label>
                <input class="form-control datetime {{ $errors->has('zabronirovano_s_vtoroe_bronirovanie') ? 'is-invalid' : '' }}" type="text" name="zabronirovano_s_vtoroe_bronirovanie" id="zabronirovano_s_vtoroe_bronirovanie" value="{{ old('zabronirovano_s_vtoroe_bronirovanie', $assignedTransport->zabronirovano_s_vtoroe_bronirovanie) }}">
                @if($errors->has('zabronirovano_s_vtoroe_bronirovanie'))
                    <span class="text-danger">{{ $errors->first('zabronirovano_s_vtoroe_bronirovanie') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assignedTransport.fields.zabronirovano_s_vtoroe_bronirovanie_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="data_naznacheniya">{{ trans('cruds.assignedTransport.fields.data_naznacheniya') }}</label>
                <input class="form-control date {{ $errors->has('data_naznacheniya') ? 'is-invalid' : '' }}" type="text" name="data_naznacheniya" id="data_naznacheniya" value="{{ old('data_naznacheniya', $assignedTransport->data_naznacheniya) }}">
                @if($errors->has('data_naznacheniya'))
                    <span class="text-danger">{{ $errors->first('data_naznacheniya') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assignedTransport.fields.data_naznacheniya_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="strana_mesto_naznacheniya">{{ trans('cruds.assignedTransport.fields.strana_mesto_naznacheniya') }}</label>
                <input class="form-control {{ $errors->has('strana_mesto_naznacheniya') ? 'is-invalid' : '' }}" type="text" name="strana_mesto_naznacheniya" id="strana_mesto_naznacheniya" value="{{ old('strana_mesto_naznacheniya', $assignedTransport->strana_mesto_naznacheniya) }}">
                @if($errors->has('strana_mesto_naznacheniya'))
                    <span class="text-danger">{{ $errors->first('strana_mesto_naznacheniya') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assignedTransport.fields.strana_mesto_naznacheniya_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="pribitie_vtoroe_bronirovanie">{{ trans('cruds.assignedTransport.fields.pribitie_vtoroe_bronirovanie') }}</label>
                <input class="form-control datetime {{ $errors->has('pribitie_vtoroe_bronirovanie') ? 'is-invalid' : '' }}" type="text" name="pribitie_vtoroe_bronirovanie" id="pribitie_vtoroe_bronirovanie" value="{{ old('pribitie_vtoroe_bronirovanie', $assignedTransport->pribitie_vtoroe_bronirovanie) }}">
                @if($errors->has('pribitie_vtoroe_bronirovanie'))
                    <span class="text-danger">{{ $errors->first('pribitie_vtoroe_bronirovanie') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assignedTransport.fields.pribitie_vtoroe_bronirovanie_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="zabronirovano_s">{{ trans('cruds.assignedTransport.fields.zabronirovano_s') }}</label>
                <input class="form-control datetime {{ $errors->has('zabronirovano_s') ? 'is-invalid' : '' }}" type="text" name="zabronirovano_s" id="zabronirovano_s" value="{{ old('zabronirovano_s', $assignedTransport->zabronirovano_s) }}">
                @if($errors->has('zabronirovano_s'))
                    <span class="text-danger">{{ $errors->first('zabronirovano_s') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assignedTransport.fields.zabronirovano_s_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="otbitie_vtoroe_bronirovanie">{{ trans('cruds.assignedTransport.fields.otbitie_vtoroe_bronirovanie') }}</label>
                <input class="form-control datetime {{ $errors->has('otbitie_vtoroe_bronirovanie') ? 'is-invalid' : '' }}" type="text" name="otbitie_vtoroe_bronirovanie" id="otbitie_vtoroe_bronirovanie" value="{{ old('otbitie_vtoroe_bronirovanie', $assignedTransport->otbitie_vtoroe_bronirovanie) }}">
                @if($errors->has('otbitie_vtoroe_bronirovanie'))
                    <span class="text-danger">{{ $errors->first('otbitie_vtoroe_bronirovanie') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assignedTransport.fields.otbitie_vtoroe_bronirovanie_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="kommentariy_mesto_naznacheniya">{{ trans('cruds.assignedTransport.fields.kommentariy_mesto_naznacheniya') }}</label>
                <input class="form-control {{ $errors->has('kommentariy_mesto_naznacheniya') ? 'is-invalid' : '' }}" type="text" name="kommentariy_mesto_naznacheniya" id="kommentariy_mesto_naznacheniya" value="{{ old('kommentariy_mesto_naznacheniya', $assignedTransport->kommentariy_mesto_naznacheniya) }}">
                @if($errors->has('kommentariy_mesto_naznacheniya'))
                    <span class="text-danger">{{ $errors->first('kommentariy_mesto_naznacheniya') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assignedTransport.fields.kommentariy_mesto_naznacheniya_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="tip_predlozheniya">{{ trans('cruds.assignedTransport.fields.tip_predlozheniya') }}</label>
                <input class="form-control {{ $errors->has('tip_predlozheniya') ? 'is-invalid' : '' }}" type="text" name="tip_predlozheniya" id="tip_predlozheniya" value="{{ old('tip_predlozheniya', $assignedTransport->tip_predlozheniya) }}">
                @if($errors->has('tip_predlozheniya'))
                    <span class="text-danger">{{ $errors->first('tip_predlozheniya') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assignedTransport.fields.tip_predlozheniya_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="predlozhenie">{{ trans('cruds.assignedTransport.fields.predlozhenie') }}</label>
                <input class="form-control {{ $errors->has('predlozhenie') ? 'is-invalid' : '' }}" type="text" name="predlozhenie" id="predlozhenie" value="{{ old('predlozhenie', $assignedTransport->predlozhenie) }}">
                @if($errors->has('predlozhenie'))
                    <span class="text-danger">{{ $errors->first('predlozhenie') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assignedTransport.fields.predlozhenie_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection