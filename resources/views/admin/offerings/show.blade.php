@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.offering.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.offerings.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.offering.fields.id') }}
                        </th>
                        <td>
                            {{ $offering->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.offering.fields.date_first_load') }}
                        </th>
                        <td>
                            {{ $offering->date_first_load }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.offering.fields.transporeonid') }}
                        </th>
                        <td>
                            {{ $offering->transporeonid }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.offering.fields.neobhodimie_perevozki') }}
                        </th>
                        <td>
                            {{ $offering->neobhodimie_perevozki }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.offering.fields.procent_kvoti_vipolneno') }}
                        </th>
                        <td>
                            {{ $offering->procent_kvoti_vipolneno }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.offering.fields.poslednie_izmeneniya') }}
                        </th>
                        <td>
                            {{ $offering->poslednie_izmeneniya }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.offering.fields.opredelennie_mesta_zagryzki') }}
                        </th>
                        <td>
                            {{ $offering->opredelennie_mesta_zagryzki }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.offering.fields.poctoviy_indeks_start') }}
                        </th>
                        <td>
                            {{ $offering->poctoviy_indeks_start }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.offering.fields.region_start') }}
                        </th>
                        <td>
                            {{ $offering->region_start }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.offering.fields.strana_start') }}
                        </th>
                        <td>
                            {{ $offering->strana_start }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.offering.fields.kommentariy_start') }}
                        </th>
                        <td>
                            {{ $offering->kommentariy_start }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.offering.fields.opredelennie_mesta_razgryzki') }}
                        </th>
                        <td>
                            {{ $offering->opredelennie_mesta_razgryzki }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.offering.fields.poctoviy_indeks_mesto_naznaceniya') }}
                        </th>
                        <td>
                            {{ $offering->poctoviy_indeks_mesto_naznaceniya }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.offering.fields.strana_mesto_naznaceniya') }}
                        </th>
                        <td>
                            {{ $offering->strana_mesto_naznaceniya }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.offering.fields.kommentariy_mesto_naznaceniya') }}
                        </th>
                        <td>
                            {{ $offering->kommentariy_mesto_naznaceniya }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.offering.fields.predlozheniya') }}
                        </th>
                        <td>
                            {{ $offering->predlozheniya }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.offering.fields.predlozhenie') }}
                        </th>
                        <td>
                            {{ $offering->predlozhenie }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.offering.fields.tip_predlozheniya') }}
                        </th>
                        <td>
                            {{ $offering->tip_predlozheniya }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.offering.fields.deystvitelno_do') }}
                        </th>
                        <td>
                            {{ $offering->deystvitelno_do }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.offering.fields.kommentarii_k_predlozheniyu') }}
                        </th>
                        <td>
                            {{ $offering->kommentarii_k_predlozheniyu }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.offering.fields.transportnoe_sredstvo_trebovanie') }}
                        </th>
                        <td>
                            {{ $offering->transportnoe_sredstvo_trebovanie }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.offering.fields.ves') }}
                        </th>
                        <td>
                            {{ $offering->ves }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.offering.fields.obem') }}
                        </th>
                        <td>
                            {{ $offering->obem }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.offering.fields.dlina') }}
                        </th>
                        <td>
                            {{ $offering->dlina }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.offering.fields.pozicii') }}
                        </th>
                        <td>
                            {{ $offering->pozicii }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.offering.fields.vnutrenniy_kommentariy_k_perevozke') }}
                        </th>
                        <td>
                            {{ $offering->vnutrenniy_kommentariy_k_perevozke }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.offering.fields.id_gryppi_perevozok') }}
                        </th>
                        <td>
                            {{ $offering->id_gryppi_perevozok }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.offering.fields.dopolnitelnie_nomera_gryzootpravitelya') }}
                        </th>
                        <td>
                            {{ $offering->dopolnitelnie_nomera_gryzootpravitelya }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.offering.fields.sposob_naznaceniya') }}
                        </th>
                        <td>
                            {{ $offering->sposob_naznaceniya }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.offering.fields.dopolnitelniy_n_gryzootpravitelya_2') }}
                        </th>
                        <td>
                            {{ $offering->dopolnitelniy_n_gryzootpravitelya_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.offering.fields.dopolnitelniy_n_gryzootpravitelya_3') }}
                        </th>
                        <td>
                            {{ $offering->dopolnitelniy_n_gryzootpravitelya_3 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.offering.fields.rassoyanie') }}
                        </th>
                        <td>
                            {{ $offering->rassoyanie }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.offering.fields.otdel_planirovaniya') }}
                        </th>
                        <td>
                            {{ $offering->otdel_planirovaniya }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.offering.fields.period_zagruzki') }}
                        </th>
                        <td>
                            {{ $offering->period_zagruzki }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.offering.fields.period_razgruzki') }}
                        </th>
                        <td>
                            {{ $offering->period_razgruzki }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.offering.fields.kolonka') }}
                        </th>
                        <td>
                            {{ $offering->kolonka }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.offering.fields.start') }}
                        </th>
                        <td>
                            {{ $offering->start }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.offering.fields.mesto_naznaceniya') }}
                        </th>
                        <td>
                            {{ $offering->mesto_naznaceniya }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.offering.fields.sostoyanie_chteniya') }}
                        </th>
                        <td>
                            {{ $offering->sostoyanie_chteniya }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.offering.fields.sostoyanie_pechati') }}
                        </th>
                        <td>
                            {{ $offering->sostoyanie_pechati }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.offering.fields.data_pogruzki') }}
                        </th>
                        <td>
                            {{ $offering->data_pogruzki }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.offering.fields.data_razgryzki') }}
                        </th>
                        <td>
                            {{ $offering->data_razgryzki }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.offering.fields.krainiy_srok') }}
                        </th>
                        <td>
                            {{ $offering->krainiy_srok }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.offering.fields.gorod_start') }}
                        </th>
                        <td>
                            {{ $offering->gorod_start }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.offering.fields.nazvanie_kompanii_mesto_naznaceniya') }}
                        </th>
                        <td>
                            {{ $offering->nazvanie_kompanii_mesto_naznaceniya }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.offering.fields.spravochnaya_cena_perevozki') }}
                        </th>
                        <td>
                            {{ $offering->spravochnaya_cena_perevozki }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.offering.fields.distetcher_gryzootpravitelya') }}
                        </th>
                        <td>
                            {{ $offering->distetcher_gryzootpravitelya }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.offering.fields.kategorii') }}
                        </th>
                        <td>
                            {{ $offering->kategorii }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.offering.fields.region_mesto_naznacheniya') }}
                        </th>
                        <td>
                            {{ $offering->region_mesto_naznacheniya }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.offering.fields.dispetcher_perevozchika') }}
                        </th>
                        <td>
                            {{ $offering->dispetcher_perevozchika }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.offering.fields.gryzootpravitel') }}
                        </th>
                        <td>
                            {{ $offering->gryzootpravitel }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.offering.fields.postavki') }}
                        </th>
                        <td>
                            {{ $offering->postavki }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.offering.fields.naznachennie_perevozki') }}
                        </th>
                        <td>
                            {{ $offering->naznachennie_perevozki }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.offerings.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection