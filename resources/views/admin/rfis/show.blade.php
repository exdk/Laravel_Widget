@extends('layouts.admin')
@section('content')


<h5>{{ $rfi->title }}</h5>
        <ul class="nav nav-pills">
          <li class="nav-item">
            <a class="nav-link active" style="border-radius:10px; " onclick="$('.nav-link').removeClass('active'); $(this).addClass('active'); $('#RFIInfo').fadeIn(500); $('#RFIAnketa').css('display','none');" aria-current="page" href="#">Общая инфо</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" style="border-radius:10px; " onclick="$('.nav-link').removeClass('active'); $(this).addClass('active'); $('#RFIAnketa').fadeIn(500); $('#RFIInfo').css('display','none');" href="#">Анкета RFI</a>
          </li>
        </ul>
        <br>
        <div id="RFIAnketa" style="display:none;">
             <div class="card" style="padding:20px;">
            @isset($answers)
               Результат анкеты "{{ $form_name }}" (пользователя #{{ $user_id }}) набрано {{ $result_points }} балов
                 <table class="table table-bordered table-striped">
                <tbody>
                    @foreach($answers as $answer)
                    <tr>
                        <th style="width:50%;">
                           {{ $answer['question'] }}
                        </th>
                        <td>
                            {{ $answer['value'] }}
                        </td>
                    </tr>
                    @endforeach
                   
                </tbody>
            </table>
           
            @endisset
			@empty($answers)
			<a style="margin-top:5px;" class="btn btn-xs btn-info" href="{{ route('admin.formsValues.edit', [$rfi->id_1->id, 'rfi_id' => $rfi->id]) }}">
				 Пройти анкету
			</a>
			@endempty
			
            </div>
        </div>
<div class="row" id="RFIInfo">
    <div class="col-6">
        
        <div class="card">
            <div class="card-header">
                {{ trans('cruds.rfi.fields.letter') }}
            </div>
        
            <div class="card-body">
                <div class="form-group">
                 {{ $rfi->letter }}
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                {{ trans('cruds.rfi.fields.applications') }}
            </div>
        
            <div class="card-body">
                <div class="form-group">
                          @foreach($rfi->applications as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endforeach
                </div>
            </div>
        </div>
        
        
    </div>
    <div class="col-6">
                <div class="card">
            <div class="card-header">
                Общая информация
            </div>
        
            <div class="card-body">
                <div class="form-group">
                    <div class="row">
                        <div class="col-6">
                            Компания
                        </div>
                        
                        <div class="col-6">
                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            Дата и время размещения
                        </div>
                        
                        <div class="col-6">
                            {{ $rfi->created_at }}
                        </div>
                    </div>
                        <!--<div class="col-6">
                            Оставшееся время
                        </div>
                        
                        <div class="col-6">
                            @php
                            $mytime = Carbon\Carbon::now();
                                $mytime->toDateTimeString();
                            @endphp
                        </div>
                    </div>-->
                    <div class="row">
                        <div class="col-6">
                            {{ trans('cruds.rfi.fields.finish') }}
                        </div>
                        
                        <div class="col-6">
                            {{ $rfi->finish }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            {{ trans('cruds.rfi.fields.limited') }}
                        </div>
                        
                        <div class="col-6">
                             {{ $rfi->limited }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            {{ trans('cruds.rfi.fields.contact') }}
                        </div>
                        
                        <div class="col-6">
                            
                        </div>
                    </div>
                    



                </div>


            </div>
        </div>
        
        
        
        
    </div>   
    
    
    
    
    
    
</div>

<!--
<div class="card">
    <div class="card-header">
        {{ trans('cruds.rfi.fields.letter') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.rfi.fields.id') }}
                        </th>
                        <td>
                            {{ $rfi->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rfi.fields.status') }}
                        </th>
                        <td>
                            {{ App\Models\Rfi::STATUS_SELECT[$rfi->status] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rfi.fields.typetran') }}
                        </th>
                        <td>
                            @foreach($rfi->typetrans as $key => $typetran)
                                <span class="label label-info">{{ $typetran->type }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rfi.fields.title') }}
                        </th>
                        <td>
                            {{ $rfi->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rfi.fields.finish') }}
                        </th>
                        <td>
                            {{ $rfi->finish }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rfi.fields.created_at') }}
                        </th>
                        <td>
                            {{ $rfi->created_at }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rfi.fields.letter') }}
                        </th>
                        <td>
                            {{ $rfi->letter }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rfi.fields.limited') }}
                        </th>
                        <td>
                            {{ $rfi->limited }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rfi.fields.applications') }}
                        </th>
                        <td>
                            @foreach($rfi->applications as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rfi.fields.contact') }}
                        </th>
                        <td>
                            {{ $rfi->contact->fio ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rfi.fields.contact_2') }}
                        </th>
                        <td>
                            {{ $rfi->contact_2->fio ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rfi.fields.id_1') }}
                        </th>
                        <td>
                            {{ $rfi->id_1->titleanketa ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
</div>

-->

@endsection