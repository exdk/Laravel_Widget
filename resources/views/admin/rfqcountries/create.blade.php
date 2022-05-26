@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.rfqcountry.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.rfqcountries.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="rfq_id">{{ trans('cruds.rfqcountry.fields.rfq') }}</label>
                <select class="form-control select2 {{ $errors->has('rfq') ? 'is-invalid' : '' }}" name="rfq_id" id="rfq_id">
                    @foreach($rfqs as $id => $entry)
                        <option value="{{ $id }}" {{ old('rfq_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('rfq'))
                    <span class="text-danger">{{ $errors->first('rfq') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.rfqcountry.fields.rfq_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="apoint_id">{{ trans('cruds.rfqcountry.fields.apoint') }}</label>
                <select class="form-control select2 {{ $errors->has('apoint') ? 'is-invalid' : '' }}" name="apoint_id" id="apoint_id">
                    @foreach($apoints as $id => $entry)
                        <option value="{{ $id }}" {{ old('apoint_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('apoint'))
                    <span class="text-danger">{{ $errors->first('apoint') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.rfqcountry.fields.apoint_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="bpoint_id">{{ trans('cruds.rfqcountry.fields.bpoint') }}</label>
                <select class="form-control select2 {{ $errors->has('bpoint') ? 'is-invalid' : '' }}" name="bpoint_id" id="bpoint_id">
                    @foreach($bpoints as $id => $entry)
                        <option value="{{ $id }}" {{ old('bpoint_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('bpoint'))
                    <span class="text-danger">{{ $errors->first('bpoint') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.rfqcountry.fields.bpoint_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="lead_time">{{ trans('cruds.rfqcountry.fields.lead_time') }}</label>
                <input class="form-control {{ $errors->has('lead_time') ? 'is-invalid' : '' }}" type="text" name="lead_time" id="lead_time" value="{{ old('lead_time', '') }}">
                @if($errors->has('lead_time'))
                    <span class="text-danger">{{ $errors->first('lead_time') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.rfqcountry.fields.lead_time_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="otif">{{ trans('cruds.rfqcountry.fields.otif') }}</label>
                <input class="form-control {{ $errors->has('otif') ? 'is-invalid' : '' }}" type="text" name="otif" id="otif" value="{{ old('otif', '') }}">
                @if($errors->has('otif'))
                    <span class="text-danger">{{ $errors->first('otif') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.rfqcountry.fields.otif_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="good_id">{{ trans('cruds.rfqcountry.fields.good') }}</label>
                <select class="form-control select2 {{ $errors->has('good') ? 'is-invalid' : '' }}" name="good_id" id="good_id">
                    @foreach($goods as $id => $entry)
                        <option value="{{ $id }}" {{ old('good_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('good'))
                    <span class="text-danger">{{ $errors->first('good') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.rfqcountry.fields.good_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="pack_id">{{ trans('cruds.rfqcountry.fields.pack') }}</label>
                <select class="form-control select2 {{ $errors->has('pack') ? 'is-invalid' : '' }}" name="pack_id" id="pack_id">
                    @foreach($packs as $id => $entry)
                        <option value="{{ $id }}" {{ old('pack_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('pack'))
                    <span class="text-danger">{{ $errors->first('pack') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.rfqcountry.fields.pack_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="pack_weight">{{ trans('cruds.rfqcountry.fields.pack_weight') }}</label>
                <input class="form-control {{ $errors->has('pack_weight') ? 'is-invalid' : '' }}" type="text" name="pack_weight" id="pack_weight" value="{{ old('pack_weight', '') }}">
                @if($errors->has('pack_weight'))
                    <span class="text-danger">{{ $errors->first('pack_weight') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.rfqcountry.fields.pack_weight_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="qty">{{ trans('cruds.rfqcountry.fields.qty') }}</label>
                <input class="form-control {{ $errors->has('qty') ? 'is-invalid' : '' }}" type="text" name="qty" id="qty" value="{{ old('qty', '') }}">
                @if($errors->has('qty'))
                    <span class="text-danger">{{ $errors->first('qty') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.rfqcountry.fields.qty_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="qty_auto">{{ trans('cruds.rfqcountry.fields.qty_auto') }}</label>
                <input class="form-control {{ $errors->has('qty_auto') ? 'is-invalid' : '' }}" type="text" name="qty_auto" id="qty_auto" value="{{ old('qty_auto', '') }}">
                @if($errors->has('qty_auto'))
                    <span class="text-danger">{{ $errors->first('qty_auto') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.rfqcountry.fields.qty_auto_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="additional">{{ trans('cruds.rfqcountry.fields.additional') }}</label>
                <input class="form-control {{ $errors->has('additional') ? 'is-invalid' : '' }}" type="text" name="additional" id="additional" value="{{ old('additional', '') }}">
                @if($errors->has('additional'))
                    <span class="text-danger">{{ $errors->first('additional') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.rfqcountry.fields.additional_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="target">{{ trans('cruds.rfqcountry.fields.target') }}</label>
                <input class="form-control {{ $errors->has('target') ? 'is-invalid' : '' }}" type="text" name="target" id="target" value="{{ old('target', '') }}">
                @if($errors->has('target'))
                    <span class="text-danger">{{ $errors->first('target') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.rfqcountry.fields.target_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="price">{{ trans('cruds.rfqcountry.fields.price') }}</label>
                <input class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" type="text" name="price" id="price" value="{{ old('price', '') }}">
                @if($errors->has('price'))
                    <span class="text-danger">{{ $errors->first('price') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.rfqcountry.fields.price_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="garant">{{ trans('cruds.rfqcountry.fields.garant') }}</label>
                <input class="form-control {{ $errors->has('garant') ? 'is-invalid' : '' }}" type="text" name="garant" id="garant" value="{{ old('garant', '') }}">
                @if($errors->has('garant'))
                    <span class="text-danger">{{ $errors->first('garant') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.rfqcountry.fields.garant_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="comment">{{ trans('cruds.rfqcountry.fields.comment') }}</label>
                <input class="form-control {{ $errors->has('comment') ? 'is-invalid' : '' }}" type="text" name="comment" id="comment" value="{{ old('comment', '') }}">
                @if($errors->has('comment'))
                    <span class="text-danger">{{ $errors->first('comment') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.rfqcountry.fields.comment_helper') }}</span>
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