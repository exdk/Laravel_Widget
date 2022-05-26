@extends('layouts.app')
@section('content')
<div class="login-box">
    <div class="login-logo">
        <div class="login-logo">
            <a href="#">
                {{ trans('panel.site_title') }}
            </a>
        </div>
    </div>
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">{{ trans('global.register') }}</p>
            <form method="POST" action="{{ route('register') }}">
                {{ csrf_field() }}
                @if(request()->has('team'))
                    <input type="hidden" name="team" id="team" value="{{ request()->query('team') }}">
                @endif
                <div>
                    {{ csrf_field() }}
					<div class="form-group">
						<p><input name="dzen" type="radio" required value="zakaz"> Я грузовладелец</p>
						<p><input name="dzen" type="radio" required value="tran"> Я перевозчик</p>
						@if($errors->has('dzen'))
							<div style="color: red;">
								{{ $errors->first('dzen') }}
							</div>
						@endif
					</div>
					
                    <div class="form-group">
                        <input type="text" name="name" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" required autofocus placeholder="{{ trans('global.user_name') }}" value="{{ old('name', null) }}">
                        @if($errors->has('name'))
                            <div class="invalid-feedback">
                                {{ $errors->first('name') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" required placeholder="{{ trans('global.login_email') }}" value="{{ old('email', null) }}">
                        @if($errors->has('email'))
                            <div class="invalid-feedback">
                                {{ $errors->first('email') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group password">
                        <input id="password-input0" type="password" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" required placeholder="{{ trans('global.login_password') }}">
                        @if($errors->has('password'))
                            <div class="invalid-feedback">
                                {{ $errors->first('password') }}
                            </div>
                        @endif
                        <a href="#" class="password-control" onclick="return show_hide_password0(this);"></a>
                    </div>
                    <div class="form-group password">
                        <input id="password-input" type="password" name="password_confirmation" class="form-control" required placeholder="{{ trans('global.login_password_confirmation') }}">
                        <a href="#" class="password-control" onclick="return show_hide_password(this);"></a>
                    </div>
                    
                    <div class="form-group">
                    Нажимая кнопку «Регистрация», я подтверждаю, что ознакомлен(а) и согласен(на)
                    с <a href="#" target="_blank">Правилами работы</a> сайта, <a href="https://admin.7rights.ru/public/template/agreement-v1.pdf" target="_blank">Согласием на обработку</a> и передачу персональных данных,
                    условиями <a href="#" target="_blank">Лицензионного договора</a> и <a href="#" target="_blank">Политики конфиденциальности</a>.
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 text-right">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">
                            {{ trans('global.register') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-12" style="text-align: center;"><a href="login" > Перейти на вход</a></div>
    </div>
</div>
<style>
.password {
	position: relative;
}
#password-input {
	width: 100%;
	padding: 5px 0;
	line-height: 40px;
	text-indent: 10px;
	margin: 0 0 15px 0;
	border-radius: 5px;
	border: 1px solid #999;
}
#password-input0 {
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
	top: 6px;
	right: 6px;
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
	var input = document.getElementById('password-input');
	if (input.getAttribute('type') == 'password') {
		target.classList.add('view');
		input.setAttribute('type', 'text');
	} else {
		target.classList.remove('view');
		input.setAttribute('type', 'password');
	}
	return false;
}
function show_hide_password0(target){
	var input = document.getElementById('password-input0');
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