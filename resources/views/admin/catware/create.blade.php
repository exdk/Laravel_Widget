@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.catware.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.catware.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="category">{{ trans('cruds.catware.fields.category') }}</label>
                <input class="form-control {{ $errors->has('category') ? 'is-invalid' : '' }}" type="text" name="category" id="category" value="{{ old('category', '') }}">
                @if($errors->has('category'))
                    <span class="text-danger">{{ $errors->first('category') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.catware.fields.category_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="dep">{{ trans('cruds.catware.fields.dep') }}</label>
                <input class="form-control {{ $errors->has('dep') ? 'is-invalid' : '' }}" type="text" name="dep" id="dep" value="{{ old('dep', '') }}">
                @if($errors->has('dep'))
                    <span class="text-danger">{{ $errors->first('dep') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.catware.fields.dep_helper') }}</span>
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