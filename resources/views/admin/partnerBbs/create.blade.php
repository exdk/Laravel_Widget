@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.partnerBb.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.partner-bbs.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>{{ trans('cruds.partnerBb.fields.status') }}</label>
                <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status">
                    <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\PartnerBb::STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('status', '0') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('status'))
                    <span class="text-danger">{{ $errors->first('status') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.partnerBb.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="partner_id">{{ trans('cruds.partnerBb.fields.partner') }}</label>
                <select class="form-control select2 {{ $errors->has('partner') ? 'is-invalid' : '' }}" name="partner_id" id="partner_id">
                    @foreach($partners as $id => $entry)
                        <option value="{{ $id }}" {{ old('partner_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('partner'))
                    <span class="text-danger">{{ $errors->first('partner') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.partnerBb.fields.partner_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.partnerBb.fields.typedogovor') }}</label>
                <select class="form-control {{ $errors->has('typedogovor') ? 'is-invalid' : '' }}" name="typedogovor" id="typedogovor" required>
                    <option value disabled {{ old('typedogovor', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\PartnerBb::TYPEDOGOVOR_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('typedogovor', '1') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('typedogovor'))
                    <span class="text-danger">{{ $errors->first('typedogovor') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.partnerBb.fields.typedogovor_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="dogovor_number">{{ trans('cruds.partnerBb.fields.dogovor_number') }}</label>
                <input class="form-control {{ $errors->has('dogovor_number') ? 'is-invalid' : '' }}" type="text" name="dogovor_number" id="dogovor_number" value="{{ old('dogovor_number', '') }}">
                @if($errors->has('dogovor_number'))
                    <span class="text-danger">{{ $errors->first('dogovor_number') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.partnerBb.fields.dogovor_number_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="dogovor_start">{{ trans('cruds.partnerBb.fields.dogovor_start') }}</label>
                <input class="form-control date {{ $errors->has('dogovor_start') ? 'is-invalid' : '' }}" type="text" name="dogovor_start" id="dogovor_start" value="{{ old('dogovor_start') }}" required>
                @if($errors->has('dogovor_start'))
                    <span class="text-danger">{{ $errors->first('dogovor_start') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.partnerBb.fields.dogovor_start_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="dogovor_end">{{ trans('cruds.partnerBb.fields.dogovor_end') }}</label>
                <input class="form-control date {{ $errors->has('dogovor_end') ? 'is-invalid' : '' }}" type="text" name="dogovor_end" id="dogovor_end" value="{{ old('dogovor_end') }}" required>
                @if($errors->has('dogovor_end'))
                    <span class="text-danger">{{ $errors->first('dogovor_end') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.partnerBb.fields.dogovor_end_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="valuta_id">{{ trans('cruds.partnerBb.fields.valuta') }}</label>
                <select class="form-control select2 {{ $errors->has('valuta') ? 'is-invalid' : '' }}" name="valuta_id" id="valuta_id">
                    @foreach($valutas as $id => $entry)
                        <option value="{{ $id }}" {{ old('valuta_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('valuta'))
                    <span class="text-danger">{{ $errors->first('valuta') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.partnerBb.fields.valuta_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="dogovor_copy">{{ trans('cruds.partnerBb.fields.dogovor_copy') }}</label>
                <div class="needsclick dropzone {{ $errors->has('dogovor_copy') ? 'is-invalid' : '' }}" id="dogovor_copy-dropzone">
                </div>
                @if($errors->has('dogovor_copy'))
                    <span class="text-danger">{{ $errors->first('dogovor_copy') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.partnerBb.fields.dogovor_copy_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="description">{{ trans('cruds.partnerBb.fields.description') }}</label>
                <input class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" type="text" name="description" id="description" value="{{ old('description', '') }}">
                @if($errors->has('description'))
                    <span class="text-danger">{{ $errors->first('description') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.partnerBb.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="contactperson">{{ trans('cruds.partnerBb.fields.contactperson') }}</label>
                <input class="form-control {{ $errors->has('contactperson') ? 'is-invalid' : '' }}" type="text" name="contactperson" id="contactperson" value="{{ old('contactperson', '') }}">
                @if($errors->has('contactperson'))
                    <span class="text-danger">{{ $errors->first('contactperson') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.partnerBb.fields.contactperson_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="telefon">{{ trans('cruds.partnerBb.fields.telefon') }}</label>
                <input class="form-control {{ $errors->has('telefon') ? 'is-invalid' : '' }}" type="text" name="telefon" id="telefon" value="{{ old('telefon', '') }}">
                @if($errors->has('telefon'))
                    <span class="text-danger">{{ $errors->first('telefon') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.partnerBb.fields.telefon_helper') }}</span>
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

@section('scripts')
<script>
    Dropzone.options.dogovorCopyDropzone = {
    url: '{{ route('admin.partner-bbs.storeMedia') }}',
    maxFilesize: 15, // MB
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 15
    },
    success: function (file, response) {
      $('form').find('input[name="dogovor_copy"]').remove()
      $('form').append('<input type="hidden" name="dogovor_copy" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="dogovor_copy"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($partnerBb) && $partnerBb->dogovor_copy)
      var file = {!! json_encode($partnerBb->dogovor_copy) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="dogovor_copy" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}
</script>
@endsection