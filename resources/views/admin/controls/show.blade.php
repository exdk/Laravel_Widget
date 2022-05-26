@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.control.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.controls.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.control.fields.id') }}
                        </th>
                        <td>
                            {{ $control->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.control.fields.i_dgruza') }}
                        </th>
                        <td>
                            {{ $control->i_dgruza }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.control.fields.load_reference_3') }}
                        </th>
                        <td>
                            {{ $control->load_reference_3 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.control.fields.voditeli') }}
                        </th>
                        <td>
                            {{ $control->voditeli }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.control.fields.statys_otobrazheniay') }}
                        </th>
                        <td>
                            {{ $control->statys_otobrazheniay }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.control.fields.data_i_vremay_nachala') }}
                        </th>
                        <td>
                            {{ $control->data_i_vremay_nachala }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.control.fields.adres_otpravleniya') }}
                        </th>
                        <td>
                            {{ $control->adres_otpravleniya }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.control.fields.adres_mesta_naznacheniay') }}
                        </th>
                        <td>
                            {{ $control->adres_mesta_naznacheniay }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.control.fields.poslednee_sobitie') }}
                        </th>
                        <td>
                            {{ $control->poslednee_sobitie }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.control.fields.nazvanie_pynkta_naznacheniay') }}
                        </th>
                        <td>
                            {{ $control->nazvanie_pynkta_naznacheniay }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.control.fields.tip_oborydovaniay_treiler') }}
                        </th>
                        <td>
                            {{ $control->tip_oborydovaniay_treiler }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.control.fields.nomer_tyagacha') }}
                        </th>
                        <td>
                            {{ $control->nomer_tyagacha }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.control.fields.data_vremya_zaversheniya') }}
                        </th>
                        <td>
                            {{ $control->data_vremya_zaversheniya }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.control.fields.identifikator_reisa') }}
                        </th>
                        <td>
                            {{ $control->identifikator_reisa }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.control.fields.kolichestvo_edinich') }}
                        </th>
                        <td>
                            {{ $control->kolichestvo_edinich }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.control.fields.kolichestvo_osnovnih_ostanovok') }}
                        </th>
                        <td>
                            {{ $control->kolichestvo_osnovnih_ostanovok }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.control.fields.ves_kg') }}
                        </th>
                        <td>
                            {{ $control->ves_kg }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.control.fields.kontaktnoe_lico') }}
                        </th>
                        <td>
                            {{ $control->kontaktnoe_lico }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.control.fields.nomer_zakaza_postavshika_sirya_i_mat') }}
                        </th>
                        <td>
                            {{ $control->nomer_zakaza_postavshika_sirya_i_mat }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.control.fields.nomer_posledovatelnosti_reisov') }}
                        </th>
                        <td>
                            {{ $control->nomer_posledovatelnosti_reisov }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.control.fields.klient') }}
                        </th>
                        <td>
                            {{ $control->klient }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.control.fields.nomer_treilera') }}
                        </th>
                        <td>
                            {{ $control->nomer_treilera }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.control.fields.obem_cu_m') }}
                        </th>
                        <td>
                            {{ $control->obem_cu_m }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.control.fields.ostanovki_v_tranzite') }}
                        </th>
                        <td>
                            {{ $control->ostanovki_v_tranzite }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.control.fields.poddoni_dlya_perevozki_gryzov') }}
                        </th>
                        <td>
                            {{ $control->poddoni_dlya_perevozki_gryzov }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.control.fields.primechanie') }}
                        </th>
                        <td>
                            {{ $control->primechanie }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.control.fields.rassoyanie_km') }}
                        </th>
                        <td>
                            {{ $control->rassoyanie_km }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.control.fields.imya_klienta') }}
                        </th>
                        <td>
                            {{ $control->imya_klienta }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.control.fields.gorod_otpravleniya') }}
                        </th>
                        <td>
                            {{ $control->gorod_otpravleniya }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.control.fields.gorod_naznacheniya') }}
                        </th>
                        <td>
                            {{ $control->gorod_naznacheniya }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.control.fields.identifikator_bronirovaniya') }}
                        </th>
                        <td>
                            {{ $control->identifikator_bronirovaniya }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.control.fields.opisanie_tipa_transporta_treiler') }}
                        </th>
                        <td>
                            {{ $control->opisanie_tipa_transporta_treiler }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.control.fields.stoimost_zakaza_rub') }}
                        </th>
                        <td>
                            {{ $control->stoimost_zakaza_rub }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.control.fields.nomer_otslezhivaniya_gryza') }}
                        </th>
                        <td>
                            {{ $control->nomer_otslezhivaniya_gryza }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.control.fields.phakticheskaya_data_nachala_pogryzki') }}
                        </th>
                        <td>
                            {{ $control->phakticheskaya_data_nachala_pogryzki }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.control.fields.load_reference_1') }}
                        </th>
                        <td>
                            {{ $control->load_reference_1 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.control.fields.identifikator_pynkta_otpravleniya') }}
                        </th>
                        <td>
                            {{ $control->identifikator_pynkta_otpravleniya }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.control.fields.identifikator_pynkta_naznacheniya') }}
                        </th>
                        <td>
                            {{ $control->identifikator_pynkta_naznacheniya }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.control.fields.tovar') }}
                        </th>
                        <td>
                            {{ $control->tovar }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.control.fields.registracionnii_kod_18') }}
                        </th>
                        <td>
                            {{ $control->registracionnii_kod_18 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.control.fields.auction') }}
                        </th>
                        <td>
                            {{ $control->auction }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.control.fields.load_reference_2') }}
                        </th>
                        <td>
                            {{ $control->load_reference_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.control.fields.pod_load_group') }}
                        </th>
                        <td>
                            {{ $control->pod_load_group }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.control.fields.pod_status') }}
                        </th>
                        <td>
                            {{ $control->pod_status }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.control.fields.sap_shipment_document_number') }}
                        </th>
                        <td>
                            {{ $control->sap_shipment_document_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.control.fields.adres_mesta_otpravleniya_sydna') }}
                        </th>
                        <td>
                            {{ $control->adres_mesta_otpravleniya_sydna }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.control.fields.adres_mesta_pribitiya_sydna') }}
                        </th>
                        <td>
                            {{ $control->adres_mesta_pribitiya_sydna }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.control.fields.adres_svyazannogo_mesta_otpravleniya') }}
                        </th>
                        <td>
                            {{ $control->adres_svyazannogo_mesta_otpravleniya }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.control.fields.vklychit_v_cislo_ispolzovanii_resyrsa') }}
                        </th>
                        <td>
                            {{ $control->vklychit_v_cislo_ispolzovanii_resyrsa }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.control.fields.vladelec_treilera') }}
                        </th>
                        <td>
                            {{ $control->vladelec_treilera }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.control.fields.vladelec_tyagacha') }}
                        </th>
                        <td>
                            {{ $control->vladelec_tyagacha }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.control.fields.vnytrennii_n_zakaza_perevozchika') }}
                        </th>
                        <td>
                            {{ $control->vnytrennii_n_zakaza_perevozchika }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.control.fields.vigryzka_bez_voditelya') }}
                        </th>
                        <td>
                            {{ $control->vigryzka_bez_voditelya }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.control.fields.data_i_vremya_obnovleniya') }}
                        </th>
                        <td>
                            {{ $control->data_i_vremya_obnovleniya }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.control.fields.data_i_vremya_sozdaniya') }}
                        </th>
                        <td>
                            {{ $control->data_i_vremya_sozdaniya }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.control.fields.data_vremya_konteinernogo_sklada') }}
                        </th>
                        <td>
                            {{ $control->data_vremya_konteinernogo_sklada }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.control.fields.datetimestartship') }}
                        </th>
                        <td>
                            {{ $control->datetimestartship }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.control.fields.datetimearriveship') }}
                        </th>
                        <td>
                            {{ $control->datetimearriveship }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.control.fields.data_vremya_ocenki') }}
                        </th>
                        <td>
                            {{ $control->data_vremya_ocenki }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.control.fields.deklarirovannaya_stoimost') }}
                        </th>
                        <td>
                            {{ $control->deklarirovannaya_stoimost }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.control.fields.identifikator_mesta_otpravlenia_sydna') }}
                        </th>
                        <td>
                            {{ $control->identifikator_mesta_otpravlenia_sydna }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.control.fields.identifikator_mesta_pribitiya_sydna') }}
                        </th>
                        <td>
                            {{ $control->identifikator_mesta_pribitiya_sydna }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.control.fields.identifikator_mesta_prpiski_treilera') }}
                        </th>
                        <td>
                            {{ $control->identifikator_mesta_prpiski_treilera }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.controls.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection