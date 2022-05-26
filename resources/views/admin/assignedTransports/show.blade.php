@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.assignedTransport.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.assigned-transports.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.id') }}
                        </th>
                        <td>
                            {{ $assignedTransport->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.first_date_loading') }}
                        </th>
                        <td>
                            {{ $assignedTransport->first_date_loading }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.statys_vtoroe_bronirovanie') }}
                        </th>
                        <td>
                            {{ $assignedTransport->statys_vtoroe_bronirovanie }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.tip_pogryzki_vtoroe_bronirovanie') }}
                        </th>
                        <td>
                            {{ $assignedTransport->tip_pogryzki_vtoroe_bronirovanie }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.bronirovanie_zabronirovano') }}
                        </th>
                        <td>
                            {{ $assignedTransport->bronirovanie_zabronirovano }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.status_yroven_perevozki') }}
                        </th>
                        <td>
                            {{ $assignedTransport->status_yroven_perevozki }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.statys_kem_razmeshcheno_yroven_perevozki') }}
                        </th>
                        <td>
                            {{ $assignedTransport->statys_kem_razmeshcheno_yroven_perevozki }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.status_yroven_postavki') }}
                        </th>
                        <td>
                            {{ $assignedTransport->status_yroven_postavki }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.status_kem_razmeshcheno_yroven_postavki') }}
                        </th>
                        <td>
                            {{ $assignedTransport->status_kem_razmeshcheno_yroven_postavki }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.id_gryppi_perevozok') }}
                        </th>
                        <td>
                            {{ $assignedTransport->id_gryppi_perevozok }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.tip') }}
                        </th>
                        <td>
                            {{ $assignedTransport->tip }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.dopolnitelnie_novera_gryzootpravitelya') }}
                        </th>
                        <td>
                            {{ $assignedTransport->dopolnitelnie_novera_gryzootpravitelya }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.dopolnitelniy_n_gryzootpravitelay_2') }}
                        </th>
                        <td>
                            {{ $assignedTransport->dopolnitelniy_n_gryzootpravitelay_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.dopolnitelniy_n_gryzootpravitelya_3') }}
                        </th>
                        <td>
                            {{ $assignedTransport->dopolnitelniy_n_gryzootpravitelya_3 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.kolonka') }}
                        </th>
                        <td>
                            {{ $assignedTransport->kolonka }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.start') }}
                        </th>
                        <td>
                            {{ $assignedTransport->start }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.mesto_naznacheniya') }}
                        </th>
                        <td>
                            {{ $assignedTransport->mesto_naznacheniya }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.transportnoe_sredstvo_trebovanie') }}
                        </th>
                        <td>
                            {{ $assignedTransport->transportnoe_sredstvo_trebovanie }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.vibrosi_co_2') }}
                        </th>
                        <td>
                            {{ $assignedTransport->vibrosi_co_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.ves') }}
                        </th>
                        <td>
                            {{ $assignedTransport->ves }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.obem') }}
                        </th>
                        <td>
                            {{ $assignedTransport->obem }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.dlina') }}
                        </th>
                        <td>
                            {{ $assignedTransport->dlina }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.pozicii') }}
                        </th>
                        <td>
                            {{ $assignedTransport->pozicii }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.registracionniy_n') }}
                        </th>
                        <td>
                            {{ $assignedTransport->registracionniy_n }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.vnytrenniy_kommentariy_k_perevozke') }}
                        </th>
                        <td>
                            {{ $assignedTransport->vnytrenniy_kommentariy_k_perevozke }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.statys') }}
                        </th>
                        <td>
                            {{ $assignedTransport->statys }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.pribitie') }}
                        </th>
                        <td>
                            {{ $assignedTransport->pribitie }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.otbitie') }}
                        </th>
                        <td>
                            {{ $assignedTransport->otbitie }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.tip_pogryzki') }}
                        </th>
                        <td>
                            {{ $assignedTransport->tip_pogryzki }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.statysi_razmestit_otslezhivanie_gryza') }}
                        </th>
                        <td>
                            {{ $assignedTransport->statysi_razmestit_otslezhivanie_gryza }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.nazvanie_kompanii_start') }}
                        </th>
                        <td>
                            {{ $assignedTransport->nazvanie_kompanii_start }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.gorod_start') }}
                        </th>
                        <td>
                            {{ $assignedTransport->gorod_start }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.gorod_mesto_naznacheniya') }}
                        </th>
                        <td>
                            {{ $assignedTransport->gorod_mesto_naznacheniya }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.nazvanie_kompanii_mesto_naznacheniya') }}
                        </th>
                        <td>
                            {{ $assignedTransport->nazvanie_kompanii_mesto_naznacheniya }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.spravochnaya_tsena_perevozki') }}
                        </th>
                        <td>
                            {{ $assignedTransport->spravochnaya_tsena_perevozki }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.valyuta_ogovorennoy_tseni_perevozki') }}
                        </th>
                        <td>
                            {{ $assignedTransport->valyuta_ogovorennoy_tseni_perevozki }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.n_perevozki') }}
                        </th>
                        <td>
                            {{ $assignedTransport->n_perevozki }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.transporeonid') }}
                        </th>
                        <td>
                            {{ $assignedTransport->transporeonid }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.nomera_postavki') }}
                        </th>
                        <td>
                            {{ $assignedTransport->nomera_postavki }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.id_postavki') }}
                        </th>
                        <td>
                            {{ $assignedTransport->id_postavki }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.kategorii') }}
                        </th>
                        <td>
                            {{ $assignedTransport->kategorii }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.gryzootpravitel') }}
                        </th>
                        <td>
                            {{ $assignedTransport->gryzootpravitel }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.bronirovaniya_ne_zabronirovano_ypravlenie_vremennimi_oknami') }}
                        </th>
                        <td>
                            {{ $assignedTransport->bronirovaniya_ne_zabronirovano_ypravlenie_vremennimi_oknami }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.otdel_planirovaniya') }}
                        </th>
                        <td>
                            {{ $assignedTransport->otdel_planirovaniya }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.dispetcher_gryzootpravitelya') }}
                        </th>
                        <td>
                            {{ $assignedTransport->dispetcher_gryzootpravitelya }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.dispetcher_perevozchika') }}
                        </th>
                        <td>
                            {{ $assignedTransport->dispetcher_perevozchika }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.statys_eta') }}
                        </th>
                        <td>
                            {{ $assignedTransport->statys_eta }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.eta_tip') }}
                        </th>
                        <td>
                            {{ $assignedTransport->eta_tip }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.raznitsa_s_eta') }}
                        </th>
                        <td>
                            {{ $assignedTransport->raznitsa_s_eta }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.postavki') }}
                        </th>
                        <td>
                            {{ $assignedTransport->postavki }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.vlozheniya') }}
                        </th>
                        <td>
                            {{ $assignedTransport->vlozheniya }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.data_pogryzki') }}
                        </th>
                        <td>
                            {{ $assignedTransport->data_pogryzki }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.period_zagryzki') }}
                        </th>
                        <td>
                            {{ $assignedTransport->period_zagryzki }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.data_razgryzki') }}
                        </th>
                        <td>
                            {{ $assignedTransport->data_razgryzki }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.period_razgryzki') }}
                        </th>
                        <td>
                            {{ $assignedTransport->period_razgryzki }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.poslednie_izmeneniya') }}
                        </th>
                        <td>
                            {{ $assignedTransport->poslednie_izmeneniya }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.krayniy_srok') }}
                        </th>
                        <td>
                            {{ $assignedTransport->krayniy_srok }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.otslezhivanie') }}
                        </th>
                        <td>
                            {{ $assignedTransport->otslezhivanie }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.opredelennie_mesta_zagryzki') }}
                        </th>
                        <td>
                            {{ $assignedTransport->opredelennie_mesta_zagryzki }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.pochtoviy_indeks_start') }}
                        </th>
                        <td>
                            {{ $assignedTransport->pochtoviy_indeks_start }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.region_start') }}
                        </th>
                        <td>
                            {{ $assignedTransport->region_start }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.strana_start') }}
                        </th>
                        <td>
                            {{ $assignedTransport->strana_start }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.kommentariy_start') }}
                        </th>
                        <td>
                            {{ $assignedTransport->kommentariy_start }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.dta_statysa_vtoroe_bronirovanie') }}
                        </th>
                        <td>
                            {{ $assignedTransport->dta_statysa_vtoroe_bronirovanie }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.statys_data_statysa_yroven_perevozki') }}
                        </th>
                        <td>
                            {{ $assignedTransport->statys_data_statysa_yroven_perevozki }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.data_statysa') }}
                        </th>
                        <td>
                            {{ $assignedTransport->data_statysa }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.opredelennie_mesta_razgryzki') }}
                        </th>
                        <td>
                            {{ $assignedTransport->opredelennie_mesta_razgryzki }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.pochtoviy_indeks_mesto_naznacheniya') }}
                        </th>
                        <td>
                            {{ $assignedTransport->pochtoviy_indeks_mesto_naznacheniya }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.region_mesto_naznacheniya') }}
                        </th>
                        <td>
                            {{ $assignedTransport->region_mesto_naznacheniya }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.zabronirovano_s_vtoroe_bronirovanie') }}
                        </th>
                        <td>
                            {{ $assignedTransport->zabronirovano_s_vtoroe_bronirovanie }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.data_naznacheniya') }}
                        </th>
                        <td>
                            {{ $assignedTransport->data_naznacheniya }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.strana_mesto_naznacheniya') }}
                        </th>
                        <td>
                            {{ $assignedTransport->strana_mesto_naznacheniya }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.pribitie_vtoroe_bronirovanie') }}
                        </th>
                        <td>
                            {{ $assignedTransport->pribitie_vtoroe_bronirovanie }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.zabronirovano_s') }}
                        </th>
                        <td>
                            {{ $assignedTransport->zabronirovano_s }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.otbitie_vtoroe_bronirovanie') }}
                        </th>
                        <td>
                            {{ $assignedTransport->otbitie_vtoroe_bronirovanie }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.kommentariy_mesto_naznacheniya') }}
                        </th>
                        <td>
                            {{ $assignedTransport->kommentariy_mesto_naznacheniya }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.tip_predlozheniya') }}
                        </th>
                        <td>
                            {{ $assignedTransport->tip_predlozheniya }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignedTransport.fields.predlozhenie') }}
                        </th>
                        <td>
                            {{ $assignedTransport->predlozhenie }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.assigned-transports.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection