@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.listproduct.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.listproducts.update", [$listproduct->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="id_vnutr">{{ trans('cruds.listproduct.fields.id_vnutr') }}</label>
                <input class="form-control {{ $errors->has('id_vnutr') ? 'is-invalid' : '' }}" type="text" name="id_vnutr" id="id_vnutr" value="{{ old('id_vnutr', $listproduct->id_vnutr) }}">
                @if($errors->has('id_vnutr'))
                    <span class="text-danger">{{ $errors->first('id_vnutr') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.listproduct.fields.id_vnutr_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="title_id">{{ trans('cruds.listproduct.fields.title') }}</label>
                <select class="form-control select2 {{ $errors->has('title') ? 'is-invalid' : '' }}" name="title_id" id="title_id">
                    @foreach($titles as $id => $entry)
                        <option value="{{ $id }}" {{ (old('title_id') ? old('title_id') : $listproduct->title->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('title'))
                    <span class="text-danger">{{ $errors->first('title') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.listproduct.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="quantity">{{ trans('cruds.listproduct.fields.quantity') }}</label>
                <input class="form-control {{ $errors->has('quantity') ? 'is-invalid' : '' }}" type="text" name="quantity" id="quantity" value="{{ old('quantity', $listproduct->quantity) }}">
                @if($errors->has('quantity'))
                    <span class="text-danger">{{ $errors->first('quantity') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.listproduct.fields.quantity_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="type_pack">{{ trans('cruds.listproduct.fields.type_pack') }}</label>
                <input class="form-control {{ $errors->has('type_pack') ? 'is-invalid' : '' }}" type="text" name="type_pack" id="type_pack" value="{{ old('type_pack', $listproduct->type_pack) }}">
                @if($errors->has('type_pack'))
                    <span class="text-danger">{{ $errors->first('type_pack') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.listproduct.fields.type_pack_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="unitcount">{{ trans('cruds.listproduct.fields.unitcount') }}</label>
                <input class="form-control {{ $errors->has('unitcount') ? 'is-invalid' : '' }}" type="text" name="unitcount" id="unitcount" value="{{ old('unitcount', $listproduct->unitcount) }}">
                @if($errors->has('unitcount'))
                    <span class="text-danger">{{ $errors->first('unitcount') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.listproduct.fields.unitcount_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="type_pack_tr_id">{{ trans('cruds.listproduct.fields.type_pack_tr') }}</label>
                <select class="form-control select2 {{ $errors->has('type_pack_tr') ? 'is-invalid' : '' }}" name="type_pack_tr_id" id="type_pack_tr_id">
                    @foreach($type_pack_trs as $id => $entry)
                        <option value="{{ $id }}" {{ (old('type_pack_tr_id') ? old('type_pack_tr_id') : $listproduct->type_pack_tr->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('type_pack_tr'))
                    <span class="text-danger">{{ $errors->first('type_pack_tr') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.listproduct.fields.type_pack_tr_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="tr_quan">{{ trans('cruds.listproduct.fields.tr_quan') }}</label>
                <input class="form-control {{ $errors->has('tr_quan') ? 'is-invalid' : '' }}" type="text" name="tr_quan" id="tr_quan" value="{{ old('tr_quan', $listproduct->tr_quan) }}">
                @if($errors->has('tr_quan'))
                    <span class="text-danger">{{ $errors->first('tr_quan') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.listproduct.fields.tr_quan_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="type_pal_id">{{ trans('cruds.listproduct.fields.type_pal') }}</label>
                <select class="form-control select2 {{ $errors->has('type_pal') ? 'is-invalid' : '' }}" name="type_pal_id" id="type_pal_id">
                    @foreach($type_pals as $id => $entry)
                        <option value="{{ $id }}" {{ (old('type_pal_id') ? old('type_pal_id') : $listproduct->type_pal->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('type_pal'))
                    <span class="text-danger">{{ $errors->first('type_pal') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.listproduct.fields.type_pal_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="qua_pal">{{ trans('cruds.listproduct.fields.qua_pal') }}</label>
                <input class="form-control {{ $errors->has('qua_pal') ? 'is-invalid' : '' }}" type="text" name="qua_pal" id="qua_pal" value="{{ old('qua_pal', $listproduct->qua_pal) }}">
                @if($errors->has('qua_pal'))
                    <span class="text-danger">{{ $errors->first('qua_pal') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.listproduct.fields.qua_pal_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="total_quant">{{ trans('cruds.listproduct.fields.total_quant') }}</label>
                <input class="form-control {{ $errors->has('total_quant') ? 'is-invalid' : '' }}" type="text" name="total_quant" id="total_quant" value="{{ old('total_quant', $listproduct->total_quant) }}">
                @if($errors->has('total_quant'))
                    <span class="text-danger">{{ $errors->first('total_quant') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.listproduct.fields.total_quant_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="total_weight">{{ trans('cruds.listproduct.fields.total_weight') }}</label>
                <input class="form-control {{ $errors->has('total_weight') ? 'is-invalid' : '' }}" type="text" name="total_weight" id="total_weight" value="{{ old('total_weight', $listproduct->total_weight) }}">
                @if($errors->has('total_weight'))
                    <span class="text-danger">{{ $errors->first('total_weight') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.listproduct.fields.total_weight_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="total_sum">{{ trans('cruds.listproduct.fields.total_sum') }}</label>
                <input class="form-control {{ $errors->has('total_sum') ? 'is-invalid' : '' }}" type="text" name="total_sum" id="total_sum" value="{{ old('total_sum', $listproduct->total_sum) }}">
                @if($errors->has('total_sum'))
                    <span class="text-danger">{{ $errors->first('total_sum') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.listproduct.fields.total_sum_helper') }}</span>
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