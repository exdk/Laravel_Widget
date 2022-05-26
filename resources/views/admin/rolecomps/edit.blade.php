@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.rolecomp.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.rolecomps.update", [$rolecomp->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="titlerole">{{ trans('cruds.rolecomp.fields.titlerole') }}</label>
                <input class="form-control {{ $errors->has('titlerole') ? 'is-invalid' : '' }}" type="text" name="titlerole" id="titlerole" value="{{ old('titlerole', $rolecomp->titlerole) }}">
                @if($errors->has('titlerole'))
                    <span class="text-danger">{{ $errors->first('titlerole') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.rolecomp.fields.titlerole_helper') }}</span>
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