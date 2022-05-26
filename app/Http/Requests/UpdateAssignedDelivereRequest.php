<?php

namespace App\Http\Requests;

use App\Models\AssignedDelivere;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateAssignedDelivereRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('assigned_delivere_edit');
    }

    public function rules()
    {
        return [
            'deliveryid' => [
                'string',
                'nullable',
            ],
            'statusi_razmestit_otslezhivanie_gryza' => [
                'string',
                'nullable',
            ],
            'n_postavki' => [
                'string',
                'nullable',
            ],
            'id_postavki' => [
                'string',
                'nullable',
            ],
            'n_perevozki' => [
                'string',
                'nullable',
            ],
            'data_naznacheniya_yroven_perevozki' => [
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'nullable',
            ],
            'gryzootpravitel' => [
                'string',
                'nullable',
            ],
            'eta' => [
                'string',
                'nullable',
            ],
            'statys_eta' => [
                'string',
                'nullable',
            ],
            'raznitsa_s_eta' => [
                'string',
                'nullable',
            ],
            'eta_tip' => [
                'string',
                'nullable',
            ],
            'nazvanie_kompanii_mesto_zagryzki' => [
                'string',
                'nullable',
            ],
            'dopolnitelnie_dannie_adresa_mesto_zagryzki' => [
                'string',
                'nullable',
            ],
            'ylitsa_i_nom_doma_mesto_zagryzki' => [
                'string',
                'nullable',
            ],
            'pochtoviy_indeks_mesto_zagryzki' => [
                'string',
                'nullable',
            ],
            'gorod_mesto_zagryzki' => [
                'string',
                'nullable',
            ],
            'region_mesto_zagryzki' => [
                'string',
                'nullable',
            ],
            'strana_mesto_zagryzki' => [
                'string',
                'nullable',
            ],
            'nomer_telefona_dlya_avizo_mesto_zagryzki' => [
                'string',
                'nullable',
            ],
            'kommentariy_mesto_zagryzki' => [
                'string',
                'nullable',
            ],
            'data_zagryzki_ot' => [
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'nullable',
            ],
            'data_zagryzki_do' => [
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'nullable',
            ],
            'nazvanie_kompanii_mesto_razgryzki' => [
                'string',
                'nullable',
            ],
            'dopolnitelnie_dannie_adesa_mesto_razgryzki' => [
                'string',
                'nullable',
            ],
            'ylitsa_i_nom_doma_mesto_razgryzki' => [
                'string',
                'nullable',
            ],
            'pochtoviy_indeks_mesto_razgryzki' => [
                'string',
                'nullable',
            ],
            'gorod_mesto_razgryzki' => [
                'string',
                'nullable',
            ],
            'region_mesto_razgryzki' => [
                'string',
                'nullable',
            ],
            'nomer_telefona_dlya_avizo_mesto_razgryzki' => [
                'string',
                'nullable',
            ],
            'kommentariy_mesto_razgryzki' => [
                'string',
                'nullable',
            ],
            'data_razgryzki_ot' => [
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'nullable',
            ],
            'data_razgryzki_do' => [
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'nullable',
            ],
            'inkotermsi' => [
                'string',
                'nullable',
            ],
            'inkoterms_gorod' => [
                'string',
                'nullable',
            ],
            'ves' => [
                'numeric',
            ],
            'obem' => [
                'numeric',
            ],
            'edinitsa_vesa' => [
                'string',
                'nullable',
            ],
            'edinitsa_obema' => [
                'string',
                'nullable',
            ],
            'dlina' => [
                'numeric',
            ],
            'edinitsa_dlini' => [
                'string',
                'nullable',
            ],
            'pozichii' => [
                'string',
                'nullable',
            ],
            'transportnoe_sredstvo_trebovanie' => [
                'string',
                'nullable',
            ],
            'registratsionniy_n' => [
                'string',
                'nullable',
            ],
            'transportnie_edinitsi' => [
                'string',
                'nullable',
            ],
            'transpostnaya_edinitsa' => [
                'string',
                'nullable',
            ],
            'klass_opasnih_gryzov_opasnie_gryzi_n' => [
                'string',
                'nullable',
            ],
            'kommentariy_k_postavke' => [
                'string',
                'nullable',
            ],
            'statys_yroven_postavki_otslezhivanie_gryza' => [
                'string',
                'nullable',
            ],
            'statys_statys_data_yroven_postavki_otslezhivanie_gryza' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'statys_kem_razmescheno_yroven_postavki_otslezhivanie_gryza' => [
                'string',
                'nullable',
            ],
            'statys_kommentariy_yroven_postavki_otslezhivanie_gryza' => [
                'string',
                'nullable',
            ],
            'vlozheniya' => [
                'string',
                'nullable',
            ],
            'poslednie_izmeneniya' => [
                'string',
                'nullable',
            ],
            'transporeon_id_yroven_perevozki' => [
                'string',
                'nullable',
            ],
        ];
    }
}
