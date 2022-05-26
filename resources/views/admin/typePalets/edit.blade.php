@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.typePalet.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.type-palets.update", [$typePalet->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="title">{{ trans('cruds.typePalet.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', $typePalet->title) }}">
                @if($errors->has('title'))
                    <span class="text-danger">{{ $errors->first('title') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.typePalet.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="weight">{{ trans('cruds.typePalet.fields.weight') }}</label>
                <input class="form-control {{ $errors->has('weight') ? 'is-invalid' : '' }}" type="text" name="weight" id="weight" value="{{ old('weight', $typePalet->weight) }}">
                @if($errors->has('weight'))
                    <span class="text-danger">{{ $errors->first('weight') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.typePalet.fields.weight_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="long">{{ trans('cruds.typePalet.fields.long') }}</label>
                <input class="form-control {{ $errors->has('long') ? 'is-invalid' : '' }}" type="text" name="long" id="long" value="{{ old('long', $typePalet->long) }}">
                @if($errors->has('long'))
                    <span class="text-danger">{{ $errors->first('long') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.typePalet.fields.long_helper') }}</span>
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