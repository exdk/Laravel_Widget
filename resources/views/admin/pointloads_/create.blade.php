@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.pointload.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.pointloads.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="sapid">{{ trans('cruds.pointload.fields.sapid') }}</label>
                <input class="form-control {{ $errors->has('sapid') ? 'is-invalid' : '' }}" type="text" name="sapid" id="sapid" value="{{ old('sapid', '') }}">
                @if($errors->has('sapid'))
                    <span class="text-danger">{{ $errors->first('sapid') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pointload.fields.sapid_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="title">{{ trans('cruds.pointload.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', '') }}" required>
                @if($errors->has('title'))
                    <span class="text-danger">{{ $errors->first('title') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pointload.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="gorod">{{ trans('cruds.pointload.fields.gorod') }}</label>
                <input class="form-control {{ $errors->has('gorod') ? 'is-invalid' : '' }}" type="text" name="gorod" id="gorod" value="{{ old('gorod', '') }}">
                @if($errors->has('gorod'))
                    <span class="text-danger">{{ $errors->first('gorod') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pointload.fields.gorod_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="country_id">{{ trans('cruds.pointload.fields.country') }}</label>
                <select class="form-control select2 {{ $errors->has('country') ? 'is-invalid' : '' }}" name="country_id" id="country_id">
                    @foreach($countries as $id => $entry)
                        <option value="{{ $id }}" {{ old('country_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('country'))
                    <span class="text-danger">{{ $errors->first('country') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pointload.fields.country_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="zip">{{ trans('cruds.pointload.fields.zip') }}</label>
                <input class="form-control {{ $errors->has('zip') ? 'is-invalid' : '' }}" type="text" name="zip" id="zip" value="{{ old('zip', '') }}">
                @if($errors->has('zip'))
                    <span class="text-danger">{{ $errors->first('zip') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pointload.fields.zip_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="region">{{ trans('cruds.pointload.fields.region') }}</label>
                <input class="form-control {{ $errors->has('region') ? 'is-invalid' : '' }}" type="text" name="region" id="region" value="{{ old('region', '') }}">
                @if($errors->has('region'))
                    <span class="text-danger">{{ $errors->first('region') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pointload.fields.region_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="ulitca">{{ trans('cruds.pointload.fields.ulitca') }}</label>
                <input class="form-control {{ $errors->has('ulitca') ? 'is-invalid' : '' }}" type="text" name="ulitca" id="ulitca" value="{{ old('ulitca', '') }}">
                @if($errors->has('ulitca'))
                    <span class="text-danger">{{ $errors->first('ulitca') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pointload.fields.ulitca_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="dom">{{ trans('cruds.pointload.fields.dom') }}</label>
                <input class="form-control {{ $errors->has('dom') ? 'is-invalid' : '' }}" type="text" name="dom" id="dom" value="{{ old('dom', '') }}">
                @if($errors->has('dom'))
                    <span class="text-danger">{{ $errors->first('dom') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pointload.fields.dom_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="komment">{{ trans('cruds.pointload.fields.komment') }}</label>
                <input class="form-control {{ $errors->has('komment') ? 'is-invalid' : '' }}" type="text" name="komment" id="komment" value="{{ old('komment', '') }}">
                @if($errors->has('komment'))
                    <span class="text-danger">{{ $errors->first('komment') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pointload.fields.komment_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.pointload.fields.type') }}</label>
                <select class="form-control {{ $errors->has('type') ? 'is-invalid' : '' }}" name="type" id="type">
                    <option value disabled {{ old('type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Pointload::TYPE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('type', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('type'))
                    <span class="text-danger">{{ $errors->first('type') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pointload.fields.type_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="komuperevozklient_id">{{ trans('cruds.pointload.fields.komuperevozklient') }}</label>
                <select class="form-control select2 {{ $errors->has('komuperevozklient') ? 'is-invalid' : '' }}" name="komuperevozklient_id" id="komuperevozklient_id">
                    @foreach($komuperevozklients as $id => $entry)
                        <option value="{{ $id }}" {{ old('komuperevozklient_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('komuperevozklient'))
                    <span class="text-danger">{{ $errors->first('komuperevozklient') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pointload.fields.komuperevozklient_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="komuzakazklient_id">{{ trans('cruds.pointload.fields.komuzakazklient') }}</label>
                <select class="form-control select2 {{ $errors->has('komuzakazklient') ? 'is-invalid' : '' }}" name="komuzakazklient_id" id="komuzakazklient_id">
                    @foreach($komuzakazklients as $id => $entry)
                        <option value="{{ $id }}" {{ old('komuzakazklient_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('komuzakazklient'))
                    <span class="text-danger">{{ $errors->first('komuzakazklient') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pointload.fields.komuzakazklient_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="innfio">{{ trans('cruds.pointload.fields.innfio') }}</label>
                <input class="form-control {{ $errors->has('innfio') ? 'is-invalid' : '' }}" type="text" name="innfio" id="innfio" value="{{ old('innfio', '') }}">
                @if($errors->has('innfio'))
                    <span class="text-danger">{{ $errors->first('innfio') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pointload.fields.innfio_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="fioload">{{ trans('cruds.pointload.fields.fioload') }}</label>
                <input class="form-control {{ $errors->has('fioload') ? 'is-invalid' : '' }}" type="text" name="fioload" id="fioload" value="{{ old('fioload', '') }}">
                @if($errors->has('fioload'))
                    <span class="text-danger">{{ $errors->first('fioload') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pointload.fields.fioload_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="mobileload">{{ trans('cruds.pointload.fields.mobileload') }}</label>
                <input class="form-control {{ $errors->has('mobileload') ? 'is-invalid' : '' }}" type="text" name="mobileload" id="mobileload" value="{{ old('mobileload', '') }}">
                @if($errors->has('mobileload'))
                    <span class="text-danger">{{ $errors->first('mobileload') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pointload.fields.mobileload_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="hemaproezda">{{ trans('cruds.pointload.fields.hemaproezda') }}</label>
                <div class="needsclick dropzone {{ $errors->has('hemaproezda') ? 'is-invalid' : '' }}" id="hemaproezda-dropzone">
                </div>
                @if($errors->has('hemaproezda'))
                    <span class="text-danger">{{ $errors->first('hemaproezda') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pointload.fields.hemaproezda_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="pnot">{{ trans('cruds.pointload.fields.pnot') }}</label>
                <input class="form-control {{ $errors->has('pnot') ? 'is-invalid' : '' }}" type="text" name="pnot" id="pnot" value="{{ old('pnot', '') }}">
                @if($errors->has('pnot'))
                    <span class="text-danger">{{ $errors->first('pnot') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pointload.fields.pnot_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="pndo">{{ trans('cruds.pointload.fields.pndo') }}</label>
                <input class="form-control {{ $errors->has('pndo') ? 'is-invalid' : '' }}" type="text" name="pndo" id="pndo" value="{{ old('pndo', '') }}">
                @if($errors->has('pndo'))
                    <span class="text-danger">{{ $errors->first('pndo') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pointload.fields.pndo_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="pnbrot">{{ trans('cruds.pointload.fields.pnbrot') }}</label>
                <input class="form-control {{ $errors->has('pnbrot') ? 'is-invalid' : '' }}" type="text" name="pnbrot" id="pnbrot" value="{{ old('pnbrot', '') }}">
                @if($errors->has('pnbrot'))
                    <span class="text-danger">{{ $errors->first('pnbrot') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pointload.fields.pnbrot_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="pnbrdo">{{ trans('cruds.pointload.fields.pnbrdo') }}</label>
                <input class="form-control {{ $errors->has('pnbrdo') ? 'is-invalid' : '' }}" type="text" name="pnbrdo" id="pnbrdo" value="{{ old('pnbrdo', '') }}">
                @if($errors->has('pnbrdo'))
                    <span class="text-danger">{{ $errors->first('pnbrdo') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pointload.fields.pnbrdo_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="thot">{{ trans('cruds.pointload.fields.thot') }}</label>
                <input class="form-control {{ $errors->has('thot') ? 'is-invalid' : '' }}" type="text" name="thot" id="thot" value="{{ old('thot', '') }}">
                @if($errors->has('thot'))
                    <span class="text-danger">{{ $errors->first('thot') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pointload.fields.thot_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="thdo">{{ trans('cruds.pointload.fields.thdo') }}</label>
                <input class="form-control {{ $errors->has('thdo') ? 'is-invalid' : '' }}" type="text" name="thdo" id="thdo" value="{{ old('thdo', '') }}">
                @if($errors->has('thdo'))
                    <span class="text-danger">{{ $errors->first('thdo') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pointload.fields.thdo_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="thbrot">{{ trans('cruds.pointload.fields.thbrot') }}</label>
                <input class="form-control {{ $errors->has('thbrot') ? 'is-invalid' : '' }}" type="text" name="thbrot" id="thbrot" value="{{ old('thbrot', '') }}">
                @if($errors->has('thbrot'))
                    <span class="text-danger">{{ $errors->first('thbrot') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pointload.fields.thbrot_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="thbrdo">{{ trans('cruds.pointload.fields.thbrdo') }}</label>
                <input class="form-control {{ $errors->has('thbrdo') ? 'is-invalid' : '' }}" type="text" name="thbrdo" id="thbrdo" value="{{ old('thbrdo', '') }}">
                @if($errors->has('thbrdo'))
                    <span class="text-danger">{{ $errors->first('thbrdo') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pointload.fields.thbrdo_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="wedot">{{ trans('cruds.pointload.fields.wedot') }}</label>
                <input class="form-control {{ $errors->has('wedot') ? 'is-invalid' : '' }}" type="text" name="wedot" id="wedot" value="{{ old('wedot', '') }}">
                @if($errors->has('wedot'))
                    <span class="text-danger">{{ $errors->first('wedot') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pointload.fields.wedot_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="weddo">{{ trans('cruds.pointload.fields.weddo') }}</label>
                <input class="form-control {{ $errors->has('weddo') ? 'is-invalid' : '' }}" type="text" name="weddo" id="weddo" value="{{ old('weddo', '') }}">
                @if($errors->has('weddo'))
                    <span class="text-danger">{{ $errors->first('weddo') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pointload.fields.weddo_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="wedbrot">{{ trans('cruds.pointload.fields.wedbrot') }}</label>
                <input class="form-control {{ $errors->has('wedbrot') ? 'is-invalid' : '' }}" type="text" name="wedbrot" id="wedbrot" value="{{ old('wedbrot', '') }}">
                @if($errors->has('wedbrot'))
                    <span class="text-danger">{{ $errors->first('wedbrot') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pointload.fields.wedbrot_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="wedbrto">{{ trans('cruds.pointload.fields.wedbrto') }}</label>
                <input class="form-control {{ $errors->has('wedbrto') ? 'is-invalid' : '' }}" type="text" name="wedbrto" id="wedbrto" value="{{ old('wedbrto', '') }}">
                @if($errors->has('wedbrto'))
                    <span class="text-danger">{{ $errors->first('wedbrto') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pointload.fields.wedbrto_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="thuot">{{ trans('cruds.pointload.fields.thuot') }}</label>
                <input class="form-control {{ $errors->has('thuot') ? 'is-invalid' : '' }}" type="text" name="thuot" id="thuot" value="{{ old('thuot', '') }}">
                @if($errors->has('thuot'))
                    <span class="text-danger">{{ $errors->first('thuot') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pointload.fields.thuot_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="thudo">{{ trans('cruds.pointload.fields.thudo') }}</label>
                <input class="form-control {{ $errors->has('thudo') ? 'is-invalid' : '' }}" type="text" name="thudo" id="thudo" value="{{ old('thudo', '') }}">
                @if($errors->has('thudo'))
                    <span class="text-danger">{{ $errors->first('thudo') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pointload.fields.thudo_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="thubrot">{{ trans('cruds.pointload.fields.thubrot') }}</label>
                <input class="form-control {{ $errors->has('thubrot') ? 'is-invalid' : '' }}" type="text" name="thubrot" id="thubrot" value="{{ old('thubrot', '') }}">
                @if($errors->has('thubrot'))
                    <span class="text-danger">{{ $errors->first('thubrot') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pointload.fields.thubrot_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="thubrdo">{{ trans('cruds.pointload.fields.thubrdo') }}</label>
                <input class="form-control {{ $errors->has('thubrdo') ? 'is-invalid' : '' }}" type="text" name="thubrdo" id="thubrdo" value="{{ old('thubrdo', '') }}">
                @if($errors->has('thubrdo'))
                    <span class="text-danger">{{ $errors->first('thubrdo') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pointload.fields.thubrdo_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="friot">{{ trans('cruds.pointload.fields.friot') }}</label>
                <input class="form-control {{ $errors->has('friot') ? 'is-invalid' : '' }}" type="text" name="friot" id="friot" value="{{ old('friot', '') }}">
                @if($errors->has('friot'))
                    <span class="text-danger">{{ $errors->first('friot') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pointload.fields.friot_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="frido">{{ trans('cruds.pointload.fields.frido') }}</label>
                <input class="form-control {{ $errors->has('frido') ? 'is-invalid' : '' }}" type="text" name="frido" id="frido" value="{{ old('frido', '') }}">
                @if($errors->has('frido'))
                    <span class="text-danger">{{ $errors->first('frido') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pointload.fields.frido_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="fribrot">{{ trans('cruds.pointload.fields.fribrot') }}</label>
                <input class="form-control {{ $errors->has('fribrot') ? 'is-invalid' : '' }}" type="text" name="fribrot" id="fribrot" value="{{ old('fribrot', '') }}">
                @if($errors->has('fribrot'))
                    <span class="text-danger">{{ $errors->first('fribrot') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pointload.fields.fribrot_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="fribrdo">{{ trans('cruds.pointload.fields.fribrdo') }}</label>
                <input class="form-control {{ $errors->has('fribrdo') ? 'is-invalid' : '' }}" type="text" name="fribrdo" id="fribrdo" value="{{ old('fribrdo', '') }}">
                @if($errors->has('fribrdo'))
                    <span class="text-danger">{{ $errors->first('fribrdo') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pointload.fields.fribrdo_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="satot">{{ trans('cruds.pointload.fields.satot') }}</label>
                <input class="form-control {{ $errors->has('satot') ? 'is-invalid' : '' }}" type="text" name="satot" id="satot" value="{{ old('satot', '') }}">
                @if($errors->has('satot'))
                    <span class="text-danger">{{ $errors->first('satot') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pointload.fields.satot_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="satdo">{{ trans('cruds.pointload.fields.satdo') }}</label>
                <input class="form-control {{ $errors->has('satdo') ? 'is-invalid' : '' }}" type="text" name="satdo" id="satdo" value="{{ old('satdo', '') }}">
                @if($errors->has('satdo'))
                    <span class="text-danger">{{ $errors->first('satdo') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pointload.fields.satdo_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="satbrot">{{ trans('cruds.pointload.fields.satbrot') }}</label>
                <input class="form-control {{ $errors->has('satbrot') ? 'is-invalid' : '' }}" type="text" name="satbrot" id="satbrot" value="{{ old('satbrot', '') }}">
                @if($errors->has('satbrot'))
                    <span class="text-danger">{{ $errors->first('satbrot') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pointload.fields.satbrot_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="satbrdo">{{ trans('cruds.pointload.fields.satbrdo') }}</label>
                <input class="form-control {{ $errors->has('satbrdo') ? 'is-invalid' : '' }}" type="text" name="satbrdo" id="satbrdo" value="{{ old('satbrdo', '') }}">
                @if($errors->has('satbrdo'))
                    <span class="text-danger">{{ $errors->first('satbrdo') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pointload.fields.satbrdo_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="sunot">{{ trans('cruds.pointload.fields.sunot') }}</label>
                <input class="form-control {{ $errors->has('sunot') ? 'is-invalid' : '' }}" type="text" name="sunot" id="sunot" value="{{ old('sunot', '') }}">
                @if($errors->has('sunot'))
                    <span class="text-danger">{{ $errors->first('sunot') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pointload.fields.sunot_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="sundo">{{ trans('cruds.pointload.fields.sundo') }}</label>
                <input class="form-control {{ $errors->has('sundo') ? 'is-invalid' : '' }}" type="text" name="sundo" id="sundo" value="{{ old('sundo', '') }}">
                @if($errors->has('sundo'))
                    <span class="text-danger">{{ $errors->first('sundo') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pointload.fields.sundo_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="sunbrot">{{ trans('cruds.pointload.fields.sunbrot') }}</label>
                <input class="form-control {{ $errors->has('sunbrot') ? 'is-invalid' : '' }}" type="text" name="sunbrot" id="sunbrot" value="{{ old('sunbrot', '') }}">
                @if($errors->has('sunbrot'))
                    <span class="text-danger">{{ $errors->first('sunbrot') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pointload.fields.sunbrot_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="sunbrdo">{{ trans('cruds.pointload.fields.sunbrdo') }}</label>
                <input class="form-control {{ $errors->has('sunbrdo') ? 'is-invalid' : '' }}" type="text" name="sunbrdo" id="sunbrdo" value="{{ old('sunbrdo', '') }}">
                @if($errors->has('sunbrdo'))
                    <span class="text-danger">{{ $errors->first('sunbrdo') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pointload.fields.sunbrdo_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('holiday') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="holiday" value="0">
                    <input class="form-check-input" type="checkbox" name="holiday" id="holiday" value="1" {{ old('holiday', 0) == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="holiday">{{ trans('cruds.pointload.fields.holiday') }}</label>
                </div>
                @if($errors->has('holiday'))
                    <span class="text-danger">{{ $errors->first('holiday') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pointload.fields.holiday_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="lat">{{ trans('cruds.pointload.fields.lat') }}</label>
                <input class="form-control {{ $errors->has('lat') ? 'is-invalid' : '' }}" type="text" name="lat" id="lat" value="{{ old('lat', '') }}">
                @if($errors->has('lat'))
                    <span class="text-danger">{{ $errors->first('lat') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pointload.fields.lat_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="long">{{ trans('cruds.pointload.fields.long') }}</label>
                <input class="form-control {{ $errors->has('long') ? 'is-invalid' : '' }}" type="text" name="long" id="long" value="{{ old('long', '') }}">
                @if($errors->has('long'))
                    <span class="text-danger">{{ $errors->first('long') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pointload.fields.long_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="holidaylis">{{ trans('cruds.pointload.fields.holidayli') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('holidaylis') ? 'is-invalid' : '' }}" name="holidaylis[]" id="holidaylis" multiple>
                    @foreach($holidaylis as $id => $holidayli)
                        <option value="{{ $id }}" {{ in_array($id, old('holidaylis', [])) ? 'selected' : '' }}>{{ $holidayli }}</option>
                    @endforeach
                </select>
                @if($errors->has('holidaylis'))
                    <span class="text-danger">{{ $errors->first('holidaylis') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pointload.fields.holidayli_helper') }}</span>
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
    var uploadedHemaproezdaMap = {}
Dropzone.options.hemaproezdaDropzone = {
    url: '{{ route('admin.pointloads.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
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
      $('form').append('<input type="hidden" name="hemaproezda[]" value="' + response.name + '">')
      uploadedHemaproezdaMap[file.name] = response.name
    },
    removedfile: function (file) {
      console.log(file)
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedHemaproezdaMap[file.name]
      }
      $('form').find('input[name="hemaproezda[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($pointload) && $pointload->hemaproezda)
      var files = {!! json_encode($pointload->hemaproezda) !!}
          for (var i in files) {
          var file = files[i]
          this.options.addedfile.call(this, file)
          this.options.thumbnail.call(this, file, file.preview)
          file.previewElement.classList.add('dz-complete')
          $('form').append('<input type="hidden" name="hemaproezda[]" value="' + file.file_name + '">')
        }
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