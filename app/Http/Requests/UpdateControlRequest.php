<?php

namespace App\Http\Requests;

use App\Models\Control;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateControlRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('control_edit');
    }

    public function rules()
    {
        return [
            'i_dgruza' => [
                'string',
                'nullable',
            ],
            'load_reference_3' => [
                'string',
                'nullable',
            ],
            'voditeli' => [
                'string',
                'nullable',
            ],
            'statys_otobrazheniay' => [
                'string',
                'nullable',
            ],
            'data_i_vremay_nachala' => [
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'nullable',
            ],
            'adres_otpravleniya' => [
                'string',
                'nullable',
            ],
            'adres_mesta_naznacheniay' => [
                'string',
                'nullable',
            ],
            'poslednee_sobitie' => [
                'string',
                'nullable',
            ],
            'nazvanie_pynkta_naznacheniay' => [
                'string',
                'nullable',
            ],
            'tip_oborydovaniay_treiler' => [
                'string',
                'nullable',
            ],
            'nomer_tyagacha' => [
                'string',
                'nullable',
            ],
            'data_vremya_zaversheniya' => [
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'nullable',
            ],
            'identifikator_reisa' => [
                'string',
                'nullable',
            ],
            'kolichestvo_edinich' => [
                'string',
                'nullable',
            ],
            'kolichestvo_osnovnih_ostanovok' => [
                'string',
                'nullable',
            ],
            'ves_kg' => [
                'string',
                'nullable',
            ],
            'kontaktnoe_lico' => [
                'string',
                'nullable',
            ],
            'nomer_zakaza_postavshika_sirya_i_mat' => [
                'string',
                'nullable',
            ],
            'nomer_posledovatelnosti_reisov' => [
                'string',
                'nullable',
            ],
            'klient' => [
                'string',
                'nullable',
            ],
            'nomer_treilera' => [
                'string',
                'nullable',
            ],
            'obem_cu_m' => [
                'string',
                'nullable',
            ],
            'ostanovki_v_tranzite' => [
                'string',
                'nullable',
            ],
            'poddoni_dlya_perevozki_gryzov' => [
                'string',
                'nullable',
            ],
            'primechanie' => [
                'string',
                'nullable',
            ],
            'rassoyanie_km' => [
                'string',
                'nullable',
            ],
            'imya_klienta' => [
                'string',
                'nullable',
            ],
            'gorod_otpravleniya' => [
                'string',
                'nullable',
            ],
            'gorod_naznacheniya' => [
                'string',
                'nullable',
            ],
            'identifikator_bronirovaniya' => [
                'string',
                'nullable',
            ],
            'opisanie_tipa_transporta_treiler' => [
                'string',
                'nullable',
            ],
            'stoimost_zakaza_rub' => [
                'string',
                'nullable',
            ],
            'nomer_otslezhivaniya_gryza' => [
                'string',
                'nullable',
            ],
            'phakticheskaya_data_nachala_pogryzki' => [
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'nullable',
            ],
            'load_reference_1' => [
                'string',
                'nullable',
            ],
            'identifikator_pynkta_otpravleniya' => [
                'string',
                'nullable',
            ],
            'identifikator_pynkta_naznacheniya' => [
                'string',
                'nullable',
            ],
            'tovar' => [
                'string',
                'nullable',
            ],
            'registracionnii_kod_18' => [
                'string',
                'nullable',
            ],
            'auction' => [
                'string',
                'nullable',
            ],
            'load_reference_2' => [
                'string',
                'nullable',
            ],
            'pod_load_group' => [
                'string',
                'nullable',
            ],
            'pod_status' => [
                'string',
                'nullable',
            ],
            'sap_shipment_document_number' => [
                'string',
                'nullable',
            ],
            'adres_mesta_otpravleniya_sydna' => [
                'string',
                'nullable',
            ],
            'adres_mesta_pribitiya_sydna' => [
                'string',
                'nullable',
            ],
            'adres_svyazannogo_mesta_otpravleniya' => [
                'string',
                'nullable',
            ],
            'vklychit_v_cislo_ispolzovanii_resyrsa' => [
                'string',
                'nullable',
            ],
            'vladelec_treilera' => [
                'string',
                'nullable',
            ],
            'vladelec_tyagacha' => [
                'string',
                'nullable',
            ],
            'vnytrennii_n_zakaza_perevozchika' => [
                'string',
                'nullable',
            ],
            'vigryzka_bez_voditelya' => [
                'string',
                'nullable',
            ],
            'data_i_vremya_obnovleniya' => [
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'nullable',
            ],
            'data_i_vremya_sozdaniya' => [
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'nullable',
            ],
            'data_vremya_konteinernogo_sklada' => [
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'nullable',
            ],
            'datetimestartship' => [
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'nullable',
            ],
            'datetimearriveship' => [
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'nullable',
            ],
            'data_vremya_ocenki' => [
                'string',
                'nullable',
            ],
            'deklarirovannaya_stoimost' => [
                'string',
                'nullable',
            ],
            'identifikator_mesta_otpravlenia_sydna' => [
                'string',
                'nullable',
            ],
            'identifikator_mesta_pribitiya_sydna' => [
                'string',
                'nullable',
            ],
            'identifikator_mesta_prpiski_treilera' => [
                'string',
                'nullable',
            ],
        ];
    }
}
