@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.custom.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.customs.update", [$custom->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="title">{{ trans('cruds.custom.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', $custom->title) }}">
                @if($errors->has('title'))
                    <span class="text-danger">{{ $errors->first('title') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.custom.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="number">{{ trans('cruds.custom.fields.number') }}</label>
                <input class="form-control {{ $errors->has('number') ? 'is-invalid' : '' }}" type="text" name="number" id="number" value="{{ old('number', $custom->number) }}">
                @if($errors->has('number'))
                    <span class="text-danger">{{ $errors->first('number') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.custom.fields.number_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="address">{{ trans('cruds.custom.fields.address') }}</label>
                <input class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" type="text" name="address" id="address" value="{{ old('address', $custom->address) }}">
                @if($errors->has('address'))
                    <span class="text-danger">{{ $errors->first('address') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.custom.fields.address_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="types">{{ trans('cruds.custom.fields.type') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('types') ? 'is-invalid' : '' }}" name="types[]" id="types" multiple>
                    @foreach($types as $id => $type)
                        <option value="{{ $id }}" {{ (in_array($id, old('types', [])) || $custom->types->contains($id)) ? 'selected' : '' }}>{{ $type }}</option>
                    @endforeach
                </select>
                @if($errors->has('types'))
                    <span class="text-danger">{{ $errors->first('types') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.custom.fields.type_helper') }}</span>
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