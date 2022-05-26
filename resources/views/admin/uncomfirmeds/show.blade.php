@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.uncomfirmed.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.uncomfirmeds.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.uncomfirmed.fields.id') }}
                        </th>
                        <td>
                            {{ $uncomfirmed->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.uncomfirmed.fields.transpareon') }}
                        </th>
                        <td>
                            {{ $uncomfirmed->transpareon }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.uncomfirmed.fields.kolonka') }}
                        </th>
                        <td>
                            {{ $uncomfirmed->kolonka }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.uncomfirmed.fields.transportnoe_sredstvo_trebovanie') }}
                        </th>
                        <td>
                            {{ $uncomfirmed->transportnoe_sredstvo_trebovanie }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.uncomfirmed.fields.ves') }}
                        </th>
                        <td>
                            {{ $uncomfirmed->ves }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.uncomfirmed.fields.obem') }}
                        </th>
                        <td>
                            {{ $uncomfirmed->obem }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.uncomfirmed.fields.dlina') }}
                        </th>
                        <td>
                            {{ $uncomfirmed->dlina }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.uncomfirmed.fields.pozicii') }}
                        </th>
                        <td>
                            {{ $uncomfirmed->pozicii }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.uncomfirmed.fields.strana_mesto_naznacheniya') }}
                        </th>
                        <td>
                            {{ $uncomfirmed->strana_mesto_naznacheniya }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.uncomfirmed.fields.vnutrenniy_kommentariy_k_perevozke') }}
                        </th>
                        <td>
                            {{ $uncomfirmed->vnutrenniy_kommentariy_k_perevozke }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.uncomfirmed.fields.id_gryppi_perevozok') }}
                        </th>
                        <td>
                            {{ $uncomfirmed->id_gryppi_perevozok }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.uncomfirmed.fields.dopolnitelnie_nomera_gryzootpravitelya') }}
                        </th>
                        <td>
                            {{ $uncomfirmed->dopolnitelnie_nomera_gryzootpravitelya }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.uncomfirmed.fields.dopolnitelniy_n_gryzootpravitelya_2') }}
                        </th>
                        <td>
                            {{ $uncomfirmed->dopolnitelniy_n_gryzootpravitelya_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.uncomfirmed.fields.pochtoviy_indeks_mesto_naznacheniya') }}
                        </th>
                        <td>
                            {{ $uncomfirmed->pochtoviy_indeks_mesto_naznacheniya }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.uncomfirmed.fields.dopolnitelniy_n_gryzootpravitelya_3') }}
                        </th>
                        <td>
                            {{ $uncomfirmed->dopolnitelniy_n_gryzootpravitelya_3 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.uncomfirmed.fields.kategorii') }}
                        </th>
                        <td>
                            {{ $uncomfirmed->kategorii }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.uncomfirmed.fields.dispetcher_gryzootpravitelya') }}
                        </th>
                        <td>
                            {{ $uncomfirmed->dispetcher_gryzootpravitelya }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.uncomfirmed.fields.pochtoviy_indeks_start') }}
                        </th>
                        <td>
                            {{ $uncomfirmed->pochtoviy_indeks_start }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.uncomfirmed.fields.region_start') }}
                        </th>
                        <td>
                            {{ $uncomfirmed->region_start }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.uncomfirmed.fields.strana_start') }}
                        </th>
                        <td>
                            {{ $uncomfirmed->strana_start }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.uncomfirmed.fields.kommentariy_start') }}
                        </th>
                        <td>
                            {{ $uncomfirmed->kommentariy_start }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.uncomfirmed.fields.otdel_planirovaniya') }}
                        </th>
                        <td>
                            {{ $uncomfirmed->otdel_planirovaniya }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.uncomfirmed.fields.period_zagryzki') }}
                        </th>
                        <td>
                            {{ $uncomfirmed->period_zagryzki }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.uncomfirmed.fields.period_razgryzki') }}
                        </th>
                        <td>
                            {{ $uncomfirmed->period_razgryzki }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.uncomfirmed.fields.start') }}
                        </th>
                        <td>
                            {{ $uncomfirmed->start }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.uncomfirmed.fields.mesto_naznacheniya') }}
                        </th>
                        <td>
                            {{ $uncomfirmed->mesto_naznacheniya }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.uncomfirmed.fields.krainiy_srok') }}
                        </th>
                        <td>
                            {{ $uncomfirmed->krainiy_srok }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.uncomfirmed.fields.rassoyanie') }}
                        </th>
                        <td>
                            {{ $uncomfirmed->rassoyanie }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.uncomfirmed.fields.sostoyanie_chteniya') }}
                        </th>
                        <td>
                            {{ $uncomfirmed->sostoyanie_chteniya }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.uncomfirmed.fields.sostoyanie_pechati') }}
                        </th>
                        <td>
                            {{ $uncomfirmed->sostoyanie_pechati }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.uncomfirmed.fields.transporeonid') }}
                        </th>
                        <td>
                            {{ $uncomfirmed->transporeonid }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.uncomfirmed.fields.gryzootpravitel') }}
                        </th>
                        <td>
                            {{ $uncomfirmed->gryzootpravitel }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.uncomfirmed.fields.postavki') }}
                        </th>
                        <td>
                            {{ $uncomfirmed->postavki }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.uncomfirmed.fields.data_pogryzki') }}
                        </th>
                        <td>
                            {{ $uncomfirmed->data_pogryzki }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.uncomfirmed.fields.data_razgryzki') }}
                        </th>
                        <td>
                            {{ $uncomfirmed->data_razgryzki }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.uncomfirmed.fields.poslednie_izmeneniya') }}
                        </th>
                        <td>
                            {{ $uncomfirmed->poslednie_izmeneniya }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.uncomfirmed.fields.opredelennie_mesta_zagryzki') }}
                        </th>
                        <td>
                            {{ $uncomfirmed->opredelennie_mesta_zagryzki }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.uncomfirmed.fields.nazvanie_kompanii_start') }}
                        </th>
                        <td>
                            {{ $uncomfirmed->nazvanie_kompanii_start }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.uncomfirmed.fields.gorod_start') }}
                        </th>
                        <td>
                            {{ $uncomfirmed->gorod_start }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.uncomfirmed.fields.opredelennie_mesta_razgryzki') }}
                        </th>
                        <td>
                            {{ $uncomfirmed->opredelennie_mesta_razgryzki }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.uncomfirmed.fields.nazvanie_kompanii_mesto_naznacheniya') }}
                        </th>
                        <td>
                            {{ $uncomfirmed->nazvanie_kompanii_mesto_naznacheniya }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.uncomfirmed.fields.gorod_mesto_naznacheniya') }}
                        </th>
                        <td>
                            {{ $uncomfirmed->gorod_mesto_naznacheniya }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.uncomfirmed.fields.spravochnaya_cena_perevozki') }}
                        </th>
                        <td>
                            {{ $uncomfirmed->spravochnaya_cena_perevozki }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.uncomfirmed.fields.region_mesto_naznacheniya') }}
                        </th>
                        <td>
                            {{ $uncomfirmed->region_mesto_naznacheniya }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.uncomfirmed.fields.kommentariy_mesto_naznacheniya') }}
                        </th>
                        <td>
                            {{ $uncomfirmed->kommentariy_mesto_naznacheniya }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.uncomfirmeds.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection