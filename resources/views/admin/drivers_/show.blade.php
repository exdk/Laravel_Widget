@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.driver.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.drivers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
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
                            {{ trans('cruds.driver.fields.photodriver') }}
                        </th>
                        <td>
                            @if($driver->photodriver)
                                <a href="{{ $driver->photodriver->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $driver->photodriver->getUrl('thumb') }}">
                                </a>
                            @endif
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
                            {{ trans('cruds.driver.fields.pachecked') }}
                        </th>
                        <td>
                            {{ $driver->pachecked }}
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
                            {{ trans('cruds.driver.fields.nomervu') }}
                        </th>
                        <td>
                            {{ $driver->nomervu }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.driver.fields.vuchecked') }}
                        </th>
                        <td>
                            {{ $driver->vuchecked }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.driver.fields.datevu') }}
                        </th>
                        <td>
                            {{ $driver->datevu }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.driver.fields.byvu') }}
                        </th>
                        <td>
                            {{ $driver->byvu }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.driver.fields.vu_gorod') }}
                        </th>
                        <td>
                            {{ $driver->vu_gorod }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.driver.fields.vu_perv') }}
                        </th>
                        <td>
                            @if($driver->vu_perv)
                                <a href="{{ $driver->vu_perv->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $driver->vu_perv->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.driver.fields.vu_vtor') }}
                        </th>
                        <td>
                            @if($driver->vu_vtor)
                                <a href="{{ $driver->vu_vtor->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $driver->vu_vtor->getUrl('thumb') }}">
                                </a>
                            @endif
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
                            {{ trans('cruds.driver.fields.email') }}
                        </th>
                        <td>
                            {{ $driver->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.driver.fields.mobile_a') }}
                        </th>
                        <td>
                            {{ $driver->mobile_a }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.driver.fields.mobile_b') }}
                        </th>
                        <td>
                            {{ $driver->mobile_b }}
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
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.drivers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection