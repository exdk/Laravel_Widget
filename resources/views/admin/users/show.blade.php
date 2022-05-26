@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
                <div class="row">
            <div class="col-6" style="float:left;">
                <h4>Основная информация</h4>
            </div>
            <div class="col-6" style="float:right;">
                @can('user_edit')
                <a style="float:right;" class="" href="{{ route('admin.users.edit', $user->id) }}">
                    <i class="fa fa-pen" aria-hidden="true"></i>
                </a>
                @endcan
            </div>
        </div>

    </div>

    <div class="card-body">
        <div class="row">
                <div class="col-6">
                <h3  style="margin-bottom: 20px;">Профиль пользователя</h3>

<div class="row">
<div class="col-4">
<label for="email">{{ trans('cruds.user.fields.email') }}* :</label>
</div>
<div class="col-8">
{{ $user->email }}</div></div>
<div class="row">
<div class="col-4">
<label for="email">Пароль* :</label>
</div>
<div class="col-8">
*************</div></div>
<h3  style="margin-bottom: 20px;">Информация о пользователе</h3>
<div class="row">
<div class="col-4">
<label for="email">{{ trans('cruds.user.fields.surname') }}* :</label>
</div>
<div class="col-8">
{{ $user->surname }}</div></div>
<div class="row">
<div class="col-4">
<label for="email">{{ trans('cruds.user.fields.name') }}* :</label>
</div>
<div class="col-8">
{{ $user->name }}</div></div> 
<div class="row">
<div class="col-4">
<label for="email">{{ trans('cruds.user.fields.oth') }}* :</label>
</div>
<div class="col-8">
{{ $user->oth }}</div></div>

<div class="row">
<div class="col-4">
<label for="email">{{ trans('cruds.user.fields.firma') }}* :</label>
</div>
<div class="col-8">
{{ $user->firma->hortname ?? '' }}</div></div>           
<div class="row">
<div class="col-4">
<label for="email">{{ trans('cruds.user.fields.otdel') }}* :</label>
</div>
<div class="col-8">
{{ $user->otdel }}</div></div> 
<div class="row">
<div class="col-4">
<label for="email">{{ trans('cruds.user.fields.dolgno') }}* :</label>
</div>
<div class="col-8">
{{ $user->dolgno->title ?? '' }}</div></div>                         
<div class="row">
<div class="col-4">
<label for="email">{{ trans('cruds.user.fields.type') }}* :</label>
</div>
<div class="col-8">
    {{ App\Models\User::TYPE_RADIO[$user->type] ?? '' }}</div></div>                         
<h3  style="margin-bottom: 20px;">Контактные данные</h3>                                    
<div class="row">
<div class="col-4">
<label for="email">{{ trans('cruds.user.fields.mobile') }}* :</label>
</div>
<div class="col-8">
{{ $user->mobile }}</div></div>              
 <div class="row">
<div class="col-4">
<label for="email">{{ trans('cruds.user.fields.emailto') }}* :</label>
</div>
<div class="col-8">
{{ $user->emailto }}</div></div>  
<div class="row">
<div class="col-4">
<label for="email">{{ trans('cruds.user.fields.skype') }}* :</label>
</div>
<div class="col-8">
{{ $user->skype }}</div></div>
<div class="row">
    <div class="col-4">
    <label for="email">{{ trans('cruds.user.fields.icq') }}* :</label>
    </div>
    <div class="col-8">
        {{ $user->icq }}</div></div>
</div>
            <div class="col-6">
                 <div class="row">
<h3  style="margin-bottom: 20px;">Фото профиля</h3>
<div class="col-8">
@if($user->photo)
<img style="width:150px;" src="{{ $user->photo->getUrl('thumb') }}">
@endif
                            </div></div>
                
            </div>
            </div>
            </div>
            </div>
            
            
            


@endsection