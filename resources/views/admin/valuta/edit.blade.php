@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.valutum.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.valuta.update", [$valutum->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="code">{{ trans('cruds.valutum.fields.code') }}</label>
                <input class="form-control {{ $errors->has('code') ? 'is-invalid' : '' }}" type="text" name="code" id="code" value="{{ old('code', $valutum->code) }}">
                @if($errors->has('code'))
                    <span class="text-danger">{{ $errors->first('code') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.valutum.fields.code_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="code_2">{{ trans('cruds.valutum.fields.code_2') }}</label>
                <input class="form-control {{ $errors->has('code_2') ? 'is-invalid' : '' }}" type="text" name="code_2" id="code_2" value="{{ old('code_2', $valutum->code_2) }}">
                @if($errors->has('code_2'))
                    <span class="text-danger">{{ $errors->first('code_2') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.valutum.fields.code_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="title">{{ trans('cruds.valutum.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', $valutum->title) }}">
                @if($errors->has('title'))
                    <span class="text-danger">{{ $errors->first('title') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.valutum.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="unicode">{{ trans('cruds.valutum.fields.unicode') }}</label>
                <input class="form-control {{ $errors->has('unicode') ? 'is-invalid' : '' }}" type="text" name="unicode" id="unicode" value="{{ old('unicode', $valutum->unicode) }}">
                @if($errors->has('unicode'))
                    <span class="text-danger">{{ $errors->first('unicode') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.valutum.fields.unicode_helper') }}</span>
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