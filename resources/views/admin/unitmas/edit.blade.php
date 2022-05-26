@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.unitma.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.unitmas.update", [$unitma->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="titleru">{{ trans('cruds.unitma.fields.titleru') }}</label>
                <input class="form-control {{ $errors->has('titleru') ? 'is-invalid' : '' }}" type="text" name="titleru" id="titleru" value="{{ old('titleru', $unitma->titleru) }}">
                @if($errors->has('titleru'))
                    <span class="text-danger">{{ $errors->first('titleru') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.unitma.fields.titleru_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="rubol">{{ trans('cruds.unitma.fields.rubol') }}</label>
                <input class="form-control {{ $errors->has('rubol') ? 'is-invalid' : '' }}" type="text" name="rubol" id="rubol" value="{{ old('rubol', $unitma->rubol) }}">
                @if($errors->has('rubol'))
                    <span class="text-danger">{{ $errors->first('rubol') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.unitma.fields.rubol_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="megd">{{ trans('cruds.unitma.fields.megd') }}</label>
                <input class="form-control {{ $errors->has('megd') ? 'is-invalid' : '' }}" type="text" name="megd" id="megd" value="{{ old('megd', $unitma->megd) }}">
                @if($errors->has('megd'))
                    <span class="text-danger">{{ $errors->first('megd') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.unitma.fields.megd_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="megd_bol">{{ trans('cruds.unitma.fields.megd_bol') }}</label>
                <input class="form-control {{ $errors->has('megd_bol') ? 'is-invalid' : '' }}" type="text" name="megd_bol" id="megd_bol" value="{{ old('megd_bol', $unitma->megd_bol) }}">
                @if($errors->has('megd_bol'))
                    <span class="text-danger">{{ $errors->first('megd_bol') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.unitma.fields.megd_bol_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="di">{{ trans('cruds.unitma.fields.di') }}</label>
                <input class="form-control {{ $errors->has('di') ? 'is-invalid' : '' }}" type="text" name="di" id="di" value="{{ old('di', $unitma->di) }}">
                @if($errors->has('di'))
                    <span class="text-danger">{{ $errors->first('di') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.unitma.fields.di_helper') }}</span>
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