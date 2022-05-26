@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.gruz.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.gruzs.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">{{ trans('cruds.gruz.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', '') }}">
                @if($errors->has('title'))
                    <span class="text-danger">{{ $errors->first('title') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.gruz.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="kor">{{ trans('cruds.gruz.fields.kor') }}</label>
                <input class="form-control {{ $errors->has('kor') ? 'is-invalid' : '' }}" type="text" name="kor" id="kor" value="{{ old('kor', '') }}">
                @if($errors->has('kor'))
                    <span class="text-danger">{{ $errors->first('kor') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.gruz.fields.kor_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="gruz">{{ trans('cruds.gruz.fields.gruz') }}</label>
                <input class="form-control {{ $errors->has('gruz') ? 'is-invalid' : '' }}" type="text" name="gruz" id="gruz" value="{{ old('gruz', '') }}">
                @if($errors->has('gruz'))
                    <span class="text-danger">{{ $errors->first('gruz') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.gruz.fields.gruz_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="di">{{ trans('cruds.gruz.fields.di') }}</label>
                <input class="form-control {{ $errors->has('di') ? 'is-invalid' : '' }}" type="text" name="di" id="di" value="{{ old('di', '') }}">
                @if($errors->has('di'))
                    <span class="text-danger">{{ $errors->first('di') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.gruz.fields.di_helper') }}</span>
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