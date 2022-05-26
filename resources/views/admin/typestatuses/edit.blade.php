@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.typestatus.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.typestatuses.update", [$typestatus->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="title">{{ trans('cruds.typestatus.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', $typestatus->title) }}">
                @if($errors->has('title'))
                    <span class="text-danger">{{ $errors->first('title') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.typestatus.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="kor">{{ trans('cruds.typestatus.fields.kor') }}</label>
                <input class="form-control {{ $errors->has('kor') ? 'is-invalid' : '' }}" type="text" name="kor" id="kor" value="{{ old('kor', $typestatus->kor) }}">
                @if($errors->has('kor'))
                    <span class="text-danger">{{ $errors->first('kor') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.typestatus.fields.kor_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="di">{{ trans('cruds.typestatus.fields.di') }}</label>
                <input class="form-control {{ $errors->has('di') ? 'is-invalid' : '' }}" type="text" name="di" id="di" value="{{ old('di', $typestatus->di) }}">
                @if($errors->has('di'))
                    <span class="text-danger">{{ $errors->first('di') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.typestatus.fields.di_helper') }}</span>
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