@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.upravlenie.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.upravlenies.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="mainauto_id">{{ trans('cruds.upravlenie.fields.mainauto') }}</label>
                <select class="form-control select2 {{ $errors->has('mainauto') ? 'is-invalid' : '' }}" name="mainauto_id" id="mainauto_id" required>
                    @foreach($mainautos as $id => $entry)
                        <option value="{{ $id }}" {{ old('mainauto_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('mainauto'))
                    <span class="text-danger">{{ $errors->first('mainauto') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.upravlenie.fields.mainauto_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="prizep_id">{{ trans('cruds.upravlenie.fields.prizep') }}</label>
                <select class="form-control select2 {{ $errors->has('prizep') ? 'is-invalid' : '' }}" name="prizep_id" id="prizep_id">
                    @foreach($prizeps as $id => $entry)
                        <option value="{{ $id }}" {{ old('prizep_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('prizep'))
                    <span class="text-danger">{{ $errors->first('prizep') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.upravlenie.fields.prizep_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="driver_id">{{ trans('cruds.upravlenie.fields.driver') }}</label>
                <select class="form-control select2 {{ $errors->has('driver') ? 'is-invalid' : '' }}" name="driver_id" id="driver_id">
                    @foreach($drivers as $id => $entry)
                        <option value="{{ $id }}" {{ old('driver_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('driver'))
                    <span class="text-danger">{{ $errors->first('driver') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.upravlenie.fields.driver_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="driver_2_id">{{ trans('cruds.upravlenie.fields.driver_2') }}</label>
                <select class="form-control select2 {{ $errors->has('driver_2') ? 'is-invalid' : '' }}" name="driver_2_id" id="driver_2_id">
                    @foreach($driver_2s as $id => $entry)
                        <option value="{{ $id }}" {{ old('driver_2_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('driver_2'))
                    <span class="text-danger">{{ $errors->first('driver_2') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.upravlenie.fields.driver_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="datestart">{{ trans('cruds.upravlenie.fields.datestart') }}</label>
                <input class="form-control date {{ $errors->has('datestart') ? 'is-invalid' : '' }}" type="text" name="datestart" id="datestart" value="{{ old('datestart') }}">
                @if($errors->has('datestart'))
                    <span class="text-danger">{{ $errors->first('datestart') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.upravlenie.fields.datestart_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="date_fin">{{ trans('cruds.upravlenie.fields.date_fin') }}</label>
                <input class="form-control date {{ $errors->has('date_fin') ? 'is-invalid' : '' }}" type="text" name="date_fin" id="date_fin" value="{{ old('date_fin') }}">
                @if($errors->has('date_fin'))
                    <span class="text-danger">{{ $errors->first('date_fin') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.upravlenie.fields.date_fin_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="timetart">{{ trans('cruds.upravlenie.fields.timetart') }}</label>
                <input class="form-control timepicker {{ $errors->has('timetart') ? 'is-invalid' : '' }}" type="text" name="timetart" id="timetart" value="{{ old('timetart') }}">
                @if($errors->has('timetart'))
                    <span class="text-danger">{{ $errors->first('timetart') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.upravlenie.fields.timetart_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="time_fin">{{ trans('cruds.upravlenie.fields.time_fin') }}</label>
                <input class="form-control timepicker {{ $errors->has('time_fin') ? 'is-invalid' : '' }}" type="text" name="time_fin" id="time_fin" value="{{ old('time_fin') }}">
                @if($errors->has('time_fin'))
                    <span class="text-danger">{{ $errors->first('time_fin') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.upravlenie.fields.time_fin_helper') }}</span>
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