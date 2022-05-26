@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.assignedDelivere.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.assigned-deliveres.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.assignedDelivere.fields.id') }}
                        </th>
                        <td>
                            {{ $assignedDelivere->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignedDelivere.fields.deliveryid') }}
                        </th>
                        <td>
                            {{ $assignedDelivere->deliveryid }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignedDelivere.fields.statusi_razmestit_otslezhivanie_gryza') }}
                        </th>
                        <td>
                            {{ $assignedDelivere->statusi_razmestit_otslezhivanie_gryza }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignedDelivere.fields.n_postavki') }}
                        </th>
                        <td>
                            {{ $assignedDelivere->n_postavki }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignedDelivere.fields.id_postavki') }}
                        </th>
                        <td>
                            {{ $assignedDelivere->id_postavki }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignedDelivere.fields.n_perevozki') }}
                        </th>
                        <td>
                            {{ $assignedDelivere->n_perevozki }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignedDelivere.fields.data_naznacheniya_yroven_perevozki') }}
                        </th>
                        <td>
                            {{ $assignedDelivere->data_naznacheniya_yroven_perevozki }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignedDelivere.fields.gryzootpravitel') }}
                        </th>
                        <td>
                            {{ $assignedDelivere->gryzootpravitel }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignedDelivere.fields.eta') }}
                        </th>
                        <td>
                            {{ $assignedDelivere->eta }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignedDelivere.fields.statys_eta') }}
                        </th>
                        <td>
                            {{ $assignedDelivere->statys_eta }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignedDelivere.fields.raznitsa_s_eta') }}
                        </th>
                        <td>
                            {{ $assignedDelivere->raznitsa_s_eta }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignedDelivere.fields.eta_tip') }}
                        </th>
                        <td>
                            {{ $assignedDelivere->eta_tip }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignedDelivere.fields.nazvanie_kompanii_mesto_zagryzki') }}
                        </th>
                        <td>
                            {{ $assignedDelivere->nazvanie_kompanii_mesto_zagryzki }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignedDelivere.fields.dopolnitelnie_dannie_adresa_mesto_zagryzki') }}
                        </th>
                        <td>
                            {{ $assignedDelivere->dopolnitelnie_dannie_adresa_mesto_zagryzki }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignedDelivere.fields.ylitsa_i_nom_doma_mesto_zagryzki') }}
                        </th>
                        <td>
                            {{ $assignedDelivere->ylitsa_i_nom_doma_mesto_zagryzki }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignedDelivere.fields.pochtoviy_indeks_mesto_zagryzki') }}
                        </th>
                        <td>
                            {{ $assignedDelivere->pochtoviy_indeks_mesto_zagryzki }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignedDelivere.fields.gorod_mesto_zagryzki') }}
                        </th>
                        <td>
                            {{ $assignedDelivere->gorod_mesto_zagryzki }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignedDelivere.fields.region_mesto_zagryzki') }}
                        </th>
                        <td>
                            {{ $assignedDelivere->region_mesto_zagryzki }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignedDelivere.fields.strana_mesto_zagryzki') }}
                        </th>
                        <td>
                            {{ $assignedDelivere->strana_mesto_zagryzki }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignedDelivere.fields.nomer_telefona_dlya_avizo_mesto_zagryzki') }}
                        </th>
                        <td>
                            {{ $assignedDelivere->nomer_telefona_dlya_avizo_mesto_zagryzki }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignedDelivere.fields.kommentariy_mesto_zagryzki') }}
                        </th>
                        <td>
                            {{ $assignedDelivere->kommentariy_mesto_zagryzki }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignedDelivere.fields.data_zagryzki_ot') }}
                        </th>
                        <td>
                            {{ $assignedDelivere->data_zagryzki_ot }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignedDelivere.fields.data_zagryzki_do') }}
                        </th>
                        <td>
                            {{ $assignedDelivere->data_zagryzki_do }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignedDelivere.fields.nazvanie_kompanii_mesto_razgryzki') }}
                        </th>
                        <td>
                            {{ $assignedDelivere->nazvanie_kompanii_mesto_razgryzki }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignedDelivere.fields.dopolnitelnie_dannie_adesa_mesto_razgryzki') }}
                        </th>
                        <td>
                            {{ $assignedDelivere->dopolnitelnie_dannie_adesa_mesto_razgryzki }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignedDelivere.fields.ylitsa_i_nom_doma_mesto_razgryzki') }}
                        </th>
                        <td>
                            {{ $assignedDelivere->ylitsa_i_nom_doma_mesto_razgryzki }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignedDelivere.fields.pochtoviy_indeks_mesto_razgryzki') }}
                        </th>
                        <td>
                            {{ $assignedDelivere->pochtoviy_indeks_mesto_razgryzki }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignedDelivere.fields.gorod_mesto_razgryzki') }}
                        </th>
                        <td>
                            {{ $assignedDelivere->gorod_mesto_razgryzki }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignedDelivere.fields.region_mesto_razgryzki') }}
                        </th>
                        <td>
                            {{ $assignedDelivere->region_mesto_razgryzki }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignedDelivere.fields.nomer_telefona_dlya_avizo_mesto_razgryzki') }}
                        </th>
                        <td>
                            {{ $assignedDelivere->nomer_telefona_dlya_avizo_mesto_razgryzki }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignedDelivere.fields.kommentariy_mesto_razgryzki') }}
                        </th>
                        <td>
                            {{ $assignedDelivere->kommentariy_mesto_razgryzki }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignedDelivere.fields.data_razgryzki_ot') }}
                        </th>
                        <td>
                            {{ $assignedDelivere->data_razgryzki_ot }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignedDelivere.fields.data_razgryzki_do') }}
                        </th>
                        <td>
                            {{ $assignedDelivere->data_razgryzki_do }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignedDelivere.fields.inkotermsi') }}
                        </th>
                        <td>
                            {{ $assignedDelivere->inkotermsi }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignedDelivere.fields.inkoterms_gorod') }}
                        </th>
                        <td>
                            {{ $assignedDelivere->inkoterms_gorod }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignedDelivere.fields.ves') }}
                        </th>
                        <td>
                            {{ $assignedDelivere->ves }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignedDelivere.fields.obem') }}
                        </th>
                        <td>
                            {{ $assignedDelivere->obem }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignedDelivere.fields.edinitsa_vesa') }}
                        </th>
                        <td>
                            {{ $assignedDelivere->edinitsa_vesa }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignedDelivere.fields.edinitsa_obema') }}
                        </th>
                        <td>
                            {{ $assignedDelivere->edinitsa_obema }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignedDelivere.fields.dlina') }}
                        </th>
                        <td>
                            {{ $assignedDelivere->dlina }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignedDelivere.fields.edinitsa_dlini') }}
                        </th>
                        <td>
                            {{ $assignedDelivere->edinitsa_dlini }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignedDelivere.fields.pozichii') }}
                        </th>
                        <td>
                            {{ $assignedDelivere->pozichii }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignedDelivere.fields.transportnoe_sredstvo_trebovanie') }}
                        </th>
                        <td>
                            {{ $assignedDelivere->transportnoe_sredstvo_trebovanie }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignedDelivere.fields.registratsionniy_n') }}
                        </th>
                        <td>
                            {{ $assignedDelivere->registratsionniy_n }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignedDelivere.fields.transportnie_edinitsi') }}
                        </th>
                        <td>
                            {{ $assignedDelivere->transportnie_edinitsi }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignedDelivere.fields.transpostnaya_edinitsa') }}
                        </th>
                        <td>
                            {{ $assignedDelivere->transpostnaya_edinitsa }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignedDelivere.fields.klass_opasnih_gryzov_opasnie_gryzi_n') }}
                        </th>
                        <td>
                            {{ $assignedDelivere->klass_opasnih_gryzov_opasnie_gryzi_n }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignedDelivere.fields.kommentariy_k_postavke') }}
                        </th>
                        <td>
                            {{ $assignedDelivere->kommentariy_k_postavke }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignedDelivere.fields.statys_yroven_postavki_otslezhivanie_gryza') }}
                        </th>
                        <td>
                            {{ $assignedDelivere->statys_yroven_postavki_otslezhivanie_gryza }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignedDelivere.fields.statys_statys_data_yroven_postavki_otslezhivanie_gryza') }}
                        </th>
                        <td>
                            {{ $assignedDelivere->statys_statys_data_yroven_postavki_otslezhivanie_gryza }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignedDelivere.fields.statys_kem_razmescheno_yroven_postavki_otslezhivanie_gryza') }}
                        </th>
                        <td>
                            {{ $assignedDelivere->statys_kem_razmescheno_yroven_postavki_otslezhivanie_gryza }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignedDelivere.fields.statys_kommentariy_yroven_postavki_otslezhivanie_gryza') }}
                        </th>
                        <td>
                            {{ $assignedDelivere->statys_kommentariy_yroven_postavki_otslezhivanie_gryza }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignedDelivere.fields.vlozheniya') }}
                        </th>
                        <td>
                            {{ $assignedDelivere->vlozheniya }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignedDelivere.fields.poslednie_izmeneniya') }}
                        </th>
                        <td>
                            {{ $assignedDelivere->poslednie_izmeneniya }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignedDelivere.fields.transporeon_id_yroven_perevozki') }}
                        </th>
                        <td>
                            {{ $assignedDelivere->transporeon_id_yroven_perevozki }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.assigned-deliveres.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection