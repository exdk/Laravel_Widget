@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.perevozchikPerevoz.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.perevozchik-perevozs.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">{{ trans('cruds.perevozchikPerevoz.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', '') }}">
                @if($errors->has('title'))
                    <span class="text-danger">{{ $errors->first('title') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.perevozchikPerevoz.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="perevozperevozs">{{ trans('cruds.perevozchikPerevoz.fields.perevozperevoz') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('perevozperevozs') ? 'is-invalid' : '' }}" name="perevozperevozs[]" id="perevozperevozs" multiple>
                    @foreach($perevozperevozs as $id => $perevozperevoz)
                        <option value="{{ $id }}" {{ in_array($id, old('perevozperevozs', [])) ? 'selected' : '' }}>{{ $perevozperevoz }}</option>
                    @endforeach
                </select>
                @if($errors->has('perevozperevozs'))
                    <span class="text-danger">{{ $errors->first('perevozperevozs') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.perevozchikPerevoz.fields.perevozperevoz_helper') }}</span>
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