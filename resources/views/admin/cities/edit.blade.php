@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.city.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.cities.update", [$city->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="city">{{ trans('cruds.city.fields.city') }}</label>
                <input class="form-control {{ $errors->has('city') ? 'is-invalid' : '' }}" type="text" name="city" id="city" value="{{ old('city', $city->city) }}">
                @if($errors->has('city'))
                    <span class="text-danger">{{ $errors->first('city') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.city.fields.city_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="cou_id">{{ trans('cruds.city.fields.cou') }}</label>
                <select class="form-control select2 {{ $errors->has('cou') ? 'is-invalid' : '' }}" name="cou_id" id="cou_id">
                    @foreach($cous as $id => $entry)
                        <option value="{{ $id }}" {{ (old('cou_id') ? old('cou_id') : $city->cou->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('cou'))
                    <span class="text-danger">{{ $errors->first('cou') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.city.fields.cou_helper') }}</span>
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