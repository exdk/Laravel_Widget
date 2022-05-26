@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.zakazgrup.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.zakazgrups.update", [$zakazgrup->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="title">{{ trans('cruds.zakazgrup.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', $zakazgrup->title) }}">
                @if($errors->has('title'))
                    <span class="text-danger">{{ $errors->first('title') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakazgrup.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="zakazperevozs">{{ trans('cruds.zakazgrup.fields.zakazperevoz') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('zakazperevozs') ? 'is-invalid' : '' }}" name="zakazperevozs[]" id="zakazperevozs" multiple>
                    @foreach($zakazperevozs as $id => $zakazperevoz)
                        <option value="{{ $id }}" {{ (in_array($id, old('zakazperevozs', [])) || $zakazgrup->zakazperevozs->contains($id)) ? 'selected' : '' }}>{{ $zakazperevoz }}</option>
                    @endforeach
                </select>
                @if($errors->has('zakazperevozs'))
                    <span class="text-danger">{{ $errors->first('zakazperevozs') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakazgrup.fields.zakazperevoz_helper') }}</span>
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