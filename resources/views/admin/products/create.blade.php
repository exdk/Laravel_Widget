@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.product.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.products.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="product_code">{{ trans('cruds.product.fields.product_code') }}</label>
                <input class="form-control {{ $errors->has('product_code') ? 'is-invalid' : '' }}" type="text" name="product_code" id="product_code" value="{{ old('product_code', '') }}">
                @if($errors->has('product_code'))
                    <span class="text-danger">{{ $errors->first('product_code') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.product.fields.product_code_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="nomer_pricelist">{{ trans('cruds.product.fields.nomer_pricelist') }}</label>
                <input class="form-control {{ $errors->has('nomer_pricelist') ? 'is-invalid' : '' }}" type="text" name="nomer_pricelist" id="nomer_pricelist" value="{{ old('nomer_pricelist', '') }}">
                @if($errors->has('nomer_pricelist'))
                    <span class="text-danger">{{ $errors->first('nomer_pricelist') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.product.fields.nomer_pricelist_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="articel">{{ trans('cruds.product.fields.articel') }}</label>
                <input class="form-control {{ $errors->has('articel') ? 'is-invalid' : '' }}" type="text" name="articel" id="articel" value="{{ old('articel', '') }}">
                @if($errors->has('articel'))
                    <span class="text-danger">{{ $errors->first('articel') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.product.fields.articel_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="title">{{ trans('cruds.product.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', '') }}">
                @if($errors->has('title'))
                    <span class="text-danger">{{ $errors->first('title') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.product.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="price">{{ trans('cruds.product.fields.price') }}</label>
                <input class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" type="text" name="price" id="price" value="{{ old('price', '') }}">
                @if($errors->has('price'))
                    <span class="text-danger">{{ $errors->first('price') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.product.fields.price_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="unit_izm">{{ trans('cruds.product.fields.unit_izm') }}</label>
                <input class="form-control {{ $errors->has('unit_izm') ? 'is-invalid' : '' }}" type="text" name="unit_izm" id="unit_izm" value="{{ old('unit_izm', '') }}">
                @if($errors->has('unit_izm'))
                    <span class="text-danger">{{ $errors->first('unit_izm') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.product.fields.unit_izm_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="type_pack">{{ trans('cruds.product.fields.type_pack') }}</label>
                <input class="form-control {{ $errors->has('type_pack') ? 'is-invalid' : '' }}" type="text" name="type_pack" id="type_pack" value="{{ old('type_pack', '') }}">
                @if($errors->has('type_pack'))
                    <span class="text-danger">{{ $errors->first('type_pack') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.product.fields.type_pack_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="weight">{{ trans('cruds.product.fields.weight') }}</label>
                <input class="form-control {{ $errors->has('weight') ? 'is-invalid' : '' }}" type="text" name="weight" id="weight" value="{{ old('weight', '') }}">
                @if($errors->has('weight'))
                    <span class="text-danger">{{ $errors->first('weight') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.product.fields.weight_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="nomer_decalaration">{{ trans('cruds.product.fields.nomer_decalaration') }}</label>
                <input class="form-control {{ $errors->has('nomer_decalaration') ? 'is-invalid' : '' }}" type="text" name="nomer_decalaration" id="nomer_decalaration" value="{{ old('nomer_decalaration', '') }}">
                @if($errors->has('nomer_decalaration'))
                    <span class="text-danger">{{ $errors->first('nomer_decalaration') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.product.fields.nomer_decalaration_helper') }}</span>
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