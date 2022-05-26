@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.auto.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.autos.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.auto.fields.id') }}
                        </th>
                        <td>
                            {{ $auto->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.auto.fields.own') }}
                        </th>
                        <td>
                            {{ App\Models\Auto::OWN_RADIO[$auto->own] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.auto.fields.own_inn') }}
                        </th>
                        <td>
                            {{ $auto->own_inn }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.auto.fields.govnomer') }}
                        </th>
                        <td>
                            {{ $auto->govnomer }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.auto.fields.marka') }}
                        </th>
                        <td>
                            {{ $auto->marka }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.auto.fields.model') }}
                        </th>
                        <td>
                            {{ $auto->model }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.auto.fields.vin') }}
                        </th>
                        <td>
                            {{ $auto->vin }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.auto.fields.type_kuzov') }}
                        </th>
                        <td>
                            {{ App\Models\Auto::TYPE_KUZOV_RADIO[$auto->type_kuzov] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.auto.fields.category_tc') }}
                        </th>
                        <td>
                            {{ $auto->category_tc }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.auto.fields.year_ot') }}
                        </th>
                        <td>
                            {{ $auto->year_ot }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.auto.fields.color') }}
                        </th>
                        <td>
                            {{ $auto->color }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.auto.fields.horse') }}
                        </th>
                        <td>
                            {{ $auto->horse }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.auto.fields.ecoclass') }}
                        </th>
                        <td>
                            {{ $auto->ecoclass }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.auto.fields.pt_type') }}
                        </th>
                        <td>
                            {{ $auto->pt_type }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.auto.fields.pt_nomer') }}
                        </th>
                        <td>
                            {{ $auto->pt_nomer }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.auto.fields.max_nagruz') }}
                        </th>
                        <td>
                            {{ $auto->max_nagruz }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.auto.fields.beznagruz') }}
                        </th>
                        <td>
                            {{ $auto->beznagruz }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.auto.fields.pt_date') }}
                        </th>
                        <td>
                            {{ $auto->pt_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.auto.fields.pt_perv') }}
                        </th>
                        <td>
                            @if($auto->pt_perv)
                                <a href="{{ $auto->pt_perv->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $auto->pt_perv->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.auto.fields.pt_vtor') }}
                        </th>
                        <td>
                            @if($auto->pt_vtor)
                                <a href="{{ $auto->pt_vtor->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $auto->pt_vtor->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.auto.fields.registry') }}
                        </th>
                        <td>
                            {{ $auto->registry }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.auto.fields.kolo') }}
                        </th>
                        <td>
                            {{ App\Models\Auto::KOLO_RADIO[$auto->kolo] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.auto.fields.bakov') }}
                        </th>
                        <td>
                            {{ $auto->bakov }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.auto.fields.bakov_volume') }}
                        </th>
                        <td>
                            {{ $auto->bakov_volume }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.auto.fields.bakov_volume_2') }}
                        </th>
                        <td>
                            {{ $auto->bakov_volume_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.auto.fields.levelco_2') }}
                        </th>
                        <td>
                            {{ $auto->levelco_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.auto.fields.vnutr_dlina') }}
                        </th>
                        <td>
                            {{ $auto->vnutr_dlina }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.auto.fields.vnutr_weight') }}
                        </th>
                        <td>
                            {{ $auto->vnutr_weight }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.auto.fields.vnutr_height') }}
                        </th>
                        <td>
                            {{ $auto->vnutr_height }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.auto.fields.vnutr_kub') }}
                        </th>
                        <td>
                            {{ $auto->vnutr_kub }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.auto.fields.holod') }}
                        </th>
                        <td>
                            {{ $auto->holod }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.auto.fields.temp_ot') }}
                        </th>
                        <td>
                            {{ $auto->temp_ot }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.auto.fields.temp_do') }}
                        </th>
                        <td>
                            {{ $auto->temp_do }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.auto.fields.type_tahograf') }}
                        </th>
                        <td>
                            {{ $auto->type_tahograf }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.auto.fields.fuel') }}
                        </th>
                        <td>
                            {{ $auto->fuel }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.auto.fields.typeload') }}
                        </th>
                        <td>
                            @foreach($auto->typeloads as $key => $typeload)
                                <span class="label label-info">{{ $typeload->title }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.auto.fields.gidrolift') }}
                        </th>
                        <td>
                            {{ $auto->gidrolift }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.auto.fields.koniki') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $auto->koniki ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.auto.fields.adr') }}
                        </th>
                        <td>
                            @foreach($auto->adrs as $key => $adr)
                                <span class="label label-info">{{ $adr->title }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.auto.fields.ekmt') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $auto->ekmt ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.auto.fields.remni') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $auto->remni ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.auto.fields.palet') }}
                        </th>
                        <td>
                            {{ $auto->palet }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.auto.fields.type_kabin') }}
                        </th>
                        <td>
                            {{ App\Models\Auto::TYPE_KABIN_RADIO[$auto->type_kabin] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.auto.fields.engine_type') }}
                        </th>
                        <td>
                            {{ App\Models\Auto::ENGINE_TYPE_RADIO[$auto->engine_type] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.auto.fields.volume') }}
                        </th>
                        <td>
                            {{ $auto->volume }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.auto.fields.gruzopod') }}
                        </th>
                        <td>
                            {{ $auto->gruzopod }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.auto.fields.dogruz') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $auto->dogruz ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.auto.fields.operator_gps') }}
                        </th>
                        <td>
                            {{ $auto->operator_gps }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.auto.fields.nomer_dat_gps') }}
                        </th>
                        <td>
                            {{ $auto->nomer_dat_gps }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.auto.fields.nomer_mac') }}
                        </th>
                        <td>
                            {{ $auto->nomer_mac }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.auto.fields.rozisk') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $auto->rozisk ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.auto.fields.zalog') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $auto->zalog ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.auto.fields.htraf_gibdd') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $auto->htraf_gibdd ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.auto.fields.ob_type') }}
                        </th>
                        <td>
                            {{ $auto->ob_type }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.auto.fields.op_nemer') }}
                        </th>
                        <td>
                            {{ $auto->op_nemer }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.auto.fields.ob_date_ot') }}
                        </th>
                        <td>
                            {{ $auto->ob_date_ot }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.auto.fields.ka_type') }}
                        </th>
                        <td>
                            {{ $auto->ka_type }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.auto.fields.ka_nomer') }}
                        </th>
                        <td>
                            {{ $auto->ka_nomer }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.auto.fields.ka_date_ot') }}
                        </th>
                        <td>
                            {{ $auto->ka_date_ot }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.autos.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection