@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.monitorng.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.monitorngs.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="driver_id">{{ trans('cruds.monitorng.fields.driver') }}</label>
                <select class="form-control select2 {{ $errors->has('driver') ? 'is-invalid' : '' }}" name="driver_id" id="driver_id">
                    @foreach($drivers as $id => $entry)
                        <option value="{{ $id }}" {{ old('driver_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('driver'))
                    <span class="text-danger">{{ $errors->first('driver') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.monitorng.fields.driver_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="lang">{{ trans('cruds.monitorng.fields.lang') }}</label>
                <input class="form-control {{ $errors->has('lang') ? 'is-invalid' : '' }}" type="text" name="lang" id="lang" value="{{ old('lang', '') }}">
                @if($errors->has('lang'))
                    <span class="text-danger">{{ $errors->first('lang') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.monitorng.fields.lang_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="lat">{{ trans('cruds.monitorng.fields.lat') }}</label>
                <input class="form-control {{ $errors->has('lat') ? 'is-invalid' : '' }}" type="text" name="lat" id="lat" value="{{ old('lat', '') }}">
                @if($errors->has('lat'))
                    <span class="text-danger">{{ $errors->first('lat') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.monitorng.fields.lat_helper') }}</span>
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