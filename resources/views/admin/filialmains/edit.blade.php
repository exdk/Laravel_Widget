@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.filialmain.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.filialmains.update", [$filialmain->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="inn">{{ trans('cruds.filialmain.fields.inn') }}</label>
                <input class="form-control {{ $errors->has('inn') ? 'is-invalid' : '' }}" type="text" name="inn" id="inn" value="{{ old('inn', $filialmain->inn) }}">
                @if($errors->has('inn'))
                    <span class="text-danger">{{ $errors->first('inn') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.filialmain.fields.inn_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="title">{{ trans('cruds.filialmain.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', $filialmain->title) }}">
                @if($errors->has('title'))
                    <span class="text-danger">{{ $errors->first('title') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.filialmain.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="main">{{ trans('cruds.filialmain.fields.main') }}</label>
                <input class="form-control {{ $errors->has('main') ? 'is-invalid' : '' }}" type="text" name="main" id="main" value="{{ old('main', $filialmain->main) }}">
                @if($errors->has('main'))
                    <span class="text-danger">{{ $errors->first('main') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.filialmain.fields.main_helper') }}</span>
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