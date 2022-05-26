@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.typeunload.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.typeunloads.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">{{ trans('cruds.typeunload.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', '') }}">
                @if($errors->has('title'))
                    <span class="text-danger">{{ $errors->first('title') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.typeunload.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="kor">{{ trans('cruds.typeunload.fields.kor') }}</label>
                <input class="form-control {{ $errors->has('kor') ? 'is-invalid' : '' }}" type="text" name="kor" id="kor" value="{{ old('kor', '') }}">
                @if($errors->has('kor'))
                    <span class="text-danger">{{ $errors->first('kor') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.typeunload.fields.kor_helper') }}</span>
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