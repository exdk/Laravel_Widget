@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-9">
        <form method="POST" action="{{ route("admin.drivers.store") }}" enctype="multipart/form-data">
            @csrf
<div class="card"><a name="ob"></a>
    <div class="card-header">
        <div class="row">
            <div class="col-6" style="float:left;">
                <h4>Общая информация</h4>
            </div>
        </div>
    </div>
<div class="card-body">

    <div class="row">
    <div class="col-4">
            <div class="form-group">
                <label for="photo">{{ trans('cruds.driver.fields.photo') }}</label>
                <div class="needsclick dropzone {{ $errors->has('photo') ? 'is-invalid' : '' }}" id="photo-dropzone">
                </div>
                @if($errors->has('photo'))
                    <span class="text-danger">{{ $errors->first('photo') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.driver.fields.photo_helper') }}</span>
            </div>
    </div>
    <div class="col-4">
                    
            <div class="form-group">
                <label for="fam">{{ trans('cruds.driver.fields.fam') }}</label>
                <input class="form-control {{ $errors->has('fam') ? 'is-invalid' : '' }}" type="text" name="fam" id="fam" value="{{ old('fam', '') }}">
                @if($errors->has('fam'))
                    <span class="text-danger">{{ $errors->first('fam') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.driver.fields.fam_helper') }}</span>
            </div>

            <div class="form-group">
                <label for="oth">{{ trans('cruds.driver.fields.oth') }}</label>
                <input class="form-control {{ $errors->has('oth') ? 'is-invalid' : '' }}" type="text" name="oth" id="oth" value="{{ old('oth', '') }}">
                @if($errors->has('oth'))
                    <span class="text-danger">{{ $errors->first('oth') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.driver.fields.oth_helper') }}</span>
            </div>            
            
            
            
            </div>
    <div class="col-4"> 
            <div class="form-group">
                <label for="name">{{ trans('cruds.driver.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}">
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.driver.fields.name_helper') }}</span>
            </div>
    </div>
</div>
            <div class="row">
    <div class="col-4"> 
            <div class="form-group">
                <label for="date">{{ trans('cruds.driver.fields.date') }}</label>
                <input class="form-control date {{ $errors->has('date') ? 'is-invalid' : '' }}" type="text" name="date" id="date" value="{{ old('date') }}">
                @if($errors->has('date'))
                    <span class="text-danger">{{ $errors->first('date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.driver.fields.date_helper') }}</span>
            </div></div><div class="col-8"> 
            <div class="form-group">
                <label for="birth_place">{{ trans('cruds.driver.fields.birth_place') }}</label>
                <input class="form-control {{ $errors->has('birth_place') ? 'is-invalid' : '' }}" type="text" name="birth_place" id="birth_place" value="{{ old('birth_place', '') }}">
                @if($errors->has('birth_place'))
                    <span class="text-danger">{{ $errors->first('birth_place') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.driver.fields.birth_place_helper') }}</span>
            </div></div></div>
                </div>
    </div>                

<div class="card"><a name="ko"></a>
    <div class="card-header">
                <div class="row">
            <div class="col-6" style="float:left;">
                <h4>Паспорт</h4>
            </div>
        </div>
    </div>
<div class="card-body">
     <div class="row">
    <div class="col-3">      
                <div class="form-group">
                <label for="pa_ty">{{ trans('cruds.driver.fields.pa_ty') }}</label>
                <input class="form-control pa_ty {{ $errors->has('pa_ty') ? 'is-invalid' : '' }}" type="text" name="pa_ty" id="pa_ty" value="{{ old('pa_ty', '') }}">
                @if($errors->has('pa_ty'))
                    <span class="text-danger">{{ $errors->first('pa_ty') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.driver.fields.pa_ty_helper') }}</span>
            </div></div><div class="col-3"> 
            <div class="form-group">
                <label for="pa_nomer">{{ trans('cruds.driver.fields.pa_nomer') }}</label>
                <input class="form-control pa_nomer {{ $errors->has('pa_nomer') ? 'is-invalid' : '' }}" type="text" name="pa_nomer" id="pa_nomer" value="{{ old('pa_nomer', '') }}">
                @if($errors->has('pa_nomer'))
                    <span class="text-danger">{{ $errors->first('pa_nomer') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.driver.fields.pa_nomer_helper') }}</span>
            </div></div><div class="col-3"> 
            <div class="form-group">
                <label for="pa_date">{{ trans('cruds.driver.fields.pa_date') }}</label>
                <input class="form-control date {{ $errors->has('pa_date') ? 'is-invalid' : '' }}" type="text" name="pa_date" id="pa_date" value="{{ old('pa_date') }}">
                @if($errors->has('pa_date'))
                    <span class="text-danger">{{ $errors->first('pa_date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.driver.fields.pa_date_helper') }}</span>
            </div></div><div class="col-3"> 
            <div class="form-group">
                <label for="pa_kod">{{ trans('cruds.driver.fields.pa_kod') }}</label>
                <input class="form-control {{ $errors->has('pa_kod') ? 'is-invalid' : '' }}" type="text" name="pa_kod" id="pa_kod" value="{{ old('pa_kod', '') }}">
                @if($errors->has('pa_kod'))
                    <span class="text-danger">{{ $errors->first('pa_kod') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.driver.fields.pa_kod_helper') }}</span>
            </div></div></div>
            <div class="form-group">
                <label for="pa_by">{{ trans('cruds.driver.fields.pa_by') }}</label>
                <input class="form-control {{ $errors->has('pa_by') ? 'is-invalid' : '' }}" name="pa_by" id="pa_by">
                @if($errors->has('pa_by'))
                    <span class="text-danger">{{ $errors->first('pa_by') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.driver.fields.pa_by_helper') }}</span>
            </div>
<div class="row">
    <div class="col-6"> 
            <div class="form-group">
                <label for="pa_perv">{{ trans('cruds.driver.fields.pa_perv') }}</label>
                <div class="needsclick dropzone {{ $errors->has('pa_perv') ? 'is-invalid' : '' }}" id="pa_perv-dropzone">
                </div>
                @if($errors->has('pa_perv'))
                    <span class="text-danger">{{ $errors->first('pa_perv') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.driver.fields.pa_perv_helper') }}</span>
            </div>
    </div>
    <div class="col-6"> 
            <div class="form-group">
                <label for="pa_vtor">{{ trans('cruds.driver.fields.pa_vtor') }}</label>
                <div class="needsclick dropzone {{ $errors->has('pa_vtor') ? 'is-invalid' : '' }}" id="pa_vtor-dropzone">
                </div>
                @if($errors->has('pa_vtor'))
                    <span class="text-danger">{{ $errors->first('pa_vtor') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.driver.fields.pa_vtor_helper') }}</span>
            </div>
            </div>
</div>
<div class="row">
    <div class="col-8"> 
            <div class="form-group">
                <label for="adr_pro">{{ trans('cruds.driver.fields.adr_pro') }}</label>
                <input class="form-control {{ $errors->has('adr_pro') ? 'is-invalid' : '' }}" type="text" name="adr_pro" id="adr_pro" value="{{ old('adr_pro', '') }}">
                @if($errors->has('adr_pro'))
                    <span class="text-danger">{{ $errors->first('adr_pro') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.driver.fields.adr_pro_helper') }}</span>
            </div>
    </div>
    <div class="col-4"> 
            <div class="form-group">
                <label for="pro_date">{{ trans('cruds.driver.fields.pro_date') }}</label>
                <input class="form-control {{ $errors->has('pro_date') ? 'is-invalid' : '' }}" type="text" name="pro_date" id="pro_date" value="{{ old('pro_date', '') }}">
                @if($errors->has('pro_date'))
                    <span class="text-danger">{{ $errors->first('pro_date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.driver.fields.pro_date_helper') }}</span>
            </div>
    </div>
</div>
            <div class="form-group">
                <label for="pro_vr_adr">{{ trans('cruds.driver.fields.pro_vr_adr') }}</label>
                <input class="form-control {{ $errors->has('pro_vr_adr') ? 'is-invalid' : '' }}" type="text" name="pro_vr_adr" id="pro_vr_adr" value="{{ old('pro_vr_adr', '') }}">
                @if($errors->has('pro_vr_adr'))
                    <span class="text-danger">{{ $errors->first('pro_vr_adr') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.driver.fields.pro_vr_adr_helper') }}</span>
            </div>
            <div class="row">
    <div class="col-6">
            <div class="form-group">
                <label for="pro_vr_date_ot">{{ trans('cruds.driver.fields.pro_vr_date_ot') }}</label>
                <input class="form-control date {{ $errors->has('pro_vr_date_ot') ? 'is-invalid' : '' }}" type="text" name="pro_vr_date_ot" id="pro_vr_date_ot" value="{{ old('pro_vr_date_ot') }}">
                @if($errors->has('pro_vr_date_ot'))
                    <span class="text-danger">{{ $errors->first('pro_vr_date_ot') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.driver.fields.pro_vr_date_ot_helper') }}</span>
            </div></div><div class="col-6">
            <div class="form-group">
                <label for="pro_vr_date_do">{{ trans('cruds.driver.fields.pro_vr_date_do') }}</label>
                <input class="form-control date {{ $errors->has('pro_vr_date_do') ? 'is-invalid' : '' }}" type="text" name="pro_vr_date_do" id="pro_vr_date_do" value="{{ old('pro_vr_date_do') }}">
                @if($errors->has('pro_vr_date_do'))
                    <span class="text-danger">{{ $errors->first('pro_vr_date_do') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.driver.fields.pro_vr_date_do_helper') }}</span>
            </div></div></div>
 </div>
    </div>
<div class="card"><a name="re"></a>
    <div class="card-header">
        <div class="row">
            <div class="col-6" style="float:left;">
                <h4>Водительское удостоверение</h4>
            </div>
        </div>
    </div>
<div class="card-body"> 
            
            <div class="form-group">
                <label for="nomervu">{{ trans('cruds.driver.fields.nomervu') }}</label>
                <input class="form-control nomervu {{ $errors->has('nomervu') ? 'is-invalid' : '' }}" type="text" name="nomervu" id="nomervu" value="{{ old('nomervu', '') }}">
                @if($errors->has('nomervu'))
                    <span class="text-danger">{{ $errors->first('nomervu') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.driver.fields.nomervu_helper') }}</span>
            </div>
            <div class="row">
    <div class="col-4">
            <div class="form-group">
                <label for="datevu">{{ trans('cruds.driver.fields.datevu') }}</label>
                <input class="form-control date {{ $errors->has('datevu') ? 'is-invalid' : '' }}" type="text" name="datevu" id="datevu" value="{{ old('datevu') }}">
                @if($errors->has('datevu'))
                    <span class="text-danger">{{ $errors->first('datevu') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.driver.fields.datevu_helper') }}</span>
            </div></div><div class="col-4">
            <div class="form-group">
                <label for="byvu">{{ trans('cruds.driver.fields.byvu') }}</label>
                <input class="form-control {{ $errors->has('byvu') ? 'is-invalid' : '' }}" type="text" name="byvu" id="byvu" value="{{ old('byvu', '') }}">
                @if($errors->has('byvu'))
                    <span class="text-danger">{{ $errors->first('byvu') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.driver.fields.byvu_helper') }}</span>
            </div></div><div class="col-4">
            <div class="form-group">
                <label for="vu_gorod">{{ trans('cruds.driver.fields.vu_gorod') }}</label>
                <input class="form-control {{ $errors->has('vu_gorod') ? 'is-invalid' : '' }}" type="text" name="vu_gorod" id="vu_gorod" value="{{ old('vu_gorod', '') }}">
                @if($errors->has('vu_gorod'))
                    <span class="text-danger">{{ $errors->first('vu_gorod') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.driver.fields.vu_gorod_helper') }}</span>
            </div></div></div>
             <div class="row">
    <div class="col-6">
            <div class="form-group">
                <label for="vu_perv">{{ trans('cruds.driver.fields.vu_perv') }}</label>
                <div class="needsclick dropzone {{ $errors->has('vu_perv') ? 'is-invalid' : '' }}" id="vu_perv-dropzone">
                </div>
                @if($errors->has('vu_perv'))
                    <span class="text-danger">{{ $errors->first('vu_perv') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.driver.fields.vu_perv_helper') }}</span>
            </div></div><div class="col-6">
            <div class="form-group">
                <label for="vu_vtor">{{ trans('cruds.driver.fields.vu_vtor') }}</label>
                <div class="needsclick dropzone {{ $errors->has('vu_vtor') ? 'is-invalid' : '' }}" id="vu_vtor-dropzone">
                </div>
                @if($errors->has('vu_vtor'))
                    <span class="text-danger">{{ $errors->first('vu_vtor') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.driver.fields.vu_vtor_helper') }}</span>
            </div></div></div>
            
</div>
</div>          

<div class="card"><a name="rei"></a>
    <div class="card-header">
        <div class="row">
            <div class="col-6" style="float:left;">
                <h4>Контакты</h4>
            </div>
        </div>
    </div>
<div class="card-body">   
  <div class="row">
    <div class="col-4">    
<div class="form-group">
                <label for="email">{{ trans('cruds.driver.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email') }}">
                @if($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.driver.fields.email_helper') }}</span>
            </div></div><div class="col-4">  
            <div class="form-group">
                <label for="mobile_a">{{ trans('cruds.driver.fields.mobile_a') }}</label>
                <input class="form-control mask-phone {{ $errors->has('mobile_a') ? 'is-invalid' : '' }}" type="text" name="mobile_a" id="mobile_a" value="{{ old('mobile_a', '') }}">
                @if($errors->has('mobile_a'))
                    <span class="text-danger">{{ $errors->first('mobile_a') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.driver.fields.mobile_a_helper') }}</span>
            </div></div><div class="col-4">  
            <div class="form-group">
                <label for="mobile_b">{{ trans('cruds.driver.fields.mobile_b') }}</label>
                <input class="form-control mask-phone {{ $errors->has('mobile_b') ? 'is-invalid' : '' }}" type="text" name="mobile_b" id="mobile_b" value="{{ old('mobile_b', '') }}">
                @if($errors->has('mobile_b'))
                    <span class="text-danger">{{ $errors->first('mobile_b') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.driver.fields.mobile_b_helper') }}</span>
            </div></div></div>

 </div>
            </div>
<div class="card"><a name="geo"></a>
    <div class="card-header">
        <div class="row">
            <div class="col-6" style="float:left;">
                <h4>Документы</h4>
            </div>
        </div>
    </div>
<div class="card-body">    
            <div class="form-group">
                <label for="taho">{{ trans('cruds.driver.fields.taho') }}</label>
                <input class="form-control {{ $errors->has('taho') ? 'is-invalid' : '' }}" type="text" name="taho" id="taho" value="{{ old('taho', '') }}">
                @if($errors->has('taho'))
                    <span class="text-danger">{{ $errors->first('taho') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.driver.fields.taho_helper') }}</span>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="inn">{{ trans('cruds.driver.fields.inn') }}</label>
                        <input class="form-control inn {{ $errors->has('inn') ? 'is-invalid' : '' }}" type="text" name="inn" id="inn" value="{{ old('inn', '') }}">
                        @if($errors->has('inn'))
                            <span class="text-danger">{{ $errors->first('inn') }}</span>
                        @endif
                        <span class="help-block">{{ trans('cruds.driver.fields.inn_helper') }}</span>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="pfr">{{ trans('cruds.driver.fields.pfr') }}</label>
                        <input class="form-control pfr {{ $errors->has('pfr') ? 'is-invalid' : '' }}" type="text" name="pfr" id="pfr" value="{{ old('pfr', '') }}">
                        @if($errors->has('pfr'))
                            <span class="text-danger">{{ $errors->first('pfr') }}</span>
                        @endif
                        <span class="help-block">{{ trans('cruds.driver.fields.pfr_helper') }}</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="inn_photo">{{ trans('cruds.driver.fields.inn_photo') }}</label>
                        <div class="needsclick dropzone {{ $errors->has('inn_photo') ? 'is-invalid' : '' }}" id="inn_photo-dropzone">
                        </div>
                        @if($errors->has('inn_photo'))
                            <span class="text-danger">{{ $errors->first('inn_photo') }}</span>
                        @endif
                        <span class="help-block">{{ trans('cruds.driver.fields.inn_photo_helper') }}</span>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="pfr_perv">{{ trans('cruds.driver.fields.pfr_perv') }}</label>
                        <div class="needsclick dropzone {{ $errors->has('pfr_perv') ? 'is-invalid' : '' }}" id="pfr_perv-dropzone">
                        </div>
                        @if($errors->has('pfr_perv'))
                            <span class="text-danger">{{ $errors->first('pfr_perv') }}</span>
                        @endif
                        <span class="help-block">{{ trans('cruds.driver.fields.pfr_perv_helper') }}</span>
                    </div>
                </div>
            </div>
            <div class="row">
    <div class="col-4">
            <div class="form-group">
                <label for="medb_nomer">{{ trans('cruds.driver.fields.medb_nomer') }}</label>
                <input class="form-control {{ $errors->has('medb_nomer') ? 'is-invalid' : '' }}" type="text" name="medb_nomer" id="medb_nomer" value="{{ old('medb_nomer', '') }}">
                @if($errors->has('medb_nomer'))
                    <span class="text-danger">{{ $errors->first('medb_nomer') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.driver.fields.medb_nomer_helper') }}</span>
            </div></div><div class="col-4">
            <div class="form-group">
                <label for="medb_typ">{{ trans('cruds.driver.fields.medb_typ') }}</label>
                <input class="form-control {{ $errors->has('medb_typ') ? 'is-invalid' : '' }}" type="text" name="medb_typ" id="medb_typ" value="{{ old('medb_typ', '') }}">
                @if($errors->has('medb_typ'))
                    <span class="text-danger">{{ $errors->first('medb_typ') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.driver.fields.medb_typ_helper') }}</span>
            </div></div><div class="col-4">
            <div class="form-group">
                <label for="medb_date_ot">{{ trans('cruds.driver.fields.medb_date_ot') }}</label>
                <input class="form-control date {{ $errors->has('medb_date_ot') ? 'is-invalid' : '' }}" type="text" name="medb_date_ot" id="medb_date_ot" value="{{ old('medb_date_ot') }}">
                @if($errors->has('medb_date_ot'))
                    <span class="text-danger">{{ $errors->first('medb_date_ot') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.driver.fields.medb_date_ot_helper') }}</span>
            </div></div></div>
            <div class="form-group">
                <label for="medb_perv">{{ trans('cruds.driver.fields.medb_perv') }}</label>
                <div class="needsclick dropzone {{ $errors->has('medb_perv') ? 'is-invalid' : '' }}" id="medb_perv-dropzone">
                </div>
                @if($errors->has('medb_perv'))
                    <span class="text-danger">{{ $errors->first('medb_perv') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.driver.fields.medb_perv_helper') }}</span>
            </div>
</div>
</div>
<div class="card"><a name="file"></a>
    <div class="card-header">
        <div class="row">
            <div class="col-6" style="float:left;">
                <h4>Договор</h4>
            </div>
        </div>
    </div>
<div class="card-body">  
            <div class="row">
    <div class="col-4">
            
            <div class="form-group">
                <label for="trud_nomer">{{ trans('cruds.driver.fields.trud_nomer') }}</label>
                <input class="form-control {{ $errors->has('trud_nomer') ? 'is-invalid' : '' }}" type="text" name="trud_nomer" id="trud_nomer" value="{{ old('trud_nomer', '') }}">
                @if($errors->has('trud_nomer'))
                    <span class="text-danger">{{ $errors->first('trud_nomer') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.driver.fields.trud_nomer_helper') }}</span>
            </div></div><div class="col-4">
            <div class="form-group">
                <label for="trud_date_ot">{{ trans('cruds.driver.fields.trud_date_ot') }}</label>
                <input class="form-control date {{ $errors->has('trud_date_ot') ? 'is-invalid' : '' }}" type="text" name="trud_date_ot" id="trud_date_ot" value="{{ old('trud_date_ot') }}">
                @if($errors->has('trud_date_ot'))
                    <span class="text-danger">{{ $errors->first('trud_date_ot') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.driver.fields.trud_date_ot_helper') }}</span>
            </div></div><div class="col-4">
            <div class="form-group">
                <label for="trud_dol">{{ trans('cruds.driver.fields.trud_dol') }}</label>
                <input class="form-control {{ $errors->has('trud_dol') ? 'is-invalid' : '' }}" type="text" name="trud_dol" id="trud_dol" value="{{ old('trud_dol', '') }}">
                @if($errors->has('trud_dol'))
                    <span class="text-danger">{{ $errors->first('trud_dol') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.driver.fields.trud_dol_helper') }}</span>
            </div></div></div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
                        </div>
</div>  
        </form>

</div>
<div class="col-3 ">
    
    <div class="position-fixed">
    <div class="card ">
       <div class="card-body ">
<div class="btn-group-vertical ">
<a href="#ob" style="width:100%;"><button class="btn btn-outline-primary">Общая информация</button></a>
<a href="#ko" style="width:100%;"><button class="btn btn-outline-primary">Паспорт</button></a>
<a href="#re" style="width:100%;"><button class="btn btn-outline-primary">Водительское</button></a>
<a href="#rei" style="width:100%;"><button class="btn btn-outline-primary">Контакты</button></a>
<a href="#geo" style="width:100%;"><button class="btn btn-outline-primary">Документы</button></a>
<a href="#file" style="width:100%;"><button class="btn btn-outline-primary">Договор</button></a>
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
</div>


@endsection

@section('scripts')
<script>
    Dropzone.options.paPervDropzone = {
    url: '{{ route('admin.drivers.storeMedia') }}',
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
      $('form').find('input[name="pa_perv"]').remove()
      $('form').append('<input type="hidden" name="pa_perv" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="pa_perv"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($driver) && $driver->pa_perv)
      var file = {!! json_encode($driver->pa_perv) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="pa_perv" value="' + file.file_name + '">')
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
    Dropzone.options.paVtorDropzone = {
    url: '{{ route('admin.drivers.storeMedia') }}',
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
      $('form').find('input[name="pa_vtor"]').remove()
      $('form').append('<input type="hidden" name="pa_vtor" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="pa_vtor"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($driver) && $driver->pa_vtor)
      var file = {!! json_encode($driver->pa_vtor) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="pa_vtor" value="' + file.file_name + '">')
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
    Dropzone.options.vuPervDropzone = {
    url: '{{ route('admin.drivers.storeMedia') }}',
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
      $('form').find('input[name="vu_perv"]').remove()
      $('form').append('<input type="hidden" name="vu_perv" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="vu_perv"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($driver) && $driver->vu_perv)
      var file = {!! json_encode($driver->vu_perv) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="vu_perv" value="' + file.file_name + '">')
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
    Dropzone.options.vuVtorDropzone = {
    url: '{{ route('admin.drivers.storeMedia') }}',
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
      $('form').find('input[name="vu_vtor"]').remove()
      $('form').append('<input type="hidden" name="vu_vtor" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="vu_vtor"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($driver) && $driver->vu_vtor)
      var file = {!! json_encode($driver->vu_vtor) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="vu_vtor" value="' + file.file_name + '">')
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
    Dropzone.options.innPhotoDropzone = {
    url: '{{ route('admin.drivers.storeMedia') }}',
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
      $('form').find('input[name="inn_photo"]').remove()
      $('form').append('<input type="hidden" name="inn_photo" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="inn_photo"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($driver) && $driver->inn_photo)
      var file = {!! json_encode($driver->inn_photo) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="inn_photo" value="' + file.file_name + '">')
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
    Dropzone.options.pfrPervDropzone = {
    url: '{{ route('admin.drivers.storeMedia') }}',
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
      $('form').find('input[name="pfr_perv"]').remove()
      $('form').append('<input type="hidden" name="pfr_perv" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="pfr_perv"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($driver) && $driver->pfr_perv)
      var file = {!! json_encode($driver->pfr_perv) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="pfr_perv" value="' + file.file_name + '">')
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
    var uploadedMedbPervMap = {}
Dropzone.options.medbPervDropzone = {
    url: '{{ route('admin.drivers.storeMedia') }}',
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
      $('form').append('<input type="hidden" name="medb_perv[]" value="' + response.name + '">')
      uploadedMedbPervMap[file.name] = response.name
    },
    removedfile: function (file) {
      console.log(file)
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedMedbPervMap[file.name]
      }
      $('form').find('input[name="medb_perv[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($driver) && $driver->medb_perv)
      var files = {!! json_encode($driver->medb_perv) !!}
          for (var i in files) {
          var file = files[i]
          this.options.addedfile.call(this, file)
          this.options.thumbnail.call(this, file, file.preview)
          file.previewElement.classList.add('dz-complete')
          $('form').append('<input type="hidden" name="medb_perv[]" value="' + file.file_name + '">')
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



<script>
    Dropzone.options.photoDropzone = {
    url: '{{ route('admin.drivers.storeMedia') }}',
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
      $('form').find('input[name="photo"]').remove()
      $('form').append('<input type="hidden" name="photo" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="photo"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($driver) && $driver->photo)
      var file = {!! json_encode($driver->photo) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="photo" value="' + file.file_name + '">')
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