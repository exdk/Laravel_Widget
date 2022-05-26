@extends('layouts.admin')
@section('content')

<div class="row">
    <div class="col-9">
	<div class="card"><a name="ob"></a>
    <div class="card-header">
                <div class="row">
            <div class="col-6" style="float:left;">
                <h4>Общая информация</h4>
            </div>
            <div class="col-6" style="float:right;">
                @can('driver_edit')
                    <a style="float:right;" class="" href="{{ route('admin.drivers.edit', $driver->id) }}">
                        <i class="fa fa-pen" aria-hidden="true"></i>
                    </a>
                @endcan
                
            </div>
        </div>
    </div>
<div class="card-body">
    				        <div class="row">
            <div class="col-4">
                <label for="email">ID :</label>
            </div>
            <div class="col-8">
                {{ $driver->id }}
            </div>
        </div>
            				        <div class="row">
            <div class="col-4">
                <label for="email">{{ trans('cruds.driver.fields.fam') }} :</label>
            </div>
            <div class="col-8">
                {{ $driver->fam }}
            </div>
        </div>
            				        <div class="row">
            <div class="col-4">
                <label for="email">{{ trans('cruds.driver.fields.name') }} :</label>
            </div>
            <div class="col-8">
                 {{ $driver->name }}
            </div>
        </div>
            				        <div class="row">
            <div class="col-4">
                <label for="email">{{ trans('cruds.driver.fields.oth') }} :</label>
            </div>
            <div class="col-8">
                {{ $driver->oth }}
            </div>
        </div>
          <div class="row">
            <div class="col-4">
                <label for="email">{{ trans('cruds.driver.fields.date') }} :</label>
            </div>
            <div class="col-8">

                            {{ $driver->date }}
  </div>
        </div>
                             <div class="row">
            <div class="col-4">
                <label for="email">{{ trans('cruds.driver.fields.birth_place') }} :</label>
            </div>
            <div class="col-8">

                            {{ $driver->birth_place }}
          </div>
        </div>
</div></div>
<div class="card"><a name="ko"></a>
    <div class="card-header">
                <div class="row">
            <div class="col-6" style="float:left;">
                <h4>Паспорт</h4>
            </div>
        </div>
    </div>
<div class="card-body">
    <div class="row">
            <div class="col-4">
                <label for="email">{{ trans('cruds.driver.fields.pa_ty') }} :</label>
            </div>
        <div class="col-8">
                {{ $driver->pa_ty }}
      </div>
    </div>
                            <div class="row">
            <div class="col-4">
                <label for="email">{{ trans('cruds.driver.fields.pa_nomer') }} :</label>
            </div>
        <div class="col-8">
                            {{ $driver->pa_nomer }} </div>
        </div>
                        <div class="row">
            <div class="col-4">
                <label for="email">{{ trans('cruds.driver.fields.pa_date') }} :</label>
            </div>
        <div class="col-8">{{ $driver->pa_date }} </div>
        </div>
                        <div class="row">
            <div class="col-4">
                <label for="email">{{ trans('cruds.driver.fields.pa_kod') }} :</label>
            </div>
        <div class="col-8"> {{ $driver->pa_kod }} </div>
        </div>
                        <div class="row">
            <div class="col-4">
                <label for="email">{{ trans('cruds.driver.fields.pa_by') }} :</label>
            </div>
        <div class="col-8">{{ $driver->pa_by }} </div>
        </div>
                       <div class="row">
            <div class="col-4">
                <label for="email">{{ trans('cruds.driver.fields.pa_perv') }} :</label>
            </div>
        <div class="col-8">
                            @if($driver->pa_perv)
                                <a href="{{ $driver->pa_perv->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $driver->pa_perv->getUrl('thumb') }}">
                                </a>
                            @endif </div>
        </div>
                      <div class="row">
            <div class="col-4">
                <label for="email">{{ trans('cruds.driver.fields.pa_vtor') }} :</label>
            </div>
        <div class="col-8">
                            @if($driver->pa_vtor)
                                <a href="{{ $driver->pa_vtor->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $driver->pa_vtor->getUrl('thumb') }}">
                                </a>
                            @endif </div>
        </div>
                       <div class="row">
            <div class="col-4">
                <label for="email">{{ trans('cruds.driver.fields.adr_pro') }} :</label>
            </div>
        <div class="col-8">
                            {{ $driver->adr_pro }} </div>
        </div>
                       <div class="row">
            <div class="col-4">
                <label for="email">{{ trans('cruds.driver.fields.pro_date') }} :</label>
            </div>
        <div class="col-8">
                            {{ $driver->pro_date }} </div>
        </div>
                        <div class="row">
            <div class="col-4">
                <label for="email">{{ trans('cruds.driver.fields.pro_vr_adr') }} :</label>
            </div>
        <div class="col-8">
                            {{ $driver->pro_vr_adr }} </div>
        </div>
                        <div class="row">
            <div class="col-4">
                <label for="email">{{ trans('cruds.driver.fields.pro_vr_date_ot') }} :</label>
            </div>
        <div class="col-8">
                            {{ $driver->pro_vr_date_ot }} </div>
        </div>
                       <div class="row">
            <div class="col-4">
                <label for="email">{{ trans('cruds.driver.fields.pro_vr_date_do') }} :</label>
            </div>
        <div class="col-8">
                            {{ $driver->pro_vr_date_do }} </div>
        </div>
                        

</div></div>
        
        
        
        
        
<div class="card"><a name="re"></a>
    <div class="card-header">
        <div class="row">
            <div class="col-6" style="float:left;">
                <h4>Водительское удостоверение</h4>
            </div>
        </div>
    </div>
<div class="card-body">
<div class="row">
            <div class="col-4">
                <label for="email">
                            {{ trans('cruds.driver.fields.nomervu') }} :</label>
            </div>
        <div class="col-8">{{ $driver->nomervu }}
</div>
        </div>
<div class="row">
            <div class="col-4">
                <label for="email">
                            {{ trans('cruds.driver.fields.datevu') }} :</label>
            </div>
        <div class="col-8">{{ $driver->datevu }}
</div>
        </div>
<div class="row">
            <div class="col-4">
                <label for="email">
                            {{ trans('cruds.driver.fields.byvu') }} :</label>
            </div>
        <div class="col-8">{{ $driver->byvu }}</div>
        </div>
<div class="row">
            <div class="col-4">
                <label for="email">
                            {{ trans('cruds.driver.fields.vu_gorod') }} :</label>
            </div>
        <div class="col-8">{{ $driver->vu_gorod }}</div>
        </div>
<div class="row">
            <div class="col-4">
                <label for="email">
                            {{ trans('cruds.driver.fields.vu_perv') }} :</label>
            </div>
        <div class="col-8">@if($driver->vu_perv)
                                <a href="{{ $driver->vu_perv->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $driver->vu_perv->getUrl('thumb') }}">
                                </a>
                            @endif</div>
        </div>
<div class="row">
            <div class="col-4">
                <label for="email">
                            {{ trans('cruds.driver.fields.vu_vtor') }} :</label>
            </div>
        <div class="col-8">@if($driver->vu_vtor)
                                <a href="{{ $driver->vu_vtor->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $driver->vu_vtor->getUrl('thumb') }}">
                                </a>
                            @endif
</div>
        </div>

</div>
</div>
<div class="card"><a name="rei"></a>
    <div class="card-header">
        <div class="row">
            <div class="col-6" style="float:left;">
                <h4>Контакты</h4>
            </div>
        </div>
    </div>
<div class="card-body">        
<div class="row">
            <div class="col-4">
                <label for="email">
                            {{ trans('cruds.driver.fields.email') }} :</label>
            </div>
        <div class="col-8">
                            <a href="mailto:{{ $driver->email }}">{{ $driver->email }}</a>
</div>
        </div>
<div class="row">
            <div class="col-4">
                <label for="email">{{ trans('cruds.driver.fields.mobile_a') }} :</label>
            </div>
        <div class="col-8">
                            <a href="tel:{{ $driver->mobile_a }}"> {{ $driver->mobile_a }}</a>
</div>
        </div>
<div class="row">
            <div class="col-4">
                <label for="email">{{ trans('cruds.driver.fields.mobile_b') }} :</label>
            </div>
        <div class="col-8">
                            <a href="tel:{{ $driver->mobile_b }}">{{ $driver->mobile_b }}</a>
</div>
        </div>

</div>
</div>        
        
<div class="card"><a name="geo"></a>
    <div class="card-header">
        <div class="row">
            <div class="col-6" style="float:left;">
                <h4>Документы</h4>
            </div>
        </div>
    </div>
