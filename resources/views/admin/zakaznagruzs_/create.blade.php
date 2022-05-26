@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.zakaznagruz.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.zakaznagruzs.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>{{ trans('cruds.zakaznagruz.fields.draft') }}</label>
                @foreach(App\Models\Zakaznagruz::DRAFT_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('draft') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="draft_{{ $key }}" name="draft" value="{{ $key }}" {{ old('draft', '') === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="draft_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('draft'))
                    <span class="text-danger">{{ $errors->first('draft') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakaznagruz.fields.draft_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="sapid">{{ trans('cruds.zakaznagruz.fields.sapid') }}</label>
                <input class="form-control {{ $errors->has('sapid') ? 'is-invalid' : '' }}" type="text" name="sapid" id="sapid" value="{{ old('sapid', '1') }}">
                @if($errors->has('sapid'))
                    <span class="text-danger">{{ $errors->first('sapid') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakaznagruz.fields.sapid_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="gruz_id">{{ trans('cruds.zakaznagruz.fields.gruz') }}</label>
                <select class="form-control select2 {{ $errors->has('gruz') ? 'is-invalid' : '' }}" name="gruz_id" id="gruz_id">
                    @foreach($gruzs as $id => $entry)
                        <option value="{{ $id }}" {{ old('gruz_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('gruz'))
                    <span class="text-danger">{{ $errors->first('gruz') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakaznagruz.fields.gruz_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="tonnag">{{ trans('cruds.zakaznagruz.fields.tonnag') }}</label>
                <input class="form-control {{ $errors->has('tonnag') ? 'is-invalid' : '' }}" type="number" name="tonnag" id="tonnag" value="{{ old('tonnag', '') }}" step="1">
                @if($errors->has('tonnag'))
                    <span class="text-danger">{{ $errors->first('tonnag') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakaznagruz.fields.tonnag_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="unit_id">{{ trans('cruds.zakaznagruz.fields.unit') }}</label>
                <select class="form-control select2 {{ $errors->has('unit') ? 'is-invalid' : '' }}" name="unit_id" id="unit_id">
                    @foreach($units as $id => $entry)
                        <option value="{{ $id }}" {{ old('unit_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('unit'))
                    <span class="text-danger">{{ $errors->first('unit') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakaznagruz.fields.unit_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="kubatura">{{ trans('cruds.zakaznagruz.fields.kubatura') }}</label>
                <input class="form-control {{ $errors->has('kubatura') ? 'is-invalid' : '' }}" type="number" name="kubatura" id="kubatura" value="{{ old('kubatura', '') }}" step="0.1">
                @if($errors->has('kubatura'))
                    <span class="text-danger">{{ $errors->first('kubatura') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakaznagruz.fields.kubatura_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="grutype_id">{{ trans('cruds.zakaznagruz.fields.grutype') }}</label>
                <select class="form-control select2 {{ $errors->has('grutype') ? 'is-invalid' : '' }}" name="grutype_id" id="grutype_id">
                    @foreach($grutypes as $id => $entry)
                        <option value="{{ $id }}" {{ old('grutype_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('grutype'))
                    <span class="text-danger">{{ $errors->first('grutype') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakaznagruz.fields.grutype_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="qpack">{{ trans('cruds.zakaznagruz.fields.qpack') }}</label>
                <input class="form-control {{ $errors->has('qpack') ? 'is-invalid' : '' }}" type="text" name="qpack" id="qpack" value="{{ old('qpack', '') }}">
                @if($errors->has('qpack'))
                    <span class="text-danger">{{ $errors->first('qpack') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakaznagruz.fields.qpack_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="lendth">{{ trans('cruds.zakaznagruz.fields.lendth') }}</label>
                <input class="form-control {{ $errors->has('lendth') ? 'is-invalid' : '' }}" type="text" name="lendth" id="lendth" value="{{ old('lendth', '') }}">
                @if($errors->has('lendth'))
                    <span class="text-danger">{{ $errors->first('lendth') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakaznagruz.fields.lendth_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="width">{{ trans('cruds.zakaznagruz.fields.width') }}</label>
                <input class="form-control {{ $errors->has('width') ? 'is-invalid' : '' }}" type="text" name="width" id="width" value="{{ old('width', '') }}">
                @if($errors->has('width'))
                    <span class="text-danger">{{ $errors->first('width') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakaznagruz.fields.width_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="height">{{ trans('cruds.zakaznagruz.fields.height') }}</label>
                <input class="form-control {{ $errors->has('height') ? 'is-invalid' : '' }}" type="text" name="height" id="height" value="{{ old('height', '') }}">
                @if($errors->has('height'))
                    <span class="text-danger">{{ $errors->first('height') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakaznagruz.fields.height_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="diameter">{{ trans('cruds.zakaznagruz.fields.diameter') }}</label>
                <input class="form-control {{ $errors->has('diameter') ? 'is-invalid' : '' }}" type="text" name="diameter" id="diameter" value="{{ old('diameter', '') }}">
                @if($errors->has('diameter'))
                    <span class="text-danger">{{ $errors->first('diameter') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakaznagruz.fields.diameter_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('krugorei') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="krugorei" value="0">
                    <input class="form-check-input" type="checkbox" name="krugorei" id="krugorei" value="1" {{ old('krugorei', 0) == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="krugorei">{{ trans('cruds.zakaznagruz.fields.krugorei') }}</label>
                </div>
                @if($errors->has('krugorei'))
                    <span class="text-danger">{{ $errors->first('krugorei') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakaznagruz.fields.krugorei_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="pointload_id">{{ trans('cruds.zakaznagruz.fields.pointload') }}</label>
                <select class="form-control select2 {{ $errors->has('pointload') ? 'is-invalid' : '' }}" name="pointload_id" id="pointload_id">
                    @foreach($pointloads as $id => $entry)
                        <option value="{{ $id }}" {{ old('pointload_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('pointload'))
                    <span class="text-danger">{{ $errors->first('pointload') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakaznagruz.fields.pointload_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="dateload">{{ trans('cruds.zakaznagruz.fields.dateload') }}</label>
                <input class="form-control date {{ $errors->has('dateload') ? 'is-invalid' : '' }}" type="text" name="dateload" id="dateload" value="{{ old('dateload') }}">
                @if($errors->has('dateload'))
                    <span class="text-danger">{{ $errors->first('dateload') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakaznagruz.fields.dateload_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="timeloada">{{ trans('cruds.zakaznagruz.fields.timeloada') }}</label>
                <input class="form-control {{ $errors->has('timeloada') ? 'is-invalid' : '' }}" type="text" name="timeloada" id="timeloada" value="{{ old('timeloada', '') }}">
                @if($errors->has('timeloada'))
                    <span class="text-danger">{{ $errors->first('timeloada') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakaznagruz.fields.timeloada_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="timeloadado">{{ trans('cruds.zakaznagruz.fields.timeloadado') }}</label>
                <input class="form-control {{ $errors->has('timeloadado') ? 'is-invalid' : '' }}" type="text" name="timeloadado" id="timeloadado" value="{{ old('timeloadado', '') }}">
                @if($errors->has('timeloadado'))
                    <span class="text-danger">{{ $errors->first('timeloadado') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakaznagruz.fields.timeloadado_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('a_24') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="a_24" value="0">
                    <input class="form-check-input" type="checkbox" name="a_24" id="a_24" value="1" {{ old('a_24', 0) == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="a_24">{{ trans('cruds.zakaznagruz.fields.a_24') }}</label>
                </div>
                @if($errors->has('a_24'))
                    <span class="text-danger">{{ $errors->first('a_24') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakaznagruz.fields.a_24_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="dopinfoload">{{ trans('cruds.zakaznagruz.fields.dopinfoload') }}</label>
                <input class="form-control {{ $errors->has('dopinfoload') ? 'is-invalid' : '' }}" type="text" name="dopinfoload" id="dopinfoload" value="{{ old('dopinfoload', '') }}">
                @if($errors->has('dopinfoload'))
                    <span class="text-danger">{{ $errors->first('dopinfoload') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakaznagruz.fields.dopinfoload_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="cload_id">{{ trans('cruds.zakaznagruz.fields.cload') }}</label>
                <select class="form-control select2 {{ $errors->has('cload') ? 'is-invalid' : '' }}" name="cload_id" id="cload_id">
                    @foreach($cloads as $id => $entry)
                        <option value="{{ $id }}" {{ old('cload_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('cload'))
                    <span class="text-danger">{{ $errors->first('cload') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakaznagruz.fields.cload_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="cdate">{{ trans('cruds.zakaznagruz.fields.cdate') }}</label>
                <input class="form-control date {{ $errors->has('cdate') ? 'is-invalid' : '' }}" type="text" name="cdate" id="cdate" value="{{ old('cdate') }}">
                @if($errors->has('cdate'))
                    <span class="text-danger">{{ $errors->first('cdate') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakaznagruz.fields.cdate_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="ctime">{{ trans('cruds.zakaznagruz.fields.ctime') }}</label>
                <input class="form-control {{ $errors->has('ctime') ? 'is-invalid' : '' }}" type="text" name="ctime" id="ctime" value="{{ old('ctime', '') }}">
                @if($errors->has('ctime'))
                    <span class="text-danger">{{ $errors->first('ctime') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakaznagruz.fields.ctime_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="ctimedo">{{ trans('cruds.zakaznagruz.fields.ctimedo') }}</label>
                <input class="form-control {{ $errors->has('ctimedo') ? 'is-invalid' : '' }}" type="text" name="ctimedo" id="ctimedo" value="{{ old('ctimedo', '') }}">
                @if($errors->has('ctimedo'))
                    <span class="text-danger">{{ $errors->first('ctimedo') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakaznagruz.fields.ctimedo_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('с_24') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="с_24" value="0">
                    <input class="form-check-input" type="checkbox" name="с_24" id="с_24" value="1" {{ old('с_24', 0) == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="с_24">{{ trans('cruds.zakaznagruz.fields.с_24') }}</label>
                </div>
                @if($errors->has('с_24'))
                    <span class="text-danger">{{ $errors->first('с_24') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakaznagruz.fields.с_24_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="cdopinfo">{{ trans('cruds.zakaznagruz.fields.cdopinfo') }}</label>
                <input class="form-control {{ $errors->has('cdopinfo') ? 'is-invalid' : '' }}" type="text" name="cdopinfo" id="cdopinfo" value="{{ old('cdopinfo', '') }}">
                @if($errors->has('cdopinfo'))
                    <span class="text-danger">{{ $errors->first('cdopinfo') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakaznagruz.fields.cdopinfo_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="typekuzovs">{{ trans('cruds.zakaznagruz.fields.typekuzov') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('typekuzovs') ? 'is-invalid' : '' }}" name="typekuzovs[]" id="typekuzovs" multiple>
                    @foreach($typekuzovs as $id => $typekuzov)
                        <option value="{{ $id }}" {{ in_array($id, old('typekuzovs', [])) ? 'selected' : '' }}>{{ $typekuzov }}</option>
                    @endforeach
                </select>
                @if($errors->has('typekuzovs'))
                    <span class="text-danger">{{ $errors->first('typekuzovs') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakaznagruz.fields.typekuzov_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="typeloads">{{ trans('cruds.zakaznagruz.fields.typeload') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('typeloads') ? 'is-invalid' : '' }}" name="typeloads[]" id="typeloads" multiple>
                    @foreach($typeloads as $id => $typeload)
                        <option value="{{ $id }}" {{ in_array($id, old('typeloads', [])) ? 'selected' : '' }}>{{ $typeload }}</option>
                    @endforeach
                </select>
                @if($errors->has('typeloads'))
                    <span class="text-danger">{{ $errors->first('typeloads') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakaznagruz.fields.typeload_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="type_unloads">{{ trans('cruds.zakaznagruz.fields.type_unload') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('type_unloads') ? 'is-invalid' : '' }}" name="type_unloads[]" id="type_unloads" multiple>
                    @foreach($type_unloads as $id => $type_unload)
                        <option value="{{ $id }}" {{ in_array($id, old('type_unloads', [])) ? 'selected' : '' }}>{{ $type_unload }}</option>
                    @endforeach
                </select>
                @if($errors->has('type_unloads'))
                    <span class="text-danger">{{ $errors->first('type_unloads') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakaznagruz.fields.type_unload_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="ltlftl_id">{{ trans('cruds.zakaznagruz.fields.ltlftl') }}</label>
                <select class="form-control select2 {{ $errors->has('ltlftl') ? 'is-invalid' : '' }}" name="ltlftl_id" id="ltlftl_id">
                    @foreach($ltlftls as $id => $entry)
                        <option value="{{ $id }}" {{ old('ltlftl_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('ltlftl'))
                    <span class="text-danger">{{ $errors->first('ltlftl') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakaznagruz.fields.ltlftl_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="trebs">{{ trans('cruds.zakaznagruz.fields.treb') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('trebs') ? 'is-invalid' : '' }}" name="trebs[]" id="trebs" multiple>
                    @foreach($trebs as $id => $treb)
                        <option value="{{ $id }}" {{ in_array($id, old('trebs', [])) ? 'selected' : '' }}>{{ $treb }}</option>
                    @endforeach
                </select>
                @if($errors->has('trebs'))
                    <span class="text-danger">{{ $errors->first('trebs') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakaznagruz.fields.treb_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="trandocs">{{ trans('cruds.zakaznagruz.fields.trandoc') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('trandocs') ? 'is-invalid' : '' }}" name="trandocs[]" id="trandocs" multiple>
                    @foreach($trandocs as $id => $trandoc)
                        <option value="{{ $id }}" {{ in_array($id, old('trandocs', [])) ? 'selected' : '' }}>{{ $trandoc }}</option>
                    @endforeach
                </select>
                @if($errors->has('trandocs'))
                    <span class="text-danger">{{ $errors->first('trandocs') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakaznagruz.fields.trandoc_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="qauto">{{ trans('cruds.zakaznagruz.fields.qauto') }}</label>
                <input class="form-control {{ $errors->has('qauto') ? 'is-invalid' : '' }}" type="text" name="qauto" id="qauto" value="{{ old('qauto', '1') }}">
                @if($errors->has('qauto'))
                    <span class="text-danger">{{ $errors->first('qauto') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakaznagruz.fields.qauto_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="adr_id">{{ trans('cruds.zakaznagruz.fields.adr') }}</label>
                <select class="form-control select2 {{ $errors->has('adr') ? 'is-invalid' : '' }}" name="adr_id" id="adr_id">
                    @foreach($adrs as $id => $entry)
                        <option value="{{ $id }}" {{ old('adr_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('adr'))
                    <span class="text-danger">{{ $errors->first('adr') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakaznagruz.fields.adr_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="qbelt">{{ trans('cruds.zakaznagruz.fields.qbelt') }}</label>
                <input class="form-control {{ $errors->has('qbelt') ? 'is-invalid' : '' }}" type="text" name="qbelt" id="qbelt" value="{{ old('qbelt', '') }}">
                @if($errors->has('qbelt'))
                    <span class="text-danger">{{ $errors->first('qbelt') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakaznagruz.fields.qbelt_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="tempot">{{ trans('cruds.zakaznagruz.fields.tempot') }}</label>
                <input class="form-control {{ $errors->has('tempot') ? 'is-invalid' : '' }}" type="text" name="tempot" id="tempot" value="{{ old('tempot', '') }}">
                @if($errors->has('tempot'))
                    <span class="text-danger">{{ $errors->first('tempot') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakaznagruz.fields.tempot_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="tempdo">{{ trans('cruds.zakaznagruz.fields.tempdo') }}</label>
                <input class="form-control {{ $errors->has('tempdo') ? 'is-invalid' : '' }}" type="text" name="tempdo" id="tempdo" value="{{ old('tempdo', '') }}">
                @if($errors->has('tempdo'))
                    <span class="text-danger">{{ $errors->first('tempdo') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakaznagruz.fields.tempdo_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.zakaznagruz.fields.typeoplata') }}</label>
                @foreach(App\Models\Zakaznagruz::TYPEOPLATA_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('typeoplata') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="typeoplata_{{ $key }}" name="typeoplata" value="{{ $key }}" {{ old('typeoplata', '') === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="typeoplata_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('typeoplata'))
                    <span class="text-danger">{{ $errors->first('typeoplata') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakaznagruz.fields.typeoplata_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="uoviaoplati">{{ trans('cruds.zakaznagruz.fields.uoviaoplati') }}</label>
                <input class="form-control {{ $errors->has('uoviaoplati') ? 'is-invalid' : '' }}" type="text" name="uoviaoplati" id="uoviaoplati" value="{{ old('uoviaoplati', '') }}">
                @if($errors->has('uoviaoplati'))
                    <span class="text-danger">{{ $errors->first('uoviaoplati') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakaznagruz.fields.uoviaoplati_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.zakaznagruz.fields.typetorgov') }}</label>
                @foreach(App\Models\Zakaznagruz::TYPETORGOV_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('typetorgov') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="typetorgov_{{ $key }}" name="typetorgov" value="{{ $key }}" {{ old('typetorgov', '') === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="typetorgov_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('typetorgov'))
                    <span class="text-danger">{{ $errors->first('typetorgov') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakaznagruz.fields.typetorgov_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="tekprice">{{ trans('cruds.zakaznagruz.fields.tekprice') }}</label>
                <input class="form-control {{ $errors->has('tekprice') ? 'is-invalid' : '' }}" type="text" name="tekprice" id="tekprice" value="{{ old('tekprice', '') }}">
                @if($errors->has('tekprice'))
                    <span class="text-danger">{{ $errors->first('tekprice') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakaznagruz.fields.tekprice_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="tart_tena">{{ trans('cruds.zakaznagruz.fields.tart_tena') }}</label>
                <input class="form-control {{ $errors->has('tart_tena') ? 'is-invalid' : '' }}" type="number" name="tart_tena" id="tart_tena" value="{{ old('tart_tena', '') }}" step="0.01">
                @if($errors->has('tart_tena'))
                    <span class="text-danger">{{ $errors->first('tart_tena') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakaznagruz.fields.tart_tena_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.zakaznagruz.fields.valuta') }}</label>
                <select class="form-control {{ $errors->has('valuta') ? 'is-invalid' : '' }}" name="valuta" id="valuta">
                    <option value disabled {{ old('valuta', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Zakaznagruz::VALUTA_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('valuta', '1') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('valuta'))
                    <span class="text-danger">{{ $errors->first('valuta') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakaznagruz.fields.valuta_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="bankday">{{ trans('cruds.zakaznagruz.fields.bankday') }}</label>
                <input class="form-control {{ $errors->has('bankday') ? 'is-invalid' : '' }}" type="text" name="bankday" id="bankday" value="{{ old('bankday', '') }}">
                @if($errors->has('bankday'))
                    <span class="text-danger">{{ $errors->first('bankday') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakaznagruz.fields.bankday_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="tart_nd">{{ trans('cruds.zakaznagruz.fields.tart_nd') }}</label>
                <input class="form-control {{ $errors->has('tart_nd') ? 'is-invalid' : '' }}" type="text" name="tart_nd" id="tart_nd" value="{{ old('tart_nd', '') }}">
                @if($errors->has('tart_nd'))
                    <span class="text-danger">{{ $errors->first('tart_nd') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakaznagruz.fields.tart_nd_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="valnd_id">{{ trans('cruds.zakaznagruz.fields.valnd') }}</label>
                <select class="form-control select2 {{ $errors->has('valnd') ? 'is-invalid' : '' }}" name="valnd_id" id="valnd_id">
                    @foreach($valnds as $id => $entry)
                        <option value="{{ $id }}" {{ old('valnd_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('valnd'))
                    <span class="text-danger">{{ $errors->first('valnd') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakaznagruz.fields.valnd_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="bank_daynd">{{ trans('cruds.zakaznagruz.fields.bank_daynd') }}</label>
                <input class="form-control {{ $errors->has('bank_daynd') ? 'is-invalid' : '' }}" type="text" name="bank_daynd" id="bank_daynd" value="{{ old('bank_daynd', '') }}">
                @if($errors->has('bank_daynd'))
                    <span class="text-danger">{{ $errors->first('bank_daynd') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakaznagruz.fields.bank_daynd_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="nal">{{ trans('cruds.zakaznagruz.fields.nal') }}</label>
                <input class="form-control {{ $errors->has('nal') ? 'is-invalid' : '' }}" type="text" name="nal" id="nal" value="{{ old('nal', '') }}">
                @if($errors->has('nal'))
                    <span class="text-danger">{{ $errors->first('nal') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakaznagruz.fields.nal_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="naldn">{{ trans('cruds.zakaznagruz.fields.naldn') }}</label>
                <input class="form-control {{ $errors->has('naldn') ? 'is-invalid' : '' }}" type="text" name="naldn" id="naldn" value="{{ old('naldn', '') }}">
                @if($errors->has('naldn'))
                    <span class="text-danger">{{ $errors->first('naldn') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakaznagruz.fields.naldn_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('nalcard') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="nalcard" value="0">
                    <input class="form-check-input" type="checkbox" name="nalcard" id="nalcard" value="1" {{ old('nalcard', 0) == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="nalcard">{{ trans('cruds.zakaznagruz.fields.nalcard') }}</label>
                </div>
                @if($errors->has('nalcard'))
                    <span class="text-danger">{{ $errors->first('nalcard') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakaznagruz.fields.nalcard_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="hagponig">{{ trans('cruds.zakaznagruz.fields.hagponig') }}</label>
                <input class="form-control {{ $errors->has('hagponig') ? 'is-invalid' : '' }}" type="number" name="hagponig" id="hagponig" value="{{ old('hagponig', '') }}" step="1">
                @if($errors->has('hagponig'))
                    <span class="text-danger">{{ $errors->first('hagponig') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakaznagruz.fields.hagponig_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="max">{{ trans('cruds.zakaznagruz.fields.max') }}</label>
                <input class="form-control {{ $errors->has('max') ? 'is-invalid' : '' }}" type="text" name="max" id="max" value="{{ old('max', '') }}">
                @if($errors->has('max'))
                    <span class="text-danger">{{ $errors->first('max') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakaznagruz.fields.max_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="dopinfoplata">{{ trans('cruds.zakaznagruz.fields.dopinfoplata') }}</label>
                <input class="form-control {{ $errors->has('dopinfoplata') ? 'is-invalid' : '' }}" type="text" name="dopinfoplata" id="dopinfoplata" value="{{ old('dopinfoplata', '') }}">
                @if($errors->has('dopinfoplata'))
                    <span class="text-danger">{{ $errors->first('dopinfoplata') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakaznagruz.fields.dopinfoplata_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="kurator_1_id">{{ trans('cruds.zakaznagruz.fields.kurator_1') }}</label>
                <select class="form-control select2 {{ $errors->has('kurator_1') ? 'is-invalid' : '' }}" name="kurator_1_id" id="kurator_1_id">
                    @foreach($kurator_1s as $id => $entry)
                        <option value="{{ $id }}" {{ old('kurator_1_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('kurator_1'))
                    <span class="text-danger">{{ $errors->first('kurator_1') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakaznagruz.fields.kurator_1_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="kontaktprim">{{ trans('cruds.zakaznagruz.fields.kontaktprim') }}</label>
                <input class="form-control {{ $errors->has('kontaktprim') ? 'is-invalid' : '' }}" type="text" name="kontaktprim" id="kontaktprim" value="{{ old('kontaktprim', '') }}">
                @if($errors->has('kontaktprim'))
                    <span class="text-danger">{{ $errors->first('kontaktprim') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakaznagruz.fields.kontaktprim_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.zakaznagruz.fields.ktomoget') }}</label>
                @foreach(App\Models\Zakaznagruz::KTOMOGET_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('ktomoget') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="ktomoget_{{ $key }}" name="ktomoget" value="{{ $key }}" {{ old('ktomoget', '') === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="ktomoget_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('ktomoget'))
                    <span class="text-danger">{{ $errors->first('ktomoget') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakaznagruz.fields.ktomoget_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="kromezakazs">{{ trans('cruds.zakaznagruz.fields.kromezakaz') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('kromezakazs') ? 'is-invalid' : '' }}" name="kromezakazs[]" id="kromezakazs" multiple>
                    @foreach($kromezakazs as $id => $kromezakaz)
                        <option value="{{ $id }}" {{ in_array($id, old('kromezakazs', [])) ? 'selected' : '' }}>{{ $kromezakaz }}</option>
                    @endforeach
                </select>
                @if($errors->has('kromezakazs'))
                    <span class="text-danger">{{ $errors->first('kromezakazs') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakaznagruz.fields.kromezakaz_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="perevozkromes">{{ trans('cruds.zakaznagruz.fields.perevozkrome') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('perevozkromes') ? 'is-invalid' : '' }}" name="perevozkromes[]" id="perevozkromes" multiple>
                    @foreach($perevozkromes as $id => $perevozkrome)
                        <option value="{{ $id }}" {{ in_array($id, old('perevozkromes', [])) ? 'selected' : '' }}>{{ $perevozkrome }}</option>
                    @endforeach
                </select>
                @if($errors->has('perevozkromes'))
                    <span class="text-danger">{{ $errors->first('perevozkromes') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakaznagruz.fields.perevozkrome_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.zakaznagruz.fields.nahalo') }}</label>
                <select class="form-control {{ $errors->has('nahalo') ? 'is-invalid' : '' }}" name="nahalo" id="nahalo">
                    <option value disabled {{ old('nahalo', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Zakaznagruz::NAHALO_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('nahalo', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('nahalo'))
                    <span class="text-danger">{{ $errors->first('nahalo') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakaznagruz.fields.nahalo_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="nahalodate">{{ trans('cruds.zakaznagruz.fields.nahalodate') }}</label>
                <input class="form-control date {{ $errors->has('nahalodate') ? 'is-invalid' : '' }}" type="text" name="nahalodate" id="nahalodate" value="{{ old('nahalodate') }}">
                @if($errors->has('nahalodate'))
                    <span class="text-danger">{{ $errors->first('nahalodate') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakaznagruz.fields.nahalodate_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="nahalotime">{{ trans('cruds.zakaznagruz.fields.nahalotime') }}</label>
                <input class="form-control {{ $errors->has('nahalotime') ? 'is-invalid' : '' }}" type="text" name="nahalotime" id="nahalotime" value="{{ old('nahalotime', '') }}">
                @if($errors->has('nahalotime'))
                    <span class="text-danger">{{ $errors->first('nahalotime') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakaznagruz.fields.nahalotime_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.zakaznagruz.fields.finita') }}</label>
                <select class="form-control {{ $errors->has('finita') ? 'is-invalid' : '' }}" name="finita" id="finita">
                    <option value disabled {{ old('finita', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Zakaznagruz::FINITA_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('finita', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('finita'))
                    <span class="text-danger">{{ $errors->first('finita') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakaznagruz.fields.finita_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="finitadate">{{ trans('cruds.zakaznagruz.fields.finitadate') }}</label>
                <input class="form-control date {{ $errors->has('finitadate') ? 'is-invalid' : '' }}" type="text" name="finitadate" id="finitadate" value="{{ old('finitadate') }}">
                @if($errors->has('finitadate'))
                    <span class="text-danger">{{ $errors->first('finitadate') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakaznagruz.fields.finitadate_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="finitatime">{{ trans('cruds.zakaznagruz.fields.finitatime') }}</label>
                <input class="form-control {{ $errors->has('finitatime') ? 'is-invalid' : '' }}" type="text" name="finitatime" id="finitatime" value="{{ old('finitatime', '') }}">
                @if($errors->has('finitatime'))
                    <span class="text-danger">{{ $errors->first('finitatime') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakaznagruz.fields.finitatime_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.zakaznagruz.fields.hour') }}</label>
                <select class="form-control {{ $errors->has('hour') ? 'is-invalid' : '' }}" name="hour" id="hour">
                    <option value disabled {{ old('hour', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Zakaznagruz::HOUR_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('hour', '0') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('hour'))
                    <span class="text-danger">{{ $errors->first('hour') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakaznagruz.fields.hour_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.zakaznagruz.fields.min') }}</label>
                <select class="form-control {{ $errors->has('min') ? 'is-invalid' : '' }}" name="min" id="min">
                    <option value disabled {{ old('min', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Zakaznagruz::MIN_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('min', '0') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('min'))
                    <span class="text-danger">{{ $errors->first('min') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakaznagruz.fields.min_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="idcomp">{{ trans('cruds.zakaznagruz.fields.idcomp') }}</label>
                <input class="form-control {{ $errors->has('idcomp') ? 'is-invalid' : '' }}" type="text" name="idcomp" id="idcomp" value="{{ old('idcomp', '') }}">
                @if($errors->has('idcomp'))
                    <span class="text-danger">{{ $errors->first('idcomp') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakaznagruz.fields.idcomp_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="iduser">{{ trans('cruds.zakaznagruz.fields.iduser') }}</label>
                <input class="form-control {{ $errors->has('iduser') ? 'is-invalid' : '' }}" type="text" name="iduser" id="iduser" value="{{ old('iduser', '') }}">
                @if($errors->has('iduser'))
                    <span class="text-danger">{{ $errors->first('iduser') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakaznagruz.fields.iduser_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.zakaznagruz.fields.perez') }}</label>
                <select class="form-control {{ $errors->has('perez') ? 'is-invalid' : '' }}" name="perez" id="perez">
                    <option value disabled {{ old('perez', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Zakaznagruz::PEREZ_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('perez', '0') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('perez'))
                    <span class="text-danger">{{ $errors->first('perez') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakaznagruz.fields.perez_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.zakaznagruz.fields.dop_1_t') }}</label>
                @foreach(App\Models\Zakaznagruz::DOP_1_T_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('dop_1_t') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="dop_1_t_{{ $key }}" name="dop_1_t" value="{{ $key }}" {{ old('dop_1_t', '') === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="dop_1_t_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('dop_1_t'))
                    <span class="text-danger">{{ $errors->first('dop_1_t') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakaznagruz.fields.dop_1_t_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="dop_1_adr">{{ trans('cruds.zakaznagruz.fields.dop_1_adr') }}</label>
                <input class="form-control {{ $errors->has('dop_1_adr') ? 'is-invalid' : '' }}" type="text" name="dop_1_adr" id="dop_1_adr" value="{{ old('dop_1_adr', '') }}">
                @if($errors->has('dop_1_adr'))
                    <span class="text-danger">{{ $errors->first('dop_1_adr') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakaznagruz.fields.dop_1_adr_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="dop_1_tot">{{ trans('cruds.zakaznagruz.fields.dop_1_tot') }}</label>
                <input class="form-control {{ $errors->has('dop_1_tot') ? 'is-invalid' : '' }}" type="text" name="dop_1_tot" id="dop_1_tot" value="{{ old('dop_1_tot', '') }}">
                @if($errors->has('dop_1_tot'))
                    <span class="text-danger">{{ $errors->first('dop_1_tot') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakaznagruz.fields.dop_1_tot_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="dop_1_val_id">{{ trans('cruds.zakaznagruz.fields.dop_1_val') }}</label>
                <select class="form-control select2 {{ $errors->has('dop_1_val') ? 'is-invalid' : '' }}" name="dop_1_val_id" id="dop_1_val_id">
                    @foreach($dop_1_vals as $id => $entry)
                        <option value="{{ $id }}" {{ old('dop_1_val_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('dop_1_val'))
                    <span class="text-danger">{{ $errors->first('dop_1_val') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakaznagruz.fields.dop_1_val_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="dop_1_typ_id">{{ trans('cruds.zakaznagruz.fields.dop_1_typ') }}</label>
                <select class="form-control select2 {{ $errors->has('dop_1_typ') ? 'is-invalid' : '' }}" name="dop_1_typ_id" id="dop_1_typ_id">
                    @foreach($dop_1_typs as $id => $entry)
                        <option value="{{ $id }}" {{ old('dop_1_typ_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('dop_1_typ'))
                    <span class="text-danger">{{ $errors->first('dop_1_typ') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakaznagruz.fields.dop_1_typ_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="dop_1_tam_id">{{ trans('cruds.zakaznagruz.fields.dop_1_tam') }}</label>
                <select class="form-control select2 {{ $errors->has('dop_1_tam') ? 'is-invalid' : '' }}" name="dop_1_tam_id" id="dop_1_tam_id">
                    @foreach($dop_1_tams as $id => $entry)
                        <option value="{{ $id }}" {{ old('dop_1_tam_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('dop_1_tam'))
                    <span class="text-danger">{{ $errors->first('dop_1_tam') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakaznagruz.fields.dop_1_tam_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.zakaznagruz.fields.dop_2_t') }}</label>
                @foreach(App\Models\Zakaznagruz::DOP_2_T_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('dop_2_t') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="dop_2_t_{{ $key }}" name="dop_2_t" value="{{ $key }}" {{ old('dop_2_t', '') === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="dop_2_t_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('dop_2_t'))
                    <span class="text-danger">{{ $errors->first('dop_2_t') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakaznagruz.fields.dop_2_t_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="dop_2_adr">{{ trans('cruds.zakaznagruz.fields.dop_2_adr') }}</label>
                <input class="form-control {{ $errors->has('dop_2_adr') ? 'is-invalid' : '' }}" type="text" name="dop_2_adr" id="dop_2_adr" value="{{ old('dop_2_adr', '') }}">
                @if($errors->has('dop_2_adr'))
                    <span class="text-danger">{{ $errors->first('dop_2_adr') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakaznagruz.fields.dop_2_adr_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="dop_2_tot">{{ trans('cruds.zakaznagruz.fields.dop_2_tot') }}</label>
                <input class="form-control {{ $errors->has('dop_2_tot') ? 'is-invalid' : '' }}" type="text" name="dop_2_tot" id="dop_2_tot" value="{{ old('dop_2_tot', '') }}">
                @if($errors->has('dop_2_tot'))
                    <span class="text-danger">{{ $errors->first('dop_2_tot') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakaznagruz.fields.dop_2_tot_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="dop_2_val_id">{{ trans('cruds.zakaznagruz.fields.dop_2_val') }}</label>
                <select class="form-control select2 {{ $errors->has('dop_2_val') ? 'is-invalid' : '' }}" name="dop_2_val_id" id="dop_2_val_id">
                    @foreach($dop_2_vals as $id => $entry)
                        <option value="{{ $id }}" {{ old('dop_2_val_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('dop_2_val'))
                    <span class="text-danger">{{ $errors->first('dop_2_val') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakaznagruz.fields.dop_2_val_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="dop_2_typ_id">{{ trans('cruds.zakaznagruz.fields.dop_2_typ') }}</label>
                <select class="form-control select2 {{ $errors->has('dop_2_typ') ? 'is-invalid' : '' }}" name="dop_2_typ_id" id="dop_2_typ_id">
                    @foreach($dop_2_typs as $id => $entry)
                        <option value="{{ $id }}" {{ old('dop_2_typ_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('dop_2_typ'))
                    <span class="text-danger">{{ $errors->first('dop_2_typ') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakaznagruz.fields.dop_2_typ_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="dop_2_tam_id">{{ trans('cruds.zakaznagruz.fields.dop_2_tam') }}</label>
                <select class="form-control select2 {{ $errors->has('dop_2_tam') ? 'is-invalid' : '' }}" name="dop_2_tam_id" id="dop_2_tam_id">
                    @foreach($dop_2_tams as $id => $entry)
                        <option value="{{ $id }}" {{ old('dop_2_tam_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('dop_2_tam'))
                    <span class="text-danger">{{ $errors->first('dop_2_tam') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakaznagruz.fields.dop_2_tam_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.zakaznagruz.fields.dop_3_t') }}</label>
                @foreach(App\Models\Zakaznagruz::DOP_3_T_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('dop_3_t') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="dop_3_t_{{ $key }}" name="dop_3_t" value="{{ $key }}" {{ old('dop_3_t', '') === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="dop_3_t_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('dop_3_t'))
                    <span class="text-danger">{{ $errors->first('dop_3_t') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakaznagruz.fields.dop_3_t_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="dop_3_adr">{{ trans('cruds.zakaznagruz.fields.dop_3_adr') }}</label>
                <input class="form-control {{ $errors->has('dop_3_adr') ? 'is-invalid' : '' }}" type="text" name="dop_3_adr" id="dop_3_adr" value="{{ old('dop_3_adr', '') }}">
                @if($errors->has('dop_3_adr'))
                    <span class="text-danger">{{ $errors->first('dop_3_adr') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakaznagruz.fields.dop_3_adr_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="dop_3_tot">{{ trans('cruds.zakaznagruz.fields.dop_3_tot') }}</label>
                <input class="form-control {{ $errors->has('dop_3_tot') ? 'is-invalid' : '' }}" type="text" name="dop_3_tot" id="dop_3_tot" value="{{ old('dop_3_tot', '') }}">
                @if($errors->has('dop_3_tot'))
                    <span class="text-danger">{{ $errors->first('dop_3_tot') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakaznagruz.fields.dop_3_tot_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="dop_3_val_id">{{ trans('cruds.zakaznagruz.fields.dop_3_val') }}</label>
                <select class="form-control select2 {{ $errors->has('dop_3_val') ? 'is-invalid' : '' }}" name="dop_3_val_id" id="dop_3_val_id">
                    @foreach($dop_3_vals as $id => $entry)
                        <option value="{{ $id }}" {{ old('dop_3_val_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('dop_3_val'))
                    <span class="text-danger">{{ $errors->first('dop_3_val') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakaznagruz.fields.dop_3_val_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="dop_3_typ_id">{{ trans('cruds.zakaznagruz.fields.dop_3_typ') }}</label>
                <select class="form-control select2 {{ $errors->has('dop_3_typ') ? 'is-invalid' : '' }}" name="dop_3_typ_id" id="dop_3_typ_id">
                    @foreach($dop_3_typs as $id => $entry)
                        <option value="{{ $id }}" {{ old('dop_3_typ_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('dop_3_typ'))
                    <span class="text-danger">{{ $errors->first('dop_3_typ') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakaznagruz.fields.dop_3_typ_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="dop_3_tam_id">{{ trans('cruds.zakaznagruz.fields.dop_3_tam') }}</label>
                <select class="form-control select2 {{ $errors->has('dop_3_tam') ? 'is-invalid' : '' }}" name="dop_3_tam_id" id="dop_3_tam_id">
                    @foreach($dop_3_tams as $id => $entry)
                        <option value="{{ $id }}" {{ old('dop_3_tam_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('dop_3_tam'))
                    <span class="text-danger">{{ $errors->first('dop_3_tam') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakaznagruz.fields.dop_3_tam_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.zakaznagruz.fields.dop_4_t') }}</label>
                @foreach(App\Models\Zakaznagruz::DOP_4_T_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('dop_4_t') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="dop_4_t_{{ $key }}" name="dop_4_t" value="{{ $key }}" {{ old('dop_4_t', '') === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="dop_4_t_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('dop_4_t'))
                    <span class="text-danger">{{ $errors->first('dop_4_t') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakaznagruz.fields.dop_4_t_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="dop_4_adr">{{ trans('cruds.zakaznagruz.fields.dop_4_adr') }}</label>
                <input class="form-control {{ $errors->has('dop_4_adr') ? 'is-invalid' : '' }}" type="text" name="dop_4_adr" id="dop_4_adr" value="{{ old('dop_4_adr', '') }}">
                @if($errors->has('dop_4_adr'))
                    <span class="text-danger">{{ $errors->first('dop_4_adr') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakaznagruz.fields.dop_4_adr_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="dop_4_tot">{{ trans('cruds.zakaznagruz.fields.dop_4_tot') }}</label>
                <input class="form-control {{ $errors->has('dop_4_tot') ? 'is-invalid' : '' }}" type="text" name="dop_4_tot" id="dop_4_tot" value="{{ old('dop_4_tot', '') }}">
                @if($errors->has('dop_4_tot'))
                    <span class="text-danger">{{ $errors->first('dop_4_tot') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakaznagruz.fields.dop_4_tot_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="dop_4_val_id">{{ trans('cruds.zakaznagruz.fields.dop_4_val') }}</label>
                <select class="form-control select2 {{ $errors->has('dop_4_val') ? 'is-invalid' : '' }}" name="dop_4_val_id" id="dop_4_val_id">
                    @foreach($dop_4_vals as $id => $entry)
                        <option value="{{ $id }}" {{ old('dop_4_val_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('dop_4_val'))
                    <span class="text-danger">{{ $errors->first('dop_4_val') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakaznagruz.fields.dop_4_val_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="dop_4_typ_id">{{ trans('cruds.zakaznagruz.fields.dop_4_typ') }}</label>
                <select class="form-control select2 {{ $errors->has('dop_4_typ') ? 'is-invalid' : '' }}" name="dop_4_typ_id" id="dop_4_typ_id">
                    @foreach($dop_4_typs as $id => $entry)
                        <option value="{{ $id }}" {{ old('dop_4_typ_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('dop_4_typ'))
                    <span class="text-danger">{{ $errors->first('dop_4_typ') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakaznagruz.fields.dop_4_typ_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="dop_4_tam_id">{{ trans('cruds.zakaznagruz.fields.dop_4_tam') }}</label>
                <select class="form-control select2 {{ $errors->has('dop_4_tam') ? 'is-invalid' : '' }}" name="dop_4_tam_id" id="dop_4_tam_id">
                    @foreach($dop_4_tams as $id => $entry)
                        <option value="{{ $id }}" {{ old('dop_4_tam_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('dop_4_tam'))
                    <span class="text-danger">{{ $errors->first('dop_4_tam') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakaznagruz.fields.dop_4_tam_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.zakaznagruz.fields.dop_5_t') }}</label>
                @foreach(App\Models\Zakaznagruz::DOP_5_T_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('dop_5_t') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="dop_5_t_{{ $key }}" name="dop_5_t" value="{{ $key }}" {{ old('dop_5_t', '') === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="dop_5_t_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('dop_5_t'))
                    <span class="text-danger">{{ $errors->first('dop_5_t') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakaznagruz.fields.dop_5_t_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="dop_5_adr">{{ trans('cruds.zakaznagruz.fields.dop_5_adr') }}</label>
                <input class="form-control {{ $errors->has('dop_5_adr') ? 'is-invalid' : '' }}" type="text" name="dop_5_adr" id="dop_5_adr" value="{{ old('dop_5_adr', '') }}">
                @if($errors->has('dop_5_adr'))
                    <span class="text-danger">{{ $errors->first('dop_5_adr') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakaznagruz.fields.dop_5_adr_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="dop_5_tot">{{ trans('cruds.zakaznagruz.fields.dop_5_tot') }}</label>
                <input class="form-control {{ $errors->has('dop_5_tot') ? 'is-invalid' : '' }}" type="text" name="dop_5_tot" id="dop_5_tot" value="{{ old('dop_5_tot', '') }}">
                @if($errors->has('dop_5_tot'))
                    <span class="text-danger">{{ $errors->first('dop_5_tot') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakaznagruz.fields.dop_5_tot_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="dop_5_val_id">{{ trans('cruds.zakaznagruz.fields.dop_5_val') }}</label>
                <select class="form-control select2 {{ $errors->has('dop_5_val') ? 'is-invalid' : '' }}" name="dop_5_val_id" id="dop_5_val_id">
                    @foreach($dop_5_vals as $id => $entry)
                        <option value="{{ $id }}" {{ old('dop_5_val_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('dop_5_val'))
                    <span class="text-danger">{{ $errors->first('dop_5_val') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakaznagruz.fields.dop_5_val_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="dop_5_typ_id">{{ trans('cruds.zakaznagruz.fields.dop_5_typ') }}</label>
                <select class="form-control select2 {{ $errors->has('dop_5_typ') ? 'is-invalid' : '' }}" name="dop_5_typ_id" id="dop_5_typ_id">
                    @foreach($dop_5_typs as $id => $entry)
                        <option value="{{ $id }}" {{ old('dop_5_typ_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('dop_5_typ'))
                    <span class="text-danger">{{ $errors->first('dop_5_typ') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakaznagruz.fields.dop_5_typ_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="dop_5_tam_id">{{ trans('cruds.zakaznagruz.fields.dop_5_tam') }}</label>
                <select class="form-control select2 {{ $errors->has('dop_5_tam') ? 'is-invalid' : '' }}" name="dop_5_tam_id" id="dop_5_tam_id">
                    @foreach($dop_5_tams as $id => $entry)
                        <option value="{{ $id }}" {{ old('dop_5_tam_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('dop_5_tam'))
                    <span class="text-danger">{{ $errors->first('dop_5_tam') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakaznagruz.fields.dop_5_tam_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="di">{{ trans('cruds.zakaznagruz.fields.di') }}</label>
                <input class="form-control {{ $errors->has('di') ? 'is-invalid' : '' }}" type="text" name="di" id="di" value="{{ old('di', '') }}">
                @if($errors->has('di'))
                    <span class="text-danger">{{ $errors->first('di') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakaznagruz.fields.di_helper') }}</span>
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