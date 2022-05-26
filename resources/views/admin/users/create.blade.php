@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Основная информация 
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.users.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-6">


                <h3 style="margin-bottom: 20px;">Профиль пользователя</h3>



                <div class="form-group">
            <div class="row">
                            <div class="col-4">
                <label class="required" for="email">{{ trans('cruds.user.fields.email') }}</label>
                </div>
                            <div class="col-8"> <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email') }}" required>
                @if($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.email_helper') }}</span>
            </div></div></div>
            <div class="form-group password">
            <div class="row">
                            <div class="col-4">
                <label class="required" for="password">{{ trans('cruds.user.fields.password') }}</label>
                </div>
                            <div class="col-8"> <input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" type="password" name="password" id="password" required>
                @if($errors->has('password'))
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.password_helper') }}</span>
                <a href="#" class="password-control" onclick="return show_hide_password(this);"></a>
            </div></div></div>

<h3 style="margin-bottom: 20px;">Информация о пользователе</h3>








            <div class="form-group">
            <div class="row">
                            <div class="col-4">




                <label for="surname">{{ trans('cruds.user.fields.surname') }}</label>
                </div>
                            <div class="col-8">



                <input class="form-control {{ $errors->has('surname') ? 'is-invalid' : '' }}" type="text" name="surname" id="surname" value="{{ old('surname', '') }}">
                @if($errors->has('surname'))
                    <span class="text-danger">{{ $errors->first('surname') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.surname_helper') }}</span>
            </div></div></div>
            <div class="form-group">
            <div class="row">
                            <div class="col-4">
                <label class="required" for="name">{{ trans('cruds.user.fields.name') }}</label>
                </div>
                            <div class="col-8"><input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.name_helper') }}</span>
            </div></div></div>
            <div class="form-group">
            <div class="row">
                            <div class="col-4">
                <label for="oth">{{ trans('cruds.user.fields.oth') }}</label>
                </div>
                            <div class="col-8"><input class="form-control {{ $errors->has('oth') ? 'is-invalid' : '' }}" type="text" name="oth" id="oth" value="{{ old('oth', '') }}">
                @if($errors->has('oth'))
                    <span class="text-danger">{{ $errors->first('oth') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.oth_helper') }}</span>
            </div></div></div>
                        
            <div class="form-group">
            <div class="row">
                            <div class="col-4">
                <label for="firma_id">{{ trans('cruds.user.fields.firma') }}</label>
                </div>
                            <div class="col-8"><select class="form-control select2 {{ $errors->has('firma') ? 'is-invalid' : '' }}" name="firma_id" id="firma_id">
                    @foreach($firmas as $id => $entry)
                        <option value="{{ $id }}" {{ old('firma_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('firma'))
                    <span class="text-danger">{{ $errors->first('firma') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.firma_helper') }}</span>
            </div></div></div>
            <div class="form-group">
            <div class="row">
                            <div class="col-4">
                <label for="oth">{{ trans('cruds.user.fields.otdel') }}</label>
                </div>
                            <div class="col-8"><input class="form-control {{ $errors->has('oth') ? 'is-invalid' : '' }}" type="text" name="oth" id="oth" value="{{ old('oth', '') }}">
                @if($errors->has('otdel'))
                    <span class="text-danger">{{ $errors->first('otdel') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.otdel_helper') }}</span>
            </div></div></div>
            <div class="form-group">
            <div class="row">
                            <div class="col-4">
                <label for="dolgno_id">{{ trans('cruds.user.fields.dolgno') }}</label>
                </div>
                            <div class="col-8"><select class="form-control select2 {{ $errors->has('dolgno') ? 'is-invalid' : '' }}" name="dolgno_id" id="dolgno_id">
                    @foreach($dolgnos as $id => $entry)
                        <option value="{{ $id }}" {{ old('dolgno_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('dolgno'))
                    <span class="text-danger">{{ $errors->first('dolgno') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.dolgno_helper') }}</span>
            </div></div></div>
            <div class="form-group">
            <div class="row">
                            <div class="col-4">
                <label for="pfr">{{ trans('cruds.user.fields.pfr') }}</label>
                </div>
                            <div class="col-8"><input class="form-control {{ $errors->has('pfr') ? 'is-invalid' : '' }}" type="text" name="pfr" id="pfr" value="{{ old('pfr', '') }}">
                @if($errors->has('pfr'))
                    <span class="text-danger">{{ $errors->first('pfr') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.pfr_helper') }}</span>
            </div></div></div>
            <div class="form-group">
            <div class="row">
                            <div class="col-4">
                <label>{{ trans('cruds.user.fields.type') }}</label>
                </div>
                            <div class="col-8"> @foreach(App\Models\User::TYPE_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('type') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="type_{{ $key }}" name="type" value="{{ $key }}" {{ old('type', '') === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="type_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('type'))
                    <span class="text-danger">{{ $errors->first('type') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.type_helper') }}</span>
            </div></div></div>



            <h3 style="margin-bottom: 20px;">Контактные данные</h3>

            <div class="form-group">
            <div class="row">
                            <div class="col-4">
                <label for="mobile">{{ trans('cruds.user.fields.mobile') }}</label>
                </div>
                            <div class="col-8"><input class="form-control {{ $errors->has('mobile') ? 'is-invalid' : '' }}" type="text" name="mobile" id="mobile" value="{{ old('mobile', '') }}">
                @if($errors->has('mobile'))
                    <span class="text-danger">{{ $errors->first('mobile') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.mobile_helper') }}</span>
            </div></div></div>
      

            <div class="form-group">
            <div class="row">
                            <div class="col-4">
                <label for="emailto">{{ trans('cruds.user.fields.emailto') }}</label>
                </div>
                            <div class="col-8"> <input class="form-control {{ $errors->has('emailto') ? 'is-invalid' : '' }}" type="email" name="emailto" id="emailto" value="{{ old('emailto') }}">
                @if($errors->has('emailto'))
                    <span class="text-danger">{{ $errors->first('emailto') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.emailto_helper') }}</span>
            </div></div></div>
            <div class="form-group">
            <div class="row">
                            <div class="col-4">
                <label for="skype">{{ trans('cruds.user.fields.skype') }}</label>
                </div>
                            
                            <div class="col-8"> <input class="form-control {{ $errors->has('skype') ? 'is-invalid' : '' }}" type="text" name="skype" id="skype" value="{{ old('skype', '') }}">
                @if($errors->has('skype'))
                    <span class="text-danger">{{ $errors->first('skype') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.skype_helper') }}</span>
            </div></div></div>
            <div class="form-group">
            <div class="row">
                            <div class="col-4">
                <label for="icq">{{ trans('cruds.user.fields.icq') }}</label>
                </div>
                            <div class="col-8"> <input class="form-control {{ $errors->has('icq') ? 'is-invalid' : '' }}" type="text" name="icq" id="icq" value="{{ old('icq', '') }}">
                @if($errors->has('icq'))
                    <span class="text-danger">{{ $errors->first('icq') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.icq_helper') }}</span>
            </div></div></div>
            <div class="form-group" >
            <div class="row">
                            <div class="col-4">
                <label class="required" for="roles">{{ trans('cruds.user.fields.roles') }}</label>
                </div>
                            <div class="col-8"><div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('roles') ? 'is-invalid' : '' }}" name="roles[]" id="roles" multiple required>
                    @foreach($roles as $id => $role)
                        <option value="{{ $id }}" {{ in_array($id, old('roles', [])) ? 'selected' : '' }}>{{ $role }}</option>
                    @endforeach
                </select>
                @if($errors->has('roles'))
                    <span class="text-danger">{{ $errors->first('roles') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.roles_helper') }}</span>
            </div> </div></div>
            <div class="form-group" style="display:none;">
                <label for="team_id">{{ trans('cruds.user.fields.team') }}</label>
                <select class="form-control select2 {{ $errors->has('team') ? 'is-invalid' : '' }}" name="team_id" id="team_id">
                    @foreach($teams as $id => $entry)
                        <option value="{{ $id }}" {{ old('team_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('team'))
                    <span class="text-danger">{{ $errors->first('team') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.team_helper') }}</span>
            </div>
        
        
        
        
        </div>
            <div class="col-4">











            <h3 style="margin-bottom: 20px;">Фото профиля</h3>



            <div class="form-group">

                <div class="needsclick dropzone {{ $errors->has('photo') ? 'is-invalid' : '' }}" id="photo-dropzone">
                </div>
                @if($errors->has('photo'))
                    <span class="text-danger">{{ $errors->first('photo') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.photo_helper') }}</span>
            </div>






            </div>
            </div>
                        <div class="form-group">
                <button class="btn btn-info" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection

@section('scripts')
<script>
    Dropzone.options.photoDropzone = {
    url: '{{ route('admin.users.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="photo"]').remove()
      $('form').append('<input type="hidden" name="photo" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="photo"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($user) && $user->photo)
      var file = {!! json_encode($user->photo) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="photo" value="' + file.file_name + '">')
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
<style>
.password {
	position: relative;
}
#password {
	width: 100%;
	padding: 5px 0;
	line-height: 40px;
	text-indent: 10px;
	margin: 0 0 15px 0;
	border-radius: 5px;
	border: 1px solid #999;
}
.password-control {
	position: absolute;
	top: 5px;
	right: 12px;
	display: inline-block;
	width: 20px;
	height: 20px;
	background: url(https://snipp.ru/demo/495/view.svg) 0 0 no-repeat;
}
.password-control.view {
	background: url(https://snipp.ru/demo/495/no-view.svg) 0 0 no-repeat;
}
</style>
<script>
function show_hide_password(target){
	var input = document.getElementById('password');
	if (input.getAttribute('type') == 'password') {
		target.classList.add('view');
		input.setAttribute('type', 'text');
	} else {
		target.classList.remove('view');
		input.setAttribute('type', 'password');
	}
	return false;
}
</script>
@endsection