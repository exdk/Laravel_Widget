@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.typekuzova.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.typekuzovas.update", [$typekuzova->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="typekuzova">{{ trans('cruds.typekuzova.fields.typekuzova') }}</label>
                <input class="form-control {{ $errors->has('typekuzova') ? 'is-invalid' : '' }}" type="text" name="typekuzova" id="typekuzova" value="{{ old('typekuzova', $typekuzova->typekuzova) }}">
                @if($errors->has('typekuzova'))
                    <span class="text-danger">{{ $errors->first('typekuzova') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.typekuzova.fields.typekuzova_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="korot">{{ trans('cruds.typekuzova.fields.korot') }}</label>
                <input class="form-control {{ $errors->has('korot') ? 'is-invalid' : '' }}" type="text" name="korot" id="korot" value="{{ old('korot', $typekuzova->korot) }}">
                @if($errors->has('korot'))
                    <span class="text-danger">{{ $errors->first('korot') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.typekuzova.fields.korot_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="world">{{ trans('cruds.typekuzova.fields.world') }}</label>
                <input class="form-control {{ $errors->has('world') ? 'is-invalid' : '' }}" type="text" name="world" id="world" value="{{ old('world', $typekuzova->world) }}">
                @if($errors->has('world'))
                    <span class="text-danger">{{ $errors->first('world') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.typekuzova.fields.world_helper') }}</span>
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