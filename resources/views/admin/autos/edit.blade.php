@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.auto.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.autos.update", [$auto->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label>{{ trans('cruds.auto.fields.own') }}</label>
                @foreach(App\Models\Auto::OWN_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('own') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="own_{{ $key }}" name="own" value="{{ $key }}" {{ old('own', $auto->own) === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="own_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('own'))
                    <span class="text-danger">{{ $errors->first('own') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.auto.fields.own_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="own_inn">{{ trans('cruds.auto.fields.own_inn') }}</label>
                <input class="form-control {{ $errors->has('own_inn') ? 'is-invalid' : '' }}" type="text" name="own_inn" id="own_inn" value="{{ old('own_inn', $auto->own_inn) }}">
                @if($errors->has('own_inn'))
                    <span class="text-danger">{{ $errors->first('own_inn') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.auto.fields.own_inn_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="govnomer">{{ trans('cruds.auto.fields.govnomer') }}</label>
                <input class="form-control {{ $errors->has('govnomer') ? 'is-invalid' : '' }}" type="text" name="govnomer" id="govnomer" value="{{ old('govnomer', $auto->govnomer) }}">
                @if($errors->has('govnomer'))
                    <span class="text-danger">{{ $errors->first('govnomer') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.auto.fields.govnomer_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="marka">{{ trans('cruds.auto.fields.marka') }}</label>
                <input class="form-control {{ $errors->has('marka') ? 'is-invalid' : '' }}" type="text" name="marka" id="marka" value="{{ old('marka', $auto->marka) }}">
                @if($errors->has('marka'))
                    <span class="text-danger">{{ $errors->first('marka') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.auto.fields.marka_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="model">{{ trans('cruds.auto.fields.model') }}</label>
                <input class="form-control {{ $errors->has('model') ? 'is-invalid' : '' }}" type="text" name="model" id="model" value="{{ old('model', $auto->model) }}">
                @if($errors->has('model'))
                    <span class="text-danger">{{ $errors->first('model') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.auto.fields.model_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="vin">{{ trans('cruds.auto.fields.vin') }}</label>
                <input class="form-control {{ $errors->has('vin') ? 'is-invalid' : '' }}" type="text" name="vin" id="vin" value="{{ old('vin', $auto->vin) }}">
                @if($errors->has('vin'))
                    <span class="text-danger">{{ $errors->first('vin') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.auto.fields.vin_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.auto.fields.type_kuzov') }}</label>
                @foreach(App\Models\Auto::TYPE_KUZOV_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('type_kuzov') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="type_kuzov_{{ $key }}" name="type_kuzov" value="{{ $key }}" {{ old('type_kuzov', $auto->type_kuzov) === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="type_kuzov_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('type_kuzov'))
                    <span class="text-danger">{{ $errors->first('type_kuzov') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.auto.fields.type_kuzov_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="category_tc">{{ trans('cruds.auto.fields.category_tc') }}</label>
                <input class="form-control {{ $errors->has('category_tc') ? 'is-invalid' : '' }}" type="text" name="category_tc" id="category_tc" value="{{ old('category_tc', $auto->category_tc) }}">
                @if($errors->has('category_tc'))
                    <span class="text-danger">{{ $errors->first('category_tc') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.auto.fields.category_tc_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="year_ot">{{ trans('cruds.auto.fields.year_ot') }}</label>
                <input class="form-control {{ $errors->has('year_ot') ? 'is-invalid' : '' }}" type="text" name="year_ot" id="year_ot" value="{{ old('year_ot', $auto->year_ot) }}">
                @if($errors->has('year_ot'))
                    <span class="text-danger">{{ $errors->first('year_ot') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.auto.fields.year_ot_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="color">{{ trans('cruds.auto.fields.color') }}</label>
                <input class="form-control {{ $errors->has('color') ? 'is-invalid' : '' }}" type="text" name="color" id="color" value="{{ old('color', $auto->color) }}">
                @if($errors->has('color'))
                    <span class="text-danger">{{ $errors->first('color') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.auto.fields.color_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="horse">{{ trans('cruds.auto.fields.horse') }}</label>
                <input class="form-control {{ $errors->has('horse') ? 'is-invalid' : '' }}" type="text" name="horse" id="horse" value="{{ old('horse', $auto->horse) }}">
                @if($errors->has('horse'))
                    <span class="text-danger">{{ $errors->first('horse') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.auto.fields.horse_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="ecoclass">{{ trans('cruds.auto.fields.ecoclass') }}</label>
                <input class="form-control {{ $errors->has('ecoclass') ? 'is-invalid' : '' }}" type="text" name="ecoclass" id="ecoclass" value="{{ old('ecoclass', $auto->ecoclass) }}">
                @if($errors->has('ecoclass'))
                    <span class="text-danger">{{ $errors->first('ecoclass') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.auto.fields.ecoclass_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="pt_type">{{ trans('cruds.auto.fields.pt_type') }}</label>
                <input class="form-control {{ $errors->has('pt_type') ? 'is-invalid' : '' }}" type="text" name="pt_type" id="pt_type" value="{{ old('pt_type', $auto->pt_type) }}">
                @if($errors->has('pt_type'))
                    <span class="text-danger">{{ $errors->first('pt_type') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.auto.fields.pt_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="pt_nomer">{{ trans('cruds.auto.fields.pt_nomer') }}</label>
                <input class="form-control {{ $errors->has('pt_nomer') ? 'is-invalid' : '' }}" type="text" name="pt_nomer" id="pt_nomer" value="{{ old('pt_nomer', $auto->pt_nomer) }}">
                @if($errors->has('pt_nomer'))
                    <span class="text-danger">{{ $errors->first('pt_nomer') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.auto.fields.pt_nomer_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="max_nagruz">{{ trans('cruds.auto.fields.max_nagruz') }}</label>
                <input class="form-control {{ $errors->has('max_nagruz') ? 'is-invalid' : '' }}" type="text" name="max_nagruz" id="max_nagruz" value="{{ old('max_nagruz', $auto->max_nagruz) }}">
                @if($errors->has('max_nagruz'))
                    <span class="text-danger">{{ $errors->first('max_nagruz') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.auto.fields.max_nagruz_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="beznagruz">{{ trans('cruds.auto.fields.beznagruz') }}</label>
                <input class="form-control {{ $errors->has('beznagruz') ? 'is-invalid' : '' }}" type="text" name="beznagruz" id="beznagruz" value="{{ old('beznagruz', $auto->beznagruz) }}">
                @if($errors->has('beznagruz'))
                    <span class="text-danger">{{ $errors->first('beznagruz') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.auto.fields.beznagruz_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="pt_date">{{ trans('cruds.auto.fields.pt_date') }}</label>
                <input class="form-control date {{ $errors->has('pt_date') ? 'is-invalid' : '' }}" type="text" name="pt_date" id="pt_date" value="{{ old('pt_date', $auto->pt_date) }}">
                @if($errors->has('pt_date'))
                    <span class="text-danger">{{ $errors->first('pt_date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.auto.fields.pt_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="pt_perv">{{ trans('cruds.auto.fields.pt_perv') }}</label>
                <div class="needsclick dropzone {{ $errors->has('pt_perv') ? 'is-invalid' : '' }}" id="pt_perv-dropzone">
                </div>
                @if($errors->has('pt_perv'))
                    <span class="text-danger">{{ $errors->first('pt_perv') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.auto.fields.pt_perv_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="pt_vtor">{{ trans('cruds.auto.fields.pt_vtor') }}</label>
                <div class="needsclick dropzone {{ $errors->has('pt_vtor') ? 'is-invalid' : '' }}" id="pt_vtor-dropzone">
                </div>
                @if($errors->has('pt_vtor'))
                    <span class="text-danger">{{ $errors->first('pt_vtor') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.auto.fields.pt_vtor_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="registry">{{ trans('cruds.auto.fields.registry') }}</label>
                <input class="form-control {{ $errors->has('registry') ? 'is-invalid' : '' }}" type="text" name="registry" id="registry" value="{{ old('registry', $auto->registry) }}">
                @if($errors->has('registry'))
                    <span class="text-danger">{{ $errors->first('registry') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.auto.fields.registry_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.auto.fields.kolo') }}</label>
                @foreach(App\Models\Auto::KOLO_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('kolo') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="kolo_{{ $key }}" name="kolo" value="{{ $key }}" {{ old('kolo', $auto->kolo) === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="kolo_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('kolo'))
                    <span class="text-danger">{{ $errors->first('kolo') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.auto.fields.kolo_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="bakov">{{ trans('cruds.auto.fields.bakov') }}</label>
                <input class="form-control {{ $errors->has('bakov') ? 'is-invalid' : '' }}" type="text" name="bakov" id="bakov" value="{{ old('bakov', $auto->bakov) }}">
                @if($errors->has('bakov'))
                    <span class="text-danger">{{ $errors->first('bakov') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.auto.fields.bakov_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="bakov_volume">{{ trans('cruds.auto.fields.bakov_volume') }}</label>
                <input class="form-control {{ $errors->has('bakov_volume') ? 'is-invalid' : '' }}" type="text" name="bakov_volume" id="bakov_volume" value="{{ old('bakov_volume', $auto->bakov_volume) }}">
                @if($errors->has('bakov_volume'))
                    <span class="text-danger">{{ $errors->first('bakov_volume') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.auto.fields.bakov_volume_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="bakov_volume_2">{{ trans('cruds.auto.fields.bakov_volume_2') }}</label>
                <input class="form-control {{ $errors->has('bakov_volume_2') ? 'is-invalid' : '' }}" type="text" name="bakov_volume_2" id="bakov_volume_2" value="{{ old('bakov_volume_2', $auto->bakov_volume_2) }}">
                @if($errors->has('bakov_volume_2'))
                    <span class="text-danger">{{ $errors->first('bakov_volume_2') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.auto.fields.bakov_volume_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="levelco_2">{{ trans('cruds.auto.fields.levelco_2') }}</label>
                <input class="form-control {{ $errors->has('levelco_2') ? 'is-invalid' : '' }}" type="text" name="levelco_2" id="levelco_2" value="{{ old('levelco_2', $auto->levelco_2) }}">
                @if($errors->has('levelco_2'))
                    <span class="text-danger">{{ $errors->first('levelco_2') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.auto.fields.levelco_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="vnutr_dlina">{{ trans('cruds.auto.fields.vnutr_dlina') }}</label>
                <input class="form-control {{ $errors->has('vnutr_dlina') ? 'is-invalid' : '' }}" type="text" name="vnutr_dlina" id="vnutr_dlina" value="{{ old('vnutr_dlina', $auto->vnutr_dlina) }}">
                @if($errors->has('vnutr_dlina'))
                    <span class="text-danger">{{ $errors->first('vnutr_dlina') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.auto.fields.vnutr_dlina_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="vnutr_weight">{{ trans('cruds.auto.fields.vnutr_weight') }}</label>
                <input class="form-control {{ $errors->has('vnutr_weight') ? 'is-invalid' : '' }}" type="text" name="vnutr_weight" id="vnutr_weight" value="{{ old('vnutr_weight', $auto->vnutr_weight) }}">
                @if($errors->has('vnutr_weight'))
                    <span class="text-danger">{{ $errors->first('vnutr_weight') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.auto.fields.vnutr_weight_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="vnutr_height">{{ trans('cruds.auto.fields.vnutr_height') }}</label>
                <input class="form-control {{ $errors->has('vnutr_height') ? 'is-invalid' : '' }}" type="text" name="vnutr_height" id="vnutr_height" value="{{ old('vnutr_height', $auto->vnutr_height) }}">
                @if($errors->has('vnutr_height'))
                    <span class="text-danger">{{ $errors->first('vnutr_height') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.auto.fields.vnutr_height_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="vnutr_kub">{{ trans('cruds.auto.fields.vnutr_kub') }}</label>
                <input class="form-control {{ $errors->has('vnutr_kub') ? 'is-invalid' : '' }}" type="text" name="vnutr_kub" id="vnutr_kub" value="{{ old('vnutr_kub', $auto->vnutr_kub) }}">
                @if($errors->has('vnutr_kub'))
                    <span class="text-danger">{{ $errors->first('vnutr_kub') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.auto.fields.vnutr_kub_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="holod">{{ trans('cruds.auto.fields.holod') }}</label>
                <input class="form-control {{ $errors->has('holod') ? 'is-invalid' : '' }}" type="text" name="holod" id="holod" value="{{ old('holod', $auto->holod) }}">
                @if($errors->has('holod'))
                    <span class="text-danger">{{ $errors->first('holod') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.auto.fields.holod_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="temp_ot">{{ trans('cruds.auto.fields.temp_ot') }}</label>
                <input class="form-control {{ $errors->has('temp_ot') ? 'is-invalid' : '' }}" type="text" name="temp_ot" id="temp_ot" value="{{ old('temp_ot', $auto->temp_ot) }}">
                @if($errors->has('temp_ot'))
                    <span class="text-danger">{{ $errors->first('temp_ot') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.auto.fields.temp_ot_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="temp_do">{{ trans('cruds.auto.fields.temp_do') }}</label>
                <input class="form-control {{ $errors->has('temp_do') ? 'is-invalid' : '' }}" type="text" name="temp_do" id="temp_do" value="{{ old('temp_do', $auto->temp_do) }}">
                @if($errors->has('temp_do'))
                    <span class="text-danger">{{ $errors->first('temp_do') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.auto.fields.temp_do_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="type_tahograf">{{ trans('cruds.auto.fields.type_tahograf') }}</label>
                <input class="form-control {{ $errors->has('type_tahograf') ? 'is-invalid' : '' }}" type="text" name="type_tahograf" id="type_tahograf" value="{{ old('type_tahograf', $auto->type_tahograf) }}">
                @if($errors->has('type_tahograf'))
                    <span class="text-danger">{{ $errors->first('type_tahograf') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.auto.fields.type_tahograf_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="fuel">{{ trans('cruds.auto.fields.fuel') }}</label>
                <input class="form-control {{ $errors->has('fuel') ? 'is-invalid' : '' }}" type="text" name="fuel" id="fuel" value="{{ old('fuel', $auto->fuel) }}">
                @if($errors->has('fuel'))
                    <span class="text-danger">{{ $errors->first('fuel') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.auto.fields.fuel_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="typeloads">{{ trans('cruds.auto.fields.typeload') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('typeloads') ? 'is-invalid' : '' }}" name="typeloads[]" id="typeloads" multiple>
                    @foreach($typeloads as $id => $typeload)
                        <option value="{{ $id }}" {{ (in_array($id, old('typeloads', [])) || $auto->typeloads->contains($id)) ? 'selected' : '' }}>{{ $typeload }}</option>
                    @endforeach
                </select>
                @if($errors->has('typeloads'))
                    <span class="text-danger">{{ $errors->first('typeloads') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.auto.fields.typeload_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="gidrolift">{{ trans('cruds.auto.fields.gidrolift') }}</label>
                <input class="form-control {{ $errors->has('gidrolift') ? 'is-invalid' : '' }}" type="text" name="gidrolift" id="gidrolift" value="{{ old('gidrolift', $auto->gidrolift) }}">
                @if($errors->has('gidrolift'))
                    <span class="text-danger">{{ $errors->first('gidrolift') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.auto.fields.gidrolift_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('koniki') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="koniki" value="0">
                    <input class="form-check-input" type="checkbox" name="koniki" id="koniki" value="1" {{ $auto->koniki || old('koniki', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="koniki">{{ trans('cruds.auto.fields.koniki') }}</label>
                </div>
                @if($errors->has('koniki'))
                    <span class="text-danger">{{ $errors->first('koniki') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.auto.fields.koniki_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="adrs">{{ trans('cruds.auto.fields.adr') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('adrs') ? 'is-invalid' : '' }}" name="adrs[]" id="adrs" multiple>
                    @foreach($adrs as $id => $adr)
                        <option value="{{ $id }}" {{ (in_array($id, old('adrs', [])) || $auto->adrs->contains($id)) ? 'selected' : '' }}>{{ $adr }}</option>
                    @endforeach
                </select>
                @if($errors->has('adrs'))
                    <span class="text-danger">{{ $errors->first('adrs') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.auto.fields.adr_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('ekmt') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="ekmt" value="0">
                    <input class="form-check-input" type="checkbox" name="ekmt" id="ekmt" value="1" {{ $auto->ekmt || old('ekmt', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="ekmt">{{ trans('cruds.auto.fields.ekmt') }}</label>
                </div>
                @if($errors->has('ekmt'))
                    <span class="text-danger">{{ $errors->first('ekmt') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.auto.fields.ekmt_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('remni') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="remni" value="0">
                    <input class="form-check-input" type="checkbox" name="remni" id="remni" value="1" {{ $auto->remni || old('remni', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="remni">{{ trans('cruds.auto.fields.remni') }}</label>
                </div>
                @if($errors->has('remni'))
                    <span class="text-danger">{{ $errors->first('remni') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.auto.fields.remni_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="palet">{{ trans('cruds.auto.fields.palet') }}</label>
                <input class="form-control {{ $errors->has('palet') ? 'is-invalid' : '' }}" type="text" name="palet" id="palet" value="{{ old('palet', $auto->palet) }}">
                @if($errors->has('palet'))
                    <span class="text-danger">{{ $errors->first('palet') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.auto.fields.palet_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.auto.fields.type_kabin') }}</label>
                @foreach(App\Models\Auto::TYPE_KABIN_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('type_kabin') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="type_kabin_{{ $key }}" name="type_kabin" value="{{ $key }}" {{ old('type_kabin', $auto->type_kabin) === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="type_kabin_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('type_kabin'))
                    <span class="text-danger">{{ $errors->first('type_kabin') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.auto.fields.type_kabin_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.auto.fields.engine_type') }}</label>
                @foreach(App\Models\Auto::ENGINE_TYPE_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('engine_type') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="engine_type_{{ $key }}" name="engine_type" value="{{ $key }}" {{ old('engine_type', $auto->engine_type) === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="engine_type_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('engine_type'))
                    <span class="text-danger">{{ $errors->first('engine_type') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.auto.fields.engine_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="volume">{{ trans('cruds.auto.fields.volume') }}</label>
                <input class="form-control {{ $errors->has('volume') ? 'is-invalid' : '' }}" type="text" name="volume" id="volume" value="{{ old('volume', $auto->volume) }}">
                @if($errors->has('volume'))
                    <span class="text-danger">{{ $errors->first('volume') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.auto.fields.volume_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="gruzopod">{{ trans('cruds.auto.fields.gruzopod') }}</label>
                <input class="form-control {{ $errors->has('gruzopod') ? 'is-invalid' : '' }}" type="text" name="gruzopod" id="gruzopod" value="{{ old('gruzopod', $auto->gruzopod) }}">
                @if($errors->has('gruzopod'))
                    <span class="text-danger">{{ $errors->first('gruzopod') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.auto.fields.gruzopod_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('dogruz') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="dogruz" value="0">
                    <input class="form-check-input" type="checkbox" name="dogruz" id="dogruz" value="1" {{ $auto->dogruz || old('dogruz', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="dogruz">{{ trans('cruds.auto.fields.dogruz') }}</label>
                </div>
                @if($errors->has('dogruz'))
                    <span class="text-danger">{{ $errors->first('dogruz') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.auto.fields.dogruz_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="operator_gps">{{ trans('cruds.auto.fields.operator_gps') }}</label>
                <input class="form-control {{ $errors->has('operator_gps') ? 'is-invalid' : '' }}" type="text" name="operator_gps" id="operator_gps" value="{{ old('operator_gps', $auto->operator_gps) }}">
                @if($errors->has('operator_gps'))
                    <span class="text-danger">{{ $errors->first('operator_gps') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.auto.fields.operator_gps_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="nomer_dat_gps">{{ trans('cruds.auto.fields.nomer_dat_gps') }}</label>
                <input class="form-control {{ $errors->has('nomer_dat_gps') ? 'is-invalid' : '' }}" type="text" name="nomer_dat_gps" id="nomer_dat_gps" value="{{ old('nomer_dat_gps', $auto->nomer_dat_gps) }}">
                @if($errors->has('nomer_dat_gps'))
                    <span class="text-danger">{{ $errors->first('nomer_dat_gps') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.auto.fields.nomer_dat_gps_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="nomer_mac">{{ trans('cruds.auto.fields.nomer_mac') }}</label>
                <input class="form-control {{ $errors->has('nomer_mac') ? 'is-invalid' : '' }}" type="text" name="nomer_mac" id="nomer_mac" value="{{ old('nomer_mac', $auto->nomer_mac) }}">
                @if($errors->has('nomer_mac'))
                    <span class="text-danger">{{ $errors->first('nomer_mac') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.auto.fields.nomer_mac_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('rozisk') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="rozisk" value="0">
                    <input class="form-check-input" type="checkbox" name="rozisk" id="rozisk" value="1" {{ $auto->rozisk || old('rozisk', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="rozisk">{{ trans('cruds.auto.fields.rozisk') }}</label>
                </div>
                @if($errors->has('rozisk'))
                    <span class="text-danger">{{ $errors->first('rozisk') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.auto.fields.rozisk_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('zalog') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="zalog" value="0">
                    <input class="form-check-input" type="checkbox" name="zalog" id="zalog" value="1" {{ $auto->zalog || old('zalog', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="zalog">{{ trans('cruds.auto.fields.zalog') }}</label>
                </div>
                @if($errors->has('zalog'))
                    <span class="text-danger">{{ $errors->first('zalog') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.auto.fields.zalog_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('htraf_gibdd') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="htraf_gibdd" value="0">
                    <input class="form-check-input" type="checkbox" name="htraf_gibdd" id="htraf_gibdd" value="1" {{ $auto->htraf_gibdd || old('htraf_gibdd', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="htraf_gibdd">{{ trans('cruds.auto.fields.htraf_gibdd') }}</label>
                </div>
                @if($errors->has('htraf_gibdd'))
                    <span class="text-danger">{{ $errors->first('htraf_gibdd') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.auto.fields.htraf_gibdd_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="ob_type">{{ trans('cruds.auto.fields.ob_type') }}</label>
                <input class="form-control {{ $errors->has('ob_type') ? 'is-invalid' : '' }}" type="text" name="ob_type" id="ob_type" value="{{ old('ob_type', $auto->ob_type) }}">
                @if($errors->has('ob_type'))
                    <span class="text-danger">{{ $errors->first('ob_type') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.auto.fields.ob_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="op_nemer">{{ trans('cruds.auto.fields.op_nemer') }}</label>
                <input class="form-control {{ $errors->has('op_nemer') ? 'is-invalid' : '' }}" type="text" name="op_nemer" id="op_nemer" value="{{ old('op_nemer', $auto->op_nemer) }}">
                @if($errors->has('op_nemer'))
                    <span class="text-danger">{{ $errors->first('op_nemer') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.auto.fields.op_nemer_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="ob_date_ot">{{ trans('cruds.auto.fields.ob_date_ot') }}</label>
                <input class="form-control date {{ $errors->has('ob_date_ot') ? 'is-invalid' : '' }}" type="text" name="ob_date_ot" id="ob_date_ot" value="{{ old('ob_date_ot', $auto->ob_date_ot) }}">
                @if($errors->has('ob_date_ot'))
                    <span class="text-danger">{{ $errors->first('ob_date_ot') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.auto.fields.ob_date_ot_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="ka_type">{{ trans('cruds.auto.fields.ka_type') }}</label>
                <input class="form-control {{ $errors->has('ka_type') ? 'is-invalid' : '' }}" type="text" name="ka_type" id="ka_type" value="{{ old('ka_type', $auto->ka_type) }}">
                @if($errors->has('ka_type'))
                    <span class="text-danger">{{ $errors->first('ka_type') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.auto.fields.ka_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="ka_nomer">{{ trans('cruds.auto.fields.ka_nomer') }}</label>
                <input class="form-control {{ $errors->has('ka_nomer') ? 'is-invalid' : '' }}" type="text" name="ka_nomer" id="ka_nomer" value="{{ old('ka_nomer', $auto->ka_nomer) }}">
                @if($errors->has('ka_nomer'))
                    <span class="text-danger">{{ $errors->first('ka_nomer') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.auto.fields.ka_nomer_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="ka_date_ot">{{ trans('cruds.auto.fields.ka_date_ot') }}</label>
                <input class="form-control date {{ $errors->has('ka_date_ot') ? 'is-invalid' : '' }}" type="text" name="ka_date_ot" id="ka_date_ot" value="{{ old('ka_date_ot', $auto->ka_date_ot) }}">
                @if($errors->has('ka_date_ot'))
                    <span class="text-danger">{{ $errors->first('ka_date_ot') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.auto.fields.ka_date_ot_helper') }}</span>
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

@section('scripts')
<script>
    Dropzone.options.ptPervDropzone = {
    url: '{{ route('admin.autos.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="pt_perv"]').remove()
      $('form').append('<input type="hidden" name="pt_perv" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="pt_perv"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($auto) && $auto->pt_perv)
      var file = {!! json_encode($auto->pt_perv) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="pt_perv" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}
</script>
<script>
    Dropzone.options.ptVtorDropzone = {
    url: '{{ route('admin.autos.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="pt_vtor"]').remove()
      $('form').append('<input type="hidden" name="pt_vtor" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="pt_vtor"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($auto) && $auto->pt_vtor)
      var file = {!! json_encode($auto->pt_vtor) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="pt_vtor" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}
</script>
@endsection