@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.typeloaddestination.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.typeloaddestinations.update", [$typeloaddestination->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="title">{{ trans('cruds.typeloaddestination.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', $typeloaddestination->title) }}">
                @if($errors->has('title'))
                    <span class="text-danger">{{ $errors->first('title') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.typeloaddestination.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="kor">{{ trans('cruds.typeloaddestination.fields.kor') }}</label>
                <input class="form-control {{ $errors->has('kor') ? 'is-invalid' : '' }}" type="text" name="kor" id="kor" value="{{ old('kor', $typeloaddestination->kor) }}">
                @if($errors->has('kor'))
                    <span class="text-danger">{{ $errors->first('kor') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.typeloaddestination.fields.kor_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="di">{{ trans('cruds.typeloaddestination.fields.di') }}</label>
                <input class="form-control {{ $errors->has('di') ? 'is-invalid' : '' }}" type="text" name="di" id="di" value="{{ old('di', $typeloaddestination->di) }}">
                @if($errors->has('di'))
                    <span class="text-danger">{{ $errors->first('di') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.typeloaddestination.fields.di_helper') }}</span>
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