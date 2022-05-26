@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.nooffer.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.nooffers.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="datefpogr">{{ trans('cruds.nooffer.fields.datefpogr') }}</label>
                <input class="form-control {{ $errors->has('datefpogr') ? 'is-invalid' : '' }}" type="text" name="datefpogr" id="datefpogr" value="{{ old('datefpogr', '') }}">
                @if($errors->has('datefpogr'))
                    <span class="text-danger">{{ $errors->first('datefpogr') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.nooffer.fields.datefpogr_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="dateunload">{{ trans('cruds.nooffer.fields.dateunload') }}</label>
                <input class="form-control {{ $errors->has('dateunload') ? 'is-invalid' : '' }}" type="text" name="dateunload" id="dateunload" value="{{ old('dateunload', '') }}">
                @if($errors->has('dateunload'))
                    <span class="text-danger">{{ $errors->first('dateunload') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.nooffer.fields.dateunload_helper') }}</span>
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