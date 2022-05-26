@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-9">
        <form method="POST" action="{{ route("admin.zakaznagruzs.store") }}" enctype="multipart/form-data">
            @csrf
            
<div class="card"><a name="gruz"></a>
    <div class="card-header">
        <div class="row">
            <div class="col-6" style="float:left;">
                <h4>Груз</h4>
            </div>
        </div>
    </div>
<div class="card-body">          
    <div class="row">
        <div class="col-4">                   
            
            <div class="form-group"  style="display:none;">
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
            </div></div><div class="col-2"> 
            <div class="form-group">
                <label for="tonnag">{{ trans('cruds.zakaznagruz.fields.tonnag') }}</label>
                <input class="form-control {{ $errors->has('tonnag') ? 'is-invalid' : '' }}" type="number" name="tonnag" id="tonnag" value="{{ old('tonnag', '') }}" step="1">
                @if($errors->has('tonnag'))
                    <span class="text-danger">{{ $errors->first('tonnag') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakaznagruz.fields.tonnag_helper') }}</span>
            </div></div>
    <div class="col-2"> 
            <div class="form-group">
                <label for="unit_id">{{ trans('cruds.zakaznagruz.fields.unit') }}</label>
                <select class="form-control select2 {{ $errors->has('unit') ? 'is-invalid' : '' }}" name="unit_id" id="unit_id">
                    @foreach($units as $id => $entry)
                        <option value="{{ $id }}" {{ old('unit_id') == $id ? 'selected' : '2' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('unit'))
                    <span class="text-danger">{{ $errors->first('unit') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakaznagruz.fields.unit_helper') }}</span>
            </div>
</div>

<div class="col-2"> 
<div class="form-group">
                <label for="kubatura">{{ trans('cruds.zakaznagruz.fields.kubatura') }}</label>
                <input class="form-control {{ $errors->has('kubatura') ? 'is-invalid' : '' }}" type="number" name="kubatura" id="kubatura" value="{{ old('kubatura', '') }}" step="0.01">
                @if($errors->has('kubatura'))
                    <span class="text-danger">{{ $errors->first('kubatura') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakaznagruz.fields.kubatura_helper') }}</span>
            </div>
</div>
</div>
    <div class="row">
        <div class="col-4">
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
            </div></div>
        <div class="col-2">
            <div class="form-group">
                <label for="qpack">{{ trans('cruds.zakaznagruz.fields.qpack') }}</label>
                <input class="form-control {{ $errors->has('qpack') ? 'is-invalid' : '' }}" type="text" name="qpack" id="qpack" value="{{ old('qpack', '') }}">
                @if($errors->has('qpack'))
                    <span class="text-danger">{{ $errors->first('qpack') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakaznagruz.fields.qpack_helper') }}</span>
            </div>
    </div></div>
 <div class="row">
        <div class="col-2">
            <div class="form-group">
                <label for="lendth">{{ trans('cruds.zakaznagruz.fields.lendth') }}</label>
                <input class="form-control {{ $errors->has('lendth') ? 'is-invalid' : '' }}" type="text" name="lendth" id="lendth" value="{{ old('lendth', '') }}">
                @if($errors->has('lendth'))
                    <span class="text-danger">{{ $errors->first('lendth') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakaznagruz.fields.lendth_helper') }}</span>
            </div>
            </div><div class="col-2">
            <div class="form-group">
                <label for="width">{{ trans('cruds.zakaznagruz.fields.width') }}</label>
                <input class="form-control {{ $errors->has('width') ? 'is-invalid' : '' }}" type="text" name="width" id="width" value="{{ old('width', '') }}">
                @if($errors->has('width'))
                    <span class="text-danger">{{ $errors->first('width') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakaznagruz.fields.width_helper') }}</span>
            </div>
            </div><div class="col-2">
            <div class="form-group">
                <label for="height">{{ trans('cruds.zakaznagruz.fields.height') }}</label>
                <input class="form-control {{ $errors->has('height') ? 'is-invalid' : '' }}" type="text" name="height" id="height" value="{{ old('height', '') }}">
                @if($errors->has('height'))
                    <span class="text-danger">{{ $errors->first('height') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakaznagruz.fields.height_helper') }}</span>
            </div>
            </div><div class="col-2">
            <div class="form-group">
                <label for="diameter">{{ trans('cruds.zakaznagruz.fields.diameter') }}</label>
                <input class="form-control {{ $errors->has('diameter') ? 'is-invalid' : '' }}" type="text" name="diameter" id="diameter" value="{{ old('diameter', '') }}">
                @if($errors->has('diameter'))
                    <span class="text-danger">{{ $errors->first('diameter') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakaznagruz.fields.diameter_helper') }}</span>
            </div>
    </div></div>
</div></div>


<div class="card"><a name="mar"></a>
    <div class="card-header">
        <div class="row">
            <div class="col-6" style="float:left;">
                <h4>Маршрут</h4>
            </div>
            <div class="col-6" style="float:left;display:none;">
                        <div class="form-group">
                <!--<label for="sapid">{{ trans('cruds.zakaznagruz.fields.sapid') }}</label>-->
                <input placeholder="{{ trans('cruds.zakaznagruz.fields.sapid') }}" class="form-control {{ $errors->has('sapid') ? 'is-invalid' : '' }}" type="text" name="sapid" id="sapid" value="{{ old('sapid', '') }}">
                @if($errors->has('sapid'))
                    <span class="text-danger">{{ $errors->first('sapid') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakaznagruz.fields.sapid_helper') }}</span>
            </div>
            </div>
        </div>
    </div>

<div class="card-body">
    
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
            <div class="row">
                <div class="col-3">
            <div class="form-group">
                <label for="dateload">{{ trans('cruds.zakaznagruz.fields.dateload') }}</label>
                <input class="form-control date {{ $errors->has('dateload') ? 'is-invalid' : '' }}" type="text" name="dateload" id="dateload" value="{{ old('dateload') }}">
                @if($errors->has('dateload'))
                    <span class="text-danger">{{ $errors->first('dateload') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakaznagruz.fields.dateload_helper') }}</span>
            </div>
            </div>



<div class="col-4" >
<div class="input-group" style="margin-top: 22px;">
  <label for="timeloada" style="margin-right: 20px;">{{ trans('cruds.zakaznagruz.fields.timeloada') }}  </label>
    <input class="time form-control {{ $errors->has('timeloada') ? 'is-invalid' : '' }}" type="text" name="timeloada" id="timeloada" value="{{ old('timeloada', '') }}">
    <input placeholder="до" class="time form-control {{ $errors->has('timeloadado') ? 'is-invalid' : '' }}" type="text" name="timeloadado" id="timeloadado" value="{{ old('timeloadado', '') }}">
</div>
</div>

<div class="col-3" style="display:none;">
    

            <div class="form-group">
                <label for="timeloada">{{ trans('cruds.zakaznagruz.fields.timeloada') }}</label>
                <input class="form-control time {{ $errors->has('timeloada') ? 'is-invalid' : '' }}" type="text" name="timeloada" id="timeloada" value="{{ old('timeloada', '') }}">
                @if($errors->has('timeloada'))
                    <span class="text-danger">{{ $errors->first('timeloada') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakaznagruz.fields.timeloada_helper') }}</span>
            </div>

</div>
<div class="col-3" style="display:none;">
            <div class="form-group">
                <label for="timeloadado">{{ trans('cruds.zakaznagruz.fields.timeloadado') }}</label>
                <input class="form-control time {{ $errors->has('timeloadado') ? 'is-invalid' : '' }}" type="text" name="timeloadado" id="timeloadado" value="{{ old('timeloadado', '') }}">
                @if($errors->has('timeloadado'))
                    <span class="text-danger">{{ $errors->first('timeloadado') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakaznagruz.fields.timeloadado_helper') }}</span>
            </div>
</div>

<div class="col-3">
            <div class="form-group" style="margin-top:25px;">
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
</div>
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
<div class="row">
                <div class="col-3">
            <div class="form-group">
                <label for="cdate">{{ trans('cruds.zakaznagruz.fields.cdate') }}</label>
                <input class="form-control date {{ $errors->has('cdate') ? 'is-invalid' : '' }}" type="text" name="cdate" id="cdate" value="{{ old('cdate') }}">
                @if($errors->has('cdate'))
                    <span class="text-danger">{{ $errors->first('cdate') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakaznagruz.fields.cdate_helper') }}</span>
            </div></div>
            


<div class="col-4" >
<div class="input-group" style="margin-top: 22px;">
  <label for="timeloada" style="margin-right: 20px;">{{ trans('cruds.zakaznagruz.fields.ctime') }} выгрузки </label>
    <input class="form-control time {{ $errors->has('ctime') ? 'is-invalid' : '' }}" type="text" name="ctime" id="ctime" value="{{ old('ctime', '') }}">
    <input placeholder="до" class="form-control time {{ $errors->has('ctimedo') ? 'is-invalid' : '' }}" type="text" name="ctimedo" id="ctimedo" value="{{ old('ctimedo', '') }}">
</div>
</div>


            <div class="col-3" style="display:none;">
            <div class="form-group" >
                <label for="ctime">{{ trans('cruds.zakaznagruz.fields.ctime') }}</label>
                <input class="form-control time{{ $errors->has('ctime') ? 'is-invalid' : '' }}" type="text" name="ctime" id="ctime" value="{{ old('ctime', '') }}">
                @if($errors->has('ctime'))
                    <span class="text-danger">{{ $errors->first('ctime') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakaznagruz.fields.ctime_helper') }}</span>
            </div></div>
            <div class="col-3" style="display:none;">
            <div class="form-group">
                <label for="ctimedo">{{ trans('cruds.zakaznagruz.fields.ctimedo') }}</label>
                <input class="form-control time {{ $errors->has('ctimedo') ? 'is-invalid' : '' }}" type="text" name="ctimedo" id="ctimedo" value="{{ old('ctimedo', '') }}">
                @if($errors->has('ctimedo'))
                    <span class="text-danger">{{ $errors->first('ctimedo') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakaznagruz.fields.ctimedo_helper') }}</span>
            </div></div>
            <div class="col-3">
            <div class="form-group" style="margin-top:25px;">
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
            
            
            </div></div>
            <div class="form-group">
                <label for="cdopinfo">{{ trans('cruds.zakaznagruz.fields.cdopinfo') }}</label>
                <input class="form-control {{ $errors->has('cdopinfo') ? 'is-invalid' : '' }}" type="text" name="cdopinfo" id="cdopinfo" value="{{ old('cdopinfo', '') }}">
                @if($errors->has('cdopinfo'))
                    <span class="text-danger">{{ $errors->first('cdopinfo') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakaznagruz.fields.cdopinfo_helper') }}</span>
            </div>

</div></div>
<div class="card"><a name="auto"></a>
    <div class="card-header">
        <div class="row">
            <div class="col-6" style="float:left;">
                <h4>Транспортое средство</h4>
            </div>
        </div>
    </div>
<div class="card-body"> 


<div class="row">
            <div class="col-4">

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
            </div></div>
            <div class="col-4">
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
            </div></div>
            <div class="col-4">
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
            </div> </div> </div>
<div class="row">
            <div class="col-4">
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
            </div></div>
            <div class="col-4">
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
            </div></div>
            <div class="col-4">
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
            </div> </div> </div>
            
<div class="row">
            <div class="col-3">
                
            <div class="form-group">
                <label for="qauto">{{ trans('cruds.zakaznagruz.fields.qauto') }}</label>
                <input class="form-control {{ $errors->has('qauto') ? 'is-invalid' : '' }}" type="text" name="qauto" id="qauto" value="1">
                @if($errors->has('qauto'))
                    <span class="text-danger">{{ $errors->first('qauto') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakaznagruz.fields.qauto_helper') }}</span>
            </div></div><div class="col-3">
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
            </div></div><div class="col-2">
            <div class="form-group">
                <label for="qbelt">{{ trans('cruds.zakaznagruz.fields.qbelt') }}</label>
                <input class="form-control {{ $errors->has('qbelt') ? 'is-invalid' : '' }}" type="text" name="qbelt" id="qbelt" value="{{ old('qbelt', '') }}">
                @if($errors->has('qbelt'))
                    <span class="text-danger">{{ $errors->first('qbelt') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakaznagruz.fields.qbelt_helper') }}</span>
            </div></div>
            
            <div class="col-4" >
<div class="input-group" style="margin-top: 22px;">
  <label for="tempot" style="margin-right: 22px;">{{ trans('cruds.zakaznagruz.fields.tempot') }}</label>
    <input placeholder="от" class="form-control {{ $errors->has('tempot') ? 'is-invalid' : '' }}" type="text" name="tempot" id="tempot" value="{{ old('tempot', '') }}">
    <input placeholder="до" class="form-control {{ $errors->has('tempdo') ? 'is-invalid' : '' }}" type="text" name="tempdo" id="tempdo" value="{{ old('tempdo', '') }}">
</div>
</div>
            
            
            
            <div class="col-2" style="display:none;">
            <div class="form-group">
                <label for="tempot">{{ trans('cruds.zakaznagruz.fields.tempot') }}</label>
                <input class="form-control {{ $errors->has('tempot') ? 'is-invalid' : '' }}" type="text" name="tempot" id="tempot" value="{{ old('tempot', '') }}">
                @if($errors->has('tempot'))
                    <span class="text-danger">{{ $errors->first('tempot') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakaznagruz.fields.tempot_helper') }}</span>
            </div></div>
            <div class="col-1" style="display:none;">
            <div class="form-group">
                <label for="tempdo">{{ trans('cruds.zakaznagruz.fields.tempdo') }}</label>
                <input class="form-control {{ $errors->has('tempdo') ? 'is-invalid' : '' }}" type="text" name="tempdo" id="tempdo" value="{{ old('tempdo', '') }}">
                @if($errors->has('tempdo'))
                    <span class="text-danger">{{ $errors->first('tempdo') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakaznagruz.fields.tempdo_helper') }}</span>
            </div></div>
            
            </div>
</div></div>           

<div class="card"><a name="oplata"></a>
    <div class="card-header">
        <div class="row">
            <div class="col-6" style="float:left;">
                <h4>Оплата</h4>
            </div>
        </div>
    </div>
<div class="card-body">
    
            <!--<div class="form-group">
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
            -->
            <div class="form-group">
                <label for="uoviaoplati">{{ trans('cruds.zakaznagruz.fields.uoviaoplati') }}</label>
                <input class="form-control {{ $errors->has('uoviaoplati') ? 'is-invalid' : '' }}" type="text" name="uoviaoplati" id="uoviaoplati" value="{{ old('uoviaoplati', '') }}">
                @if($errors->has('uoviaoplati'))
                    <span class="text-danger">{{ $errors->first('uoviaoplati') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakaznagruz.fields.uoviaoplati_helper') }}</span>
            </div>
</div></div>
<div class="card"><a name="offer"></a>
    <div class="card-header">
        <div class="row">
            <div class="col-6" style="float:left;">
                <h4>Условия</h4>
            </div>
        </div>
    </div>
<div class="card-body">
    
    

    
    
    
    
    
    
    
    
    
    
                <div class="form-group" style="display:none;">
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
            <div class="form-group" style="display:none;">
                <label for="uoviaoplati">{{ trans('cruds.zakaznagruz.fields.uoviaoplati') }}</label>
                <input class="form-control {{ $errors->has('uoviaoplati') ? 'is-invalid' : '' }}" type="text" name="uoviaoplati" id="uoviaoplati" value="{{ old('uoviaoplati', '') }}">
                @if($errors->has('uoviaoplati'))
                    <span class="text-danger">{{ $errors->first('uoviaoplati') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakaznagruz.fields.uoviaoplati_helper') }}</span>
            </div>
            <div class="form-group typetorgov">
                <!--<label>{{ trans('cruds.zakaznagruz.fields.typetorgov') }}</label>-->
                @foreach(App\Models\Zakaznagruz::TYPETORGOV_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('typetorgov') ? 'is-invalid' : '' }}">
                        <div class="btn-group" role="group" aria-label="Basic example">
                        <input class="form-check-input" type="radio" id="typetorgov_{{ $key }}" name="typetorgov" value="{{ $key }}" {{ old('typetorgov', '') === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="typetorgov_{{ $key }}">{{ $label }}</label>
                        </div>
                    </div>
                @endforeach
                @if($errors->has('typetorgov'))
                    <span class="text-danger">{{ $errors->first('typetorgov') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakaznagruz.fields.typetorgov_helper') }}</span>
            </div>
<script>
document.getElementById("typetorgov_2").addEventListener("change",
    function(){
if(document.getElementById("typetorgov_2").checked) {
  document.getElementById("max").style.display="block";
  document.getElementById("zap0").style.display="block";
  document.getElementById("hagponig").style.display="block";
}
});
document.getElementById("typetorgov_1").addEventListener("change",
                function(){
if(document.getElementById("typetorgov_1").checked) {
  document.getElementById("max").style.display="none";
  document.getElementById("zap0").style.display="none";
  document.getElementById("hagponig").style.display="block";
}
});
document.getElementById("typetorgov_0").addEventListener("change",
                function(){
if(document.getElementById("typetorgov_0").checked) {
  document.getElementById("max").style.display="none";
  document.getElementById("zap0").style.display="block";
  document.getElementById("hagponig").style.display="none";
}
});
document.getElementById("typetorgov_3").addEventListener("change",
                function(){
if(document.getElementById("typetorgov_3").checked) {
  document.getElementById("max").style.display="none";
  document.getElementById("zap0").style.display="block";
  document.getElementById("hagponig").style.display="block";
}
});
</script>
<style>

.typetorgov .form-check {
	display: inline-block;
	margin-right: 10px;
	padding-left: 0px;
}
.typetorgov .form-check input[type=radio] {
	display: none;
}
.typetorgov .form-check label {
	display: inline-block;
	cursor: pointer;
	padding: 0px 15px;
	line-height: 34px;
	border: 1px solid #999;
	border-radius: 6px;
	user-select: none;
}
/* Checked */
.typetorgov .form-check input[type=radio]:checked + label {
	background: #00264b;
	color: #fff;
}
/* Hover */
.typetorgov .form-check label:hover {
	color: #666;
}
/* Disabled */
.typetorgov .form-check input[type=radio]:disabled + label {
	background: #efefef;
	color: #666;
}
</style>


            <div class="form-group" >
                <label for="tekprice">{{ trans('cruds.zakaznagruz.fields.tekprice') }}</label>
                <input class="form-control {{ $errors->has('tekprice') ? 'is-invalid' : '' }}" type="text" name="tekprice" id="tekprice" value="{{ old('tekprice', '') }}">
                @if($errors->has('tekprice'))
                    <span class="text-danger">{{ $errors->first('tekprice') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakaznagruz.fields.tekprice_helper') }}</span>
            </div>
<div id="zap0" style="display:none;">
<div class="row">
    <div class="col-4">
            <div class="form-group">
                <label for="tart_tena">{{ trans('cruds.zakaznagruz.fields.tart_tena') }}</label>
                <input onchange="myFunction()" class="form-control {{ $errors->has('tart_tena') ? 'is-invalid' : '' }}" type="number" name="tart_tena" id="tart_tena" value="{{ old('tart_tena', '') }}" step="0.01">
                @if($errors->has('tart_tena'))
                    <span class="text-danger">{{ $errors->first('tart_tena') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakaznagruz.fields.tart_tena_helper') }}</span>
            </div></div>
            <div class="col-2">
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
            </div></div><div class="col-2">
            <div class="form-group">
                <label for="bankday">{{ trans('cruds.zakaznagruz.fields.bankday') }}</label>
                <input class="form-control {{ $errors->has('bankday') ? 'is-invalid' : '' }}" type="text" name="bankday" id="bankday" value="{{ old('bankday', '') }}">
                @if($errors->has('bankday'))
                    <span class="text-danger">{{ $errors->first('bankday') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakaznagruz.fields.bankday_helper') }}</span>
            </div></div><div class="col-3" id="hagponig" style="display:none;">
                            <div class="form-group">
                <label for="hagponig">{{ trans('cruds.zakaznagruz.fields.hagponig') }}</label>
                <input class="form-control {{ $errors->has('hagponig') ? 'is-invalid' : '' }}" type="number" name="hagponig" id="hagponig" value="{{ old('hagponig', '') }}" step="1">
                @if($errors->has('hagponig'))
                    <span class="text-danger">{{ $errors->first('hagponig') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakaznagruz.fields.hagponig_helper') }}</span>
            </div>
            
            </div>
</div>

<script>
myFunction() {
var mail = document.getElementById("tekprice");
$("#tart_tena").keyup(function() {
    mail.value = this.value;
});
}

/*
$(function() {                                       // <== Doc Ready
    $("#tart_tena").keyup(function() {                  // When the email is changed
        $('#tekprice').val(this.value);                  // copy it over to the mail
    });
});

/*
    $(document).ready(function() {
$('#tekprice').val($('#tart_tena').val());
}*/
</script>
<div class="row" ><div class="col-4">
            <div class="form-group">
                <label for="tart_nd">{{ trans('cruds.zakaznagruz.fields.tart_nd') }}</label>
                <input class="form-control {{ $errors->has('tart_nd') ? 'is-invalid' : '' }}" type="text" name="tart_nd" id="tart_nd" value="{{ old('tart_nd', '') }}">
                @if($errors->has('tart_nd'))
                    <span class="text-danger">{{ $errors->first('tart_nd') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakaznagruz.fields.tart_nd_helper') }}</span>
            </div></div><div class="col-2" style="display:none;">
            <div class="form-group" >
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
            </div></div><div class="col-2">
            <div class="form-group">
                <label for="bank_daynd">{{ trans('cruds.zakaznagruz.fields.bank_daynd') }}</label>
                <input class="form-control {{ $errors->has('bank_daynd') ? 'is-invalid' : '' }}" type="text" name="bank_daynd" id="bank_daynd" value="{{ old('bank_daynd', '') }}">
                @if($errors->has('bank_daynd'))
                    <span class="text-danger">{{ $errors->first('bank_daynd') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakaznagruz.fields.bank_daynd_helper') }}</span>
            </div></div>
            <div class="col-3" id="max" style="display:none;">
            
                        <div class="form-group">
                <label for="max">{{ trans('cruds.zakaznagruz.fields.max') }}</label>
                <input class="form-control {{ $errors->has('max') ? 'is-invalid' : '' }}" type="text" name="max" id="max" value="{{ old('max', '') }}">
                @if($errors->has('max'))
                    <span class="text-danger">{{ $errors->first('max') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakaznagruz.fields.max_helper') }}</span>
            </div>
            </div>
</div>
<div class="row" >
    <div class="col-4">
            <div class="form-group">
                <label for="nal">{{ trans('cruds.zakaznagruz.fields.nal') }}</label>
                <input class="form-control {{ $errors->has('nal') ? 'is-invalid' : '' }}" type="text" name="nal" id="nal" value="{{ old('nal', '') }}">
                @if($errors->has('nal'))
                    <span class="text-danger">{{ $errors->first('nal') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakaznagruz.fields.nal_helper') }}</span>
            </div></div>
    <div class="col-2" style="display:none;">
            <div class="form-group">
                <label for="naldn">{{ trans('cruds.zakaznagruz.fields.naldn') }}</label>
                <input class="form-control {{ $errors->has('naldn') ? 'is-invalid' : '' }}" type="text" name="naldn" id="naldn" value="{{ old('naldn', '') }}">
                @if($errors->has('naldn'))
                    <span class="text-danger">{{ $errors->first('naldn') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakaznagruz.fields.naldn_helper') }}</span>
            </div></div>
    <div class="col-2">
            <div class="form-group" style="margin-top:25px;">
                <div class="form-check {{ $errors->has('nalcard') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="nalcard" value="0">
                    <input class="form-check-input" type="checkbox" name="nalcard" id="nalcard" value="1" {{ old('nalcard', 0) == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="nalcard">{{ trans('cruds.zakaznagruz.fields.nalcard') }}</label>
                </div>
                @if($errors->has('nalcard'))
                    <span class="text-danger">{{ $errors->first('nalcard') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakaznagruz.fields.nalcard_helper') }}</span>
            </div></div>
            
    </div>

</div>
            <div class="form-group">
                <label for="dopinfoplata">{{ trans('cruds.zakaznagruz.fields.dopinfoplata') }}</label>
                <!--<input class="form-control {{ $errors->has('dopinfoplata') ? 'is-invalid' : '' }}" type="text" name="dopinfoplata" id="dopinfoplata" value="{{ old('dopinfoplata', '') }}">-->
                
                <input class="form-control {{ $errors->has('dopinfoplata') ? 'is-invalid' : '' }}" type="text" name="dopinfoplata" id="dopinfoplata" value="">
                
                
                
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
    
    
    
    
    
    
    
    
    
    
    
<!--
    
    
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


-->











</div></div>


<div class="card"><a name="date"></a>
    <div class="card-header">
        <div class="row">
            <div class="col-6" style="float:left;">
                <h4>Сроки проведения торгов</h4>
            </div>
        </div>
    </div>
<div class="card-body">
    
    
    
    
    <div class="row"><div class="col-6">
            <div class="form-group">
                <label>{{ trans('cruds.zakaznagruz.fields.nahalo') }}</label>
                <select class="form-control {{ $errors->has('nahalo') ? 'is-invalid' : '' }}" name="nahalo" id="nahalo">
                    <!--<option value disabled {{ old('nahalo', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Zakaznagruz::NAHALO_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('nahalo', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach-->
                    <option value="1">Сразу публикации</option>
                    <option value="10">В точное время</option>
                </select>
                @if($errors->has('nahalo'))
                    <span class="text-danger">{{ $errors->first('nahalo') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakaznagruz.fields.nahalo_helper') }}</span>
            </div>
            <script type="text/javascript">
                document.getElementById("nahalo").addEventListener("change",
                function(){
                    if (document.getElementById("nahalo").value==10) {
                    document.getElementById("mydiv").style.display="block";
                    document.getElementById("mydiv2").style.display="block";
                    }
                    else {
                    document.getElementById("mydiv").style.display="none";
                    document.getElementById("mydiv2").style.display="none";
                    }
                });
            </script>

            </div><div class="col-3 mydiv" style="display:none;" id="mydiv">
            <div class="form-group">
                <label for="nahalodate">{{ trans('cruds.zakaznagruz.fields.nahalodate') }}</label>
                <input class="form-control date {{ $errors->has('nahalodate') ? 'is-invalid' : '' }}" type="text" name="nahalodate" id="nahalodate" value="{{ old('nahalodate') }}">
                @if($errors->has('nahalodate'))
                    <span class="text-danger">{{ $errors->first('nahalodate') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakaznagruz.fields.nahalodate_helper') }}</span>
            </div></div><div class="col-3" style="display:none;" id="mydiv2">
            <div class="form-group">
                <label for="nahalotime">{{ trans('cruds.zakaznagruz.fields.nahalotime') }}</label>
                <input class="form-control time {{ $errors->has('nahalotime') ? 'is-invalid' : '' }}" type="time" name="nahalotime" id="nahalotime" value="{{ old('nahalotime', '') }}">
                @if($errors->has('nahalotime'))
                    <span class="text-danger">{{ $errors->first('nahalotime') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakaznagruz.fields.nahalotime_helper') }}</span>
            </div></div></div>
    <div class="row"><div class="col-6">
            <div class="form-group">
                <label>{{ trans('cruds.zakaznagruz.fields.finita') }}</label>
                <select class="form-control {{ $errors->has('finita') ? 'is-invalid' : '' }}" name="finita" id="finita">
                   <!-- <option value disabled {{ old('finita', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Zakaznagruz::FINITA_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('finita', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach-->
                    <option value="1">Через</option>
                    <option value="10">В точное время</option>
                </select>
                @if($errors->has('finita'))
                    <span class="text-danger">{{ $errors->first('finita') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakaznagruz.fields.finita_helper') }}</span>
            </div></div>

            <div class="col-2" id="hour">
            <div class="form-group">
                <label><!--{{ trans('cruds.zakaznagruz.fields.hour') }}--></label>
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
            </div></div><div class="col-2" id="min">
            <div class="form-group">
                <label><!--{{ trans('cruds.zakaznagruz.fields.min') }}--></label>
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
            </div> </div><div class="col-2" style="margin-top:25px;" id="over">после начала</div>
            
                       <script>
                   //document.getElementById('finitadate').valueAsDate = new Date();
                   //document.getElementById('finitadate').value = (new Date()).format("dd.mm.yyyy");
            </script>  
            
            <div class="col-3" id="finitadate">
            <div class="form-group">
                <label for="finitadate">{{ trans('cruds.zakaznagruz.fields.finitadate') }}</label>
                <input class="form-control {{ $errors->has('finitadate') ? 'is-invalid' : '' }}" type="text" name="finitadate" id="finitadate" value="{{ old('finitadate', '') }}">
                @if($errors->has('finitadate'))
                    <span class="text-danger">{{ $errors->first('finitadate') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakaznagruz.fields.finitadate_helper') }}</span>
            </div></div>

            
            <div class="col-3" id="finitatime" style="display:none;">
                        <div class="form-group">
                <label for="finitatime">{{ trans('cruds.zakaznagruz.fields.finitatime') }}</label>
                <input class="form-control {{ $errors->has('finitatime') ? 'is-invalid' : '' }}" type="time" name="finitatime" id="finitatime" value="{{ old('finitatime', '') }}">
                @if($errors->has('finitatime'))
                    <span class="text-danger">{{ $errors->first('finitatime') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakaznagruz.fields.finitatime_helper') }}</span>
            </div>
            </div></div>

            <input type="hidden" name="finitaCalcDate" />
            <script type="text/javascript">
                (function(){
                    document.getElementById("finita").addEventListener("change", function() {
                        const finitaVal = document.getElementById("finita").value;
                        console.log(finitaVal);
                        if (finitaVal == 10) {
                            document.getElementById("finitadate").style.display="block";
                            document.getElementById("finitatime").style.display="block";
                            document.getElementById("hour").style.display="none";
                            document.getElementById("min").style.display="none";                    
                            document.getElementById("over").style.display="none";                     
                        } else {
                            document.getElementById("finitadate").style.display="none";
                            document.getElementById("finitatime").style.display="none";
                            document.getElementById("hour").style.display="block";
                            document.getElementById("min").style.display="block";
                            document.getElementById("over").style.display="block"; 
                        }
                    });
                    function onChangeDateTime()
                    {
                        console.log('catched');
                        console.log(document.getElementById("finitadate"));
                        console.log(document.getElementById("finitatime"));
                        console.log(document.getElementById("hour"));
                        console.log(document.getElementById("min"));

                        let result = '';

                        const finitaVal = document.getElementById("finita").value;
                        if (finitaVal == 10) {
                            const finitadateVal = document.querySelector("[name='finitadate']").value;
                            const finitatimeVal = document.querySelector("[name='finitatime']").value;
                            result = `${finitadateVal} ${finitatimeVal}`;
                        } else {
                            const hourVal = document.querySelector("[name='hour']").value;
                            const minVal = document.querySelector("[name='min']").value;
                            const now = new Date();
                            const date = new Date(now.getTime() + (hourVal * 60)*60000 + minVal*60000);
                            const dateYear = date.getFullYear();
                            let dateMonth = date.getMonth() + 1;
                            let dateDate = date.getDate();
                            let dateHour = date.getHours();
                            let dateMin = date.getMinutes();
                            dateMonth = dateMonth < 10 ? `0${dateMonth}` : dateMonth;
                            dateDate = dateDate < 10 ? `0${dateDate}` : dateDate;
                            dateHour = dateHour < 10 ? `0${dateHour}` : dateHour;
                            dateMin = dateMin < 10 ? `0${dateMin}` : dateMin;
                            result = `${dateDate}.${dateMonth}.${dateYear} ${dateHour}:${dateMin}`;
                        }
                        console.log(result);
                        document.querySelector("[name='finitaCalcDate']").value = result;
                    }
                    document.querySelector("[name='finitadate']").addEventListener("change", onChangeDateTime);
                    document.querySelector("[name='finitatime']").addEventListener("change", onChangeDateTime);
                    document.querySelector("[name='hour']").addEventListener("change", onChangeDateTime);
                    document.querySelector("[name='min']").addEventListener("change", onChangeDateTime);
                }())
            </script>
    
    
    
    
    
    
    
    
    
    
    
    <!--
    
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
                <label for="finitatime">{{ trans('cruds.zakaznagruz.fields.finitatime') }}</label>
                <input class="form-control {{ $errors->has('finitatime') ? 'is-invalid' : '' }}" type="text" name="finitatime" id="finitatime" value="{{ old('finitatime', '') }}">
                @if($errors->has('finitatime'))
                    <span class="text-danger">{{ $errors->first('finitatime') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakaznagruz.fields.finitatime_helper') }}</span>
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
            -->
            
            
            
            
            
</div></div>
            <div class="form-group">
                <button class="btn btn-info" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
    <div class="col-3 ">
    
    <div class="position-fixed">
    <div class="card ">
       <div class="card-body ">
<div class="btn-group-vertical " style="width:100%;">
<a href="#gruz" style="width:100%;"><button class="btn btn-outline-primary">Груз</button></a>
<a href="#mar" style="width:100%;"><button class="btn btn-outline-primary">Маршрут</button></a>
<a href="#auto" style="width:100%;"><button class="btn btn-outline-primary">Транспорт</button></a>
<a href="#oplata" style="width:100%;"><button class="btn btn-outline-primary">Оплата</button></a>
<a href="#offer" style="width:100%;"><button class="btn btn-outline-primary">Условия</button></a>
<a href="#date" style="width:100%;"><button class="btn btn-outline-primary">Сроки</button></a>
</div>
</div> 
    </div>
     <div class="card">
         <div class="card-header">
             <h6>Профиль заполнен на: </h6>
         </div>
       <div class="card-body ">
<div class="progress">
  <div class="progress-bar" role="progressbar" style="width: 90%;" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">90%</div>
</div>
</div> 
    </div>
    </div>
</div>
</div>
<style>
.btn-xs {
    display:none;
}
</style>
@endsection