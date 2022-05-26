@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.dopeq.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.dopeqs.update", [$dopeq->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="title">{{ trans('cruds.dopeq.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', $dopeq->title) }}">
                @if($errors->has('title'))
                    <span class="text-danger">{{ $errors->first('title') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.dopeq.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="di">{{ trans('cruds.dopeq.fields.di') }}</label>
                <input class="form-control {{ $errors->has('di') ? 'is-invalid' : '' }}" type="text" name="di" id="di" value="{{ old('di', $dopeq->di) }}">
                @if($errors->has('di'))
                    <span class="text-danger">{{ $errors->first('di') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.dopeq.fields.di_helper') }}</span>
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