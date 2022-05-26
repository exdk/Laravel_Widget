@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.docTtn.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.doc-ttns.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="id_list_product_id">{{ trans('cruds.docTtn.fields.id_list_product') }}</label>
                <select class="form-control select2 {{ $errors->has('id_list_product') ? 'is-invalid' : '' }}" name="id_list_product_id" id="id_list_product_id">
                    @foreach($id_list_products as $id => $entry)
                        <option value="{{ $id }}" {{ old('id_list_product_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('id_list_product'))
                    <span class="text-danger">{{ $errors->first('id_list_product') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.docTtn.fields.id_list_product_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="otpravitel_id">{{ trans('cruds.docTtn.fields.otpravitel') }}</label>
                <select class="form-control select2 {{ $errors->has('otpravitel') ? 'is-invalid' : '' }}" name="otpravitel_id" id="otpravitel_id">
                    @foreach($otpravitels as $id => $entry)
                        <option value="{{ $id }}" {{ old('otpravitel_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('otpravitel'))
                    <span class="text-danger">{{ $errors->first('otpravitel') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.docTtn.fields.otpravitel_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="poluchatel_id">{{ trans('cruds.docTtn.fields.poluchatel') }}</label>
                <select class="form-control select2 {{ $errors->has('poluchatel') ? 'is-invalid' : '' }}" name="poluchatel_id" id="poluchatel_id">
                    @foreach($poluchatels as $id => $entry)
                        <option value="{{ $id }}" {{ old('poluchatel_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('poluchatel'))
                    <span class="text-danger">{{ $errors->first('poluchatel') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.docTtn.fields.poluchatel_helper') }}</span>
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