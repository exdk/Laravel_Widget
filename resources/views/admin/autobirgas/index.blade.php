@extends('layouts.admin')
@section('content')

@can('autobirga_create')

    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="https://admin.7rights.ru/admin/autobirgas/create">
    
                {{ trans('global.add') }} {{ trans('cruds.autobirga.title_singular') }}
         </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
    
                {{ trans('global.app_csvImport') }}
     </button> 
            @include('csvImport.modal', ['model' => 'Autobirga', 'route' => 'admin.autobirgas.parseCsvImport'])
   </div>
    </div>

@endcan
<div class="card">
    <div class="card-header">
        <h4>{{ trans('cruds.autobirga.title_singular') }} {{ trans('global.list') }}</h4>
    </div>
</div>


<div class="card">
    <div class="card-body" style=" padding: 0rem !important;">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Autobirga">
                <thead>
                    <tr>
                        <!--<th width="10">

                        </th>-->
                        <th>
                            {{ trans('cruds.autobirga.fields.id') }}
                        </th>
                        <th>
                            Транспорт
                        </th>
                        <!--<th>
                            {{ trans('cruds.autobirga.fields.typekuz') }}
                        </th>
                        <th>
                            {{ trans('cruds.autobirga.fields.autotype') }}
                        </th>
                        <th>
                            {{ trans('cruds.autobirga.fields.typeload') }}
                        </th>
                        <th>
                            {{ trans('cruds.autobirga.fields.loverh') }}
                        </th>
                        <th>
                            {{ trans('cruds.autobirga.fields.lobok') }}
                        </th>
                        <th>
                            {{ trans('cruds.autobirga.fields.lozad') }}
                        </th>
                        <th>
                            {{ trans('cruds.autobirga.fields.lopoln') }}
                        </th>
                        <th>
                            {{ trans('cruds.autobirga.fields.lopop') }}
                        </th>
                        <th>
                            {{ trans('cruds.autobirga.fields.lotoiki') }}
                        </th>
                        <th>
                            {{ trans('cruds.autobirga.fields.lovorot') }}
                        </th>
                        <th>
                            {{ trans('cruds.autobirga.fields.logidrobort') }}
                        </th>
                        <th>
                            {{ trans('cruds.autobirga.fields.loapp') }}
                        </th>
                        <th>
                            {{ trans('cruds.autobirga.fields.lobreh') }}
                        </th>
                        <th>
                            {{ trans('cruds.autobirga.fields.lobort') }}
                        </th>
                        <th>
                            {{ trans('cruds.autobirga.fields.loboko') }}
                        </th>
                        <th>
                            {{ trans('cruds.autobirga.fields.dogruz') }}
                        </th>
                        <th>
                            {{ trans('cruds.autobirga.fields.hydrolift') }}
                        </th>
                        <th>
                            {{ trans('cruds.autobirga.fields.koniki') }}
                        </th>
                        <th>
                            {{ trans('cruds.autobirga.fields.gruzoton') }}
                        </th>
                        <th>
                            {{ trans('cruds.autobirga.fields.volume') }}
                        </th>
                        <th>
                            {{ trans('cruds.autobirga.fields.length') }}
                        </th>
                        <th>
                            {{ trans('cruds.autobirga.fields.width') }}
                        </th>
                        <th>
                            {{ trans('cruds.autobirga.fields.height') }}
                        </th>
                        <th>
                            {{ trans('cruds.autobirga.fields.lengthpri') }}
                        </th>
                        <th>
                            {{ trans('cruds.autobirga.fields.widthpri') }}
                        </th>
                        <th>
                            {{ trans('cruds.autobirga.fields.heightpri') }}
                        </th>
                        <th>
                            {{ trans('cruds.autobirga.fields.tir') }}
                        </th>
                        <th>
                            {{ trans('cruds.autobirga.fields.ekmt') }}
                        </th>
                        <th>
                            {{ trans('cruds.autobirga.fields.adr') }}
                        </th>
                        <th>
                            {{ trans('cruds.autobirga.fields.fromcou') }}
                        </th>
                        <th>
                            {{ trans('cruds.country.fields.short_code') }}
                        </th>
                        <th>
                            {{ trans('cruds.autobirga.fields.fromzip') }}
                        </th>
                        <th>
                            {{ trans('cruds.autobirga.fields.fromregion') }}
                        </th>-->
                        <th>
                            {{ trans('cruds.autobirga.fields.fromcity') }}
                        </th>
                        <!--<th>
                            {{ trans('cruds.autobirga.fields.fromulitca') }}
                        </th>
                        <th>
                            {{ trans('cruds.autobirga.fields.fromdom') }}
                        </th>
                        <th>
                            {{ trans('cruds.autobirga.fields.fromlong') }}
                        </th>
                        <th>
                            {{ trans('cruds.autobirga.fields.fromlat') }}
                        </th>
                        <th>
                            {{ trans('cruds.autobirga.fields.fromrad') }}
                        </th>
                        <th>
                            {{ trans('cruds.autobirga.fields.tocou') }}
                        </th>
                        <th>
                            {{ trans('cruds.autobirga.fields.tozip') }}
                        </th>
                        <th>
                            {{ trans('cruds.autobirga.fields.toregion') }}
                        </th>-->
                        <th>
                            {{ trans('cruds.autobirga.fields.tocity') }}
                        </th>
                        <!--<th>
                            {{ trans('cruds.autobirga.fields.toulitca') }}
                        </th>
                        <th>
                            {{ trans('cruds.autobirga.fields.todom') }}
                        </th>
                        <th>
                            {{ trans('cruds.autobirga.fields.tolong') }}
                        </th>
                        <th>
                            {{ trans('cruds.autobirga.fields.tolat') }}
                        </th>
                        <th>
                            {{ trans('cruds.autobirga.fields.torad') }}
                        </th>
                        <th>
                            {{ trans('cruds.autobirga.fields.dop_1_adr') }}
                        </th>
                        <th>
                            {{ trans('cruds.autobirga.fields.dop_1_rad') }}
                        </th>
                        <th>
                            {{ trans('cruds.autobirga.fields.dop_1_tot') }}
                        </th>
                        <th>
                            {{ trans('cruds.autobirga.fields.dop_1_val') }}
                        </th>
                        <th>
                            {{ trans('cruds.autobirga.fields.dop_1_typ') }}
                        </th>
                        <th>
                            {{ trans('cruds.autobirga.fields.dop_2_adr') }}
                        </th>
                        <th>
                            {{ trans('cruds.autobirga.fields.dop_2_rad') }}
                        </th>
                        <th>
                            {{ trans('cruds.autobirga.fields.dop_2_tot') }}
                        </th>
                        <th>
                            {{ trans('cruds.autobirga.fields.dop_3_adr') }}
                        </th>
                        <th>
                            {{ trans('cruds.autobirga.fields.dop_2_val') }}
                        </th>
                        <th>
                            {{ trans('cruds.autobirga.fields.dop_2_typ') }}
                        </th>
                        <th>
                            {{ trans('cruds.autobirga.fields.dop_3_rad') }}
                        </th>
                        <th>
                            {{ trans('cruds.autobirga.fields.dop_3_tot') }}
                        </th>
                        <th>
                            {{ trans('cruds.autobirga.fields.dop_3_val') }}
                        </th>
                        <th>
                            {{ trans('cruds.autobirga.fields.dop_3_typ') }}
                        </th>
                        <th>
                            {{ trans('cruds.autobirga.fields.dop_4_adr') }}
                        </th>
                        <th>
                            {{ trans('cruds.autobirga.fields.dop_4_rad') }}
                        </th>
                        <th>
                            {{ trans('cruds.autobirga.fields.dop_4_tot') }}
                        </th>
                        <th>
                            {{ trans('cruds.autobirga.fields.dop_4_val') }}
                        </th>
                        <th>
                            {{ trans('cruds.autobirga.fields.dop_4_typ') }}
                        </th>
                        <th>
                            {{ trans('cruds.autobirga.fields.dop_5_adr') }}
                        </th>
                        <th>
                            {{ trans('cruds.autobirga.fields.dop_5_rad') }}
                        </th>
                        <th>
                            {{ trans('cruds.autobirga.fields.dop_5_tot') }}
                        </th>
                        <th>
                            {{ trans('cruds.autobirga.fields.dop_5_val') }}
                        </th>
                        <th>
                            {{ trans('cruds.autobirga.fields.dop_5_typ') }}
                        </th>
                        <th>
                            {{ trans('cruds.autobirga.fields.dop_6_adr') }}
                        </th>
                        <th>
                            {{ trans('cruds.autobirga.fields.dop_6_rad') }}
                        </th>
                        <th>
                            {{ trans('cruds.autobirga.fields.dop_6_tot') }}
                        </th>
                        <th>
                            {{ trans('cruds.autobirga.fields.dop_6_val') }}
                        </th>
                        <th>
                            {{ trans('cruds.autobirga.fields.dop_6_typ') }}
                        </th>
                        <th>
                            {{ trans('cruds.autobirga.fields.dop_7_adr') }}
                        </th>
                        <th>
                            {{ trans('cruds.autobirga.fields.dop_7_rad') }}
                        </th>
                        <th>
                            {{ trans('cruds.autobirga.fields.dop_7_tot') }}
                        </th>
                        <th>
                            {{ trans('cruds.autobirga.fields.dop_7_val') }}
                        </th>
                        <th>
                            {{ trans('cruds.autobirga.fields.dop_7_typ') }}
                        </th>
                        <th>
                            {{ trans('cruds.autobirga.fields.dop_8_adr') }}
                        </th>
                        <th>
                            {{ trans('cruds.autobirga.fields.dop_8_rad') }}
                        </th>
                        <th>
                            {{ trans('cruds.autobirga.fields.dop_8_tot') }}
                        </th>
                        <th>
                            {{ trans('cruds.autobirga.fields.dop_8_val') }}
                        </th>
                        <th>
                            {{ trans('cruds.autobirga.fields.dop_8_typ') }}
                        </th>
                        <th>
                            {{ trans('cruds.autobirga.fields.dop_9_adr') }}
                        </th>
                        <th>
                            {{ trans('cruds.autobirga.fields.dop_9_rad') }}
                        </th>
                        <th>
                            {{ trans('cruds.autobirga.fields.dop_9_tot') }}
                        </th>
                        <th>
                            {{ trans('cruds.autobirga.fields.dop_9_typ') }}
                        </th>
                        <th>
                            {{ trans('cruds.autobirga.fields.dop_9_val') }}
                        </th>
                        <th>
                            {{ trans('cruds.autobirga.fields.dop_10_adr') }}
                        </th>
                        <th>
                            {{ trans('cruds.autobirga.fields.dop_10_rad') }}
                        </th>
                        <th>
                            {{ trans('cruds.autobirga.fields.dop_10_tot') }}
                        </th>
                        <th>
                            {{ trans('cruds.autobirga.fields.dop_10_val') }}
                        </th>
                        <th>
                            {{ trans('cruds.autobirga.fields.dop_10_typ') }}
                        </th>
                        <th>
                            {{ trans('cruds.autobirga.fields.readyload') }}
                        </th>
                        <th>
                            {{ trans('cruds.autobirga.fields.dateload') }}
                        </th>
                        <th>
                            {{ trans('cruds.autobirga.fields.dateloadplu') }}
                        </th>
                        <th>
                            {{ trans('cruds.autobirga.fields.type_load') }}
                        </th>-->
                        <th>
                            {{ trans('cruds.autobirga.fields.oplatanal') }}
                        </th>
                        <!--<th>
                            {{ trans('cruds.autobirga.fields.oplataval') }}
                        </th>
                        <th>
                            {{ trans('cruds.autobirga.fields.oplatawithnds') }}
                        </th>
                        <th>
                            {{ trans('cruds.autobirga.fields.oplatanonds') }}
                        </th>
                        <th>
                            {{ trans('cruds.autobirga.fields.dopinfo') }}
                        </th>
                        <th>
                            {{ trans('cruds.autobirga.fields.contact') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.name') }}
                        </th>-->
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($autobirgas as $key => $autobirga)
                        <tr data-entry-id="{{ $autobirga->id }}">
                            <!--<td>

                            </td>-->
                            <td>
                                {{ $autobirga->id ?? '' }}
                            </td>
                            <td>
                                @can('autobirga_show')
                                    <a  href="{{ route('admin.autobirgas.show', $autobirga->id) }}">
                                        

                                {{ $autobirga->typekuz->typekuzova ?? '' }},
                                {{ $autobirga->gruzoton ?? '' }}т,
                                {{ $autobirga->volume ?? '' }}м<sup>3</sup>,
                                {{ App\Models\Autobirga::AUTOTYPE_RADIO[$autobirga->autotype] ?? '' }}, 
                                @foreach($autobirga->typeloads as $key => $item)
                                    {{ $item->title }}
                                @endforeach
                                {{ $autobirga->length ?? '' }}x
                                {{ $autobirga->width ?? '' }}x
                                {{ $autobirga->height ?? '' }}(ДxШxВ,м)
                                    </a>
                                @endcan
                            </td>
                            <!--<td>
                                {{ App\Models\Autobirga::AUTOTYPE_RADIO[$autobirga->autotype] ?? '' }}, 
                                @foreach($autobirga->typeloads as $key => $item)
                                    {{ $item->title }}
                                @endforeach
                            </td>
                            <td>
                                @foreach($autobirga->typeloads as $key => $item)
                                    {{ $item->title }}
                                @endforeach
                            </td>
                            <!--<td>
                                <span style="display:none">{{ $autobirga->loverh ?? '' }}</span>
                                <input type="checkbox" disabled="disabled" {{ $autobirga->loverh ? 'checked' : '' }}>
                            </td>
                            <td>
                                <span style="display:none">{{ $autobirga->lobok ?? '' }}</span>
                                <input type="checkbox" disabled="disabled" {{ $autobirga->lobok ? 'checked' : '' }}>
                            </td>
                            <td>
                                <span style="display:none">{{ $autobirga->lozad ?? '' }}</span>
                                <input type="checkbox" disabled="disabled" {{ $autobirga->lozad ? 'checked' : '' }}>
                            </td>
                            <td>
                                <span style="display:none">{{ $autobirga->lopoln ?? '' }}</span>
                                <input type="checkbox" disabled="disabled" {{ $autobirga->lopoln ? 'checked' : '' }}>
                            </td>
                            <td>
                                <span style="display:none">{{ $autobirga->lopop ?? '' }}</span>
                                <input type="checkbox" disabled="disabled" {{ $autobirga->lopop ? 'checked' : '' }}>
                            </td>
                            <td>
                                <span style="display:none">{{ $autobirga->lotoiki ?? '' }}</span>
                                <input type="checkbox" disabled="disabled" {{ $autobirga->lotoiki ? 'checked' : '' }}>
                            </td>
                            <td>
                                <span style="display:none">{{ $autobirga->lovorot ?? '' }}</span>
                                <input type="checkbox" disabled="disabled" {{ $autobirga->lovorot ? 'checked' : '' }}>
                            </td>
                            <td>
                                <span style="display:none">{{ $autobirga->logidrobort ?? '' }}</span>
                                <input type="checkbox" disabled="disabled" {{ $autobirga->logidrobort ? 'checked' : '' }}>
                            </td>
                            <td>
                                <span style="display:none">{{ $autobirga->loapp ?? '' }}</span>
                                <input type="checkbox" disabled="disabled" {{ $autobirga->loapp ? 'checked' : '' }}>
                            </td>
                            <td>
                                <span style="display:none">{{ $autobirga->lobreh ?? '' }}</span>
                                <input type="checkbox" disabled="disabled" {{ $autobirga->lobreh ? 'checked' : '' }}>
                            </td>
                            <td>
                                <span style="display:none">{{ $autobirga->lobort ?? '' }}</span>
                                <input type="checkbox" disabled="disabled" {{ $autobirga->lobort ? 'checked' : '' }}>
                            </td>
                            <td>
                                <span style="display:none">{{ $autobirga->loboko ?? '' }}</span>
                                <input type="checkbox" disabled="disabled" {{ $autobirga->loboko ? 'checked' : '' }}>
                            </td>
                            <td>
                                <span style="display:none">{{ $autobirga->dogruz ?? '' }}</span>
                                <input type="checkbox" disabled="disabled" {{ $autobirga->dogruz ? 'checked' : '' }}>
                            </td>
                            <td>
                                <span style="display:none">{{ $autobirga->hydrolift ?? '' }}</span>
                                <input type="checkbox" disabled="disabled" {{ $autobirga->hydrolift ? 'checked' : '' }}>
                            </td>
                            <td>
                                <span style="display:none">{{ $autobirga->koniki ?? '' }}</span>
                                <input type="checkbox" disabled="disabled" {{ $autobirga->koniki ? 'checked' : '' }}>
                            </td>
                            <td>
                                {{ $autobirga->gruzoton ?? '' }}
                            </td>
                            <td>
                                {{ $autobirga->volume ?? '' }}
                            </td>
                            <td>
                                {{ $autobirga->length ?? '' }}
                            </td>
                            <td>
                                {{ $autobirga->width ?? '' }}
                            </td>
                            <td>
                                {{ $autobirga->height ?? '' }}
                            </td>
                            <td>
                                {{ $autobirga->lengthpri ?? '' }}
                            </td>
                            <td>
                                {{ $autobirga->widthpri ?? '' }}
                            </td>
                            <td>
                                {{ $autobirga->heightpri ?? '' }}
                            </td>
                            <td>
                                <span style="display:none">{{ $autobirga->tir ?? '' }}</span>
                                <input type="checkbox" disabled="disabled" {{ $autobirga->tir ? 'checked' : '' }}>
                            </td>
                            <td>
                                <span style="display:none">{{ $autobirga->ekmt ?? '' }}</span>
                                <input type="checkbox" disabled="disabled" {{ $autobirga->ekmt ? 'checked' : '' }}>
                            </td>
                            <td>
                                @foreach($autobirga->adrs as $key => $item)
                                    <span class="badge badge-info">{{ $item->title }}</span>
                                @endforeach
                            </td>
                            <td>
                                {{ $autobirga->fromcou->name ?? '' }}
                            </td>
                            <td>
                                {{ $autobirga->fromcou->short_code ?? '' }}
                            </td>
                            <td>
                                {{ $autobirga->fromzip ?? '' }}
                            </td>
                            <td>
                                {{ $autobirga->fromregion ?? '' }}
                            </td>-->
                            <td>
                                {{ $autobirga->fromcity ?? '' }}
                            </td>
                            <!--<td>
                                {{ $autobirga->fromulitca ?? '' }}
                            </td>
                            <td>
                                {{ $autobirga->fromdom ?? '' }}
                            </td>
                            <td>
                                {{ $autobirga->fromlong ?? '' }}
                            </td>
                            <td>
                                {{ $autobirga->fromlat ?? '' }}
                            </td>
                            <td>
                                {{ $autobirga->fromrad ?? '' }}
                            </td>
                            <td>
                                {{ $autobirga->tocou ?? '' }}
                            </td>
                            <td>
                                {{ $autobirga->tozip ?? '' }}
                            </td>
                            <td>
                                {{ $autobirga->toregion ?? '' }}
                            </td>-->
                            <td>
                                {{ $autobirga->tocity ?? '' }}
                            </td>
                           <!--<td>
                                {{ $autobirga->toulitca ?? '' }}
                            </td>
                            <td>
                                {{ $autobirga->todom ?? '' }}
                            </td>
                            <td>
                                {{ $autobirga->tolong ?? '' }}
                            </td>
                            <td>
                                {{ $autobirga->tolat ?? '' }}
                            </td>
                            <td>
                                {{ $autobirga->torad ?? '' }}
                            </td>
                            <td>
                                {{ $autobirga->dop_1_adr ?? '' }}
                            </td>
                            <td>
                                {{ $autobirga->dop_1_rad ?? '' }}
                            </td>
                            <td>
                                {{ $autobirga->dop_1_tot ?? '' }}
                            </td>
                            <td>
                                {{ $autobirga->dop_1_val->title ?? '' }}
                            </td>
                            <td>
                                {{ $autobirga->dop_1_typ->title ?? '' }}
                            </td>
                            <td>
                                {{ $autobirga->dop_2_adr ?? '' }}
                            </td>
                            <td>
                                {{ $autobirga->dop_2_rad ?? '' }}
                            </td>
                            <td>
                                {{ $autobirga->dop_2_tot ?? '' }}
                            </td>
                            <td>
                                {{ $autobirga->dop_3_adr ?? '' }}
                            </td>
                            <td>
                                {{ $autobirga->dop_2_val->title ?? '' }}
                            </td>
                            <td>
                                {{ $autobirga->dop_2_typ->title ?? '' }}
                            </td>
                            <td>
                                {{ $autobirga->dop_3_rad ?? '' }}
                            </td>
                            <td>
                                {{ $autobirga->dop_3_tot ?? '' }}
                            </td>
                            <td>
                                {{ $autobirga->dop_3_val->title ?? '' }}
                            </td>
                            <td>
                                {{ $autobirga->dop_3_typ->title ?? '' }}
                            </td>
                            <td>
                                {{ $autobirga->dop_4_adr ?? '' }}
                            </td>
                            <td>
                                {{ $autobirga->dop_4_rad ?? '' }}
                            </td>
                            <td>
                                {{ $autobirga->dop_4_tot ?? '' }}
                            </td>
                            <td>
                                {{ $autobirga->dop_4_val->title ?? '' }}
                            </td>
                            <td>
                                {{ $autobirga->dop_4_typ->title ?? '' }}
                            </td>
                            <td>
                                {{ $autobirga->dop_5_adr ?? '' }}
                            </td>
                            <td>
                                {{ $autobirga->dop_5_rad ?? '' }}
                            </td>
                            <td>
                                {{ $autobirga->dop_5_tot ?? '' }}
                            </td>
                            <td>
                                {{ $autobirga->dop_5_val->title ?? '' }}
                            </td>
                            <td>
                                {{ $autobirga->dop_5_typ->title ?? '' }}
                            </td>
                            <td>
                                {{ $autobirga->dop_6_adr ?? '' }}
                            </td>
                            <td>
                                {{ $autobirga->dop_6_rad ?? '' }}
                            </td>
                            <td>
                                {{ $autobirga->dop_6_tot ?? '' }}
                            </td>
                            <td>
                                {{ $autobirga->dop_6_val->title ?? '' }}
                            </td>
                            <td>
                                {{ $autobirga->dop_6_typ->title ?? '' }}
                            </td>
                            <td>
                                {{ $autobirga->dop_7_adr ?? '' }}
                            </td>
                            <td>
                                {{ $autobirga->dop_7_rad ?? '' }}
                            </td>
                            <td>
                                {{ $autobirga->dop_7_tot ?? '' }}
                            </td>
                            <td>
                                {{ $autobirga->dop_7_val->title ?? '' }}
                            </td>
                            <td>
                                {{ $autobirga->dop_7_typ->title ?? '' }}
                            </td>
                            <td>
                                {{ $autobirga->dop_8_adr ?? '' }}
                            </td>
                            <td>
                                {{ $autobirga->dop_8_rad ?? '' }}
                            </td>
                            <td>
                                {{ $autobirga->dop_8_tot ?? '' }}
                            </td>
                            <td>
                                {{ $autobirga->dop_8_val->title ?? '' }}
                            </td>
                            <td>
                                {{ $autobirga->dop_8_typ->title ?? '' }}
                            </td>
                            <td>
                                {{ $autobirga->dop_9_adr ?? '' }}
                            </td>
                            <td>
                                {{ $autobirga->dop_9_rad ?? '' }}
                            </td>
                            <td>
                                {{ $autobirga->dop_9_tot ?? '' }}
                            </td>
                            <td>
                                {{ $autobirga->dop_9_typ->title ?? '' }}
                            </td>
                            <td>
                                {{ $autobirga->dop_9_val->title ?? '' }}
                            </td>
                            <td>
                                {{ $autobirga->dop_10_adr ?? '' }}
                            </td>
                            <td>
                                {{ $autobirga->dop_10_rad ?? '' }}
                            </td>
                            <td>
                                {{ $autobirga->dop_10_tot ?? '' }}
                            </td>
                            <td>
                                {{ $autobirga->dop_10_val->title ?? '' }}
                            </td>
                            <td>
                                {{ $autobirga->dop_10_typ->title ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Autobirga::READYLOAD_RADIO[$autobirga->readyload] ?? '' }}
                            </td>-->
                            <!--<td>
                                {{ $autobirga->dateload ?? '' }}
                            </td>
                            <td>
                                {{ $autobirga->dateloadplu ?? '' }}
                            </td>
                            <td>
                                {{ $autobirga->type_load->title ?? '' }}
                            </td>-->
                            <td>
                                {{ $autobirga->oplatanal ?? '' }}
                            </td>
                            <td>
                                {{ $autobirga->oplataval->title ?? '' }}
                            </td>
                            <td>
                                {{ $autobirga->oplatawithnds ?? '' }}
                            </td>
                            <td>
                                {{ $autobirga->oplatanonds ?? '' }}
                            </td>
                            <!--<td>
                                {{ $autobirga->dopinfo ?? '' }}
                            </td>
                            <td>
                                {{ $autobirga->contact->surname ?? '' }}
                            </td>
                            <td>
                                {{ $autobirga->contact->name ?? '' }}
                            </td>-->
                            <!--<td>
                                @can('autobirga_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.autobirgas.show', $autobirga->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('autobirga_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.autobirgas.edit', $autobirga->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('autobirga_delete')
                                    <form action="{{ route('admin.autobirgas.destroy', $autobirga->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>-->

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('autobirga_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.autobirgas.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan
    
  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-Autobirga:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  new $.fn.dataTable.ColReorder( table, {
    // options
} );
})

</script>
@endsection