<div class="card-body">        
<div class="row">
            <div class="col-4">
                <label for="email">        
                            {{ trans('cruds.driver.fields.taho') }} :</label>
            </div>
        <div class="col-8">
                            {{ $driver->taho }}
</div>
</div>
<div class="row">
            <div class="col-4">
                <label for="email">
                            {{ trans('cruds.driver.fields.inn') }} :</label>
            </div>
        <div class="col-8">
                            {{ $driver->inn }}
</div>
</div>
<div class="row">
            <div class="col-4">
                <label for="email">
                            {{ trans('cruds.driver.fields.inn_photo') }} :</label>
            </div>
        <div class="col-8">
                            @if($driver->inn_photo)
                                <a href="{{ $driver->inn_photo->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $driver->inn_photo->getUrl('thumb') }}">
                                </a>
                            @endif
</div>
</div>
<div class="row">
            <div class="col-4">
                <label for="email">
                            {{ trans('cruds.driver.fields.pfr') }} :</label>
            </div>
        <div class="col-8">
                            {{ $driver->pfr }}
                       </div>
</div>
<div class="row">
            <div class="col-4">
                <label for="email">
                            {{ trans('cruds.driver.fields.pfr_perv') }} :</label>
            </div>
        <div class="col-8">
                            @if($driver->pfr_perv)
                                <a href="{{ $driver->pfr_perv->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $driver->pfr_perv->getUrl('thumb') }}">
                                </a>
                            @endif
                        </div>
</div>
<div class="row">
            <div class="col-4">
                <label for="email">
                            {{ trans('cruds.driver.fields.medb_nomer') }} :</label>
            </div>
        <div class="col-8">
                            {{ $driver->medb_nomer }}
                        </div>
</div>
<div class="row">
            <div class="col-4">
                <label for="email">
                            {{ trans('cruds.driver.fields.medb_typ') }} :</label>
            </div>
        <div class="col-8">
                            {{ $driver->medb_typ }}
                       </div>
</div>
<div class="row">
            <div class="col-4">
                <label for="email">
                            {{ trans('cruds.driver.fields.medb_date_ot') }} :</label>
            </div>
        <div class="col-8">
                            {{ $driver->medb_date_ot }}
                       </div>
</div>
<div class="row">
            <div class="col-4">
                <label for="email">
                            {{ trans('cruds.driver.fields.medb_perv') }} :</label>
            </div>
        <div class="col-8">
                            @foreach($driver->medb_perv as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $media->getUrl('thumb') }}">
                                </a>
                            @endforeach
</div>
</div>    
</div>
</div>


<div class="card"><a name="file"></a>
    <div class="card-header">
        <div class="row">
            <div class="col-6" style="float:left;">
                <h4>Договор</h4>
            </div>
        </div>
    </div>
<div class="card-body">        
<div class="row">
            <div class="col-4">
                <label for="email">{{ trans('cruds.driver.fields.trud_nomer') }} :</label>
            </div>
        <div class="col-8">
                            {{ $driver->trud_nomer }}
                       </div>
</div>
<div class="row">
            <div class="col-4">
                <label for="email">
                            {{ trans('cruds.driver.fields.trud_date_ot') }} :</label>
            </div>
        <div class="col-8">
                            {{ $driver->trud_date_ot }}
                       </div>
</div>
<div class="row">
            <div class="col-4">
                <label for="email">
                            {{ trans('cruds.driver.fields.trud_dol') }} :</label>
            </div>
        <div class="col-8">
                            {{ $driver->trud_dol }}
       

</div>
</div>    
</div>
</div>

</div>
<div class="col-3 ">
    
    <div class="position-fixed">
    <div class="card ">
       <div class="card-body ">
<div class="btn-group-vertical ">
<a href="#ob" style="width:100%;"><button class="btn btn-outline-primary">Общая информация</button></a>
<a href="#ko" style="width:100%;"><button class="btn btn-outline-primary">Паспорт</button></a>
<a href="#re" style="width:100%;"><button class="btn btn-outline-primary">Водительское</button></a>
<a href="#rei" style="width:100%;"><button class="btn btn-outline-primary">Контакты</button></a>
<a href="#geo" style="width:100%;"><button class="btn btn-outline-primary">Документы</button></a>
<a href="#file" style="width:100%;"><button class="btn btn-outline-primary">Договор</button></a>
</div>
</div> 
    </div>
     <div class="card">
         <div class="card-header">
             <h6>Профиль заполнен на: </h6>
         </div>
       <div class="card-body ">
<div class="progress">
  <div class="progress-bar" role="progressbar" style="width: 90%;" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">90%</div>
</div>
</div> 
    </div>
    </div>
</div>
</div>

<!--
    <div class="card-body">
        <div class="form-group">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.driver.fields.id') }}
                        </th>
                        <td>
                            {{ $driver->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.driver.fields.fam') }}
                        </th>
                        <td>
                            {{ $driver->fam }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.driver.fields.name') }}
                        </th>
                        <td>
                            {{ $driver->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.driver.fields.oth') }}
                        </th>
                        <td>
                            {{ $driver->oth }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.driver.fields.date') }}
                        </th>
                        <td>
                            {{ $driver->date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.driver.fields.birth_place') }}
                        </th>
                        <td>
                            {{ $driver->birth_place }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.driver.fields.pa_ty') }}
                        </th>
                        <td>
                            {{ $driver->pa_ty }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.driver.fields.pa_nomer') }}
                        </th>
                        <td>
                            {{ $driver->pa_nomer }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.driver.fields.pa_date') }}
                        </th>
                        <td>
                            {{ $driver->pa_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.driver.fields.pa_kod') }}
                        </th>
                        <td>
                            {{ $driver->pa_kod }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.driver.fields.pa_by') }}
                        </th>
                        <td>
                            {{ $driver->pa_by }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.driver.fields.pa_perv') }}
                        </th>
                        <td>
                            @if($driver->pa_perv)
                                <a href="{{ $driver->pa_perv->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $driver->pa_perv->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.driver.fields.pa_vtor') }}
                        </th>
                        <td>
                            @if($driver->pa_vtor)
                                <a href="{{ $driver->pa_vtor->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $driver->pa_vtor->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.driver.fields.adr_pro') }}
                        </th>
                        <td>
                            {{ $driver->adr_pro }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.driver.fields.pro_date') }}
                        </th>
                        <td>
                            {{ $driver->pro_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.driver.fields.pro_vr_adr') }}
                        </th>
                        <td>
                            {{ $driver->pro_vr_adr }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.driver.fields.pro_vr_date_ot') }}
                        </th>
                        <td>
                            {{ $driver->pro_vr_date_ot }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.driver.fields.pro_vr_date_do') }}
                        </th>
                        <td>
                            {{ $driver->pro_vr_date_do }}
                        </td>
                    </tr>
                    
                    <tr>
                        <th>
                            {{ trans('cruds.driver.fields.taho') }}
                        </th>
                        <td>
                            {{ $driver->taho }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.driver.fields.inn') }}
                        </th>
                        <td>
                            {{ $driver->inn }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.driver.fields.inn_photo') }}
                        </th>
                        <td>
                            @if($driver->inn_photo)
                                <a href="{{ $driver->inn_photo->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $driver->inn_photo->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.driver.fields.pfr') }}
                        </th>
                        <td>
                            {{ $driver->pfr }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.driver.fields.pfr_perv') }}
                        </th>
                        <td>
                            @if($driver->pfr_perv)
                                <a href="{{ $driver->pfr_perv->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $driver->pfr_perv->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                   
                    <tr>
                        <th>
                            {{ trans('cruds.driver.fields.medb_nomer') }}
                        </th>
                        <td>
                            {{ $driver->medb_nomer }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.driver.fields.medb_typ') }}
                        </th>
                        <td>
                            {{ $driver->medb_typ }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.driver.fields.medb_date_ot') }}
                        </th>
                        <td>
                            {{ $driver->medb_date_ot }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.driver.fields.medb_perv') }}
                        </th>
                        <td>
                            @foreach($driver->medb_perv as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $media->getUrl('thumb') }}">
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.driver.fields.trud_nomer') }}
                        </th>
                        <td>
                            {{ $driver->trud_nomer }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.driver.fields.trud_date_ot') }}
                        </th>
                        <td>
                            {{ $driver->trud_date_ot }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.driver.fields.trud_dol') }}
                        </th>
                        <td>
                            {{ $driver->trud_dol }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

-->

@endsection