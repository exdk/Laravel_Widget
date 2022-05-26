@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.uncomfirmed.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.uncomfirmeds.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="transpareon">{{ trans('cruds.uncomfirmed.fields.transpareon') }}</label>
                <input class="form-control {{ $errors->has('transpareon') ? 'is-invalid' : '' }}" type="text" name="transpareon" id="transpareon" value="{{ old('transpareon', '') }}">
                @if($errors->has('transpareon'))
                    <span class="text-danger">{{ $errors->first('transpareon') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.uncomfirmed.fields.transpareon_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="kolonka">{{ trans('cruds.uncomfirmed.fields.kolonka') }}</label>
                <input class="form-control {{ $errors->has('kolonka') ? 'is-invalid' : '' }}" type="text" name="kolonka" id="kolonka" value="{{ old('kolonka', '') }}">
                @if($errors->has('kolonka'))
                    <span class="text-danger">{{ $errors->first('kolonka') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.uncomfirmed.fields.kolonka_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="transportnoe_sredstvo_trebovanie">{{ trans('cruds.uncomfirmed.fields.transportnoe_sredstvo_trebovanie') }}</label>
                <input class="form-control {{ $errors->has('transportnoe_sredstvo_trebovanie') ? 'is-invalid' : '' }}" type="text" name="transportnoe_sredstvo_trebovanie" id="transportnoe_sredstvo_trebovanie" value="{{ old('transportnoe_sredstvo_trebovanie', '') }}">
                @if($errors->has('transportnoe_sredstvo_trebovanie'))
                    <span class="text-danger">{{ $errors->first('transportnoe_sredstvo_trebovanie') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.uncomfirmed.fields.transportnoe_sredstvo_trebovanie_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="ves">{{ trans('cruds.uncomfirmed.fields.ves') }}</label>
                <input class="form-control {{ $errors->has('ves') ? 'is-invalid' : '' }}" type="text" name="ves" id="ves" value="{{ old('ves', '') }}">
                @if($errors->has('ves'))
                    <span class="text-danger">{{ $errors->first('ves') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.uncomfirmed.fields.ves_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="obem">{{ trans('cruds.uncomfirmed.fields.obem') }}</label>
                <input class="form-control {{ $errors->has('obem') ? 'is-invalid' : '' }}" type="text" name="obem" id="obem" value="{{ old('obem', '') }}">
                @if($errors->has('obem'))
                    <span class="text-danger">{{ $errors->first('obem') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.uncomfirmed.fields.obem_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="dlina">{{ trans('cruds.uncomfirmed.fields.dlina') }}</label>
                <input class="form-control {{ $errors->has('dlina') ? 'is-invalid' : '' }}" type="text" name="dlina" id="dlina" value="{{ old('dlina', '') }}">
                @if($errors->has('dlina'))
                    <span class="text-danger">{{ $errors->first('dlina') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.uncomfirmed.fields.dlina_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="pozicii">{{ trans('cruds.uncomfirmed.fields.pozicii') }}</label>
                <input class="form-control {{ $errors->has('pozicii') ? 'is-invalid' : '' }}" type="text" name="pozicii" id="pozicii" value="{{ old('pozicii', '') }}">
                @if($errors->has('pozicii'))
                    <span class="text-danger">{{ $errors->first('pozicii') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.uncomfirmed.fields.pozicii_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="strana_mesto_naznacheniya">{{ trans('cruds.uncomfirmed.fields.strana_mesto_naznacheniya') }}</label>
                <input class="form-control {{ $errors->has('strana_mesto_naznacheniya') ? 'is-invalid' : '' }}" type="text" name="strana_mesto_naznacheniya" id="strana_mesto_naznacheniya" value="{{ old('strana_mesto_naznacheniya', '') }}">
                @if($errors->has('strana_mesto_naznacheniya'))
                    <span class="text-danger">{{ $errors->first('strana_mesto_naznacheniya') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.uncomfirmed.fields.strana_mesto_naznacheniya_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="vnutrenniy_kommentariy_k_perevozke">{{ trans('cruds.uncomfirmed.fields.vnutrenniy_kommentariy_k_perevozke') }}</label>
                <input class="form-control {{ $errors->has('vnutrenniy_kommentariy_k_perevozke') ? 'is-invalid' : '' }}" type="text" name="vnutrenniy_kommentariy_k_perevozke" id="vnutrenniy_kommentariy_k_perevozke" value="{{ old('vnutrenniy_kommentariy_k_perevozke', '') }}">
                @if($errors->has('vnutrenniy_kommentariy_k_perevozke'))
                    <span class="text-danger">{{ $errors->first('vnutrenniy_kommentariy_k_perevozke') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.uncomfirmed.fields.vnutrenniy_kommentariy_k_perevozke_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="id_gryppi_perevozok">{{ trans('cruds.uncomfirmed.fields.id_gryppi_perevozok') }}</label>
                <input class="form-control {{ $errors->has('id_gryppi_perevozok') ? 'is-invalid' : '' }}" type="text" name="id_gryppi_perevozok" id="id_gryppi_perevozok" value="{{ old('id_gryppi_perevozok', '') }}">
                @if($errors->has('id_gryppi_perevozok'))
                    <span class="text-danger">{{ $errors->first('id_gryppi_perevozok') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.uncomfirmed.fields.id_gryppi_perevozok_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="dopolnitelnie_nomera_gryzootpravitelya">{{ trans('cruds.uncomfirmed.fields.dopolnitelnie_nomera_gryzootpravitelya') }}</label>
                <input class="form-control {{ $errors->has('dopolnitelnie_nomera_gryzootpravitelya') ? 'is-invalid' : '' }}" type="text" name="dopolnitelnie_nomera_gryzootpravitelya" id="dopolnitelnie_nomera_gryzootpravitelya" value="{{ old('dopolnitelnie_nomera_gryzootpravitelya', '') }}">
                @if($errors->has('dopolnitelnie_nomera_gryzootpravitelya'))
                    <span class="text-danger">{{ $errors->first('dopolnitelnie_nomera_gryzootpravitelya') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.uncomfirmed.fields.dopolnitelnie_nomera_gryzootpravitelya_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="dopolnitelniy_n_gryzootpravitelya_2">{{ trans('cruds.uncomfirmed.fields.dopolnitelniy_n_gryzootpravitelya_2') }}</label>
                <input class="form-control {{ $errors->has('dopolnitelniy_n_gryzootpravitelya_2') ? 'is-invalid' : '' }}" type="text" name="dopolnitelniy_n_gryzootpravitelya_2" id="dopolnitelniy_n_gryzootpravitelya_2" value="{{ old('dopolnitelniy_n_gryzootpravitelya_2', '') }}">
                @if($errors->has('dopolnitelniy_n_gryzootpravitelya_2'))
                    <span class="text-danger">{{ $errors->first('dopolnitelniy_n_gryzootpravitelya_2') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.uncomfirmed.fields.dopolnitelniy_n_gryzootpravitelya_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="pochtoviy_indeks_mesto_naznacheniya">{{ trans('cruds.uncomfirmed.fields.pochtoviy_indeks_mesto_naznacheniya') }}</label>
                <input class="form-control {{ $errors->has('pochtoviy_indeks_mesto_naznacheniya') ? 'is-invalid' : '' }}" type="text" name="pochtoviy_indeks_mesto_naznacheniya" id="pochtoviy_indeks_mesto_naznacheniya" value="{{ old('pochtoviy_indeks_mesto_naznacheniya', '') }}">
                @if($errors->has('pochtoviy_indeks_mesto_naznacheniya'))
                    <span class="text-danger">{{ $errors->first('pochtoviy_indeks_mesto_naznacheniya') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.uncomfirmed.fields.pochtoviy_indeks_mesto_naznacheniya_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="dopolnitelniy_n_gryzootpravitelya_3">{{ trans('cruds.uncomfirmed.fields.dopolnitelniy_n_gryzootpravitelya_3') }}</label>
                <input class="form-control {{ $errors->has('dopolnitelniy_n_gryzootpravitelya_3') ? 'is-invalid' : '' }}" type="text" name="dopolnitelniy_n_gryzootpravitelya_3" id="dopolnitelniy_n_gryzootpravitelya_3" value="{{ old('dopolnitelniy_n_gryzootpravitelya_3', '') }}">
                @if($errors->has('dopolnitelniy_n_gryzootpravitelya_3'))
                    <span class="text-danger">{{ $errors->first('dopolnitelniy_n_gryzootpravitelya_3') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.uncomfirmed.fields.dopolnitelniy_n_gryzootpravitelya_3_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="kategorii">{{ trans('cruds.uncomfirmed.fields.kategorii') }}</label>
                <input class="form-control {{ $errors->has('kategorii') ? 'is-invalid' : '' }}" type="text" name="kategorii" id="kategorii" value="{{ old('kategorii', '') }}">
                @if($errors->has('kategorii'))
                    <span class="text-danger">{{ $errors->first('kategorii') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.uncomfirmed.fields.kategorii_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="dispetcher_gryzootpravitelya">{{ trans('cruds.uncomfirmed.fields.dispetcher_gryzootpravitelya') }}</label>
                <input class="form-control {{ $errors->has('dispetcher_gryzootpravitelya') ? 'is-invalid' : '' }}" type="text" name="dispetcher_gryzootpravitelya" id="dispetcher_gryzootpravitelya" value="{{ old('dispetcher_gryzootpravitelya', '') }}">
                @if($errors->has('dispetcher_gryzootpravitelya'))
                    <span class="text-danger">{{ $errors->first('dispetcher_gryzootpravitelya') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.uncomfirmed.fields.dispetcher_gryzootpravitelya_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="pochtoviy_indeks_start">{{ trans('cruds.uncomfirmed.fields.pochtoviy_indeks_start') }}</label>
                <input class="form-control {{ $errors->has('pochtoviy_indeks_start') ? 'is-invalid' : '' }}" type="text" name="pochtoviy_indeks_start" id="pochtoviy_indeks_start" value="{{ old('pochtoviy_indeks_start', '') }}">
                @if($errors->has('pochtoviy_indeks_start'))
                    <span class="text-danger">{{ $errors->first('pochtoviy_indeks_start') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.uncomfirmed.fields.pochtoviy_indeks_start_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="region_start">{{ trans('cruds.uncomfirmed.fields.region_start') }}</label>
                <input class="form-control {{ $errors->has('region_start') ? 'is-invalid' : '' }}" type="text" name="region_start" id="region_start" value="{{ old('region_start', '') }}">
                @if($errors->has('region_start'))
                    <span class="text-danger">{{ $errors->first('region_start') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.uncomfirmed.fields.region_start_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="strana_start">{{ trans('cruds.uncomfirmed.fields.strana_start') }}</label>
                <input class="form-control {{ $errors->has('strana_start') ? 'is-invalid' : '' }}" type="text" name="strana_start" id="strana_start" value="{{ old('strana_start', '') }}">
                @if($errors->has('strana_start'))
                    <span class="text-danger">{{ $errors->first('strana_start') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.uncomfirmed.fields.strana_start_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="kommentariy_start">{{ trans('cruds.uncomfirmed.fields.kommentariy_start') }}</label>
                <input class="form-control {{ $errors->has('kommentariy_start') ? 'is-invalid' : '' }}" type="text" name="kommentariy_start" id="kommentariy_start" value="{{ old('kommentariy_start', '') }}">
                @if($errors->has('kommentariy_start'))
                    <span class="text-danger">{{ $errors->first('kommentariy_start') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.uncomfirmed.fields.kommentariy_start_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="otdel_planirovaniya">{{ trans('cruds.uncomfirmed.fields.otdel_planirovaniya') }}</label>
                <input class="form-control {{ $errors->has('otdel_planirovaniya') ? 'is-invalid' : '' }}" type="text" name="otdel_planirovaniya" id="otdel_planirovaniya" value="{{ old('otdel_planirovaniya', '') }}">
                @if($errors->has('otdel_planirovaniya'))
                    <span class="text-danger">{{ $errors->first('otdel_planirovaniya') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.uncomfirmed.fields.otdel_planirovaniya_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="period_zagryzki">{{ trans('cruds.uncomfirmed.fields.period_zagryzki') }}</label>
                <input class="form-control {{ $errors->has('period_zagryzki') ? 'is-invalid' : '' }}" type="text" name="period_zagryzki" id="period_zagryzki" value="{{ old('period_zagryzki', '') }}">
                @if($errors->has('period_zagryzki'))
                    <span class="text-danger">{{ $errors->first('period_zagryzki') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.uncomfirmed.fields.period_zagryzki_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="period_razgryzki">{{ trans('cruds.uncomfirmed.fields.period_razgryzki') }}</label>
                <input class="form-control {{ $errors->has('period_razgryzki') ? 'is-invalid' : '' }}" type="text" name="period_razgryzki" id="period_razgryzki" value="{{ old('period_razgryzki', '') }}">
                @if($errors->has('period_razgryzki'))
                    <span class="text-danger">{{ $errors->first('period_razgryzki') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.uncomfirmed.fields.period_razgryzki_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="start">{{ trans('cruds.uncomfirmed.fields.start') }}</label>
                <input class="form-control {{ $errors->has('start') ? 'is-invalid' : '' }}" type="text" name="start" id="start" value="{{ old('start', '') }}">
                @if($errors->has('start'))
                    <span class="text-danger">{{ $errors->first('start') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.uncomfirmed.fields.start_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="mesto_naznacheniya">{{ trans('cruds.uncomfirmed.fields.mesto_naznacheniya') }}</label>
                <input class="form-control {{ $errors->has('mesto_naznacheniya') ? 'is-invalid' : '' }}" type="text" name="mesto_naznacheniya" id="mesto_naznacheniya" value="{{ old('mesto_naznacheniya', '') }}">
                @if($errors->has('mesto_naznacheniya'))
                    <span class="text-danger">{{ $errors->first('mesto_naznacheniya') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.uncomfirmed.fields.mesto_naznacheniya_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="krainiy_srok">{{ trans('cruds.uncomfirmed.fields.krainiy_srok') }}</label>
                <input class="form-control {{ $errors->has('krainiy_srok') ? 'is-invalid' : '' }}" type="text" name="krainiy_srok" id="krainiy_srok" value="{{ old('krainiy_srok', '') }}">
                @if($errors->has('krainiy_srok'))
                    <span class="text-danger">{{ $errors->first('krainiy_srok') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.uncomfirmed.fields.krainiy_srok_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="rassoyanie">{{ trans('cruds.uncomfirmed.fields.rassoyanie') }}</label>
                <input class="form-control {{ $errors->has('rassoyanie') ? 'is-invalid' : '' }}" type="text" name="rassoyanie" id="rassoyanie" value="{{ old('rassoyanie', '') }}">
                @if($errors->has('rassoyanie'))
                    <span class="text-danger">{{ $errors->first('rassoyanie') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.uncomfirmed.fields.rassoyanie_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="sostoyanie_chteniya">{{ trans('cruds.uncomfirmed.fields.sostoyanie_chteniya') }}</label>
                <input class="form-control {{ $errors->has('sostoyanie_chteniya') ? 'is-invalid' : '' }}" type="text" name="sostoyanie_chteniya" id="sostoyanie_chteniya" value="{{ old('sostoyanie_chteniya', '') }}">
                @if($errors->has('sostoyanie_chteniya'))
                    <span class="text-danger">{{ $errors->first('sostoyanie_chteniya') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.uncomfirmed.fields.sostoyanie_chteniya_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="sostoyanie_pechati">{{ trans('cruds.uncomfirmed.fields.sostoyanie_pechati') }}</label>
                <input class="form-control {{ $errors->has('sostoyanie_pechati') ? 'is-invalid' : '' }}" type="text" name="sostoyanie_pechati" id="sostoyanie_pechati" value="{{ old('sostoyanie_pechati', '') }}">
                @if($errors->has('sostoyanie_pechati'))
                    <span class="text-danger">{{ $errors->first('sostoyanie_pechati') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.uncomfirmed.fields.sostoyanie_pechati_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="transporeonid">{{ trans('cruds.uncomfirmed.fields.transporeonid') }}</label>
                <input class="form-control {{ $errors->has('transporeonid') ? 'is-invalid' : '' }}" type="text" name="transporeonid" id="transporeonid" value="{{ old('transporeonid', '') }}">
                @if($errors->has('transporeonid'))
                    <span class="text-danger">{{ $errors->first('transporeonid') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.uncomfirmed.fields.transporeonid_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="gryzootpravitel">{{ trans('cruds.uncomfirmed.fields.gryzootpravitel') }}</label>
                <input class="form-control {{ $errors->has('gryzootpravitel') ? 'is-invalid' : '' }}" type="text" name="gryzootpravitel" id="gryzootpravitel" value="{{ old('gryzootpravitel', '') }}">
                @if($errors->has('gryzootpravitel'))
                    <span class="text-danger">{{ $errors->first('gryzootpravitel') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.uncomfirmed.fields.gryzootpravitel_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="postavki">{{ trans('cruds.uncomfirmed.fields.postavki') }}</label>
                <input class="form-control {{ $errors->has('postavki') ? 'is-invalid' : '' }}" type="text" name="postavki" id="postavki" value="{{ old('postavki', '') }}">
                @if($errors->has('postavki'))
                    <span class="text-danger">{{ $errors->first('postavki') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.uncomfirmed.fields.postavki_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="data_pogryzki">{{ trans('cruds.uncomfirmed.fields.data_pogryzki') }}</label>
                <input class="form-control {{ $errors->has('data_pogryzki') ? 'is-invalid' : '' }}" type="text" name="data_pogryzki" id="data_pogryzki" value="{{ old('data_pogryzki', '') }}">
                @if($errors->has('data_pogryzki'))
                    <span class="text-danger">{{ $errors->first('data_pogryzki') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.uncomfirmed.fields.data_pogryzki_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="data_razgryzki">{{ trans('cruds.uncomfirmed.fields.data_razgryzki') }}</label>
                <input class="form-control {{ $errors->has('data_razgryzki') ? 'is-invalid' : '' }}" type="text" name="data_razgryzki" id="data_razgryzki" value="{{ old('data_razgryzki', '') }}">
                @if($errors->has('data_razgryzki'))
                    <span class="text-danger">{{ $errors->first('data_razgryzki') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.uncomfirmed.fields.data_razgryzki_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="poslednie_izmeneniya">{{ trans('cruds.uncomfirmed.fields.poslednie_izmeneniya') }}</label>
                <input class="form-control {{ $errors->has('poslednie_izmeneniya') ? 'is-invalid' : '' }}" type="text" name="poslednie_izmeneniya" id="poslednie_izmeneniya" value="{{ old('poslednie_izmeneniya', '') }}">
                @if($errors->has('poslednie_izmeneniya'))
                    <span class="text-danger">{{ $errors->first('poslednie_izmeneniya') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.uncomfirmed.fields.poslednie_izmeneniya_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="opredelennie_mesta_zagryzki">{{ trans('cruds.uncomfirmed.fields.opredelennie_mesta_zagryzki') }}</label>
                <input class="form-control {{ $errors->has('opredelennie_mesta_zagryzki') ? 'is-invalid' : '' }}" type="text" name="opredelennie_mesta_zagryzki" id="opredelennie_mesta_zagryzki" value="{{ old('opredelennie_mesta_zagryzki', '') }}">
                @if($errors->has('opredelennie_mesta_zagryzki'))
                    <span class="text-danger">{{ $errors->first('opredelennie_mesta_zagryzki') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.uncomfirmed.fields.opredelennie_mesta_zagryzki_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="nazvanie_kompanii_start">{{ trans('cruds.uncomfirmed.fields.nazvanie_kompanii_start') }}</label>
                <input class="form-control {{ $errors->has('nazvanie_kompanii_start') ? 'is-invalid' : '' }}" type="text" name="nazvanie_kompanii_start" id="nazvanie_kompanii_start" value="{{ old('nazvanie_kompanii_start', '') }}">
                @if($errors->has('nazvanie_kompanii_start'))
                    <span class="text-danger">{{ $errors->first('nazvanie_kompanii_start') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.uncomfirmed.fields.nazvanie_kompanii_start_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="gorod_start">{{ trans('cruds.uncomfirmed.fields.gorod_start') }}</label>
                <input class="form-control {{ $errors->has('gorod_start') ? 'is-invalid' : '' }}" type="text" name="gorod_start" id="gorod_start" value="{{ old('gorod_start', '') }}">
                @if($errors->has('gorod_start'))
                    <span class="text-danger">{{ $errors->first('gorod_start') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.uncomfirmed.fields.gorod_start_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="opredelennie_mesta_razgryzki">{{ trans('cruds.uncomfirmed.fields.opredelennie_mesta_razgryzki') }}</label>
                <input class="form-control {{ $errors->has('opredelennie_mesta_razgryzki') ? 'is-invalid' : '' }}" type="text" name="opredelennie_mesta_razgryzki" id="opredelennie_mesta_razgryzki" value="{{ old('opredelennie_mesta_razgryzki', '') }}">
                @if($errors->has('opredelennie_mesta_razgryzki'))
                    <span class="text-danger">{{ $errors->first('opredelennie_mesta_razgryzki') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.uncomfirmed.fields.opredelennie_mesta_razgryzki_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="nazvanie_kompanii_mesto_naznacheniya">{{ trans('cruds.uncomfirmed.fields.nazvanie_kompanii_mesto_naznacheniya') }}</label>
                <input class="form-control {{ $errors->has('nazvanie_kompanii_mesto_naznacheniya') ? 'is-invalid' : '' }}" type="text" name="nazvanie_kompanii_mesto_naznacheniya" id="nazvanie_kompanii_mesto_naznacheniya" value="{{ old('nazvanie_kompanii_mesto_naznacheniya', '') }}">
                @if($errors->has('nazvanie_kompanii_mesto_naznacheniya'))
                    <span class="text-danger">{{ $errors->first('nazvanie_kompanii_mesto_naznacheniya') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.uncomfirmed.fields.nazvanie_kompanii_mesto_naznacheniya_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="gorod_mesto_naznacheniya">{{ trans('cruds.uncomfirmed.fields.gorod_mesto_naznacheniya') }}</label>
                <input class="form-control {{ $errors->has('gorod_mesto_naznacheniya') ? 'is-invalid' : '' }}" type="text" name="gorod_mesto_naznacheniya" id="gorod_mesto_naznacheniya" value="{{ old('gorod_mesto_naznacheniya', '') }}">
                @if($errors->has('gorod_mesto_naznacheniya'))
                    <span class="text-danger">{{ $errors->first('gorod_mesto_naznacheniya') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.uncomfirmed.fields.gorod_mesto_naznacheniya_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="spravochnaya_cena_perevozki">{{ trans('cruds.uncomfirmed.fields.spravochnaya_cena_perevozki') }}</label>
                <input class="form-control {{ $errors->has('spravochnaya_cena_perevozki') ? 'is-invalid' : '' }}" type="text" name="spravochnaya_cena_perevozki" id="spravochnaya_cena_perevozki" value="{{ old('spravochnaya_cena_perevozki', '') }}">
                @if($errors->has('spravochnaya_cena_perevozki'))
                    <span class="text-danger">{{ $errors->first('spravochnaya_cena_perevozki') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.uncomfirmed.fields.spravochnaya_cena_perevozki_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="region_mesto_naznacheniya">{{ trans('cruds.uncomfirmed.fields.region_mesto_naznacheniya') }}</label>
                <input class="form-control {{ $errors->has('region_mesto_naznacheniya') ? 'is-invalid' : '' }}" type="text" name="region_mesto_naznacheniya" id="region_mesto_naznacheniya" value="{{ old('region_mesto_naznacheniya', '') }}">
                @if($errors->has('region_mesto_naznacheniya'))
                    <span class="text-danger">{{ $errors->first('region_mesto_naznacheniya') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.uncomfirmed.fields.region_mesto_naznacheniya_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="kommentariy_mesto_naznacheniya">{{ trans('cruds.uncomfirmed.fields.kommentariy_mesto_naznacheniya') }}</label>
                <input class="form-control {{ $errors->has('kommentariy_mesto_naznacheniya') ? 'is-invalid' : '' }}" type="text" name="kommentariy_mesto_naznacheniya" id="kommentariy_mesto_naznacheniya" value="{{ old('kommentariy_mesto_naznacheniya', '') }}">
                @if($errors->has('kommentariy_mesto_naznacheniya'))
                    <span class="text-danger">{{ $errors->first('kommentariy_mesto_naznacheniya') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.uncomfirmed.fields.kommentariy_mesto_naznacheniya_helper') }}</span>
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