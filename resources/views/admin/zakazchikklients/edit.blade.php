@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.zakazchikklient.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.zakazchikklients.update", [$zakazchikklient->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label>{{ trans('cruds.zakazchikklient.fields.status') }}</label>
                @foreach(App\Models\Zakazchikklient::STATUS_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('status') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="status_{{ $key }}" name="status" value="{{ $key }}" {{ old('status', $zakazchikklient->status) === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="status_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('status'))
                    <span class="text-danger">{{ $errors->first('status') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakazchikklient.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="title">{{ trans('cruds.zakazchikklient.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', $zakazchikklient->title) }}">
                @if($errors->has('title'))
                    <span class="text-danger">{{ $errors->first('title') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakazchikklient.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="inn">{{ trans('cruds.zakazchikklient.fields.inn') }}</label>
                <input class="form-control {{ $errors->has('inn') ? 'is-invalid' : '' }}" type="text" name="inn" id="inn" value="{{ old('inn', $zakazchikklient->inn) }}">
                @if($errors->has('inn'))
                    <span class="text-danger">{{ $errors->first('inn') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakazchikklient.fields.inn_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="telefon">{{ trans('cruds.zakazchikklient.fields.telefon') }}</label>
                <input class="form-control {{ $errors->has('telefon') ? 'is-invalid' : '' }}" type="text" name="telefon" id="telefon" value="{{ old('telefon', $zakazchikklient->telefon) }}">
                @if($errors->has('telefon'))
                    <span class="text-danger">{{ $errors->first('telefon') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakazchikklient.fields.telefon_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="contactperson">{{ trans('cruds.zakazchikklient.fields.contactperson') }}</label>
                <input class="form-control {{ $errors->has('contactperson') ? 'is-invalid' : '' }}" type="text" name="contactperson" id="contactperson" value="{{ old('contactperson', $zakazchikklient->contactperson) }}">
                @if($errors->has('contactperson'))
                    <span class="text-danger">{{ $errors->first('contactperson') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.zakazchikklient.fields.contactperson_helper') }}</span>
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