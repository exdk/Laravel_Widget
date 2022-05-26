@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.autobirga.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.autobirgas.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.autobirga.fields.id') }}
                        </th>
                        <td>
                            {{ $autobirga->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.autobirga.fields.typekuz') }}
                        </th>
                        <td>
                            {{ $autobirga->typekuz->typekuzova ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.autobirga.fields.autotype') }}
                        </th>
                        <td>
                            {{ App\Models\Autobirga::AUTOTYPE_RADIO[$autobirga->autotype] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.autobirga.fields.typeload') }}
                        </th>
                        <td>
                            @foreach($autobirga->typeloads as $key => $typeload)
                                <span class="label label-info">{{ $typeload->title }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.autobirga.fields.loverh') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $autobirga->loverh ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.autobirga.fields.lobok') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $autobirga->lobok ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.autobirga.fields.lozad') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $autobirga->lozad ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.autobirga.fields.lopoln') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $autobirga->lopoln ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.autobirga.fields.lopop') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $autobirga->lopop ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.autobirga.fields.lotoiki') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $autobirga->lotoiki ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.autobirga.fields.lovorot') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $autobirga->lovorot ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.autobirga.fields.logidrobort') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $autobirga->logidrobort ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.autobirga.fields.loapp') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $autobirga->loapp ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.autobirga.fields.lobreh') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $autobirga->lobreh ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.autobirga.fields.lobort') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $autobirga->lobort ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.autobirga.fields.loboko') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $autobirga->loboko ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.autobirga.fields.dogruz') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $autobirga->dogruz ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.autobirga.fields.hydrolift') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $autobirga->hydrolift ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.autobirga.fields.koniki') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $autobirga->koniki ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.autobirga.fields.gruzoton') }}
                        </th>
                        <td>
                            {{ $autobirga->gruzoton }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.autobirga.fields.volume') }}
                        </th>
                        <td>
                            {{ $autobirga->volume }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.autobirga.fields.length') }}
                        </th>
                        <td>
                            {{ $autobirga->length }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.autobirga.fields.width') }}
                        </th>
                        <td>
                            {{ $autobirga->width }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.autobirga.fields.height') }}
                        </th>
                        <td>
                            {{ $autobirga->height }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.autobirga.fields.lengthpri') }}
                        </th>
                        <td>
                            {{ $autobirga->lengthpri }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.autobirga.fields.widthpri') }}
                        </th>
                        <td>
                            {{ $autobirga->widthpri }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.autobirga.fields.heightpri') }}
                        </th>
                        <td>
                            {{ $autobirga->heightpri }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.autobirga.fields.tir') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $autobirga->tir ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.autobirga.fields.ekmt') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $autobirga->ekmt ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.autobirga.fields.adr') }}
                        </th>
                        <td>
                            @foreach($autobirga->adrs as $key => $adr)
                                <span class="label label-info">{{ $adr->title }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.autobirga.fields.fromcou') }}
                        </th>
                        <td>
                            {{ $autobirga->fromcou->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.autobirga.fields.fromzip') }}
                        </th>
                        <td>
                            {{ $autobirga->fromzip }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.autobirga.fields.fromregion') }}
                        </th>
                        <td>
                            {{ $autobirga->fromregion }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.autobirga.fields.fromcity') }}
                        </th>
                        <td>
                            {{ $autobirga->fromcity }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.autobirga.fields.fromulitca') }}
                        </th>
                        <td>
                            {{ $autobirga->fromulitca }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.autobirga.fields.fromdom') }}
                        </th>
                        <td>
                            {{ $autobirga->fromdom }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.autobirga.fields.fromlong') }}
                        </th>
                        <td>
                            {{ $autobirga->fromlong }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.autobirga.fields.fromlat') }}
                        </th>
                        <td>
                            {{ $autobirga->fromlat }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.autobirga.fields.fromrad') }}
                        </th>
                        <td>
                            {{ $autobirga->fromrad }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.autobirga.fields.tocou') }}
                        </th>
                        <td>
                            {{ $autobirga->tocou }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.autobirga.fields.tozip') }}
                        </th>
                        <td>
                            {{ $autobirga->tozip }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.autobirga.fields.toregion') }}
                        </th>
                        <td>
                            {{ $autobirga->toregion }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.autobirga.fields.tocity') }}
                        </th>
                        <td>
                            {{ $autobirga->tocity }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.autobirga.fields.toulitca') }}
                        </th>
                        <td>
                            {{ $autobirga->toulitca }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.autobirga.fields.todom') }}
                        </th>
                        <td>
                            {{ $autobirga->todom }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.autobirga.fields.tolong') }}
                        </th>
                        <td>
                            {{ $autobirga->tolong }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.autobirga.fields.tolat') }}
                        </th>
                        <td>
                            {{ $autobirga->tolat }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.autobirga.fields.torad') }}
                        </th>
                        <td>
                            {{ $autobirga->torad }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.autobirga.fields.dop_1_adr') }}
                        </th>
                        <td>
                            {{ $autobirga->dop_1_adr }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.autobirga.fields.dop_1_rad') }}
                        </th>
                        <td>
                            {{ $autobirga->dop_1_rad }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.autobirga.fields.dop_1_tot') }}
                        </th>
                        <td>
                            {{ $autobirga->dop_1_tot }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.autobirga.fields.dop_1_val') }}
                        </th>
                        <td>
                            {{ $autobirga->dop_1_val->title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.autobirga.fields.dop_1_typ') }}
                        </th>
                        <td>
                            {{ $autobirga->dop_1_typ->title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.autobirga.fields.dop_2_adr') }}
                        </th>
                        <td>
                            {{ $autobirga->dop_2_adr }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.autobirga.fields.dop_2_rad') }}
                        </th>
                        <td>
                            {{ $autobirga->dop_2_rad }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.autobirga.fields.dop_2_tot') }}
                        </th>
                        <td>
                            {{ $autobirga->dop_2_tot }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.autobirga.fields.dop_3_adr') }}
                        </th>
                        <td>
                            {{ $autobirga->dop_3_adr }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.autobirga.fields.dop_2_val') }}
                        </th>
                        <td>
                            {{ $autobirga->dop_2_val->title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.autobirga.fields.dop_2_typ') }}
                        </th>
                        <td>
                            {{ $autobirga->dop_2_typ->title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.autobirga.fields.dop_3_rad') }}
                        </th>
                        <td>
                            {{ $autobirga->dop_3_rad }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.autobirga.fields.dop_3_tot') }}
                        </th>
                        <td>
                            {{ $autobirga->dop_3_tot }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.autobirga.fields.dop_3_val') }}
                        </th>
                        <td>
                            {{ $autobirga->dop_3_val->title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.autobirga.fields.dop_3_typ') }}
                        </th>
                        <td>
                            {{ $autobirga->dop_3_typ->title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.autobirga.fields.dop_4_adr') }}
                        </th>
                        <td>
                            {{ $autobirga->dop_4_adr }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.autobirga.fields.dop_4_rad') }}
                        </th>
                        <td>
                            {{ $autobirga->dop_4_rad }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.autobirga.fields.dop_4_tot') }}
                        </th>
                        <td>
                            {{ $autobirga->dop_4_tot }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.autobirga.fields.dop_4_val') }}
                        </th>
                        <td>
                            {{ $autobirga->dop_4_val->title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.autobirga.fields.dop_4_typ') }}
                        </th>
                        <td>
                            {{ $autobirga->dop_4_typ->title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.autobirga.fields.dop_5_adr') }}
                        </th>
                        <td>
                            {{ $autobirga->dop_5_adr }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.autobirga.fields.dop_5_rad') }}
                        </th>
                        <td>
                            {{ $autobirga->dop_5_rad }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.autobirga.fields.dop_5_tot') }}
                        </th>
                        <td>
                            {{ $autobirga->dop_5_tot }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.autobirga.fields.dop_5_val') }}
                        </th>
                        <td>
                            {{ $autobirga->dop_5_val->title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.autobirga.fields.dop_5_typ') }}
                        </th>
                        <td>
                            {{ $autobirga->dop_5_typ->title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.autobirga.fields.dop_6_adr') }}
                        </th>
                        <td>
                            {{ $autobirga->dop_6_adr }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.autobirga.fields.dop_6_rad') }}
                        </th>
                        <td>
                            {{ $autobirga->dop_6_rad }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.autobirga.fields.dop_6_tot') }}
                        </th>
                        <td>
                            {{ $autobirga->dop_6_tot }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.autobirga.fields.dop_6_val') }}
                        </th>
                        <td>
                            {{ $autobirga->dop_6_val->title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.autobirga.fields.dop_6_typ') }}
                        </th>
                        <td>
                            {{ $autobirga->dop_6_typ->title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.autobirga.fields.dop_7_adr') }}
                        </th>
                        <td>
                            {{ $autobirga->dop_7_adr }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.autobirga.fields.dop_7_rad') }}
                        </th>
                        <td>
                            {{ $autobirga->dop_7_rad }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.autobirga.fields.dop_7_tot') }}
                        </th>
                        <td>
                            {{ $autobirga->dop_7_tot }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.autobirga.fields.dop_7_val') }}
                        </th>
                        <td>
                            {{ $autobirga->dop_7_val->title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.autobirga.fields.dop_7_typ') }}
                        </th>
                        <td>
                            {{ $autobirga->dop_7_typ->title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.autobirga.fields.dop_8_adr') }}
                        </th>
                        <td>
                            {{ $autobirga->dop_8_adr }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.autobirga.fields.dop_8_rad') }}
                        </th>
                        <td>
                            {{ $autobirga->dop_8_rad }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.autobirga.fields.dop_8_tot') }}
                        </th>
                        <td>
                            {{ $autobirga->dop_8_tot }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.autobirga.fields.dop_8_val') }}
                        </th>
                        <td>
                            {{ $autobirga->dop_8_val->title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.autobirga.fields.dop_8_typ') }}
                        </th>
                        <td>
                            {{ $autobirga->dop_8_typ->title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.autobirga.fields.dop_9_adr') }}
                        </th>
                        <td>
                            {{ $autobirga->dop_9_adr }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.autobirga.fields.dop_9_rad') }}
                        </th>
                        <td>
                            {{ $autobirga->dop_9_rad }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.autobirga.fields.dop_9_tot') }}
                        </th>
                        <td>
                            {{ $autobirga->dop_9_tot }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.autobirga.fields.dop_9_typ') }}
                        </th>
                        <td>
                            {{ $autobirga->dop_9_typ->title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.autobirga.fields.dop_9_val') }}
                        </th>
                        <td>
                            {{ $autobirga->dop_9_val->title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.autobirga.fields.dop_10_adr') }}
                        </th>
                        <td>
                            {{ $autobirga->dop_10_adr }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.autobirga.fields.dop_10_rad') }}
                        </th>
                        <td>
                            {{ $autobirga->dop_10_rad }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.autobirga.fields.dop_10_tot') }}
                        </th>
                        <td>
                            {{ $autobirga->dop_10_tot }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.autobirga.fields.dop_10_val') }}
                        </th>
                        <td>
                            {{ $autobirga->dop_10_val->title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.autobirga.fields.dop_10_typ') }}
                        </th>
                        <td>
                            {{ $autobirga->dop_10_typ->title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.autobirga.fields.readyload') }}
                        </th>
                        <td>
                            {{ App\Models\Autobirga::READYLOAD_RADIO[$autobirga->readyload] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.autobirga.fields.dateload') }}
                        </th>
                        <td>
                            {{ $autobirga->dateload }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.autobirga.fields.dateloadplu') }}
                        </th>
                        <td>
                            {{ $autobirga->dateloadplu }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.autobirga.fields.type_load') }}
                        </th>
                        <td>
                            {{ $autobirga->type_load->title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.autobirga.fields.oplatanal') }}
                        </th>
                        <td>
                            {{ $autobirga->oplatanal }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.autobirga.fields.oplataval') }}
                        </th>
                        <td>
                            {{ $autobirga->oplataval->title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.autobirga.fields.oplatawithnds') }}
                        </th>
                        <td>
                            {{ $autobirga->oplatawithnds }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.autobirga.fields.oplatanonds') }}
                        </th>
                        <td>
                            {{ $autobirga->oplatanonds }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.autobirga.fields.dopinfo') }}
                        </th>
                        <td>
                            {{ $autobirga->dopinfo }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.autobirga.fields.contact') }}
                        </th>
                        <td>
                            {{ $autobirga->contact->surname ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.autobirgas.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection