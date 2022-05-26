@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.control.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.controls.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="i_dgruza">{{ trans('cruds.control.fields.i_dgruza') }}</label>
                <input class="form-control {{ $errors->has('i_dgruza') ? 'is-invalid' : '' }}" type="text" name="i_dgruza" id="i_dgruza" value="{{ old('i_dgruza', '') }}">
                @if($errors->has('i_dgruza'))
                    <span class="text-danger">{{ $errors->first('i_dgruza') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.control.fields.i_dgruza_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="load_reference_3">{{ trans('cruds.control.fields.load_reference_3') }}</label>
                <input class="form-control {{ $errors->has('load_reference_3') ? 'is-invalid' : '' }}" type="text" name="load_reference_3" id="load_reference_3" value="{{ old('load_reference_3', '') }}">
                @if($errors->has('load_reference_3'))
                    <span class="text-danger">{{ $errors->first('load_reference_3') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.control.fields.load_reference_3_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="voditeli">{{ trans('cruds.control.fields.voditeli') }}</label>
                <input class="form-control {{ $errors->has('voditeli') ? 'is-invalid' : '' }}" type="text" name="voditeli" id="voditeli" value="{{ old('voditeli', '') }}">
                @if($errors->has('voditeli'))
                    <span class="text-danger">{{ $errors->first('voditeli') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.control.fields.voditeli_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="statys_otobrazheniay">{{ trans('cruds.control.fields.statys_otobrazheniay') }}</label>
                <input class="form-control {{ $errors->has('statys_otobrazheniay') ? 'is-invalid' : '' }}" type="text" name="statys_otobrazheniay" id="statys_otobrazheniay" value="{{ old('statys_otobrazheniay', '') }}">
                @if($errors->has('statys_otobrazheniay'))
                    <span class="text-danger">{{ $errors->first('statys_otobrazheniay') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.control.fields.statys_otobrazheniay_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="data_i_vremay_nachala">{{ trans('cruds.control.fields.data_i_vremay_nachala') }}</label>
                <input class="form-control datetime {{ $errors->has('data_i_vremay_nachala') ? 'is-invalid' : '' }}" type="text" name="data_i_vremay_nachala" id="data_i_vremay_nachala" value="{{ old('data_i_vremay_nachala') }}">
                @if($errors->has('data_i_vremay_nachala'))
                    <span class="text-danger">{{ $errors->first('data_i_vremay_nachala') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.control.fields.data_i_vremay_nachala_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="adres_otpravleniya">{{ trans('cruds.control.fields.adres_otpravleniya') }}</label>
                <input class="form-control {{ $errors->has('adres_otpravleniya') ? 'is-invalid' : '' }}" type="text" name="adres_otpravleniya" id="adres_otpravleniya" value="{{ old('adres_otpravleniya', '') }}">
                @if($errors->has('adres_otpravleniya'))
                    <span class="text-danger">{{ $errors->first('adres_otpravleniya') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.control.fields.adres_otpravleniya_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="adres_mesta_naznacheniay">{{ trans('cruds.control.fields.adres_mesta_naznacheniay') }}</label>
                <input class="form-control {{ $errors->has('adres_mesta_naznacheniay') ? 'is-invalid' : '' }}" type="text" name="adres_mesta_naznacheniay" id="adres_mesta_naznacheniay" value="{{ old('adres_mesta_naznacheniay', '') }}">
                @if($errors->has('adres_mesta_naznacheniay'))
                    <span class="text-danger">{{ $errors->first('adres_mesta_naznacheniay') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.control.fields.adres_mesta_naznacheniay_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="poslednee_sobitie">{{ trans('cruds.control.fields.poslednee_sobitie') }}</label>
                <input class="form-control {{ $errors->has('poslednee_sobitie') ? 'is-invalid' : '' }}" type="text" name="poslednee_sobitie" id="poslednee_sobitie" value="{{ old('poslednee_sobitie', '') }}">
                @if($errors->has('poslednee_sobitie'))
                    <span class="text-danger">{{ $errors->first('poslednee_sobitie') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.control.fields.poslednee_sobitie_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="nazvanie_pynkta_naznacheniay">{{ trans('cruds.control.fields.nazvanie_pynkta_naznacheniay') }}</label>
                <input class="form-control {{ $errors->has('nazvanie_pynkta_naznacheniay') ? 'is-invalid' : '' }}" type="text" name="nazvanie_pynkta_naznacheniay" id="nazvanie_pynkta_naznacheniay" value="{{ old('nazvanie_pynkta_naznacheniay', '') }}">
                @if($errors->has('nazvanie_pynkta_naznacheniay'))
                    <span class="text-danger">{{ $errors->first('nazvanie_pynkta_naznacheniay') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.control.fields.nazvanie_pynkta_naznacheniay_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="tip_oborydovaniay_treiler">{{ trans('cruds.control.fields.tip_oborydovaniay_treiler') }}</label>
                <input class="form-control {{ $errors->has('tip_oborydovaniay_treiler') ? 'is-invalid' : '' }}" type="text" name="tip_oborydovaniay_treiler" id="tip_oborydovaniay_treiler" value="{{ old('tip_oborydovaniay_treiler', '') }}">
                @if($errors->has('tip_oborydovaniay_treiler'))
                    <span class="text-danger">{{ $errors->first('tip_oborydovaniay_treiler') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.control.fields.tip_oborydovaniay_treiler_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="nomer_tyagacha">{{ trans('cruds.control.fields.nomer_tyagacha') }}</label>
                <input class="form-control {{ $errors->has('nomer_tyagacha') ? 'is-invalid' : '' }}" type="text" name="nomer_tyagacha" id="nomer_tyagacha" value="{{ old('nomer_tyagacha', '') }}">
                @if($errors->has('nomer_tyagacha'))
                    <span class="text-danger">{{ $errors->first('nomer_tyagacha') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.control.fields.nomer_tyagacha_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="data_vremya_zaversheniya">{{ trans('cruds.control.fields.data_vremya_zaversheniya') }}</label>
                <input class="form-control datetime {{ $errors->has('data_vremya_zaversheniya') ? 'is-invalid' : '' }}" type="text" name="data_vremya_zaversheniya" id="data_vremya_zaversheniya" value="{{ old('data_vremya_zaversheniya') }}">
                @if($errors->has('data_vremya_zaversheniya'))
                    <span class="text-danger">{{ $errors->first('data_vremya_zaversheniya') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.control.fields.data_vremya_zaversheniya_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="identifikator_reisa">{{ trans('cruds.control.fields.identifikator_reisa') }}</label>
                <input class="form-control {{ $errors->has('identifikator_reisa') ? 'is-invalid' : '' }}" type="text" name="identifikator_reisa" id="identifikator_reisa" value="{{ old('identifikator_reisa', '') }}">
                @if($errors->has('identifikator_reisa'))
                    <span class="text-danger">{{ $errors->first('identifikator_reisa') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.control.fields.identifikator_reisa_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="kolichestvo_edinich">{{ trans('cruds.control.fields.kolichestvo_edinich') }}</label>
                <input class="form-control {{ $errors->has('kolichestvo_edinich') ? 'is-invalid' : '' }}" type="text" name="kolichestvo_edinich" id="kolichestvo_edinich" value="{{ old('kolichestvo_edinich', '') }}">
                @if($errors->has('kolichestvo_edinich'))
                    <span class="text-danger">{{ $errors->first('kolichestvo_edinich') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.control.fields.kolichestvo_edinich_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="kolichestvo_osnovnih_ostanovok">{{ trans('cruds.control.fields.kolichestvo_osnovnih_ostanovok') }}</label>
                <input class="form-control {{ $errors->has('kolichestvo_osnovnih_ostanovok') ? 'is-invalid' : '' }}" type="text" name="kolichestvo_osnovnih_ostanovok" id="kolichestvo_osnovnih_ostanovok" value="{{ old('kolichestvo_osnovnih_ostanovok', '') }}">
                @if($errors->has('kolichestvo_osnovnih_ostanovok'))
                    <span class="text-danger">{{ $errors->first('kolichestvo_osnovnih_ostanovok') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.control.fields.kolichestvo_osnovnih_ostanovok_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="ves_kg">{{ trans('cruds.control.fields.ves_kg') }}</label>
                <input class="form-control {{ $errors->has('ves_kg') ? 'is-invalid' : '' }}" type="text" name="ves_kg" id="ves_kg" value="{{ old('ves_kg', '') }}">
                @if($errors->has('ves_kg'))
                    <span class="text-danger">{{ $errors->first('ves_kg') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.control.fields.ves_kg_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="kontaktnoe_lico">{{ trans('cruds.control.fields.kontaktnoe_lico') }}</label>
                <input class="form-control {{ $errors->has('kontaktnoe_lico') ? 'is-invalid' : '' }}" type="text" name="kontaktnoe_lico" id="kontaktnoe_lico" value="{{ old('kontaktnoe_lico', '') }}">
                @if($errors->has('kontaktnoe_lico'))
                    <span class="text-danger">{{ $errors->first('kontaktnoe_lico') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.control.fields.kontaktnoe_lico_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="nomer_zakaza_postavshika_sirya_i_mat">{{ trans('cruds.control.fields.nomer_zakaza_postavshika_sirya_i_mat') }}</label>
                <input class="form-control {{ $errors->has('nomer_zakaza_postavshika_sirya_i_mat') ? 'is-invalid' : '' }}" type="text" name="nomer_zakaza_postavshika_sirya_i_mat" id="nomer_zakaza_postavshika_sirya_i_mat" value="{{ old('nomer_zakaza_postavshika_sirya_i_mat', '') }}">
                @if($errors->has('nomer_zakaza_postavshika_sirya_i_mat'))
                    <span class="text-danger">{{ $errors->first('nomer_zakaza_postavshika_sirya_i_mat') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.control.fields.nomer_zakaza_postavshika_sirya_i_mat_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="nomer_posledovatelnosti_reisov">{{ trans('cruds.control.fields.nomer_posledovatelnosti_reisov') }}</label>
                <input class="form-control {{ $errors->has('nomer_posledovatelnosti_reisov') ? 'is-invalid' : '' }}" type="text" name="nomer_posledovatelnosti_reisov" id="nomer_posledovatelnosti_reisov" value="{{ old('nomer_posledovatelnosti_reisov', '') }}">
                @if($errors->has('nomer_posledovatelnosti_reisov'))
                    <span class="text-danger">{{ $errors->first('nomer_posledovatelnosti_reisov') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.control.fields.nomer_posledovatelnosti_reisov_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="klient">{{ trans('cruds.control.fields.klient') }}</label>
                <input class="form-control {{ $errors->has('klient') ? 'is-invalid' : '' }}" type="text" name="klient" id="klient" value="{{ old('klient', '') }}">
                @if($errors->has('klient'))
                    <span class="text-danger">{{ $errors->first('klient') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.control.fields.klient_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="nomer_treilera">{{ trans('cruds.control.fields.nomer_treilera') }}</label>
                <input class="form-control {{ $errors->has('nomer_treilera') ? 'is-invalid' : '' }}" type="text" name="nomer_treilera" id="nomer_treilera" value="{{ old('nomer_treilera', '') }}">
                @if($errors->has('nomer_treilera'))
                    <span class="text-danger">{{ $errors->first('nomer_treilera') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.control.fields.nomer_treilera_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="obem_cu_m">{{ trans('cruds.control.fields.obem_cu_m') }}</label>
                <input class="form-control {{ $errors->has('obem_cu_m') ? 'is-invalid' : '' }}" type="text" name="obem_cu_m" id="obem_cu_m" value="{{ old('obem_cu_m', '') }}">
                @if($errors->has('obem_cu_m'))
                    <span class="text-danger">{{ $errors->first('obem_cu_m') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.control.fields.obem_cu_m_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="ostanovki_v_tranzite">{{ trans('cruds.control.fields.ostanovki_v_tranzite') }}</label>
                <input class="form-control {{ $errors->has('ostanovki_v_tranzite') ? 'is-invalid' : '' }}" type="text" name="ostanovki_v_tranzite" id="ostanovki_v_tranzite" value="{{ old('ostanovki_v_tranzite', '') }}">
                @if($errors->has('ostanovki_v_tranzite'))
                    <span class="text-danger">{{ $errors->first('ostanovki_v_tranzite') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.control.fields.ostanovki_v_tranzite_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="poddoni_dlya_perevozki_gryzov">{{ trans('cruds.control.fields.poddoni_dlya_perevozki_gryzov') }}</label>
                <input class="form-control {{ $errors->has('poddoni_dlya_perevozki_gryzov') ? 'is-invalid' : '' }}" type="text" name="poddoni_dlya_perevozki_gryzov" id="poddoni_dlya_perevozki_gryzov" value="{{ old('poddoni_dlya_perevozki_gryzov', '') }}">
                @if($errors->has('poddoni_dlya_perevozki_gryzov'))
                    <span class="text-danger">{{ $errors->first('poddoni_dlya_perevozki_gryzov') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.control.fields.poddoni_dlya_perevozki_gryzov_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="primechanie">{{ trans('cruds.control.fields.primechanie') }}</label>
                <input class="form-control {{ $errors->has('primechanie') ? 'is-invalid' : '' }}" type="text" name="primechanie" id="primechanie" value="{{ old('primechanie', '') }}">
                @if($errors->has('primechanie'))
                    <span class="text-danger">{{ $errors->first('primechanie') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.control.fields.primechanie_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="rassoyanie_km">{{ trans('cruds.control.fields.rassoyanie_km') }}</label>
                <input class="form-control {{ $errors->has('rassoyanie_km') ? 'is-invalid' : '' }}" type="text" name="rassoyanie_km" id="rassoyanie_km" value="{{ old('rassoyanie_km', '') }}">
                @if($errors->has('rassoyanie_km'))
                    <span class="text-danger">{{ $errors->first('rassoyanie_km') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.control.fields.rassoyanie_km_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="imya_klienta">{{ trans('cruds.control.fields.imya_klienta') }}</label>
                <input class="form-control {{ $errors->has('imya_klienta') ? 'is-invalid' : '' }}" type="text" name="imya_klienta" id="imya_klienta" value="{{ old('imya_klienta', '') }}">
                @if($errors->has('imya_klienta'))
                    <span class="text-danger">{{ $errors->first('imya_klienta') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.control.fields.imya_klienta_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="gorod_otpravleniya">{{ trans('cruds.control.fields.gorod_otpravleniya') }}</label>
                <input class="form-control {{ $errors->has('gorod_otpravleniya') ? 'is-invalid' : '' }}" type="text" name="gorod_otpravleniya" id="gorod_otpravleniya" value="{{ old('gorod_otpravleniya', '') }}">
                @if($errors->has('gorod_otpravleniya'))
                    <span class="text-danger">{{ $errors->first('gorod_otpravleniya') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.control.fields.gorod_otpravleniya_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="gorod_naznacheniya">{{ trans('cruds.control.fields.gorod_naznacheniya') }}</label>
                <input class="form-control {{ $errors->has('gorod_naznacheniya') ? 'is-invalid' : '' }}" type="text" name="gorod_naznacheniya" id="gorod_naznacheniya" value="{{ old('gorod_naznacheniya', '') }}">
                @if($errors->has('gorod_naznacheniya'))
                    <span class="text-danger">{{ $errors->first('gorod_naznacheniya') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.control.fields.gorod_naznacheniya_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="identifikator_bronirovaniya">{{ trans('cruds.control.fields.identifikator_bronirovaniya') }}</label>
                <input class="form-control {{ $errors->has('identifikator_bronirovaniya') ? 'is-invalid' : '' }}" type="text" name="identifikator_bronirovaniya" id="identifikator_bronirovaniya" value="{{ old('identifikator_bronirovaniya', '') }}">
                @if($errors->has('identifikator_bronirovaniya'))
                    <span class="text-danger">{{ $errors->first('identifikator_bronirovaniya') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.control.fields.identifikator_bronirovaniya_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="opisanie_tipa_transporta_treiler">{{ trans('cruds.control.fields.opisanie_tipa_transporta_treiler') }}</label>
                <input class="form-control {{ $errors->has('opisanie_tipa_transporta_treiler') ? 'is-invalid' : '' }}" type="text" name="opisanie_tipa_transporta_treiler" id="opisanie_tipa_transporta_treiler" value="{{ old('opisanie_tipa_transporta_treiler', '') }}">
                @if($errors->has('opisanie_tipa_transporta_treiler'))
                    <span class="text-danger">{{ $errors->first('opisanie_tipa_transporta_treiler') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.control.fields.opisanie_tipa_transporta_treiler_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="stoimost_zakaza_rub">{{ trans('cruds.control.fields.stoimost_zakaza_rub') }}</label>
                <input class="form-control {{ $errors->has('stoimost_zakaza_rub') ? 'is-invalid' : '' }}" type="text" name="stoimost_zakaza_rub" id="stoimost_zakaza_rub" value="{{ old('stoimost_zakaza_rub', '') }}">
                @if($errors->has('stoimost_zakaza_rub'))
                    <span class="text-danger">{{ $errors->first('stoimost_zakaza_rub') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.control.fields.stoimost_zakaza_rub_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="nomer_otslezhivaniya_gryza">{{ trans('cruds.control.fields.nomer_otslezhivaniya_gryza') }}</label>
                <input class="form-control {{ $errors->has('nomer_otslezhivaniya_gryza') ? 'is-invalid' : '' }}" type="text" name="nomer_otslezhivaniya_gryza" id="nomer_otslezhivaniya_gryza" value="{{ old('nomer_otslezhivaniya_gryza', '') }}">
                @if($errors->has('nomer_otslezhivaniya_gryza'))
                    <span class="text-danger">{{ $errors->first('nomer_otslezhivaniya_gryza') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.control.fields.nomer_otslezhivaniya_gryza_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="phakticheskaya_data_nachala_pogryzki">{{ trans('cruds.control.fields.phakticheskaya_data_nachala_pogryzki') }}</label>
                <input class="form-control datetime {{ $errors->has('phakticheskaya_data_nachala_pogryzki') ? 'is-invalid' : '' }}" type="text" name="phakticheskaya_data_nachala_pogryzki" id="phakticheskaya_data_nachala_pogryzki" value="{{ old('phakticheskaya_data_nachala_pogryzki') }}">
                @if($errors->has('phakticheskaya_data_nachala_pogryzki'))
                    <span class="text-danger">{{ $errors->first('phakticheskaya_data_nachala_pogryzki') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.control.fields.phakticheskaya_data_nachala_pogryzki_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="load_reference_1">{{ trans('cruds.control.fields.load_reference_1') }}</label>
                <input class="form-control {{ $errors->has('load_reference_1') ? 'is-invalid' : '' }}" type="text" name="load_reference_1" id="load_reference_1" value="{{ old('load_reference_1', '') }}">
                @if($errors->has('load_reference_1'))
                    <span class="text-danger">{{ $errors->first('load_reference_1') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.control.fields.load_reference_1_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="identifikator_pynkta_otpravleniya">{{ trans('cruds.control.fields.identifikator_pynkta_otpravleniya') }}</label>
                <input class="form-control {{ $errors->has('identifikator_pynkta_otpravleniya') ? 'is-invalid' : '' }}" type="text" name="identifikator_pynkta_otpravleniya" id="identifikator_pynkta_otpravleniya" value="{{ old('identifikator_pynkta_otpravleniya', '') }}">
                @if($errors->has('identifikator_pynkta_otpravleniya'))
                    <span class="text-danger">{{ $errors->first('identifikator_pynkta_otpravleniya') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.control.fields.identifikator_pynkta_otpravleniya_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="identifikator_pynkta_naznacheniya">{{ trans('cruds.control.fields.identifikator_pynkta_naznacheniya') }}</label>
                <input class="form-control {{ $errors->has('identifikator_pynkta_naznacheniya') ? 'is-invalid' : '' }}" type="text" name="identifikator_pynkta_naznacheniya" id="identifikator_pynkta_naznacheniya" value="{{ old('identifikator_pynkta_naznacheniya', '') }}">
                @if($errors->has('identifikator_pynkta_naznacheniya'))
                    <span class="text-danger">{{ $errors->first('identifikator_pynkta_naznacheniya') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.control.fields.identifikator_pynkta_naznacheniya_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="tovar">{{ trans('cruds.control.fields.tovar') }}</label>
                <input class="form-control {{ $errors->has('tovar') ? 'is-invalid' : '' }}" type="text" name="tovar" id="tovar" value="{{ old('tovar', '') }}">
                @if($errors->has('tovar'))
                    <span class="text-danger">{{ $errors->first('tovar') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.control.fields.tovar_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="registracionnii_kod_18">{{ trans('cruds.control.fields.registracionnii_kod_18') }}</label>
                <input class="form-control {{ $errors->has('registracionnii_kod_18') ? 'is-invalid' : '' }}" type="text" name="registracionnii_kod_18" id="registracionnii_kod_18" value="{{ old('registracionnii_kod_18', '') }}">
                @if($errors->has('registracionnii_kod_18'))
                    <span class="text-danger">{{ $errors->first('registracionnii_kod_18') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.control.fields.registracionnii_kod_18_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="auction">{{ trans('cruds.control.fields.auction') }}</label>
                <input class="form-control {{ $errors->has('auction') ? 'is-invalid' : '' }}" type="text" name="auction" id="auction" value="{{ old('auction', '') }}">
                @if($errors->has('auction'))
                    <span class="text-danger">{{ $errors->first('auction') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.control.fields.auction_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="load_reference_2">{{ trans('cruds.control.fields.load_reference_2') }}</label>
                <input class="form-control {{ $errors->has('load_reference_2') ? 'is-invalid' : '' }}" type="text" name="load_reference_2" id="load_reference_2" value="{{ old('load_reference_2', '') }}">
                @if($errors->has('load_reference_2'))
                    <span class="text-danger">{{ $errors->first('load_reference_2') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.control.fields.load_reference_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="pod_load_group">{{ trans('cruds.control.fields.pod_load_group') }}</label>
                <input class="form-control {{ $errors->has('pod_load_group') ? 'is-invalid' : '' }}" type="text" name="pod_load_group" id="pod_load_group" value="{{ old('pod_load_group', '') }}">
                @if($errors->has('pod_load_group'))
                    <span class="text-danger">{{ $errors->first('pod_load_group') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.control.fields.pod_load_group_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="pod_status">{{ trans('cruds.control.fields.pod_status') }}</label>
                <input class="form-control {{ $errors->has('pod_status') ? 'is-invalid' : '' }}" type="text" name="pod_status" id="pod_status" value="{{ old('pod_status', '') }}">
                @if($errors->has('pod_status'))
                    <span class="text-danger">{{ $errors->first('pod_status') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.control.fields.pod_status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="sap_shipment_document_number">{{ trans('cruds.control.fields.sap_shipment_document_number') }}</label>
                <input class="form-control {{ $errors->has('sap_shipment_document_number') ? 'is-invalid' : '' }}" type="text" name="sap_shipment_document_number" id="sap_shipment_document_number" value="{{ old('sap_shipment_document_number', '') }}">
                @if($errors->has('sap_shipment_document_number'))
                    <span class="text-danger">{{ $errors->first('sap_shipment_document_number') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.control.fields.sap_shipment_document_number_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="adres_mesta_otpravleniya_sydna">{{ trans('cruds.control.fields.adres_mesta_otpravleniya_sydna') }}</label>
                <input class="form-control {{ $errors->has('adres_mesta_otpravleniya_sydna') ? 'is-invalid' : '' }}" type="text" name="adres_mesta_otpravleniya_sydna" id="adres_mesta_otpravleniya_sydna" value="{{ old('adres_mesta_otpravleniya_sydna', '') }}">
                @if($errors->has('adres_mesta_otpravleniya_sydna'))
                    <span class="text-danger">{{ $errors->first('adres_mesta_otpravleniya_sydna') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.control.fields.adres_mesta_otpravleniya_sydna_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="adres_mesta_pribitiya_sydna">{{ trans('cruds.control.fields.adres_mesta_pribitiya_sydna') }}</label>
                <input class="form-control {{ $errors->has('adres_mesta_pribitiya_sydna') ? 'is-invalid' : '' }}" type="text" name="adres_mesta_pribitiya_sydna" id="adres_mesta_pribitiya_sydna" value="{{ old('adres_mesta_pribitiya_sydna', '') }}">
                @if($errors->has('adres_mesta_pribitiya_sydna'))
                    <span class="text-danger">{{ $errors->first('adres_mesta_pribitiya_sydna') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.control.fields.adres_mesta_pribitiya_sydna_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="adres_svyazannogo_mesta_otpravleniya">{{ trans('cruds.control.fields.adres_svyazannogo_mesta_otpravleniya') }}</label>
                <input class="form-control {{ $errors->has('adres_svyazannogo_mesta_otpravleniya') ? 'is-invalid' : '' }}" type="text" name="adres_svyazannogo_mesta_otpravleniya" id="adres_svyazannogo_mesta_otpravleniya" value="{{ old('adres_svyazannogo_mesta_otpravleniya', '') }}">
                @if($errors->has('adres_svyazannogo_mesta_otpravleniya'))
                    <span class="text-danger">{{ $errors->first('adres_svyazannogo_mesta_otpravleniya') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.control.fields.adres_svyazannogo_mesta_otpravleniya_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="vklychit_v_cislo_ispolzovanii_resyrsa">{{ trans('cruds.control.fields.vklychit_v_cislo_ispolzovanii_resyrsa') }}</label>
                <input class="form-control {{ $errors->has('vklychit_v_cislo_ispolzovanii_resyrsa') ? 'is-invalid' : '' }}" type="text" name="vklychit_v_cislo_ispolzovanii_resyrsa" id="vklychit_v_cislo_ispolzovanii_resyrsa" value="{{ old('vklychit_v_cislo_ispolzovanii_resyrsa', '') }}">
                @if($errors->has('vklychit_v_cislo_ispolzovanii_resyrsa'))
                    <span class="text-danger">{{ $errors->first('vklychit_v_cislo_ispolzovanii_resyrsa') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.control.fields.vklychit_v_cislo_ispolzovanii_resyrsa_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="vladelec_treilera">{{ trans('cruds.control.fields.vladelec_treilera') }}</label>
                <input class="form-control {{ $errors->has('vladelec_treilera') ? 'is-invalid' : '' }}" type="text" name="vladelec_treilera" id="vladelec_treilera" value="{{ old('vladelec_treilera', '') }}">
                @if($errors->has('vladelec_treilera'))
                    <span class="text-danger">{{ $errors->first('vladelec_treilera') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.control.fields.vladelec_treilera_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="vladelec_tyagacha">{{ trans('cruds.control.fields.vladelec_tyagacha') }}</label>
                <input class="form-control {{ $errors->has('vladelec_tyagacha') ? 'is-invalid' : '' }}" type="text" name="vladelec_tyagacha" id="vladelec_tyagacha" value="{{ old('vladelec_tyagacha', '') }}">
                @if($errors->has('vladelec_tyagacha'))
                    <span class="text-danger">{{ $errors->first('vladelec_tyagacha') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.control.fields.vladelec_tyagacha_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="vnytrennii_n_zakaza_perevozchika">{{ trans('cruds.control.fields.vnytrennii_n_zakaza_perevozchika') }}</label>
                <input class="form-control {{ $errors->has('vnytrennii_n_zakaza_perevozchika') ? 'is-invalid' : '' }}" type="text" name="vnytrennii_n_zakaza_perevozchika" id="vnytrennii_n_zakaza_perevozchika" value="{{ old('vnytrennii_n_zakaza_perevozchika', '') }}">
                @if($errors->has('vnytrennii_n_zakaza_perevozchika'))
                    <span class="text-danger">{{ $errors->first('vnytrennii_n_zakaza_perevozchika') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.control.fields.vnytrennii_n_zakaza_perevozchika_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="vigryzka_bez_voditelya">{{ trans('cruds.control.fields.vigryzka_bez_voditelya') }}</label>
                <input class="form-control {{ $errors->has('vigryzka_bez_voditelya') ? 'is-invalid' : '' }}" type="text" name="vigryzka_bez_voditelya" id="vigryzka_bez_voditelya" value="{{ old('vigryzka_bez_voditelya', '') }}">
                @if($errors->has('vigryzka_bez_voditelya'))
                    <span class="text-danger">{{ $errors->first('vigryzka_bez_voditelya') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.control.fields.vigryzka_bez_voditelya_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="data_i_vremya_obnovleniya">{{ trans('cruds.control.fields.data_i_vremya_obnovleniya') }}</label>
                <input class="form-control datetime {{ $errors->has('data_i_vremya_obnovleniya') ? 'is-invalid' : '' }}" type="text" name="data_i_vremya_obnovleniya" id="data_i_vremya_obnovleniya" value="{{ old('data_i_vremya_obnovleniya') }}">
                @if($errors->has('data_i_vremya_obnovleniya'))
                    <span class="text-danger">{{ $errors->first('data_i_vremya_obnovleniya') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.control.fields.data_i_vremya_obnovleniya_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="data_i_vremya_sozdaniya">{{ trans('cruds.control.fields.data_i_vremya_sozdaniya') }}</label>
                <input class="form-control datetime {{ $errors->has('data_i_vremya_sozdaniya') ? 'is-invalid' : '' }}" type="text" name="data_i_vremya_sozdaniya" id="data_i_vremya_sozdaniya" value="{{ old('data_i_vremya_sozdaniya') }}">
                @if($errors->has('data_i_vremya_sozdaniya'))
                    <span class="text-danger">{{ $errors->first('data_i_vremya_sozdaniya') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.control.fields.data_i_vremya_sozdaniya_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="data_vremya_konteinernogo_sklada">{{ trans('cruds.control.fields.data_vremya_konteinernogo_sklada') }}</label>
                <input class="form-control datetime {{ $errors->has('data_vremya_konteinernogo_sklada') ? 'is-invalid' : '' }}" type="text" name="data_vremya_konteinernogo_sklada" id="data_vremya_konteinernogo_sklada" value="{{ old('data_vremya_konteinernogo_sklada') }}">
                @if($errors->has('data_vremya_konteinernogo_sklada'))
                    <span class="text-danger">{{ $errors->first('data_vremya_konteinernogo_sklada') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.control.fields.data_vremya_konteinernogo_sklada_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="datetimestartship">{{ trans('cruds.control.fields.datetimestartship') }}</label>
                <input class="form-control datetime {{ $errors->has('datetimestartship') ? 'is-invalid' : '' }}" type="text" name="datetimestartship" id="datetimestartship" value="{{ old('datetimestartship') }}">
                @if($errors->has('datetimestartship'))
                    <span class="text-danger">{{ $errors->first('datetimestartship') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.control.fields.datetimestartship_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="datetimearriveship">{{ trans('cruds.control.fields.datetimearriveship') }}</label>
                <input class="form-control datetime {{ $errors->has('datetimearriveship') ? 'is-invalid' : '' }}" type="text" name="datetimearriveship" id="datetimearriveship" value="{{ old('datetimearriveship') }}">
                @if($errors->has('datetimearriveship'))
                    <span class="text-danger">{{ $errors->first('datetimearriveship') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.control.fields.datetimearriveship_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="data_vremya_ocenki">{{ trans('cruds.control.fields.data_vremya_ocenki') }}</label>
                <input class="form-control {{ $errors->has('data_vremya_ocenki') ? 'is-invalid' : '' }}" type="text" name="data_vremya_ocenki" id="data_vremya_ocenki" value="{{ old('data_vremya_ocenki', '') }}">
                @if($errors->has('data_vremya_ocenki'))
                    <span class="text-danger">{{ $errors->first('data_vremya_ocenki') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.control.fields.data_vremya_ocenki_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="deklarirovannaya_stoimost">{{ trans('cruds.control.fields.deklarirovannaya_stoimost') }}</label>
                <input class="form-control {{ $errors->has('deklarirovannaya_stoimost') ? 'is-invalid' : '' }}" type="text" name="deklarirovannaya_stoimost" id="deklarirovannaya_stoimost" value="{{ old('deklarirovannaya_stoimost', '') }}">
                @if($errors->has('deklarirovannaya_stoimost'))
                    <span class="text-danger">{{ $errors->first('deklarirovannaya_stoimost') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.control.fields.deklarirovannaya_stoimost_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="identifikator_mesta_otpravlenia_sydna">{{ trans('cruds.control.fields.identifikator_mesta_otpravlenia_sydna') }}</label>
                <input class="form-control {{ $errors->has('identifikator_mesta_otpravlenia_sydna') ? 'is-invalid' : '' }}" type="text" name="identifikator_mesta_otpravlenia_sydna" id="identifikator_mesta_otpravlenia_sydna" value="{{ old('identifikator_mesta_otpravlenia_sydna', '') }}">
                @if($errors->has('identifikator_mesta_otpravlenia_sydna'))
                    <span class="text-danger">{{ $errors->first('identifikator_mesta_otpravlenia_sydna') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.control.fields.identifikator_mesta_otpravlenia_sydna_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="identifikator_mesta_pribitiya_sydna">{{ trans('cruds.control.fields.identifikator_mesta_pribitiya_sydna') }}</label>
                <input class="form-control {{ $errors->has('identifikator_mesta_pribitiya_sydna') ? 'is-invalid' : '' }}" type="text" name="identifikator_mesta_pribitiya_sydna" id="identifikator_mesta_pribitiya_sydna" value="{{ old('identifikator_mesta_pribitiya_sydna', '') }}">
                @if($errors->has('identifikator_mesta_pribitiya_sydna'))
                    <span class="text-danger">{{ $errors->first('identifikator_mesta_pribitiya_sydna') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.control.fields.identifikator_mesta_pribitiya_sydna_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="identifikator_mesta_prpiski_treilera">{{ trans('cruds.control.fields.identifikator_mesta_prpiski_treilera') }}</label>
                <input class="form-control {{ $errors->has('identifikator_mesta_prpiski_treilera') ? 'is-invalid' : '' }}" type="text" name="identifikator_mesta_prpiski_treilera" id="identifikator_mesta_prpiski_treilera" value="{{ old('identifikator_mesta_prpiski_treilera', '') }}">
                @if($errors->has('identifikator_mesta_prpiski_treilera'))
                    <span class="text-danger">{{ $errors->first('identifikator_mesta_prpiski_treilera') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.control.fields.identifikator_mesta_prpiski_treilera_helper') }}</span>
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