@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.partnergroup.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.partnergroups.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">{{ trans('cruds.partnergroup.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', '') }}">
                @if($errors->has('title'))
                    <span class="text-danger">{{ $errors->first('title') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.partnergroup.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="partners">{{ trans('cruds.partnergroup.fields.partner') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('partners') ? 'is-invalid' : '' }}" name="partners[]" id="partners" multiple>
                    @foreach($partners as $id => $partner)
                        <option value="{{ $id }}" {{ in_array($id, old('partners', [])) ? 'selected' : '' }}>{{ $partner }}</option>
                    @endforeach
                </select>
                @if($errors->has('partners'))
                    <span class="text-danger">{{ $errors->first('partners') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.partnergroup.fields.partner_helper') }}</span>
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