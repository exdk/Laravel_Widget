@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.contactperson.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.contactpeople.update", [$contactperson->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="row">
                <div class="col-4">
            <div class="form-group">
                <label for="fio">{{ trans('cruds.contactperson.fields.fio') }}</label>
                <input class="form-control {{ $errors->has('fio') ? 'is-invalid' : '' }}" type="text" name="fio" id="fio" value="{{ old('fio', $contactperson->fio) }}">
                @if($errors->has('fio'))
                    <span class="text-danger">{{ $errors->first('fio') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.contactperson.fields.fio_helper') }}</span>
            </div>                    
                </div>
                <div class="col-4">
            <div class="form-group">
                <label for="email">{{ trans('cruds.contactperson.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email', $contactperson->email) }}">
                @if($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.contactperson.fields.email_helper') }}</span>
            </div>                    
                </div>
                <div class="col-4">
             <div class="form-group">
                <label for="mobile">{{ trans('cruds.contactperson.fields.mobile') }}</label>
                <input class="form-control {{ $errors->has('mobile') ? 'is-invalid' : '' }}" type="text" name="mobile" id="mobile" value="{{ old('mobile', $contactperson->mobile) }}">
                @if($errors->has('mobile'))
                    <span class="text-danger">{{ $errors->first('mobile') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.contactperson.fields.mobile_helper') }}</span>
            </div>                   
                </div>
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