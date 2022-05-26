@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.assignedDelivere.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.assigned-deliveres.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="deliveryid">{{ trans('cruds.assignedDelivere.fields.deliveryid') }}</label>
                <input class="form-control {{ $errors->has('deliveryid') ? 'is-invalid' : '' }}" type="text" name="deliveryid" id="deliveryid" value="{{ old('deliveryid', '') }}">
                @if($errors->has('deliveryid'))
                    <span class="text-danger">{{ $errors->first('deliveryid') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assignedDelivere.fields.deliveryid_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="statusi_razmestit_otslezhivanie_gryza">{{ trans('cruds.assignedDelivere.fields.statusi_razmestit_otslezhivanie_gryza') }}</label>
                <input class="form-control {{ $errors->has('statusi_razmestit_otslezhivanie_gryza') ? 'is-invalid' : '' }}" type="text" name="statusi_razmestit_otslezhivanie_gryza" id="statusi_razmestit_otslezhivanie_gryza" value="{{ old('statusi_razmestit_otslezhivanie_gryza', '') }}">
                @if($errors->has('statusi_razmestit_otslezhivanie_gryza'))
                    <span class="text-danger">{{ $errors->first('statusi_razmestit_otslezhivanie_gryza') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assignedDelivere.fields.statusi_razmestit_otslezhivanie_gryza_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="n_postavki">{{ trans('cruds.assignedDelivere.fields.n_postavki') }}</label>
                <input class="form-control {{ $errors->has('n_postavki') ? 'is-invalid' : '' }}" type="text" name="n_postavki" id="n_postavki" value="{{ old('n_postavki', '') }}">
                @if($errors->has('n_postavki'))
                    <span class="text-danger">{{ $errors->first('n_postavki') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assignedDelivere.fields.n_postavki_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="id_postavki">{{ trans('cruds.assignedDelivere.fields.id_postavki') }}</label>
                <input class="form-control {{ $errors->has('id_postavki') ? 'is-invalid' : '' }}" type="text" name="id_postavki" id="id_postavki" value="{{ old('id_postavki', '') }}">
                @if($errors->has('id_postavki'))
                    <span class="text-danger">{{ $errors->first('id_postavki') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assignedDelivere.fields.id_postavki_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="n_perevozki">{{ trans('cruds.assignedDelivere.fields.n_perevozki') }}</label>
                <input class="form-control {{ $errors->has('n_perevozki') ? 'is-invalid' : '' }}" type="text" name="n_perevozki" id="n_perevozki" value="{{ old('n_perevozki', '') }}">
                @if($errors->has('n_perevozki'))
                    <span class="text-danger">{{ $errors->first('n_perevozki') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assignedDelivere.fields.n_perevozki_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="data_naznacheniya_yroven_perevozki">{{ trans('cruds.assignedDelivere.fields.data_naznacheniya_yroven_perevozki') }}</label>
                <input class="form-control datetime {{ $errors->has('data_naznacheniya_yroven_perevozki') ? 'is-invalid' : '' }}" type="text" name="data_naznacheniya_yroven_perevozki" id="data_naznacheniya_yroven_perevozki" value="{{ old('data_naznacheniya_yroven_perevozki') }}">
                @if($errors->has('data_naznacheniya_yroven_perevozki'))
                    <span class="text-danger">{{ $errors->first('data_naznacheniya_yroven_perevozki') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assignedDelivere.fields.data_naznacheniya_yroven_perevozki_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="gryzootpravitel">{{ trans('cruds.assignedDelivere.fields.gryzootpravitel') }}</label>
                <input class="form-control {{ $errors->has('gryzootpravitel') ? 'is-invalid' : '' }}" type="text" name="gryzootpravitel" id="gryzootpravitel" value="{{ old('gryzootpravitel', '') }}">
                @if($errors->has('gryzootpravitel'))
                    <span class="text-danger">{{ $errors->first('gryzootpravitel') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assignedDelivere.fields.gryzootpravitel_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="eta">{{ trans('cruds.assignedDelivere.fields.eta') }}</label>
                <input class="form-control {{ $errors->has('eta') ? 'is-invalid' : '' }}" type="text" name="eta" id="eta" value="{{ old('eta', '') }}">
                @if($errors->has('eta'))
                    <span class="text-danger">{{ $errors->first('eta') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assignedDelivere.fields.eta_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="statys_eta">{{ trans('cruds.assignedDelivere.fields.statys_eta') }}</label>
                <input class="form-control {{ $errors->has('statys_eta') ? 'is-invalid' : '' }}" type="text" name="statys_eta" id="statys_eta" value="{{ old('statys_eta', '') }}">
                @if($errors->has('statys_eta'))
                    <span class="text-danger">{{ $errors->first('statys_eta') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assignedDelivere.fields.statys_eta_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="raznitsa_s_eta">{{ trans('cruds.assignedDelivere.fields.raznitsa_s_eta') }}</label>
                <input class="form-control {{ $errors->has('raznitsa_s_eta') ? 'is-invalid' : '' }}" type="text" name="raznitsa_s_eta" id="raznitsa_s_eta" value="{{ old('raznitsa_s_eta', '') }}">
                @if($errors->has('raznitsa_s_eta'))
                    <span class="text-danger">{{ $errors->first('raznitsa_s_eta') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assignedDelivere.fields.raznitsa_s_eta_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="eta_tip">{{ trans('cruds.assignedDelivere.fields.eta_tip') }}</label>
                <input class="form-control {{ $errors->has('eta_tip') ? 'is-invalid' : '' }}" type="text" name="eta_tip" id="eta_tip" value="{{ old('eta_tip', '') }}">
                @if($errors->has('eta_tip'))
                    <span class="text-danger">{{ $errors->first('eta_tip') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assignedDelivere.fields.eta_tip_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="nazvanie_kompanii_mesto_zagryzki">{{ trans('cruds.assignedDelivere.fields.nazvanie_kompanii_mesto_zagryzki') }}</label>
                <input class="form-control {{ $errors->has('nazvanie_kompanii_mesto_zagryzki') ? 'is-invalid' : '' }}" type="text" name="nazvanie_kompanii_mesto_zagryzki" id="nazvanie_kompanii_mesto_zagryzki" value="{{ old('nazvanie_kompanii_mesto_zagryzki', '') }}">
                @if($errors->has('nazvanie_kompanii_mesto_zagryzki'))
                    <span class="text-danger">{{ $errors->first('nazvanie_kompanii_mesto_zagryzki') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assignedDelivere.fields.nazvanie_kompanii_mesto_zagryzki_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="dopolnitelnie_dannie_adresa_mesto_zagryzki">{{ trans('cruds.assignedDelivere.fields.dopolnitelnie_dannie_adresa_mesto_zagryzki') }}</label>
                <input class="form-control {{ $errors->has('dopolnitelnie_dannie_adresa_mesto_zagryzki') ? 'is-invalid' : '' }}" type="text" name="dopolnitelnie_dannie_adresa_mesto_zagryzki" id="dopolnitelnie_dannie_adresa_mesto_zagryzki" value="{{ old('dopolnitelnie_dannie_adresa_mesto_zagryzki', '') }}">
                @if($errors->has('dopolnitelnie_dannie_adresa_mesto_zagryzki'))
                    <span class="text-danger">{{ $errors->first('dopolnitelnie_dannie_adresa_mesto_zagryzki') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assignedDelivere.fields.dopolnitelnie_dannie_adresa_mesto_zagryzki_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="ylitsa_i_nom_doma_mesto_zagryzki">{{ trans('cruds.assignedDelivere.fields.ylitsa_i_nom_doma_mesto_zagryzki') }}</label>
                <input class="form-control {{ $errors->has('ylitsa_i_nom_doma_mesto_zagryzki') ? 'is-invalid' : '' }}" type="text" name="ylitsa_i_nom_doma_mesto_zagryzki" id="ylitsa_i_nom_doma_mesto_zagryzki" value="{{ old('ylitsa_i_nom_doma_mesto_zagryzki', '') }}">
                @if($errors->has('ylitsa_i_nom_doma_mesto_zagryzki'))
                    <span class="text-danger">{{ $errors->first('ylitsa_i_nom_doma_mesto_zagryzki') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assignedDelivere.fields.ylitsa_i_nom_doma_mesto_zagryzki_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="pochtoviy_indeks_mesto_zagryzki">{{ trans('cruds.assignedDelivere.fields.pochtoviy_indeks_mesto_zagryzki') }}</label>
                <input class="form-control {{ $errors->has('pochtoviy_indeks_mesto_zagryzki') ? 'is-invalid' : '' }}" type="text" name="pochtoviy_indeks_mesto_zagryzki" id="pochtoviy_indeks_mesto_zagryzki" value="{{ old('pochtoviy_indeks_mesto_zagryzki', '') }}">
                @if($errors->has('pochtoviy_indeks_mesto_zagryzki'))
                    <span class="text-danger">{{ $errors->first('pochtoviy_indeks_mesto_zagryzki') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assignedDelivere.fields.pochtoviy_indeks_mesto_zagryzki_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="gorod_mesto_zagryzki">{{ trans('cruds.assignedDelivere.fields.gorod_mesto_zagryzki') }}</label>
                <input class="form-control {{ $errors->has('gorod_mesto_zagryzki') ? 'is-invalid' : '' }}" type="text" name="gorod_mesto_zagryzki" id="gorod_mesto_zagryzki" value="{{ old('gorod_mesto_zagryzki', '') }}">
                @if($errors->has('gorod_mesto_zagryzki'))
                    <span class="text-danger">{{ $errors->first('gorod_mesto_zagryzki') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assignedDelivere.fields.gorod_mesto_zagryzki_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="region_mesto_zagryzki">{{ trans('cruds.assignedDelivere.fields.region_mesto_zagryzki') }}</label>
                <input class="form-control {{ $errors->has('region_mesto_zagryzki') ? 'is-invalid' : '' }}" type="text" name="region_mesto_zagryzki" id="region_mesto_zagryzki" value="{{ old('region_mesto_zagryzki', '') }}">
                @if($errors->has('region_mesto_zagryzki'))
                    <span class="text-danger">{{ $errors->first('region_mesto_zagryzki') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assignedDelivere.fields.region_mesto_zagryzki_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="strana_mesto_zagryzki">{{ trans('cruds.assignedDelivere.fields.strana_mesto_zagryzki') }}</label>
                <input class="form-control {{ $errors->has('strana_mesto_zagryzki') ? 'is-invalid' : '' }}" type="text" name="strana_mesto_zagryzki" id="strana_mesto_zagryzki" value="{{ old('strana_mesto_zagryzki', '') }}">
                @if($errors->has('strana_mesto_zagryzki'))
                    <span class="text-danger">{{ $errors->first('strana_mesto_zagryzki') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assignedDelivere.fields.strana_mesto_zagryzki_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="nomer_telefona_dlya_avizo_mesto_zagryzki">{{ trans('cruds.assignedDelivere.fields.nomer_telefona_dlya_avizo_mesto_zagryzki') }}</label>
                <input class="form-control {{ $errors->has('nomer_telefona_dlya_avizo_mesto_zagryzki') ? 'is-invalid' : '' }}" type="text" name="nomer_telefona_dlya_avizo_mesto_zagryzki" id="nomer_telefona_dlya_avizo_mesto_zagryzki" value="{{ old('nomer_telefona_dlya_avizo_mesto_zagryzki', '') }}">
                @if($errors->has('nomer_telefona_dlya_avizo_mesto_zagryzki'))
                    <span class="text-danger">{{ $errors->first('nomer_telefona_dlya_avizo_mesto_zagryzki') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assignedDelivere.fields.nomer_telefona_dlya_avizo_mesto_zagryzki_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="kommentariy_mesto_zagryzki">{{ trans('cruds.assignedDelivere.fields.kommentariy_mesto_zagryzki') }}</label>
                <input class="form-control {{ $errors->has('kommentariy_mesto_zagryzki') ? 'is-invalid' : '' }}" type="text" name="kommentariy_mesto_zagryzki" id="kommentariy_mesto_zagryzki" value="{{ old('kommentariy_mesto_zagryzki', '') }}">
                @if($errors->has('kommentariy_mesto_zagryzki'))
                    <span class="text-danger">{{ $errors->first('kommentariy_mesto_zagryzki') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assignedDelivere.fields.kommentariy_mesto_zagryzki_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="data_zagryzki_ot">{{ trans('cruds.assignedDelivere.fields.data_zagryzki_ot') }}</label>
                <input class="form-control datetime {{ $errors->has('data_zagryzki_ot') ? 'is-invalid' : '' }}" type="text" name="data_zagryzki_ot" id="data_zagryzki_ot" value="{{ old('data_zagryzki_ot') }}">
                @if($errors->has('data_zagryzki_ot'))
                    <span class="text-danger">{{ $errors->first('data_zagryzki_ot') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assignedDelivere.fields.data_zagryzki_ot_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="data_zagryzki_do">{{ trans('cruds.assignedDelivere.fields.data_zagryzki_do') }}</label>
                <input class="form-control datetime {{ $errors->has('data_zagryzki_do') ? 'is-invalid' : '' }}" type="text" name="data_zagryzki_do" id="data_zagryzki_do" value="{{ old('data_zagryzki_do') }}">
                @if($errors->has('data_zagryzki_do'))
                    <span class="text-danger">{{ $errors->first('data_zagryzki_do') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assignedDelivere.fields.data_zagryzki_do_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="nazvanie_kompanii_mesto_razgryzki">{{ trans('cruds.assignedDelivere.fields.nazvanie_kompanii_mesto_razgryzki') }}</label>
                <input class="form-control {{ $errors->has('nazvanie_kompanii_mesto_razgryzki') ? 'is-invalid' : '' }}" type="text" name="nazvanie_kompanii_mesto_razgryzki" id="nazvanie_kompanii_mesto_razgryzki" value="{{ old('nazvanie_kompanii_mesto_razgryzki', '') }}">
                @if($errors->has('nazvanie_kompanii_mesto_razgryzki'))
                    <span class="text-danger">{{ $errors->first('nazvanie_kompanii_mesto_razgryzki') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assignedDelivere.fields.nazvanie_kompanii_mesto_razgryzki_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="dopolnitelnie_dannie_adesa_mesto_razgryzki">{{ trans('cruds.assignedDelivere.fields.dopolnitelnie_dannie_adesa_mesto_razgryzki') }}</label>
                <input class="form-control {{ $errors->has('dopolnitelnie_dannie_adesa_mesto_razgryzki') ? 'is-invalid' : '' }}" type="text" name="dopolnitelnie_dannie_adesa_mesto_razgryzki" id="dopolnitelnie_dannie_adesa_mesto_razgryzki" value="{{ old('dopolnitelnie_dannie_adesa_mesto_razgryzki', '') }}">
                @if($errors->has('dopolnitelnie_dannie_adesa_mesto_razgryzki'))
                    <span class="text-danger">{{ $errors->first('dopolnitelnie_dannie_adesa_mesto_razgryzki') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assignedDelivere.fields.dopolnitelnie_dannie_adesa_mesto_razgryzki_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="ylitsa_i_nom_doma_mesto_razgryzki">{{ trans('cruds.assignedDelivere.fields.ylitsa_i_nom_doma_mesto_razgryzki') }}</label>
                <input class="form-control {{ $errors->has('ylitsa_i_nom_doma_mesto_razgryzki') ? 'is-invalid' : '' }}" type="text" name="ylitsa_i_nom_doma_mesto_razgryzki" id="ylitsa_i_nom_doma_mesto_razgryzki" value="{{ old('ylitsa_i_nom_doma_mesto_razgryzki', '') }}">
                @if($errors->has('ylitsa_i_nom_doma_mesto_razgryzki'))
                    <span class="text-danger">{{ $errors->first('ylitsa_i_nom_doma_mesto_razgryzki') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assignedDelivere.fields.ylitsa_i_nom_doma_mesto_razgryzki_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="pochtoviy_indeks_mesto_razgryzki">{{ trans('cruds.assignedDelivere.fields.pochtoviy_indeks_mesto_razgryzki') }}</label>
                <input class="form-control {{ $errors->has('pochtoviy_indeks_mesto_razgryzki') ? 'is-invalid' : '' }}" type="text" name="pochtoviy_indeks_mesto_razgryzki" id="pochtoviy_indeks_mesto_razgryzki" value="{{ old('pochtoviy_indeks_mesto_razgryzki', '') }}">
                @if($errors->has('pochtoviy_indeks_mesto_razgryzki'))
                    <span class="text-danger">{{ $errors->first('pochtoviy_indeks_mesto_razgryzki') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assignedDelivere.fields.pochtoviy_indeks_mesto_razgryzki_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="gorod_mesto_razgryzki">{{ trans('cruds.assignedDelivere.fields.gorod_mesto_razgryzki') }}</label>
                <input class="form-control {{ $errors->has('gorod_mesto_razgryzki') ? 'is-invalid' : '' }}" type="text" name="gorod_mesto_razgryzki" id="gorod_mesto_razgryzki" value="{{ old('gorod_mesto_razgryzki', '') }}">
                @if($errors->has('gorod_mesto_razgryzki'))
                    <span class="text-danger">{{ $errors->first('gorod_mesto_razgryzki') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assignedDelivere.fields.gorod_mesto_razgryzki_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="region_mesto_razgryzki">{{ trans('cruds.assignedDelivere.fields.region_mesto_razgryzki') }}</label>
                <input class="form-control {{ $errors->has('region_mesto_razgryzki') ? 'is-invalid' : '' }}" type="text" name="region_mesto_razgryzki" id="region_mesto_razgryzki" value="{{ old('region_mesto_razgryzki', '') }}">
                @if($errors->has('region_mesto_razgryzki'))
                    <span class="text-danger">{{ $errors->first('region_mesto_razgryzki') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assignedDelivere.fields.region_mesto_razgryzki_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="nomer_telefona_dlya_avizo_mesto_razgryzki">{{ trans('cruds.assignedDelivere.fields.nomer_telefona_dlya_avizo_mesto_razgryzki') }}</label>
                <input class="form-control {{ $errors->has('nomer_telefona_dlya_avizo_mesto_razgryzki') ? 'is-invalid' : '' }}" type="text" name="nomer_telefona_dlya_avizo_mesto_razgryzki" id="nomer_telefona_dlya_avizo_mesto_razgryzki" value="{{ old('nomer_telefona_dlya_avizo_mesto_razgryzki', '') }}">
                @if($errors->has('nomer_telefona_dlya_avizo_mesto_razgryzki'))
                    <span class="text-danger">{{ $errors->first('nomer_telefona_dlya_avizo_mesto_razgryzki') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assignedDelivere.fields.nomer_telefona_dlya_avizo_mesto_razgryzki_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="kommentariy_mesto_razgryzki">{{ trans('cruds.assignedDelivere.fields.kommentariy_mesto_razgryzki') }}</label>
                <input class="form-control {{ $errors->has('kommentariy_mesto_razgryzki') ? 'is-invalid' : '' }}" type="text" name="kommentariy_mesto_razgryzki" id="kommentariy_mesto_razgryzki" value="{{ old('kommentariy_mesto_razgryzki', '') }}">
                @if($errors->has('kommentariy_mesto_razgryzki'))
                    <span class="text-danger">{{ $errors->first('kommentariy_mesto_razgryzki') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assignedDelivere.fields.kommentariy_mesto_razgryzki_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="data_razgryzki_ot">{{ trans('cruds.assignedDelivere.fields.data_razgryzki_ot') }}</label>
                <input class="form-control datetime {{ $errors->has('data_razgryzki_ot') ? 'is-invalid' : '' }}" type="text" name="data_razgryzki_ot" id="data_razgryzki_ot" value="{{ old('data_razgryzki_ot') }}">
                @if($errors->has('data_razgryzki_ot'))
                    <span class="text-danger">{{ $errors->first('data_razgryzki_ot') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assignedDelivere.fields.data_razgryzki_ot_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="data_razgryzki_do">{{ trans('cruds.assignedDelivere.fields.data_razgryzki_do') }}</label>
                <input class="form-control datetime {{ $errors->has('data_razgryzki_do') ? 'is-invalid' : '' }}" type="text" name="data_razgryzki_do" id="data_razgryzki_do" value="{{ old('data_razgryzki_do') }}">
                @if($errors->has('data_razgryzki_do'))
                    <span class="text-danger">{{ $errors->first('data_razgryzki_do') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assignedDelivere.fields.data_razgryzki_do_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="inkotermsi">{{ trans('cruds.assignedDelivere.fields.inkotermsi') }}</label>
                <input class="form-control {{ $errors->has('inkotermsi') ? 'is-invalid' : '' }}" type="text" name="inkotermsi" id="inkotermsi" value="{{ old('inkotermsi', '') }}">
                @if($errors->has('inkotermsi'))
                    <span class="text-danger">{{ $errors->first('inkotermsi') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assignedDelivere.fields.inkotermsi_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="inkoterms_gorod">{{ trans('cruds.assignedDelivere.fields.inkoterms_gorod') }}</label>
                <input class="form-control {{ $errors->has('inkoterms_gorod') ? 'is-invalid' : '' }}" type="text" name="inkoterms_gorod" id="inkoterms_gorod" value="{{ old('inkoterms_gorod', '') }}">
                @if($errors->has('inkoterms_gorod'))
                    <span class="text-danger">{{ $errors->first('inkoterms_gorod') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assignedDelivere.fields.inkoterms_gorod_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="ves">{{ trans('cruds.assignedDelivere.fields.ves') }}</label>
                <input class="form-control {{ $errors->has('ves') ? 'is-invalid' : '' }}" type="number" name="ves" id="ves" value="{{ old('ves', '') }}" step="0.01">
                @if($errors->has('ves'))
                    <span class="text-danger">{{ $errors->first('ves') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assignedDelivere.fields.ves_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="obem">{{ trans('cruds.assignedDelivere.fields.obem') }}</label>
                <input class="form-control {{ $errors->has('obem') ? 'is-invalid' : '' }}" type="number" name="obem" id="obem" value="{{ old('obem', '') }}" step="0.01">
                @if($errors->has('obem'))
                    <span class="text-danger">{{ $errors->first('obem') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assignedDelivere.fields.obem_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="edinitsa_vesa">{{ trans('cruds.assignedDelivere.fields.edinitsa_vesa') }}</label>
                <input class="form-control {{ $errors->has('edinitsa_vesa') ? 'is-invalid' : '' }}" type="text" name="edinitsa_vesa" id="edinitsa_vesa" value="{{ old('edinitsa_vesa', '') }}">
                @if($errors->has('edinitsa_vesa'))
                    <span class="text-danger">{{ $errors->first('edinitsa_vesa') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assignedDelivere.fields.edinitsa_vesa_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="edinitsa_obema">{{ trans('cruds.assignedDelivere.fields.edinitsa_obema') }}</label>
                <input class="form-control {{ $errors->has('edinitsa_obema') ? 'is-invalid' : '' }}" type="text" name="edinitsa_obema" id="edinitsa_obema" value="{{ old('edinitsa_obema', '') }}">
                @if($errors->has('edinitsa_obema'))
                    <span class="text-danger">{{ $errors->first('edinitsa_obema') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assignedDelivere.fields.edinitsa_obema_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="dlina">{{ trans('cruds.assignedDelivere.fields.dlina') }}</label>
                <input class="form-control {{ $errors->has('dlina') ? 'is-invalid' : '' }}" type="number" name="dlina" id="dlina" value="{{ old('dlina', '') }}" step="0.01">
                @if($errors->has('dlina'))
                    <span class="text-danger">{{ $errors->first('dlina') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assignedDelivere.fields.dlina_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="edinitsa_dlini">{{ trans('cruds.assignedDelivere.fields.edinitsa_dlini') }}</label>
                <input class="form-control {{ $errors->has('edinitsa_dlini') ? 'is-invalid' : '' }}" type="text" name="edinitsa_dlini" id="edinitsa_dlini" value="{{ old('edinitsa_dlini', '') }}">
                @if($errors->has('edinitsa_dlini'))
                    <span class="text-danger">{{ $errors->first('edinitsa_dlini') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assignedDelivere.fields.edinitsa_dlini_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="pozichii">{{ trans('cruds.assignedDelivere.fields.pozichii') }}</label>
                <input class="form-control {{ $errors->has('pozichii') ? 'is-invalid' : '' }}" type="text" name="pozichii" id="pozichii" value="{{ old('pozichii', '') }}">
                @if($errors->has('pozichii'))
                    <span class="text-danger">{{ $errors->first('pozichii') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assignedDelivere.fields.pozichii_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="transportnoe_sredstvo_trebovanie">{{ trans('cruds.assignedDelivere.fields.transportnoe_sredstvo_trebovanie') }}</label>
                <input class="form-control {{ $errors->has('transportnoe_sredstvo_trebovanie') ? 'is-invalid' : '' }}" type="text" name="transportnoe_sredstvo_trebovanie" id="transportnoe_sredstvo_trebovanie" value="{{ old('transportnoe_sredstvo_trebovanie', '') }}">
                @if($errors->has('transportnoe_sredstvo_trebovanie'))
                    <span class="text-danger">{{ $errors->first('transportnoe_sredstvo_trebovanie') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assignedDelivere.fields.transportnoe_sredstvo_trebovanie_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="registratsionniy_n">{{ trans('cruds.assignedDelivere.fields.registratsionniy_n') }}</label>
                <input class="form-control {{ $errors->has('registratsionniy_n') ? 'is-invalid' : '' }}" type="text" name="registratsionniy_n" id="registratsionniy_n" value="{{ old('registratsionniy_n', '') }}">
                @if($errors->has('registratsionniy_n'))
                    <span class="text-danger">{{ $errors->first('registratsionniy_n') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assignedDelivere.fields.registratsionniy_n_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="transportnie_edinitsi">{{ trans('cruds.assignedDelivere.fields.transportnie_edinitsi') }}</label>
                <input class="form-control {{ $errors->has('transportnie_edinitsi') ? 'is-invalid' : '' }}" type="text" name="transportnie_edinitsi" id="transportnie_edinitsi" value="{{ old('transportnie_edinitsi', '') }}">
                @if($errors->has('transportnie_edinitsi'))
                    <span class="text-danger">{{ $errors->first('transportnie_edinitsi') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assignedDelivere.fields.transportnie_edinitsi_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="transpostnaya_edinitsa">{{ trans('cruds.assignedDelivere.fields.transpostnaya_edinitsa') }}</label>
                <input class="form-control {{ $errors->has('transpostnaya_edinitsa') ? 'is-invalid' : '' }}" type="text" name="transpostnaya_edinitsa" id="transpostnaya_edinitsa" value="{{ old('transpostnaya_edinitsa', '') }}">
                @if($errors->has('transpostnaya_edinitsa'))
                    <span class="text-danger">{{ $errors->first('transpostnaya_edinitsa') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assignedDelivere.fields.transpostnaya_edinitsa_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="klass_opasnih_gryzov_opasnie_gryzi_n">{{ trans('cruds.assignedDelivere.fields.klass_opasnih_gryzov_opasnie_gryzi_n') }}</label>
                <input class="form-control {{ $errors->has('klass_opasnih_gryzov_opasnie_gryzi_n') ? 'is-invalid' : '' }}" type="text" name="klass_opasnih_gryzov_opasnie_gryzi_n" id="klass_opasnih_gryzov_opasnie_gryzi_n" value="{{ old('klass_opasnih_gryzov_opasnie_gryzi_n', '') }}">
                @if($errors->has('klass_opasnih_gryzov_opasnie_gryzi_n'))
                    <span class="text-danger">{{ $errors->first('klass_opasnih_gryzov_opasnie_gryzi_n') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assignedDelivere.fields.klass_opasnih_gryzov_opasnie_gryzi_n_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="kommentariy_k_postavke">{{ trans('cruds.assignedDelivere.fields.kommentariy_k_postavke') }}</label>
                <input class="form-control {{ $errors->has('kommentariy_k_postavke') ? 'is-invalid' : '' }}" type="text" name="kommentariy_k_postavke" id="kommentariy_k_postavke" value="{{ old('kommentariy_k_postavke', '') }}">
                @if($errors->has('kommentariy_k_postavke'))
                    <span class="text-danger">{{ $errors->first('kommentariy_k_postavke') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assignedDelivere.fields.kommentariy_k_postavke_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="statys_yroven_postavki_otslezhivanie_gryza">{{ trans('cruds.assignedDelivere.fields.statys_yroven_postavki_otslezhivanie_gryza') }}</label>
                <input class="form-control {{ $errors->has('statys_yroven_postavki_otslezhivanie_gryza') ? 'is-invalid' : '' }}" type="text" name="statys_yroven_postavki_otslezhivanie_gryza" id="statys_yroven_postavki_otslezhivanie_gryza" value="{{ old('statys_yroven_postavki_otslezhivanie_gryza', '') }}">
                @if($errors->has('statys_yroven_postavki_otslezhivanie_gryza'))
                    <span class="text-danger">{{ $errors->first('statys_yroven_postavki_otslezhivanie_gryza') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assignedDelivere.fields.statys_yroven_postavki_otslezhivanie_gryza_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="statys_statys_data_yroven_postavki_otslezhivanie_gryza">{{ trans('cruds.assignedDelivere.fields.statys_statys_data_yroven_postavki_otslezhivanie_gryza') }}</label>
                <input class="form-control date {{ $errors->has('statys_statys_data_yroven_postavki_otslezhivanie_gryza') ? 'is-invalid' : '' }}" type="text" name="statys_statys_data_yroven_postavki_otslezhivanie_gryza" id="statys_statys_data_yroven_postavki_otslezhivanie_gryza" value="{{ old('statys_statys_data_yroven_postavki_otslezhivanie_gryza') }}">
                @if($errors->has('statys_statys_data_yroven_postavki_otslezhivanie_gryza'))
                    <span class="text-danger">{{ $errors->first('statys_statys_data_yroven_postavki_otslezhivanie_gryza') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assignedDelivere.fields.statys_statys_data_yroven_postavki_otslezhivanie_gryza_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="statys_kem_razmescheno_yroven_postavki_otslezhivanie_gryza">{{ trans('cruds.assignedDelivere.fields.statys_kem_razmescheno_yroven_postavki_otslezhivanie_gryza') }}</label>
                <input class="form-control {{ $errors->has('statys_kem_razmescheno_yroven_postavki_otslezhivanie_gryza') ? 'is-invalid' : '' }}" type="text" name="statys_kem_razmescheno_yroven_postavki_otslezhivanie_gryza" id="statys_kem_razmescheno_yroven_postavki_otslezhivanie_gryza" value="{{ old('statys_kem_razmescheno_yroven_postavki_otslezhivanie_gryza', '') }}">
                @if($errors->has('statys_kem_razmescheno_yroven_postavki_otslezhivanie_gryza'))
                    <span class="text-danger">{{ $errors->first('statys_kem_razmescheno_yroven_postavki_otslezhivanie_gryza') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assignedDelivere.fields.statys_kem_razmescheno_yroven_postavki_otslezhivanie_gryza_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="statys_kommentariy_yroven_postavki_otslezhivanie_gryza">{{ trans('cruds.assignedDelivere.fields.statys_kommentariy_yroven_postavki_otslezhivanie_gryza') }}</label>
                <input class="form-control {{ $errors->has('statys_kommentariy_yroven_postavki_otslezhivanie_gryza') ? 'is-invalid' : '' }}" type="text" name="statys_kommentariy_yroven_postavki_otslezhivanie_gryza" id="statys_kommentariy_yroven_postavki_otslezhivanie_gryza" value="{{ old('statys_kommentariy_yroven_postavki_otslezhivanie_gryza', '') }}">
                @if($errors->has('statys_kommentariy_yroven_postavki_otslezhivanie_gryza'))
                    <span class="text-danger">{{ $errors->first('statys_kommentariy_yroven_postavki_otslezhivanie_gryza') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assignedDelivere.fields.statys_kommentariy_yroven_postavki_otslezhivanie_gryza_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="vlozheniya">{{ trans('cruds.assignedDelivere.fields.vlozheniya') }}</label>
                <input class="form-control {{ $errors->has('vlozheniya') ? 'is-invalid' : '' }}" type="text" name="vlozheniya" id="vlozheniya" value="{{ old('vlozheniya', '') }}">
                @if($errors->has('vlozheniya'))
                    <span class="text-danger">{{ $errors->first('vlozheniya') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assignedDelivere.fields.vlozheniya_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="poslednie_izmeneniya">{{ trans('cruds.assignedDelivere.fields.poslednie_izmeneniya') }}</label>
                <input class="form-control {{ $errors->has('poslednie_izmeneniya') ? 'is-invalid' : '' }}" type="text" name="poslednie_izmeneniya" id="poslednie_izmeneniya" value="{{ old('poslednie_izmeneniya', '') }}">
                @if($errors->has('poslednie_izmeneniya'))
                    <span class="text-danger">{{ $errors->first('poslednie_izmeneniya') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assignedDelivere.fields.poslednie_izmeneniya_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="transporeon_id_yroven_perevozki">{{ trans('cruds.assignedDelivere.fields.transporeon_id_yroven_perevozki') }}</label>
                <input class="form-control {{ $errors->has('transporeon_id_yroven_perevozki') ? 'is-invalid' : '' }}" type="text" name="transporeon_id_yroven_perevozki" id="transporeon_id_yroven_perevozki" value="{{ old('transporeon_id_yroven_perevozki', '') }}">
                @if($errors->has('transporeon_id_yroven_perevozki'))
                    <span class="text-danger">{{ $errors->first('transporeon_id_yroven_perevozki') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.assignedDelivere.fields.transporeon_id_yroven_perevozki_helper') }}</span>
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