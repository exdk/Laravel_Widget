@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.offering.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.offerings.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="date_first_load">{{ trans('cruds.offering.fields.date_first_load') }}</label>
                <input class="form-control date {{ $errors->has('date_first_load') ? 'is-invalid' : '' }}" type="text" name="date_first_load" id="date_first_load" value="{{ old('date_first_load') }}">
                @if($errors->has('date_first_load'))
                    <span class="text-danger">{{ $errors->first('date_first_load') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.offering.fields.date_first_load_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="transporeonid">{{ trans('cruds.offering.fields.transporeonid') }}</label>
                <input class="form-control {{ $errors->has('transporeonid') ? 'is-invalid' : '' }}" type="text" name="transporeonid" id="transporeonid" value="{{ old('transporeonid', '') }}">
                @if($errors->has('transporeonid'))
                    <span class="text-danger">{{ $errors->first('transporeonid') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.offering.fields.transporeonid_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="neobhodimie_perevozki">{{ trans('cruds.offering.fields.neobhodimie_perevozki') }}</label>
                <input class="form-control {{ $errors->has('neobhodimie_perevozki') ? 'is-invalid' : '' }}" type="text" name="neobhodimie_perevozki" id="neobhodimie_perevozki" value="{{ old('neobhodimie_perevozki', '') }}">
                @if($errors->has('neobhodimie_perevozki'))
                    <span class="text-danger">{{ $errors->first('neobhodimie_perevozki') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.offering.fields.neobhodimie_perevozki_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="procent_kvoti_vipolneno">{{ trans('cruds.offering.fields.procent_kvoti_vipolneno') }}</label>
                <input class="form-control {{ $errors->has('procent_kvoti_vipolneno') ? 'is-invalid' : '' }}" type="text" name="procent_kvoti_vipolneno" id="procent_kvoti_vipolneno" value="{{ old('procent_kvoti_vipolneno', '') }}">
                @if($errors->has('procent_kvoti_vipolneno'))
                    <span class="text-danger">{{ $errors->first('procent_kvoti_vipolneno') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.offering.fields.procent_kvoti_vipolneno_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="poslednie_izmeneniya">{{ trans('cruds.offering.fields.poslednie_izmeneniya') }}</label>
                <input class="form-control {{ $errors->has('poslednie_izmeneniya') ? 'is-invalid' : '' }}" type="text" name="poslednie_izmeneniya" id="poslednie_izmeneniya" value="{{ old('poslednie_izmeneniya', '') }}">
                @if($errors->has('poslednie_izmeneniya'))
                    <span class="text-danger">{{ $errors->first('poslednie_izmeneniya') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.offering.fields.poslednie_izmeneniya_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="opredelennie_mesta_zagryzki">{{ trans('cruds.offering.fields.opredelennie_mesta_zagryzki') }}</label>
                <input class="form-control {{ $errors->has('opredelennie_mesta_zagryzki') ? 'is-invalid' : '' }}" type="text" name="opredelennie_mesta_zagryzki" id="opredelennie_mesta_zagryzki" value="{{ old('opredelennie_mesta_zagryzki', '') }}">
                @if($errors->has('opredelennie_mesta_zagryzki'))
                    <span class="text-danger">{{ $errors->first('opredelennie_mesta_zagryzki') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.offering.fields.opredelennie_mesta_zagryzki_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="poctoviy_indeks_start">{{ trans('cruds.offering.fields.poctoviy_indeks_start') }}</label>
                <input class="form-control {{ $errors->has('poctoviy_indeks_start') ? 'is-invalid' : '' }}" type="text" name="poctoviy_indeks_start" id="poctoviy_indeks_start" value="{{ old('poctoviy_indeks_start', '') }}">
                @if($errors->has('poctoviy_indeks_start'))
                    <span class="text-danger">{{ $errors->first('poctoviy_indeks_start') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.offering.fields.poctoviy_indeks_start_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="region_start">{{ trans('cruds.offering.fields.region_start') }}</label>
                <input class="form-control {{ $errors->has('region_start') ? 'is-invalid' : '' }}" type="text" name="region_start" id="region_start" value="{{ old('region_start', '') }}">
                @if($errors->has('region_start'))
                    <span class="text-danger">{{ $errors->first('region_start') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.offering.fields.region_start_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="strana_start">{{ trans('cruds.offering.fields.strana_start') }}</label>
                <input class="form-control {{ $errors->has('strana_start') ? 'is-invalid' : '' }}" type="text" name="strana_start" id="strana_start" value="{{ old('strana_start', '') }}">
                @if($errors->has('strana_start'))
                    <span class="text-danger">{{ $errors->first('strana_start') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.offering.fields.strana_start_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="kommentariy_start">{{ trans('cruds.offering.fields.kommentariy_start') }}</label>
                <input class="form-control {{ $errors->has('kommentariy_start') ? 'is-invalid' : '' }}" type="text" name="kommentariy_start" id="kommentariy_start" value="{{ old('kommentariy_start', '') }}">
                @if($errors->has('kommentariy_start'))
                    <span class="text-danger">{{ $errors->first('kommentariy_start') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.offering.fields.kommentariy_start_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="opredelennie_mesta_razgryzki">{{ trans('cruds.offering.fields.opredelennie_mesta_razgryzki') }}</label>
                <input class="form-control {{ $errors->has('opredelennie_mesta_razgryzki') ? 'is-invalid' : '' }}" type="text" name="opredelennie_mesta_razgryzki" id="opredelennie_mesta_razgryzki" value="{{ old('opredelennie_mesta_razgryzki', '') }}">
                @if($errors->has('opredelennie_mesta_razgryzki'))
                    <span class="text-danger">{{ $errors->first('opredelennie_mesta_razgryzki') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.offering.fields.opredelennie_mesta_razgryzki_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="poctoviy_indeks_mesto_naznaceniya">{{ trans('cruds.offering.fields.poctoviy_indeks_mesto_naznaceniya') }}</label>
                <input class="form-control {{ $errors->has('poctoviy_indeks_mesto_naznaceniya') ? 'is-invalid' : '' }}" type="text" name="poctoviy_indeks_mesto_naznaceniya" id="poctoviy_indeks_mesto_naznaceniya" value="{{ old('poctoviy_indeks_mesto_naznaceniya', '') }}">
                @if($errors->has('poctoviy_indeks_mesto_naznaceniya'))
                    <span class="text-danger">{{ $errors->first('poctoviy_indeks_mesto_naznaceniya') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.offering.fields.poctoviy_indeks_mesto_naznaceniya_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="strana_mesto_naznaceniya">{{ trans('cruds.offering.fields.strana_mesto_naznaceniya') }}</label>
                <input class="form-control {{ $errors->has('strana_mesto_naznaceniya') ? 'is-invalid' : '' }}" type="text" name="strana_mesto_naznaceniya" id="strana_mesto_naznaceniya" value="{{ old('strana_mesto_naznaceniya', '') }}">
                @if($errors->has('strana_mesto_naznaceniya'))
                    <span class="text-danger">{{ $errors->first('strana_mesto_naznaceniya') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.offering.fields.strana_mesto_naznaceniya_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="kommentariy_mesto_naznaceniya">{{ trans('cruds.offering.fields.kommentariy_mesto_naznaceniya') }}</label>
                <input class="form-control {{ $errors->has('kommentariy_mesto_naznaceniya') ? 'is-invalid' : '' }}" type="text" name="kommentariy_mesto_naznaceniya" id="kommentariy_mesto_naznaceniya" value="{{ old('kommentariy_mesto_naznaceniya', '') }}">
                @if($errors->has('kommentariy_mesto_naznaceniya'))
                    <span class="text-danger">{{ $errors->first('kommentariy_mesto_naznaceniya') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.offering.fields.kommentariy_mesto_naznaceniya_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="predlozheniya">{{ trans('cruds.offering.fields.predlozheniya') }}</label>
                <input class="form-control {{ $errors->has('predlozheniya') ? 'is-invalid' : '' }}" type="text" name="predlozheniya" id="predlozheniya" value="{{ old('predlozheniya', '') }}">
                @if($errors->has('predlozheniya'))
                    <span class="text-danger">{{ $errors->first('predlozheniya') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.offering.fields.predlozheniya_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="predlozhenie">{{ trans('cruds.offering.fields.predlozhenie') }}</label>
                <input class="form-control {{ $errors->has('predlozhenie') ? 'is-invalid' : '' }}" type="text" name="predlozhenie" id="predlozhenie" value="{{ old('predlozhenie', '') }}">
                @if($errors->has('predlozhenie'))
                    <span class="text-danger">{{ $errors->first('predlozhenie') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.offering.fields.predlozhenie_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="tip_predlozheniya">{{ trans('cruds.offering.fields.tip_predlozheniya') }}</label>
                <input class="form-control {{ $errors->has('tip_predlozheniya') ? 'is-invalid' : '' }}" type="text" name="tip_predlozheniya" id="tip_predlozheniya" value="{{ old('tip_predlozheniya', '') }}">
                @if($errors->has('tip_predlozheniya'))
                    <span class="text-danger">{{ $errors->first('tip_predlozheniya') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.offering.fields.tip_predlozheniya_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="deystvitelno_do">{{ trans('cruds.offering.fields.deystvitelno_do') }}</label>
                <input class="form-control date {{ $errors->has('deystvitelno_do') ? 'is-invalid' : '' }}" type="text" name="deystvitelno_do" id="deystvitelno_do" value="{{ old('deystvitelno_do') }}">
                @if($errors->has('deystvitelno_do'))
                    <span class="text-danger">{{ $errors->first('deystvitelno_do') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.offering.fields.deystvitelno_do_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="kommentarii_k_predlozheniyu">{{ trans('cruds.offering.fields.kommentarii_k_predlozheniyu') }}</label>
                <input class="form-control {{ $errors->has('kommentarii_k_predlozheniyu') ? 'is-invalid' : '' }}" type="text" name="kommentarii_k_predlozheniyu" id="kommentarii_k_predlozheniyu" value="{{ old('kommentarii_k_predlozheniyu', '') }}">
                @if($errors->has('kommentarii_k_predlozheniyu'))
                    <span class="text-danger">{{ $errors->first('kommentarii_k_predlozheniyu') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.offering.fields.kommentarii_k_predlozheniyu_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="transportnoe_sredstvo_trebovanie">{{ trans('cruds.offering.fields.transportnoe_sredstvo_trebovanie') }}</label>
                <input class="form-control {{ $errors->has('transportnoe_sredstvo_trebovanie') ? 'is-invalid' : '' }}" type="text" name="transportnoe_sredstvo_trebovanie" id="transportnoe_sredstvo_trebovanie" value="{{ old('transportnoe_sredstvo_trebovanie', '') }}">
                @if($errors->has('transportnoe_sredstvo_trebovanie'))
                    <span class="text-danger">{{ $errors->first('transportnoe_sredstvo_trebovanie') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.offering.fields.transportnoe_sredstvo_trebovanie_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="ves">{{ trans('cruds.offering.fields.ves') }}</label>
                <input class="form-control {{ $errors->has('ves') ? 'is-invalid' : '' }}" type="text" name="ves" id="ves" value="{{ old('ves', '') }}">
                @if($errors->has('ves'))
                    <span class="text-danger">{{ $errors->first('ves') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.offering.fields.ves_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="obem">{{ trans('cruds.offering.fields.obem') }}</label>
                <input class="form-control {{ $errors->has('obem') ? 'is-invalid' : '' }}" type="text" name="obem" id="obem" value="{{ old('obem', '') }}">
                @if($errors->has('obem'))
                    <span class="text-danger">{{ $errors->first('obem') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.offering.fields.obem_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="dlina">{{ trans('cruds.offering.fields.dlina') }}</label>
                <input class="form-control {{ $errors->has('dlina') ? 'is-invalid' : '' }}" type="text" name="dlina" id="dlina" value="{{ old('dlina', '') }}">
                @if($errors->has('dlina'))
                    <span class="text-danger">{{ $errors->first('dlina') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.offering.fields.dlina_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="pozicii">{{ trans('cruds.offering.fields.pozicii') }}</label>
                <input class="form-control {{ $errors->has('pozicii') ? 'is-invalid' : '' }}" type="text" name="pozicii" id="pozicii" value="{{ old('pozicii', '') }}">
                @if($errors->has('pozicii'))
                    <span class="text-danger">{{ $errors->first('pozicii') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.offering.fields.pozicii_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="vnutrenniy_kommentariy_k_perevozke">{{ trans('cruds.offering.fields.vnutrenniy_kommentariy_k_perevozke') }}</label>
                <input class="form-control {{ $errors->has('vnutrenniy_kommentariy_k_perevozke') ? 'is-invalid' : '' }}" type="text" name="vnutrenniy_kommentariy_k_perevozke" id="vnutrenniy_kommentariy_k_perevozke" value="{{ old('vnutrenniy_kommentariy_k_perevozke', '') }}">
                @if($errors->has('vnutrenniy_kommentariy_k_perevozke'))
                    <span class="text-danger">{{ $errors->first('vnutrenniy_kommentariy_k_perevozke') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.offering.fields.vnutrenniy_kommentariy_k_perevozke_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="id_gryppi_perevozok">{{ trans('cruds.offering.fields.id_gryppi_perevozok') }}</label>
                <input class="form-control {{ $errors->has('id_gryppi_perevozok') ? 'is-invalid' : '' }}" type="text" name="id_gryppi_perevozok" id="id_gryppi_perevozok" value="{{ old('id_gryppi_perevozok', '') }}">
                @if($errors->has('id_gryppi_perevozok'))
                    <span class="text-danger">{{ $errors->first('id_gryppi_perevozok') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.offering.fields.id_gryppi_perevozok_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="dopolnitelnie_nomera_gryzootpravitelya">{{ trans('cruds.offering.fields.dopolnitelnie_nomera_gryzootpravitelya') }}</label>
                <input class="form-control {{ $errors->has('dopolnitelnie_nomera_gryzootpravitelya') ? 'is-invalid' : '' }}" type="text" name="dopolnitelnie_nomera_gryzootpravitelya" id="dopolnitelnie_nomera_gryzootpravitelya" value="{{ old('dopolnitelnie_nomera_gryzootpravitelya', '') }}">
                @if($errors->has('dopolnitelnie_nomera_gryzootpravitelya'))
                    <span class="text-danger">{{ $errors->first('dopolnitelnie_nomera_gryzootpravitelya') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.offering.fields.dopolnitelnie_nomera_gryzootpravitelya_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="sposob_naznaceniya">{{ trans('cruds.offering.fields.sposob_naznaceniya') }}</label>
                <input class="form-control {{ $errors->has('sposob_naznaceniya') ? 'is-invalid' : '' }}" type="text" name="sposob_naznaceniya" id="sposob_naznaceniya" value="{{ old('sposob_naznaceniya', '') }}">
                @if($errors->has('sposob_naznaceniya'))
                    <span class="text-danger">{{ $errors->first('sposob_naznaceniya') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.offering.fields.sposob_naznaceniya_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="dopolnitelniy_n_gryzootpravitelya_2">{{ trans('cruds.offering.fields.dopolnitelniy_n_gryzootpravitelya_2') }}</label>
                <input class="form-control {{ $errors->has('dopolnitelniy_n_gryzootpravitelya_2') ? 'is-invalid' : '' }}" type="text" name="dopolnitelniy_n_gryzootpravitelya_2" id="dopolnitelniy_n_gryzootpravitelya_2" value="{{ old('dopolnitelniy_n_gryzootpravitelya_2', '') }}">
                @if($errors->has('dopolnitelniy_n_gryzootpravitelya_2'))
                    <span class="text-danger">{{ $errors->first('dopolnitelniy_n_gryzootpravitelya_2') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.offering.fields.dopolnitelniy_n_gryzootpravitelya_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="dopolnitelniy_n_gryzootpravitelya_3">{{ trans('cruds.offering.fields.dopolnitelniy_n_gryzootpravitelya_3') }}</label>
                <input class="form-control {{ $errors->has('dopolnitelniy_n_gryzootpravitelya_3') ? 'is-invalid' : '' }}" type="text" name="dopolnitelniy_n_gryzootpravitelya_3" id="dopolnitelniy_n_gryzootpravitelya_3" value="{{ old('dopolnitelniy_n_gryzootpravitelya_3', '') }}">
                @if($errors->has('dopolnitelniy_n_gryzootpravitelya_3'))
                    <span class="text-danger">{{ $errors->first('dopolnitelniy_n_gryzootpravitelya_3') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.offering.fields.dopolnitelniy_n_gryzootpravitelya_3_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="rassoyanie">{{ trans('cruds.offering.fields.rassoyanie') }}</label>
                <input class="form-control {{ $errors->has('rassoyanie') ? 'is-invalid' : '' }}" type="text" name="rassoyanie" id="rassoyanie" value="{{ old('rassoyanie', '') }}">
                @if($errors->has('rassoyanie'))
                    <span class="text-danger">{{ $errors->first('rassoyanie') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.offering.fields.rassoyanie_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="otdel_planirovaniya">{{ trans('cruds.offering.fields.otdel_planirovaniya') }}</label>
                <input class="form-control {{ $errors->has('otdel_planirovaniya') ? 'is-invalid' : '' }}" type="text" name="otdel_planirovaniya" id="otdel_planirovaniya" value="{{ old('otdel_planirovaniya', '') }}">
                @if($errors->has('otdel_planirovaniya'))
                    <span class="text-danger">{{ $errors->first('otdel_planirovaniya') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.offering.fields.otdel_planirovaniya_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="period_zagruzki">{{ trans('cruds.offering.fields.period_zagruzki') }}</label>
                <input class="form-control {{ $errors->has('period_zagruzki') ? 'is-invalid' : '' }}" type="text" name="period_zagruzki" id="period_zagruzki" value="{{ old('period_zagruzki', '') }}">
                @if($errors->has('period_zagruzki'))
                    <span class="text-danger">{{ $errors->first('period_zagruzki') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.offering.fields.period_zagruzki_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="period_razgruzki">{{ trans('cruds.offering.fields.period_razgruzki') }}</label>
                <input class="form-control {{ $errors->has('period_razgruzki') ? 'is-invalid' : '' }}" type="text" name="period_razgruzki" id="period_razgruzki" value="{{ old('period_razgruzki', '') }}">
                @if($errors->has('period_razgruzki'))
                    <span class="text-danger">{{ $errors->first('period_razgruzki') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.offering.fields.period_razgruzki_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="kolonka">{{ trans('cruds.offering.fields.kolonka') }}</label>
                <input class="form-control {{ $errors->has('kolonka') ? 'is-invalid' : '' }}" type="text" name="kolonka" id="kolonka" value="{{ old('kolonka', '') }}">
                @if($errors->has('kolonka'))
                    <span class="text-danger">{{ $errors->first('kolonka') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.offering.fields.kolonka_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="start">{{ trans('cruds.offering.fields.start') }}</label>
                <input class="form-control {{ $errors->has('start') ? 'is-invalid' : '' }}" type="text" name="start" id="start" value="{{ old('start', '') }}">
                @if($errors->has('start'))
                    <span class="text-danger">{{ $errors->first('start') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.offering.fields.start_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="mesto_naznaceniya">{{ trans('cruds.offering.fields.mesto_naznaceniya') }}</label>
                <input class="form-control {{ $errors->has('mesto_naznaceniya') ? 'is-invalid' : '' }}" type="text" name="mesto_naznaceniya" id="mesto_naznaceniya" value="{{ old('mesto_naznaceniya', '') }}">
                @if($errors->has('mesto_naznaceniya'))
                    <span class="text-danger">{{ $errors->first('mesto_naznaceniya') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.offering.fields.mesto_naznaceniya_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="sostoyanie_chteniya">{{ trans('cruds.offering.fields.sostoyanie_chteniya') }}</label>
                <input class="form-control {{ $errors->has('sostoyanie_chteniya') ? 'is-invalid' : '' }}" type="text" name="sostoyanie_chteniya" id="sostoyanie_chteniya" value="{{ old('sostoyanie_chteniya', '') }}">
                @if($errors->has('sostoyanie_chteniya'))
                    <span class="text-danger">{{ $errors->first('sostoyanie_chteniya') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.offering.fields.sostoyanie_chteniya_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="sostoyanie_pechati">{{ trans('cruds.offering.fields.sostoyanie_pechati') }}</label>
                <input class="form-control {{ $errors->has('sostoyanie_pechati') ? 'is-invalid' : '' }}" type="text" name="sostoyanie_pechati" id="sostoyanie_pechati" value="{{ old('sostoyanie_pechati', '') }}">
                @if($errors->has('sostoyanie_pechati'))
                    <span class="text-danger">{{ $errors->first('sostoyanie_pechati') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.offering.fields.sostoyanie_pechati_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="data_pogruzki">{{ trans('cruds.offering.fields.data_pogruzki') }}</label>
                <input class="form-control {{ $errors->has('data_pogruzki') ? 'is-invalid' : '' }}" type="text" name="data_pogruzki" id="data_pogruzki" value="{{ old('data_pogruzki', '') }}">
                @if($errors->has('data_pogruzki'))
                    <span class="text-danger">{{ $errors->first('data_pogruzki') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.offering.fields.data_pogruzki_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="data_razgryzki">{{ trans('cruds.offering.fields.data_razgryzki') }}</label>
                <input class="form-control {{ $errors->has('data_razgryzki') ? 'is-invalid' : '' }}" type="text" name="data_razgryzki" id="data_razgryzki" value="{{ old('data_razgryzki', '') }}">
                @if($errors->has('data_razgryzki'))
                    <span class="text-danger">{{ $errors->first('data_razgryzki') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.offering.fields.data_razgryzki_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="krainiy_srok">{{ trans('cruds.offering.fields.krainiy_srok') }}</label>
                <input class="form-control {{ $errors->has('krainiy_srok') ? 'is-invalid' : '' }}" type="text" name="krainiy_srok" id="krainiy_srok" value="{{ old('krainiy_srok', '') }}">
                @if($errors->has('krainiy_srok'))
                    <span class="text-danger">{{ $errors->first('krainiy_srok') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.offering.fields.krainiy_srok_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="gorod_start">{{ trans('cruds.offering.fields.gorod_start') }}</label>
                <input class="form-control {{ $errors->has('gorod_start') ? 'is-invalid' : '' }}" type="text" name="gorod_start" id="gorod_start" value="{{ old('gorod_start', '') }}">
                @if($errors->has('gorod_start'))
                    <span class="text-danger">{{ $errors->first('gorod_start') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.offering.fields.gorod_start_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="nazvanie_kompanii_mesto_naznaceniya">{{ trans('cruds.offering.fields.nazvanie_kompanii_mesto_naznaceniya') }}</label>
                <input class="form-control {{ $errors->has('nazvanie_kompanii_mesto_naznaceniya') ? 'is-invalid' : '' }}" type="text" name="nazvanie_kompanii_mesto_naznaceniya" id="nazvanie_kompanii_mesto_naznaceniya" value="{{ old('nazvanie_kompanii_mesto_naznaceniya', '') }}">
                @if($errors->has('nazvanie_kompanii_mesto_naznaceniya'))
                    <span class="text-danger">{{ $errors->first('nazvanie_kompanii_mesto_naznaceniya') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.offering.fields.nazvanie_kompanii_mesto_naznaceniya_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="spravochnaya_cena_perevozki">{{ trans('cruds.offering.fields.spravochnaya_cena_perevozki') }}</label>
                <input class="form-control {{ $errors->has('spravochnaya_cena_perevozki') ? 'is-invalid' : '' }}" type="text" name="spravochnaya_cena_perevozki" id="spravochnaya_cena_perevozki" value="{{ old('spravochnaya_cena_perevozki', '') }}">
                @if($errors->has('spravochnaya_cena_perevozki'))
                    <span class="text-danger">{{ $errors->first('spravochnaya_cena_perevozki') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.offering.fields.spravochnaya_cena_perevozki_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="distetcher_gryzootpravitelya">{{ trans('cruds.offering.fields.distetcher_gryzootpravitelya') }}</label>
                <input class="form-control {{ $errors->has('distetcher_gryzootpravitelya') ? 'is-invalid' : '' }}" type="text" name="distetcher_gryzootpravitelya" id="distetcher_gryzootpravitelya" value="{{ old('distetcher_gryzootpravitelya', '') }}">
                @if($errors->has('distetcher_gryzootpravitelya'))
                    <span class="text-danger">{{ $errors->first('distetcher_gryzootpravitelya') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.offering.fields.distetcher_gryzootpravitelya_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="kategorii">{{ trans('cruds.offering.fields.kategorii') }}</label>
                <input class="form-control {{ $errors->has('kategorii') ? 'is-invalid' : '' }}" type="text" name="kategorii" id="kategorii" value="{{ old('kategorii', '') }}">
                @if($errors->has('kategorii'))
                    <span class="text-danger">{{ $errors->first('kategorii') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.offering.fields.kategorii_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="region_mesto_naznacheniya">{{ trans('cruds.offering.fields.region_mesto_naznacheniya') }}</label>
                <input class="form-control {{ $errors->has('region_mesto_naznacheniya') ? 'is-invalid' : '' }}" type="text" name="region_mesto_naznacheniya" id="region_mesto_naznacheniya" value="{{ old('region_mesto_naznacheniya', '') }}">
                @if($errors->has('region_mesto_naznacheniya'))
                    <span class="text-danger">{{ $errors->first('region_mesto_naznacheniya') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.offering.fields.region_mesto_naznacheniya_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="dispetcher_perevozchika">{{ trans('cruds.offering.fields.dispetcher_perevozchika') }}</label>
                <input class="form-control {{ $errors->has('dispetcher_perevozchika') ? 'is-invalid' : '' }}" type="text" name="dispetcher_perevozchika" id="dispetcher_perevozchika" value="{{ old('dispetcher_perevozchika', '') }}">
                @if($errors->has('dispetcher_perevozchika'))
                    <span class="text-danger">{{ $errors->first('dispetcher_perevozchika') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.offering.fields.dispetcher_perevozchika_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="gryzootpravitel">{{ trans('cruds.offering.fields.gryzootpravitel') }}</label>
                <input class="form-control {{ $errors->has('gryzootpravitel') ? 'is-invalid' : '' }}" type="text" name="gryzootpravitel" id="gryzootpravitel" value="{{ old('gryzootpravitel', '') }}">
                @if($errors->has('gryzootpravitel'))
                    <span class="text-danger">{{ $errors->first('gryzootpravitel') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.offering.fields.gryzootpravitel_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="postavki">{{ trans('cruds.offering.fields.postavki') }}</label>
                <input class="form-control {{ $errors->has('postavki') ? 'is-invalid' : '' }}" type="text" name="postavki" id="postavki" value="{{ old('postavki', '') }}">
                @if($errors->has('postavki'))
                    <span class="text-danger">{{ $errors->first('postavki') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.offering.fields.postavki_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="naznachennie_perevozki">{{ trans('cruds.offering.fields.naznachennie_perevozki') }}</label>
                <input class="form-control {{ $errors->has('naznachennie_perevozki') ? 'is-invalid' : '' }}" type="text" name="naznachennie_perevozki" id="naznachennie_perevozki" value="{{ old('naznachennie_perevozki', '') }}">
                @if($errors->has('naznachennie_perevozki'))
                    <span class="text-danger">{{ $errors->first('naznachennie_perevozki') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.offering.fields.naznachennie_perevozki_helper') }}</span>
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