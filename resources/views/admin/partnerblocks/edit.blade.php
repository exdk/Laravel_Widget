@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.partnerblock.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.partnerblocks.update", [$partnerblock->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="partner_id">{{ trans('cruds.partnerblock.fields.partner') }}</label>
                <select class="form-control select2 {{ $errors->has('partner') ? 'is-invalid' : '' }}" name="partner_id" id="partner_id">
                    @foreach($partners as $id => $entry)
                        <option value="{{ $id }}" {{ (old('partner_id') ? old('partner_id') : $partnerblock->partner->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('partner'))
                    <span class="text-danger">{{ $errors->first('partner') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.partnerblock.fields.partner_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="contactperson">{{ trans('cruds.partnerblock.fields.contactperson') }}</label>
                <input class="form-control {{ $errors->has('contactperson') ? 'is-invalid' : '' }}" type="text" name="contactperson" id="contactperson" value="{{ old('contactperson', $partnerblock->contactperson) }}">
                @if($errors->has('contactperson'))
                    <span class="text-danger">{{ $errors->first('contactperson') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.partnerblock.fields.contactperson_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="telefon">{{ trans('cruds.partnerblock.fields.telefon') }}</label>
                <input class="form-control {{ $errors->has('telefon') ? 'is-invalid' : '' }}" type="text" name="telefon" id="telefon" value="{{ old('telefon', $partnerblock->telefon) }}">
                @if($errors->has('telefon'))
                    <span class="text-danger">{{ $errors->first('telefon') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.partnerblock.fields.telefon_helper') }}</span>
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