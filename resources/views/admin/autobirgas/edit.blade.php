@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.autobirga.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.autobirgas.update", [$autobirga->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="typekuz_id">{{ trans('cruds.autobirga.fields.typekuz') }}</label>
                <select class="form-control select2 {{ $errors->has('typekuz') ? 'is-invalid' : '' }}" name="typekuz_id" id="typekuz_id">
                    @foreach($typekuzs as $id => $entry)
                        <option value="{{ $id }}" {{ (old('typekuz_id') ? old('typekuz_id') : $autobirga->typekuz->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('typekuz'))
                    <span class="text-danger">{{ $errors->first('typekuz') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.autobirga.fields.typekuz_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.autobirga.fields.autotype') }}</label>
                @foreach(App\Models\Autobirga::AUTOTYPE_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('autotype') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="autotype_{{ $key }}" name="autotype" value="{{ $key }}" {{ old('autotype', $autobirga->autotype) === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="autotype_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('autotype'))
                    <span class="text-danger">{{ $errors->first('autotype') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.autobirga.fields.autotype_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="typeloads">{{ trans('cruds.autobirga.fields.typeload') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('typeloads') ? 'is-invalid' : '' }}" name="typeloads[]" id="typeloads" multiple>
                    @foreach($typeloads as $id => $typeload)
                        <option value="{{ $id }}" {{ (in_array($id, old('typeloads', [])) || $autobirga->typeloads->contains($id)) ? 'selected' : '' }}>{{ $typeload }}</option>
                    @endforeach
                </select>
                @if($errors->has('typeloads'))
                    <span class="text-danger">{{ $errors->first('typeloads') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.autobirga.fields.typeload_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('loverh') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="loverh" value="0">
                    <input class="form-check-input" type="checkbox" name="loverh" id="loverh" value="1" {{ $autobirga->loverh || old('loverh', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="loverh">{{ trans('cruds.autobirga.fields.loverh') }}</label>
                </div>
                @if($errors->has('loverh'))
                    <span class="text-danger">{{ $errors->first('loverh') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.autobirga.fields.loverh_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('lobok') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="lobok" value="0">
                    <input class="form-check-input" type="checkbox" name="lobok" id="lobok" value="1" {{ $autobirga->lobok || old('lobok', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="lobok">{{ trans('cruds.autobirga.fields.lobok') }}</label>
                </div>
                @if($errors->has('lobok'))
                    <span class="text-danger">{{ $errors->first('lobok') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.autobirga.fields.lobok_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('lozad') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="lozad" value="0">
                    <input class="form-check-input" type="checkbox" name="lozad" id="lozad" value="1" {{ $autobirga->lozad || old('lozad', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="lozad">{{ trans('cruds.autobirga.fields.lozad') }}</label>
                </div>
                @if($errors->has('lozad'))
                    <span class="text-danger">{{ $errors->first('lozad') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.autobirga.fields.lozad_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('lopoln') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="lopoln" value="0">
                    <input class="form-check-input" type="checkbox" name="lopoln" id="lopoln" value="1" {{ $autobirga->lopoln || old('lopoln', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="lopoln">{{ trans('cruds.autobirga.fields.lopoln') }}</label>
                </div>
                @if($errors->has('lopoln'))
                    <span class="text-danger">{{ $errors->first('lopoln') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.autobirga.fields.lopoln_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('lopop') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="lopop" value="0">
                    <input class="form-check-input" type="checkbox" name="lopop" id="lopop" value="1" {{ $autobirga->lopop || old('lopop', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="lopop">{{ trans('cruds.autobirga.fields.lopop') }}</label>
                </div>
                @if($errors->has('lopop'))
                    <span class="text-danger">{{ $errors->first('lopop') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.autobirga.fields.lopop_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('lotoiki') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="lotoiki" value="0">
                    <input class="form-check-input" type="checkbox" name="lotoiki" id="lotoiki" value="1" {{ $autobirga->lotoiki || old('lotoiki', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="lotoiki">{{ trans('cruds.autobirga.fields.lotoiki') }}</label>
                </div>
                @if($errors->has('lotoiki'))
                    <span class="text-danger">{{ $errors->first('lotoiki') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.autobirga.fields.lotoiki_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('lovorot') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="lovorot" value="0">
                    <input class="form-check-input" type="checkbox" name="lovorot" id="lovorot" value="1" {{ $autobirga->lovorot || old('lovorot', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="lovorot">{{ trans('cruds.autobirga.fields.lovorot') }}</label>
                </div>
                @if($errors->has('lovorot'))
                    <span class="text-danger">{{ $errors->first('lovorot') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.autobirga.fields.lovorot_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('logidrobort') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="logidrobort" value="0">
                    <input class="form-check-input" type="checkbox" name="logidrobort" id="logidrobort" value="1" {{ $autobirga->logidrobort || old('logidrobort', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="logidrobort">{{ trans('cruds.autobirga.fields.logidrobort') }}</label>
                </div>
                @if($errors->has('logidrobort'))
                    <span class="text-danger">{{ $errors->first('logidrobort') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.autobirga.fields.logidrobort_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('loapp') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="loapp" value="0">
                    <input class="form-check-input" type="checkbox" name="loapp" id="loapp" value="1" {{ $autobirga->loapp || old('loapp', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="loapp">{{ trans('cruds.autobirga.fields.loapp') }}</label>
                </div>
                @if($errors->has('loapp'))
                    <span class="text-danger">{{ $errors->first('loapp') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.autobirga.fields.loapp_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('lobreh') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="lobreh" value="0">
                    <input class="form-check-input" type="checkbox" name="lobreh" id="lobreh" value="1" {{ $autobirga->lobreh || old('lobreh', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="lobreh">{{ trans('cruds.autobirga.fields.lobreh') }}</label>
                </div>
                @if($errors->has('lobreh'))
                    <span class="text-danger">{{ $errors->first('lobreh') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.autobirga.fields.lobreh_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('lobort') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="lobort" value="0">
                    <input class="form-check-input" type="checkbox" name="lobort" id="lobort" value="1" {{ $autobirga->lobort || old('lobort', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="lobort">{{ trans('cruds.autobirga.fields.lobort') }}</label>
                </div>
                @if($errors->has('lobort'))
                    <span class="text-danger">{{ $errors->first('lobort') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.autobirga.fields.lobort_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('loboko') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="loboko" value="0">
                    <input class="form-check-input" type="checkbox" name="loboko" id="loboko" value="1" {{ $autobirga->loboko || old('loboko', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="loboko">{{ trans('cruds.autobirga.fields.loboko') }}</label>
                </div>
                @if($errors->has('loboko'))
                    <span class="text-danger">{{ $errors->first('loboko') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.autobirga.fields.loboko_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('dogruz') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="dogruz" value="0">
                    <input class="form-check-input" type="checkbox" name="dogruz" id="dogruz" value="1" {{ $autobirga->dogruz || old('dogruz', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="dogruz">{{ trans('cruds.autobirga.fields.dogruz') }}</label>
                </div>
                @if($errors->has('dogruz'))
                    <span class="text-danger">{{ $errors->first('dogruz') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.autobirga.fields.dogruz_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('hydrolift') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="hydrolift" value="0">
                    <input class="form-check-input" type="checkbox" name="hydrolift" id="hydrolift" value="1" {{ $autobirga->hydrolift || old('hydrolift', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="hydrolift">{{ trans('cruds.autobirga.fields.hydrolift') }}</label>
                </div>
                @if($errors->has('hydrolift'))
                    <span class="text-danger">{{ $errors->first('hydrolift') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.autobirga.fields.hydrolift_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('koniki') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="koniki" value="0">
                    <input class="form-check-input" type="checkbox" name="koniki" id="koniki" value="1" {{ $autobirga->koniki || old('koniki', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="koniki">{{ trans('cruds.autobirga.fields.koniki') }}</label>
                </div>
                @if($errors->has('koniki'))
                    <span class="text-danger">{{ $errors->first('koniki') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.autobirga.fields.koniki_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="gruzoton">{{ trans('cruds.autobirga.fields.gruzoton') }}</label>
                <input class="form-control {{ $errors->has('gruzoton') ? 'is-invalid' : '' }}" type="number" name="gruzoton" id="gruzoton" value="{{ old('gruzoton', $autobirga->gruzoton) }}" step="0.01" max="25">
                @if($errors->has('gruzoton'))
                    <span class="text-danger">{{ $errors->first('gruzoton') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.autobirga.fields.gruzoton_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="volume">{{ trans('cruds.autobirga.fields.volume') }}</label>
                <input class="form-control {{ $errors->has('volume') ? 'is-invalid' : '' }}" type="number" name="volume" id="volume" value="{{ old('volume', $autobirga->volume) }}" step="0.01">
                @if($errors->has('volume'))
                    <span class="text-danger">{{ $errors->first('volume') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.autobirga.fields.volume_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="length">{{ trans('cruds.autobirga.fields.length') }}</label>
                <input class="form-control {{ $errors->has('length') ? 'is-invalid' : '' }}" type="number" name="length" id="length" value="{{ old('length', $autobirga->length) }}" step="0.01">
                @if($errors->has('length'))
                    <span class="text-danger">{{ $errors->first('length') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.autobirga.fields.length_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="width">{{ trans('cruds.autobirga.fields.width') }}</label>
                <input class="form-control {{ $errors->has('width') ? 'is-invalid' : '' }}" type="number" name="width" id="width" value="{{ old('width', $autobirga->width) }}" step="0.01">
                @if($errors->has('width'))
                    <span class="text-danger">{{ $errors->first('width') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.autobirga.fields.width_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="height">{{ trans('cruds.autobirga.fields.height') }}</label>
                <input class="form-control {{ $errors->has('height') ? 'is-invalid' : '' }}" type="number" name="height" id="height" value="{{ old('height', $autobirga->height) }}" step="0.01">
                @if($errors->has('height'))
                    <span class="text-danger">{{ $errors->first('height') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.autobirga.fields.height_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="lengthpri">{{ trans('cruds.autobirga.fields.lengthpri') }}</label>
                <input class="form-control {{ $errors->has('lengthpri') ? 'is-invalid' : '' }}" type="number" name="lengthpri" id="lengthpri" value="{{ old('lengthpri', $autobirga->lengthpri) }}" step="0.01">
                @if($errors->has('lengthpri'))
                    <span class="text-danger">{{ $errors->first('lengthpri') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.autobirga.fields.lengthpri_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="widthpri">{{ trans('cruds.autobirga.fields.widthpri') }}</label>
                <input class="form-control {{ $errors->has('widthpri') ? 'is-invalid' : '' }}" type="number" name="widthpri" id="widthpri" value="{{ old('widthpri', $autobirga->widthpri) }}" step="0.01">
                @if($errors->has('widthpri'))
                    <span class="text-danger">{{ $errors->first('widthpri') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.autobirga.fields.widthpri_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="heightpri">{{ trans('cruds.autobirga.fields.heightpri') }}</label>
                <input class="form-control {{ $errors->has('heightpri') ? 'is-invalid' : '' }}" type="number" name="heightpri" id="heightpri" value="{{ old('heightpri', $autobirga->heightpri) }}" step="0.01">
                @if($errors->has('heightpri'))
                    <span class="text-danger">{{ $errors->first('heightpri') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.autobirga.fields.heightpri_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('tir') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="tir" value="0">
                    <input class="form-check-input" type="checkbox" name="tir" id="tir" value="1" {{ $autobirga->tir || old('tir', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="tir">{{ trans('cruds.autobirga.fields.tir') }}</label>
                </div>
                @if($errors->has('tir'))
                    <span class="text-danger">{{ $errors->first('tir') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.autobirga.fields.tir_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('ekmt') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="ekmt" value="0">
                    <input class="form-check-input" type="checkbox" name="ekmt" id="ekmt" value="1" {{ $autobirga->ekmt || old('ekmt', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="ekmt">{{ trans('cruds.autobirga.fields.ekmt') }}</label>
                </div>
                @if($errors->has('ekmt'))
                    <span class="text-danger">{{ $errors->first('ekmt') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.autobirga.fields.ekmt_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="adrs">{{ trans('cruds.autobirga.fields.adr') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('adrs') ? 'is-invalid' : '' }}" name="adrs[]" id="adrs" multiple>
                    @foreach($adrs as $id => $adr)
                        <option value="{{ $id }}" {{ (in_array($id, old('adrs', [])) || $autobirga->adrs->contains($id)) ? 'selected' : '' }}>{{ $adr }}</option>
                    @endforeach
                </select>
                @if($errors->has('adrs'))
                    <span class="text-danger">{{ $errors->first('adrs') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.autobirga.fields.adr_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="fromcou_id">{{ trans('cruds.autobirga.fields.fromcou') }}</label>
                <select class="form-control select2 {{ $errors->has('fromcou') ? 'is-invalid' : '' }}" name="fromcou_id" id="fromcou_id">
                    @foreach($fromcous as $id => $entry)
                        <option value="{{ $id }}" {{ (old('fromcou_id') ? old('fromcou_id') : $autobirga->fromcou->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('fromcou'))
                    <span class="text-danger">{{ $errors->first('fromcou') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.autobirga.fields.fromcou_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="fromzip">{{ trans('cruds.autobirga.fields.fromzip') }}</label>
                <input class="form-control {{ $errors->has('fromzip') ? 'is-invalid' : '' }}" type="text" name="fromzip" id="fromzip" value="{{ old('fromzip', $autobirga->fromzip) }}">
                @if($errors->has('fromzip'))
                    <span class="text-danger">{{ $errors->first('fromzip') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.autobirga.fields.fromzip_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="fromregion">{{ trans('cruds.autobirga.fields.fromregion') }}</label>
                <input class="form-control {{ $errors->has('fromregion') ? 'is-invalid' : '' }}" type="text" name="fromregion" id="fromregion" value="{{ old('fromregion', $autobirga->fromregion) }}">
                @if($errors->has('fromregion'))
                    <span class="text-danger">{{ $errors->first('fromregion') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.autobirga.fields.fromregion_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="fromcity">{{ trans('cruds.autobirga.fields.fromcity') }}</label>
                <input class="form-control {{ $errors->has('fromcity') ? 'is-invalid' : '' }}" type="text" name="fromcity" id="fromcity" value="{{ old('fromcity', $autobirga->fromcity) }}">
                @if($errors->has('fromcity'))
                    <span class="text-danger">{{ $errors->first('fromcity') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.autobirga.fields.fromcity_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="fromulitca">{{ trans('cruds.autobirga.fields.fromulitca') }}</label>
                <input class="form-control {{ $errors->has('fromulitca') ? 'is-invalid' : '' }}" type="text" name="fromulitca" id="fromulitca" value="{{ old('fromulitca', $autobirga->fromulitca) }}">
                @if($errors->has('fromulitca'))
                    <span class="text-danger">{{ $errors->first('fromulitca') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.autobirga.fields.fromulitca_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="fromdom">{{ trans('cruds.autobirga.fields.fromdom') }}</label>
                <input class="form-control {{ $errors->has('fromdom') ? 'is-invalid' : '' }}" type="text" name="fromdom" id="fromdom" value="{{ old('fromdom', $autobirga->fromdom) }}">
                @if($errors->has('fromdom'))
                    <span class="text-danger">{{ $errors->first('fromdom') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.autobirga.fields.fromdom_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="fromlong">{{ trans('cruds.autobirga.fields.fromlong') }}</label>
                <input class="form-control {{ $errors->has('fromlong') ? 'is-invalid' : '' }}" type="text" name="fromlong" id="fromlong" value="{{ old('fromlong', $autobirga->fromlong) }}">
                @if($errors->has('fromlong'))
                    <span class="text-danger">{{ $errors->first('fromlong') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.autobirga.fields.fromlong_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="fromlat">{{ trans('cruds.autobirga.fields.fromlat') }}</label>
                <input class="form-control {{ $errors->has('fromlat') ? 'is-invalid' : '' }}" type="text" name="fromlat" id="fromlat" value="{{ old('fromlat', $autobirga->fromlat) }}">
                @if($errors->has('fromlat'))
                    <span class="text-danger">{{ $errors->first('fromlat') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.autobirga.fields.fromlat_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="fromrad">{{ trans('cruds.autobirga.fields.fromrad') }}</label>
                <input class="form-control {{ $errors->has('fromrad') ? 'is-invalid' : '' }}" type="text" name="fromrad" id="fromrad" value="{{ old('fromrad', $autobirga->fromrad) }}">
                @if($errors->has('fromrad'))
                    <span class="text-danger">{{ $errors->first('fromrad') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.autobirga.fields.fromrad_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="tocou">{{ trans('cruds.autobirga.fields.tocou') }}</label>
                <input class="form-control {{ $errors->has('tocou') ? 'is-invalid' : '' }}" type="text" name="tocou" id="tocou" value="{{ old('tocou', $autobirga->tocou) }}">
                @if($errors->has('tocou'))
                    <span class="text-danger">{{ $errors->first('tocou') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.autobirga.fields.tocou_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="tozip">{{ trans('cruds.autobirga.fields.tozip') }}</label>
                <input class="form-control {{ $errors->has('tozip') ? 'is-invalid' : '' }}" type="text" name="tozip" id="tozip" value="{{ old('tozip', $autobirga->tozip) }}">
                @if($errors->has('tozip'))
                    <span class="text-danger">{{ $errors->first('tozip') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.autobirga.fields.tozip_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="toregion">{{ trans('cruds.autobirga.fields.toregion') }}</label>
                <input class="form-control {{ $errors->has('toregion') ? 'is-invalid' : '' }}" type="text" name="toregion" id="toregion" value="{{ old('toregion', $autobirga->toregion) }}">
                @if($errors->has('toregion'))
                    <span class="text-danger">{{ $errors->first('toregion') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.autobirga.fields.toregion_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="tocity">{{ trans('cruds.autobirga.fields.tocity') }}</label>
                <input class="form-control {{ $errors->has('tocity') ? 'is-invalid' : '' }}" type="text" name="tocity" id="tocity" value="{{ old('tocity', $autobirga->tocity) }}">
                @if($errors->has('tocity'))
                    <span class="text-danger">{{ $errors->first('tocity') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.autobirga.fields.tocity_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="toulitca">{{ trans('cruds.autobirga.fields.toulitca') }}</label>
                <input class="form-control {{ $errors->has('toulitca') ? 'is-invalid' : '' }}" type="text" name="toulitca" id="toulitca" value="{{ old('toulitca', $autobirga->toulitca) }}">
                @if($errors->has('toulitca'))
                    <span class="text-danger">{{ $errors->first('toulitca') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.autobirga.fields.toulitca_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="todom">{{ trans('cruds.autobirga.fields.todom') }}</label>
                <input class="form-control {{ $errors->has('todom') ? 'is-invalid' : '' }}" type="text" name="todom" id="todom" value="{{ old('todom', $autobirga->todom) }}">
                @if($errors->has('todom'))
                    <span class="text-danger">{{ $errors->first('todom') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.autobirga.fields.todom_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="tolong">{{ trans('cruds.autobirga.fields.tolong') }}</label>
                <input class="form-control {{ $errors->has('tolong') ? 'is-invalid' : '' }}" type="text" name="tolong" id="tolong" value="{{ old('tolong', $autobirga->tolong) }}">
                @if($errors->has('tolong'))
                    <span class="text-danger">{{ $errors->first('tolong') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.autobirga.fields.tolong_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="tolat">{{ trans('cruds.autobirga.fields.tolat') }}</label>
                <input class="form-control {{ $errors->has('tolat') ? 'is-invalid' : '' }}" type="text" name="tolat" id="tolat" value="{{ old('tolat', $autobirga->tolat) }}">
                @if($errors->has('tolat'))
                    <span class="text-danger">{{ $errors->first('tolat') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.autobirga.fields.tolat_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="torad">{{ trans('cruds.autobirga.fields.torad') }}</label>
                <input class="form-control {{ $errors->has('torad') ? 'is-invalid' : '' }}" type="text" name="torad" id="torad" value="{{ old('torad', $autobirga->torad) }}">
                @if($errors->has('torad'))
                    <span class="text-danger">{{ $errors->first('torad') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.autobirga.fields.torad_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="dop_1_adr">{{ trans('cruds.autobirga.fields.dop_1_adr') }}</label>
                <input class="form-control {{ $errors->has('dop_1_adr') ? 'is-invalid' : '' }}" type="text" name="dop_1_adr" id="dop_1_adr" value="{{ old('dop_1_adr', $autobirga->dop_1_adr) }}">
                @if($errors->has('dop_1_adr'))
                    <span class="text-danger">{{ $errors->first('dop_1_adr') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.autobirga.fields.dop_1_adr_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="dop_1_rad">{{ trans('cruds.autobirga.fields.dop_1_rad') }}</label>
                <input class="form-control {{ $errors->has('dop_1_rad') ? 'is-invalid' : '' }}" type="text" name="dop_1_rad" id="dop_1_rad" value="{{ old('dop_1_rad', $autobirga->dop_1_rad) }}">
                @if($errors->has('dop_1_rad'))
                    <span class="text-danger">{{ $errors->first('dop_1_rad') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.autobirga.fields.dop_1_rad_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="dop_1_tot">{{ trans('cruds.autobirga.fields.dop_1_tot') }}</label>
                <input class="form-control {{ $errors->has('dop_1_tot') ? 'is-invalid' : '' }}" type="text" name="dop_1_tot" id="dop_1_tot" value="{{ old('dop_1_tot', $autobirga->dop_1_tot) }}">
                @if($errors->has('dop_1_tot'))
                    <span class="text-danger">{{ $errors->first('dop_1_tot') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.autobirga.fields.dop_1_tot_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="dop_1_val_id">{{ trans('cruds.autobirga.fields.dop_1_val') }}</label>
                <select class="form-control select2 {{ $errors->has('dop_1_val') ? 'is-invalid' : '' }}" name="dop_1_val_id" id="dop_1_val_id">
                    @foreach($dop_1_vals as $id => $entry)
                        <option value="{{ $id }}" {{ (old('dop_1_val_id') ? old('dop_1_val_id') : $autobirga->dop_1_val->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('dop_1_val'))
                    <span class="text-danger">{{ $errors->first('dop_1_val') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.autobirga.fields.dop_1_val_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="dop_1_typ_id">{{ trans('cruds.autobirga.fields.dop_1_typ') }}</label>
                <select class="form-control select2 {{ $errors->has('dop_1_typ') ? 'is-invalid' : '' }}" name="dop_1_typ_id" id="dop_1_typ_id">
                    @foreach($dop_1_typs as $id => $entry)
                        <option value="{{ $id }}" {{ (old('dop_1_typ_id') ? old('dop_1_typ_id') : $autobirga->dop_1_typ->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('dop_1_typ'))
                    <span class="text-danger">{{ $errors->first('dop_1_typ') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.autobirga.fields.dop_1_typ_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="dop_2_adr">{{ trans('cruds.autobirga.fields.dop_2_adr') }}</label>
                <input class="form-control {{ $errors->has('dop_2_adr') ? 'is-invalid' : '' }}" type="text" name="dop_2_adr" id="dop_2_adr" value="{{ old('dop_2_adr', $autobirga->dop_2_adr) }}">
                @if($errors->has('dop_2_adr'))
                    <span class="text-danger">{{ $errors->first('dop_2_adr') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.autobirga.fields.dop_2_adr_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="dop_2_rad">{{ trans('cruds.autobirga.fields.dop_2_rad') }}</label>
                <input class="form-control {{ $errors->has('dop_2_rad') ? 'is-invalid' : '' }}" type="text" name="dop_2_rad" id="dop_2_rad" value="{{ old('dop_2_rad', $autobirga->dop_2_rad) }}">
                @if($errors->has('dop_2_rad'))
                    <span class="text-danger">{{ $errors->first('dop_2_rad') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.autobirga.fields.dop_2_rad_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="dop_2_tot">{{ trans('cruds.autobirga.fields.dop_2_tot') }}</label>
                <input class="form-control {{ $errors->has('dop_2_tot') ? 'is-invalid' : '' }}" type="text" name="dop_2_tot" id="dop_2_tot" value="{{ old('dop_2_tot', $autobirga->dop_2_tot) }}">
                @if($errors->has('dop_2_tot'))
                    <span class="text-danger">{{ $errors->first('dop_2_tot') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.autobirga.fields.dop_2_tot_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="dop_3_adr">{{ trans('cruds.autobirga.fields.dop_3_adr') }}</label>
                <input class="form-control {{ $errors->has('dop_3_adr') ? 'is-invalid' : '' }}" type="text" name="dop_3_adr" id="dop_3_adr" value="{{ old('dop_3_adr', $autobirga->dop_3_adr) }}">
                @if($errors->has('dop_3_adr'))
                    <span class="text-danger">{{ $errors->first('dop_3_adr') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.autobirga.fields.dop_3_adr_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="dop_2_val_id">{{ trans('cruds.autobirga.fields.dop_2_val') }}</label>
                <select class="form-control select2 {{ $errors->has('dop_2_val') ? 'is-invalid' : '' }}" name="dop_2_val_id" id="dop_2_val_id">
                    @foreach($dop_2_vals as $id => $entry)
                        <option value="{{ $id }}" {{ (old('dop_2_val_id') ? old('dop_2_val_id') : $autobirga->dop_2_val->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('dop_2_val'))
                    <span class="text-danger">{{ $errors->first('dop_2_val') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.autobirga.fields.dop_2_val_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="dop_2_typ_id">{{ trans('cruds.autobirga.fields.dop_2_typ') }}</label>
                <select class="form-control select2 {{ $errors->has('dop_2_typ') ? 'is-invalid' : '' }}" name="dop_2_typ_id" id="dop_2_typ_id">
                    @foreach($dop_2_typs as $id => $entry)
                        <option value="{{ $id }}" {{ (old('dop_2_typ_id') ? old('dop_2_typ_id') : $autobirga->dop_2_typ->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('dop_2_typ'))
                    <span class="text-danger">{{ $errors->first('dop_2_typ') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.autobirga.fields.dop_2_typ_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="dop_3_rad">{{ trans('cruds.autobirga.fields.dop_3_rad') }}</label>
                <input class="form-control {{ $errors->has('dop_3_rad') ? 'is-invalid' : '' }}" type="text" name="dop_3_rad" id="dop_3_rad" value="{{ old('dop_3_rad', $autobirga->dop_3_rad) }}">
                @if($errors->has('dop_3_rad'))
                    <span class="text-danger">{{ $errors->first('dop_3_rad') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.autobirga.fields.dop_3_rad_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="dop_3_tot">{{ trans('cruds.autobirga.fields.dop_3_tot') }}</label>
                <input class="form-control {{ $errors->has('dop_3_tot') ? 'is-invalid' : '' }}" type="text" name="dop_3_tot" id="dop_3_tot" value="{{ old('dop_3_tot', $autobirga->dop_3_tot) }}">
                @if($errors->has('dop_3_tot'))
                    <span class="text-danger">{{ $errors->first('dop_3_tot') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.autobirga.fields.dop_3_tot_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="dop_3_val_id">{{ trans('cruds.autobirga.fields.dop_3_val') }}</label>
                <select class="form-control select2 {{ $errors->has('dop_3_val') ? 'is-invalid' : '' }}" name="dop_3_val_id" id="dop_3_val_id">
                    @foreach($dop_3_vals as $id => $entry)
                        <option value="{{ $id }}" {{ (old('dop_3_val_id') ? old('dop_3_val_id') : $autobirga->dop_3_val->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('dop_3_val'))
                    <span class="text-danger">{{ $errors->first('dop_3_val') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.autobirga.fields.dop_3_val_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="dop_3_typ_id">{{ trans('cruds.autobirga.fields.dop_3_typ') }}</label>
                <select class="form-control select2 {{ $errors->has('dop_3_typ') ? 'is-invalid' : '' }}" name="dop_3_typ_id" id="dop_3_typ_id">
                    @foreach($dop_3_typs as $id => $entry)
                        <option value="{{ $id }}" {{ (old('dop_3_typ_id') ? old('dop_3_typ_id') : $autobirga->dop_3_typ->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('dop_3_typ'))
                    <span class="text-danger">{{ $errors->first('dop_3_typ') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.autobirga.fields.dop_3_typ_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="dop_4_adr">{{ trans('cruds.autobirga.fields.dop_4_adr') }}</label>
                <input class="form-control {{ $errors->has('dop_4_adr') ? 'is-invalid' : '' }}" type="text" name="dop_4_adr" id="dop_4_adr" value="{{ old('dop_4_adr', $autobirga->dop_4_adr) }}">
                @if($errors->has('dop_4_adr'))
                    <span class="text-danger">{{ $errors->first('dop_4_adr') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.autobirga.fields.dop_4_adr_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="dop_4_rad">{{ trans('cruds.autobirga.fields.dop_4_rad') }}</label>
                <input class="form-control {{ $errors->has('dop_4_rad') ? 'is-invalid' : '' }}" type="text" name="dop_4_rad" id="dop_4_rad" value="{{ old('dop_4_rad', $autobirga->dop_4_rad) }}">
                @if($errors->has('dop_4_rad'))
                    <span class="text-danger">{{ $errors->first('dop_4_rad') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.autobirga.fields.dop_4_rad_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="dop_4_tot">{{ trans('cruds.autobirga.fields.dop_4_tot') }}</label>
                <input class="form-control {{ $errors->has('dop_4_tot') ? 'is-invalid' : '' }}" type="text" name="dop_4_tot" id="dop_4_tot" value="{{ old('dop_4_tot', $autobirga->dop_4_tot) }}">
                @if($errors->has('dop_4_tot'))
                    <span class="text-danger">{{ $errors->first('dop_4_tot') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.autobirga.fields.dop_4_tot_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="dop_4_val_id">{{ trans('cruds.autobirga.fields.dop_4_val') }}</label>
                <select class="form-control select2 {{ $errors->has('dop_4_val') ? 'is-invalid' : '' }}" name="dop_4_val_id" id="dop_4_val_id">
                    @foreach($dop_4_vals as $id => $entry)
                        <option value="{{ $id }}" {{ (old('dop_4_val_id') ? old('dop_4_val_id') : $autobirga->dop_4_val->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('dop_4_val'))
                    <span class="text-danger">{{ $errors->first('dop_4_val') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.autobirga.fields.dop_4_val_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="dop_4_typ_id">{{ trans('cruds.autobirga.fields.dop_4_typ') }}</label>
                <select class="form-control select2 {{ $errors->has('dop_4_typ') ? 'is-invalid' : '' }}" name="dop_4_typ_id" id="dop_4_typ_id">
                    @foreach($dop_4_typs as $id => $entry)
                        <option value="{{ $id }}" {{ (old('dop_4_typ_id') ? old('dop_4_typ_id') : $autobirga->dop_4_typ->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('dop_4_typ'))
                    <span class="text-danger">{{ $errors->first('dop_4_typ') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.autobirga.fields.dop_4_typ_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="dop_5_adr">{{ trans('cruds.autobirga.fields.dop_5_adr') }}</label>
                <input class="form-control {{ $errors->has('dop_5_adr') ? 'is-invalid' : '' }}" type="text" name="dop_5_adr" id="dop_5_adr" value="{{ old('dop_5_adr', $autobirga->dop_5_adr) }}">
                @if($errors->has('dop_5_adr'))
                    <span class="text-danger">{{ $errors->first('dop_5_adr') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.autobirga.fields.dop_5_adr_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="dop_5_rad">{{ trans('cruds.autobirga.fields.dop_5_rad') }}</label>
                <input class="form-control {{ $errors->has('dop_5_rad') ? 'is-invalid' : '' }}" type="text" name="dop_5_rad" id="dop_5_rad" value="{{ old('dop_5_rad', $autobirga->dop_5_rad) }}">
                @if($errors->has('dop_5_rad'))
                    <span class="text-danger">{{ $errors->first('dop_5_rad') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.autobirga.fields.dop_5_rad_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="dop_5_tot">{{ trans('cruds.autobirga.fields.dop_5_tot') }}</label>
                <input class="form-control {{ $errors->has('dop_5_tot') ? 'is-invalid' : '' }}" type="text" name="dop_5_tot" id="dop_5_tot" value="{{ old('dop_5_tot', $autobirga->dop_5_tot) }}">
                @if($errors->has('dop_5_tot'))
                    <span class="text-danger">{{ $errors->first('dop_5_tot') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.autobirga.fields.dop_5_tot_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="dop_5_val_id">{{ trans('cruds.autobirga.fields.dop_5_val') }}</label>
                <select class="form-control select2 {{ $errors->has('dop_5_val') ? 'is-invalid' : '' }}" name="dop_5_val_id" id="dop_5_val_id">
                    @foreach($dop_5_vals as $id => $entry)
                        <option value="{{ $id }}" {{ (old('dop_5_val_id') ? old('dop_5_val_id') : $autobirga->dop_5_val->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('dop_5_val'))
                    <span class="text-danger">{{ $errors->first('dop_5_val') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.autobirga.fields.dop_5_val_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="dop_5_typ_id">{{ trans('cruds.autobirga.fields.dop_5_typ') }}</label>
                <select class="form-control select2 {{ $errors->has('dop_5_typ') ? 'is-invalid' : '' }}" name="dop_5_typ_id" id="dop_5_typ_id">
                    @foreach($dop_5_typs as $id => $entry)
                        <option value="{{ $id }}" {{ (old('dop_5_typ_id') ? old('dop_5_typ_id') : $autobirga->dop_5_typ->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('dop_5_typ'))
                    <span class="text-danger">{{ $errors->first('dop_5_typ') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.autobirga.fields.dop_5_typ_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="dop_6_adr">{{ trans('cruds.autobirga.fields.dop_6_adr') }}</label>
                <input class="form-control {{ $errors->has('dop_6_adr') ? 'is-invalid' : '' }}" type="text" name="dop_6_adr" id="dop_6_adr" value="{{ old('dop_6_adr', $autobirga->dop_6_adr) }}">
                @if($errors->has('dop_6_adr'))
                    <span class="text-danger">{{ $errors->first('dop_6_adr') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.autobirga.fields.dop_6_adr_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="dop_6_rad">{{ trans('cruds.autobirga.fields.dop_6_rad') }}</label>
                <input class="form-control {{ $errors->has('dop_6_rad') ? 'is-invalid' : '' }}" type="text" name="dop_6_rad" id="dop_6_rad" value="{{ old('dop_6_rad', $autobirga->dop_6_rad) }}">
                @if($errors->has('dop_6_rad'))
                    <span class="text-danger">{{ $errors->first('dop_6_rad') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.autobirga.fields.dop_6_rad_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="dop_6_tot">{{ trans('cruds.autobirga.fields.dop_6_tot') }}</label>
                <input class="form-control {{ $errors->has('dop_6_tot') ? 'is-invalid' : '' }}" type="text" name="dop_6_tot" id="dop_6_tot" value="{{ old('dop_6_tot', $autobirga->dop_6_tot) }}">
                @if($errors->has('dop_6_tot'))
                    <span class="text-danger">{{ $errors->first('dop_6_tot') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.autobirga.fields.dop_6_tot_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="dop_6_val_id">{{ trans('cruds.autobirga.fields.dop_6_val') }}</label>
                <select class="form-control select2 {{ $errors->has('dop_6_val') ? 'is-invalid' : '' }}" name="dop_6_val_id" id="dop_6_val_id">
                    @foreach($dop_6_vals as $id => $entry)
                        <option value="{{ $id }}" {{ (old('dop_6_val_id') ? old('dop_6_val_id') : $autobirga->dop_6_val->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('dop_6_val'))
                    <span class="text-danger">{{ $errors->first('dop_6_val') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.autobirga.fields.dop_6_val_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="dop_6_typ_id">{{ trans('cruds.autobirga.fields.dop_6_typ') }}</label>
                <select class="form-control select2 {{ $errors->has('dop_6_typ') ? 'is-invalid' : '' }}" name="dop_6_typ_id" id="dop_6_typ_id">
                    @foreach($dop_6_typs as $id => $entry)
                        <option value="{{ $id }}" {{ (old('dop_6_typ_id') ? old('dop_6_typ_id') : $autobirga->dop_6_typ->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('dop_6_typ'))
                    <span class="text-danger">{{ $errors->first('dop_6_typ') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.autobirga.fields.dop_6_typ_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="dop_7_adr">{{ trans('cruds.autobirga.fields.dop_7_adr') }}</label>
                <input class="form-control {{ $errors->has('dop_7_adr') ? 'is-invalid' : '' }}" type="text" name="dop_7_adr" id="dop_7_adr" value="{{ old('dop_7_adr', $autobirga->dop_7_adr) }}">
                @if($errors->has('dop_7_adr'))
                    <span class="text-danger">{{ $errors->first('dop_7_adr') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.autobirga.fields.dop_7_adr_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="dop_7_rad">{{ trans('cruds.autobirga.fields.dop_7_rad') }}</label>
                <input class="form-control {{ $errors->has('dop_7_rad') ? 'is-invalid' : '' }}" type="text" name="dop_7_rad" id="dop_7_rad" value="{{ old('dop_7_rad', $autobirga->dop_7_rad) }}">
                @if($errors->has('dop_7_rad'))
                    <span class="text-danger">{{ $errors->first('dop_7_rad') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.autobirga.fields.dop_7_rad_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="dop_7_tot">{{ trans('cruds.autobirga.fields.dop_7_tot') }}</label>
                <input class="form-control {{ $errors->has('dop_7_tot') ? 'is-invalid' : '' }}" type="text" name="dop_7_tot" id="dop_7_tot" value="{{ old('dop_7_tot', $autobirga->dop_7_tot) }}">
                @if($errors->has('dop_7_tot'))
                    <span class="text-danger">{{ $errors->first('dop_7_tot') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.autobirga.fields.dop_7_tot_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="dop_7_val_id">{{ trans('cruds.autobirga.fields.dop_7_val') }}</label>
                <select class="form-control select2 {{ $errors->has('dop_7_val') ? 'is-invalid' : '' }}" name="dop_7_val_id" id="dop_7_val_id">
                    @foreach($dop_7_vals as $id => $entry)
                        <option value="{{ $id }}" {{ (old('dop_7_val_id') ? old('dop_7_val_id') : $autobirga->dop_7_val->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('dop_7_val'))
                    <span class="text-danger">{{ $errors->first('dop_7_val') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.autobirga.fields.dop_7_val_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="dop_7_typ_id">{{ trans('cruds.autobirga.fields.dop_7_typ') }}</label>
                <select class="form-control select2 {{ $errors->has('dop_7_typ') ? 'is-invalid' : '' }}" name="dop_7_typ_id" id="dop_7_typ_id">
                    @foreach($dop_7_typs as $id => $entry)
                        <option value="{{ $id }}" {{ (old('dop_7_typ_id') ? old('dop_7_typ_id') : $autobirga->dop_7_typ->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('dop_7_typ'))
                    <span class="text-danger">{{ $errors->first('dop_7_typ') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.autobirga.fields.dop_7_typ_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="dop_8_adr">{{ trans('cruds.autobirga.fields.dop_8_adr') }}</label>
                <input class="form-control {{ $errors->has('dop_8_adr') ? 'is-invalid' : '' }}" type="text" name="dop_8_adr" id="dop_8_adr" value="{{ old('dop_8_adr', $autobirga->dop_8_adr) }}">
                @if($errors->has('dop_8_adr'))
                    <span class="text-danger">{{ $errors->first('dop_8_adr') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.autobirga.fields.dop_8_adr_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="dop_8_rad">{{ trans('cruds.autobirga.fields.dop_8_rad') }}</label>
                <input class="form-control {{ $errors->has('dop_8_rad') ? 'is-invalid' : '' }}" type="text" name="dop_8_rad" id="dop_8_rad" value="{{ old('dop_8_rad', $autobirga->dop_8_rad) }}">
                @if($errors->has('dop_8_rad'))
                    <span class="text-danger">{{ $errors->first('dop_8_rad') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.autobirga.fields.dop_8_rad_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="dop_8_tot">{{ trans('cruds.autobirga.fields.dop_8_tot') }}</label>
                <input class="form-control {{ $errors->has('dop_8_tot') ? 'is-invalid' : '' }}" type="text" name="dop_8_tot" id="dop_8_tot" value="{{ old('dop_8_tot', $autobirga->dop_8_tot) }}">
                @if($errors->has('dop_8_tot'))
                    <span class="text-danger">{{ $errors->first('dop_8_tot') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.autobirga.fields.dop_8_tot_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="dop_8_val_id">{{ trans('cruds.autobirga.fields.dop_8_val') }}</label>
                <select class="form-control select2 {{ $errors->has('dop_8_val') ? 'is-invalid' : '' }}" name="dop_8_val_id" id="dop_8_val_id">
                    @foreach($dop_8_vals as $id => $entry)
                        <option value="{{ $id }}" {{ (old('dop_8_val_id') ? old('dop_8_val_id') : $autobirga->dop_8_val->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('dop_8_val'))
                    <span class="text-danger">{{ $errors->first('dop_8_val') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.autobirga.fields.dop_8_val_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="dop_8_typ_id">{{ trans('cruds.autobirga.fields.dop_8_typ') }}</label>
                <select class="form-control select2 {{ $errors->has('dop_8_typ') ? 'is-invalid' : '' }}" name="dop_8_typ_id" id="dop_8_typ_id">
                    @foreach($dop_8_typs as $id => $entry)
                        <option value="{{ $id }}" {{ (old('dop_8_typ_id') ? old('dop_8_typ_id') : $autobirga->dop_8_typ->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('dop_8_typ'))
                    <span class="text-danger">{{ $errors->first('dop_8_typ') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.autobirga.fields.dop_8_typ_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="dop_9_adr">{{ trans('cruds.autobirga.fields.dop_9_adr') }}</label>
                <input class="form-control {{ $errors->has('dop_9_adr') ? 'is-invalid' : '' }}" type="text" name="dop_9_adr" id="dop_9_adr" value="{{ old('dop_9_adr', $autobirga->dop_9_adr) }}">
                @if($errors->has('dop_9_adr'))
                    <span class="text-danger">{{ $errors->first('dop_9_adr') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.autobirga.fields.dop_9_adr_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="dop_9_rad">{{ trans('cruds.autobirga.fields.dop_9_rad') }}</label>
                <input class="form-control {{ $errors->has('dop_9_rad') ? 'is-invalid' : '' }}" type="text" name="dop_9_rad" id="dop_9_rad" value="{{ old('dop_9_rad', $autobirga->dop_9_rad) }}">
                @if($errors->has('dop_9_rad'))
                    <span class="text-danger">{{ $errors->first('dop_9_rad') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.autobirga.fields.dop_9_rad_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="dop_9_tot">{{ trans('cruds.autobirga.fields.dop_9_tot') }}</label>
                <input class="form-control {{ $errors->has('dop_9_tot') ? 'is-invalid' : '' }}" type="text" name="dop_9_tot" id="dop_9_tot" value="{{ old('dop_9_tot', $autobirga->dop_9_tot) }}">
                @if($errors->has('dop_9_tot'))
                    <span class="text-danger">{{ $errors->first('dop_9_tot') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.autobirga.fields.dop_9_tot_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="dop_9_typ_id">{{ trans('cruds.autobirga.fields.dop_9_typ') }}</label>
                <select class="form-control select2 {{ $errors->has('dop_9_typ') ? 'is-invalid' : '' }}" name="dop_9_typ_id" id="dop_9_typ_id">
                    @foreach($dop_9_typs as $id => $entry)
                        <option value="{{ $id }}" {{ (old('dop_9_typ_id') ? old('dop_9_typ_id') : $autobirga->dop_9_typ->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('dop_9_typ'))
                    <span class="text-danger">{{ $errors->first('dop_9_typ') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.autobirga.fields.dop_9_typ_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="dop_9_val_id">{{ trans('cruds.autobirga.fields.dop_9_val') }}</label>
                <select class="form-control select2 {{ $errors->has('dop_9_val') ? 'is-invalid' : '' }}" name="dop_9_val_id" id="dop_9_val_id">
                    @foreach($dop_9_vals as $id => $entry)
                        <option value="{{ $id }}" {{ (old('dop_9_val_id') ? old('dop_9_val_id') : $autobirga->dop_9_val->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('dop_9_val'))
                    <span class="text-danger">{{ $errors->first('dop_9_val') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.autobirga.fields.dop_9_val_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="dop_10_adr">{{ trans('cruds.autobirga.fields.dop_10_adr') }}</label>
                <input class="form-control {{ $errors->has('dop_10_adr') ? 'is-invalid' : '' }}" type="text" name="dop_10_adr" id="dop_10_adr" value="{{ old('dop_10_adr', $autobirga->dop_10_adr) }}">
                @if($errors->has('dop_10_adr'))
                    <span class="text-danger">{{ $errors->first('dop_10_adr') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.autobirga.fields.dop_10_adr_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="dop_10_rad">{{ trans('cruds.autobirga.fields.dop_10_rad') }}</label>
                <input class="form-control {{ $errors->has('dop_10_rad') ? 'is-invalid' : '' }}" type="text" name="dop_10_rad" id="dop_10_rad" value="{{ old('dop_10_rad', $autobirga->dop_10_rad) }}">
                @if($errors->has('dop_10_rad'))
                    <span class="text-danger">{{ $errors->first('dop_10_rad') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.autobirga.fields.dop_10_rad_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="dop_10_tot">{{ trans('cruds.autobirga.fields.dop_10_tot') }}</label>
                <input class="form-control {{ $errors->has('dop_10_tot') ? 'is-invalid' : '' }}" type="text" name="dop_10_tot" id="dop_10_tot" value="{{ old('dop_10_tot', $autobirga->dop_10_tot) }}">
                @if($errors->has('dop_10_tot'))
                    <span class="text-danger">{{ $errors->first('dop_10_tot') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.autobirga.fields.dop_10_tot_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="dop_10_val_id">{{ trans('cruds.autobirga.fields.dop_10_val') }}</label>
                <select class="form-control select2 {{ $errors->has('dop_10_val') ? 'is-invalid' : '' }}" name="dop_10_val_id" id="dop_10_val_id">
                    @foreach($dop_10_vals as $id => $entry)
                        <option value="{{ $id }}" {{ (old('dop_10_val_id') ? old('dop_10_val_id') : $autobirga->dop_10_val->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('dop_10_val'))
                    <span class="text-danger">{{ $errors->first('dop_10_val') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.autobirga.fields.dop_10_val_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="dop_10_typ_id">{{ trans('cruds.autobirga.fields.dop_10_typ') }}</label>
                <select class="form-control select2 {{ $errors->has('dop_10_typ') ? 'is-invalid' : '' }}" name="dop_10_typ_id" id="dop_10_typ_id">
                    @foreach($dop_10_typs as $id => $entry)
                        <option value="{{ $id }}" {{ (old('dop_10_typ_id') ? old('dop_10_typ_id') : $autobirga->dop_10_typ->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('dop_10_typ'))
                    <span class="text-danger">{{ $errors->first('dop_10_typ') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.autobirga.fields.dop_10_typ_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.autobirga.fields.readyload') }}</label>
                @foreach(App\Models\Autobirga::READYLOAD_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('readyload') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="readyload_{{ $key }}" name="readyload" value="{{ $key }}" {{ old('readyload', $autobirga->readyload) === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="readyload_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('readyload'))
                    <span class="text-danger">{{ $errors->first('readyload') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.autobirga.fields.readyload_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="dateload">{{ trans('cruds.autobirga.fields.dateload') }}</label>
                <input class="form-control date {{ $errors->has('dateload') ? 'is-invalid' : '' }}" type="text" name="dateload" id="dateload" value="{{ old('dateload', $autobirga->dateload) }}">
                @if($errors->has('dateload'))
                    <span class="text-danger">{{ $errors->first('dateload') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.autobirga.fields.dateload_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="dateloadplu">{{ trans('cruds.autobirga.fields.dateloadplu') }}</label>
                <input class="form-control date {{ $errors->has('dateloadplu') ? 'is-invalid' : '' }}" type="text" name="dateloadplu" id="dateloadplu" value="{{ old('dateloadplu', $autobirga->dateloadplu) }}">
                @if($errors->has('dateloadplu'))
                    <span class="text-danger">{{ $errors->first('dateloadplu') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.autobirga.fields.dateloadplu_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="type_load_id">{{ trans('cruds.autobirga.fields.type_load') }}</label>
                <select class="form-control select2 {{ $errors->has('type_load') ? 'is-invalid' : '' }}" name="type_load_id" id="type_load_id">
                    @foreach($type_loads as $id => $entry)
                        <option value="{{ $id }}" {{ (old('type_load_id') ? old('type_load_id') : $autobirga->type_load->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('type_load'))
                    <span class="text-danger">{{ $errors->first('type_load') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.autobirga.fields.type_load_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="oplatanal">{{ trans('cruds.autobirga.fields.oplatanal') }}</label>
                <input class="form-control {{ $errors->has('oplatanal') ? 'is-invalid' : '' }}" type="text" name="oplatanal" id="oplatanal" value="{{ old('oplatanal', $autobirga->oplatanal) }}">
                @if($errors->has('oplatanal'))
                    <span class="text-danger">{{ $errors->first('oplatanal') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.autobirga.fields.oplatanal_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="oplataval_id">{{ trans('cruds.autobirga.fields.oplataval') }}</label>
                <select class="form-control select2 {{ $errors->has('oplataval') ? 'is-invalid' : '' }}" name="oplataval_id" id="oplataval_id">
                    @foreach($oplatavals as $id => $entry)
                        <option value="{{ $id }}" {{ (old('oplataval_id') ? old('oplataval_id') : $autobirga->oplataval->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('oplataval'))
                    <span class="text-danger">{{ $errors->first('oplataval') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.autobirga.fields.oplataval_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="oplatawithnds">{{ trans('cruds.autobirga.fields.oplatawithnds') }}</label>
                <input class="form-control {{ $errors->has('oplatawithnds') ? 'is-invalid' : '' }}" type="text" name="oplatawithnds" id="oplatawithnds" value="{{ old('oplatawithnds', $autobirga->oplatawithnds) }}">
                @if($errors->has('oplatawithnds'))
                    <span class="text-danger">{{ $errors->first('oplatawithnds') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.autobirga.fields.oplatawithnds_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="oplatanonds">{{ trans('cruds.autobirga.fields.oplatanonds') }}</label>
                <input class="form-control {{ $errors->has('oplatanonds') ? 'is-invalid' : '' }}" type="text" name="oplatanonds" id="oplatanonds" value="{{ old('oplatanonds', $autobirga->oplatanonds) }}">
                @if($errors->has('oplatanonds'))
                    <span class="text-danger">{{ $errors->first('oplatanonds') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.autobirga.fields.oplatanonds_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="dopinfo">{{ trans('cruds.autobirga.fields.dopinfo') }}</label>
                <input class="form-control {{ $errors->has('dopinfo') ? 'is-invalid' : '' }}" type="text" name="dopinfo" id="dopinfo" value="{{ old('dopinfo', $autobirga->dopinfo) }}">
                @if($errors->has('dopinfo'))
                    <span class="text-danger">{{ $errors->first('dopinfo') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.autobirga.fields.dopinfo_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="contact_id">{{ trans('cruds.autobirga.fields.contact') }}</label>
                <select class="form-control select2 {{ $errors->has('contact') ? 'is-invalid' : '' }}" name="contact_id" id="contact_id">
                    @foreach($contacts as $id => $entry)
                        <option value="{{ $id }}" {{ (old('contact_id') ? old('contact_id') : $autobirga->contact->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('contact'))
                    <span class="text-danger">{{ $errors->first('contact') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.autobirga.fields.contact_helper') }}</span>
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