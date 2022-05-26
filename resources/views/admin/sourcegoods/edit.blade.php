@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.sourcegood.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.sourcegoods.update", [$sourcegood->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="title">{{ trans('cruds.sourcegood.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', $sourcegood->title) }}">
                @if($errors->has('title'))
                    <span class="text-danger">{{ $errors->first('title') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.sourcegood.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="de">{{ trans('cruds.sourcegood.fields.de') }}</label>
                <input class="form-control {{ $errors->has('de') ? 'is-invalid' : '' }}" type="text" name="de" id="de" value="{{ old('de', $sourcegood->de) }}">
                @if($errors->has('de'))
                    <span class="text-danger">{{ $errors->first('de') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.sourcegood.fields.de_helper') }}</span>
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