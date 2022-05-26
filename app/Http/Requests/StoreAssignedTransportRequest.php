<?php

namespace App\Http\Requests;

use App\Models\AssignedTransport;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreAssignedTransportRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('assigned_transport_create');
    }

    public function rules()
    {
        return [
            'first_date_loading' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'statys_vtoroe_bronirovanie' => [
                'string',
                'nullable',
            ],
            'tip_pogryzki_vtoroe_bronirovanie' => [
                'string',
                'nullable',
            ],
            'bronirovanie_zabronirovano' => [
                'string',
                'nullable',
            ],
            'status_yroven_perevozki' => [
                'string',
                'nullable',
            ],
            'statys_kem_razmeshcheno_yroven_perevozki' => [
                'string',
                'nullable',
            ],
            'status_yroven_postavki' => [
                'string',
                'nullable',
            ],
            'status_kem_razmeshcheno_yroven_postavki' => [
                'string',
                'nullable',
            ],
            'id_gryppi_perevozok' => [
                'string',
                'nullable',
            ],
            'tip' => [
                'string',
                'nullable',
            ],
            'dopolnitelnie_novera_gryzootpravitelya' => [
                'string',
                'nullable',
            ],
            'dopolnitelniy_n_gryzootpravitelay_2' => [
                'string',
                'nullable',
            ],
            'dopolnitelniy_n_gryzootpravitelya_3' => [
                'string',
                'nullable',
            ],
            'kolonka' => [
                'string',
                'nullable',
            ],
            'start' => [
                'string',
                'nullable',
            ],
            'mesto_naznacheniya' => [
                'string',
                'nullable',
            ],
            'transportnoe_sredstvo_trebovanie' => [
                'string',
                'nullable',
            ],
            'vibrosi_co_2' => [
                'string',
                'nullable',
            ],
            'ves' => [
                'string',
                'nullable',
            ],
            'obem' => [
                'string',
                'nullable',
            ],
            'dlina' => [
                'string',
                'nullable',
            ],
            'pozicii' => [
                'string',
                'nullable',
            ],
            'registracionniy_n' => [
                'string',
                'nullable',
            ],
            'vnytrenniy_kommentariy_k_perevozke' => [
                'string',
                'nullable',
            ],
            'statys' => [
                'string',
                'nullable',
            ],
            'pribitie' => [
                'string',
                'nullable',
            ],
            'otbitie' => [
                'string',
                'nullable',
            ],
            'tip_pogryzki' => [
                'string',
                'nullable',
            ],
            'statysi_razmestit_otslezhivanie_gryza' => [
                'string',
                'nullable',
            ],
            'nazvanie_kompanii_start' => [
                'string',
                'nullable',
            ],
            'gorod_start' => [
                'string',
                'nullable',
            ],
            'gorod_mesto_naznacheniya' => [
                'string',
                'nullable',
            ],
            'nazvanie_kompanii_mesto_naznacheniya' => [
                'string',
                'nullable',
            ],
            'spravochnaya_tsena_perevozki' => [
                'string',
                'nullable',
            ],
            'valyuta_ogovorennoy_tseni_perevozki' => [
                'string',
                'nullable',
            ],
            'n_perevozki' => [
                'string',
                'nullable',
            ],
            'transporeonid' => [
                'string',
                'nullable',
            ],
            'nomera_postavki' => [
                'string',
                'nullable',
            ],
            'id_postavki' => [
                'string',
                'nullable',
            ],
            'kategorii' => [
                'string',
                'nullable',
            ],
            'gryzootpravitel' => [
                'string',
                'nullable',
            ],
            'bronirovaniya_ne_zabronirovano_ypravlenie_vremennimi_oknami' => [
                'string',
                'nullable',
            ],
            'otdel_planirovaniya' => [
                'string',
                'nullable',
            ],
            'dispetcher_gryzootpravitelya' => [
                'string',
                'nullable',
            ],
            'dispetcher_perevozchika' => [
                'string',
                'nullable',
            ],
            'statys_eta' => [
                'string',
                'nullable',
            ],
            'eta_tip' => [
                'string',
                'nullable',
            ],
            'raznitsa_s_eta' => [
                'string',
                'nullable',
            ],
            'postavki' => [
                'string',
                'nullable',
            ],
            'vlozheniya' => [
                'string',
                'nullable',
            ],
            'data_pogryzki' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'period_zagryzki' => [
                'date_format:' . config('panel.time_format'),
                'nullable',
            ],
            'data_razgryzki' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'period_razgryzki' => [
                'date_format:' . config('panel.time_format'),
                'nullable',
            ],
            'poslednie_izmeneniya' => [
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'nullable',
            ],
            'krayniy_srok' => [
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'nullable',
            ],
            'otslezhivanie' => [
                'string',
                'nullable',
            ],
            'opredelennie_mesta_zagryzki' => [
                'string',
                'nullable',
            ],
            'pochtoviy_indeks_start' => [
                'string',
                'nullable',
            ],
            'region_start' => [
                'string',
                'nullable',
            ],
            'strana_start' => [
                'string',
                'nullable',
            ],
            'kommentariy_start' => [
                'string',
                'nullable',
            ],
            'dta_statysa_vtoroe_bronirovanie' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'statys_data_statysa_yroven_perevozki' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'data_statysa' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'opredelennie_mesta_razgryzki' => [
                'string',
                'nullable',
            ],
            'pochtoviy_indeks_mesto_naznacheniya' => [
                'string',
                'nullable',
            ],
            'region_mesto_naznacheniya' => [
                'string',
                'nullable',
            ],
            'zabronirovano_s_vtoroe_bronirovanie' => [
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'nullable',
            ],
            'data_naznacheniya' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'strana_mesto_naznacheniya' => [
                'string',
                'nullable',
            ],
            'pribitie_vtoroe_bronirovanie' => [
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'nullable',
            ],
            'zabronirovano_s' => [
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'nullable',
            ],
            'otbitie_vtoroe_bronirovanie' => [
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'nullable',
            ],
            'kommentariy_mesto_naznacheniya' => [
                'string',
                'nullable',
            ],
            'tip_predlozheniya' => [
                'string',
                'nullable',
            ],
            'predlozhenie' => [
                'string',
                'nullable',
            ],
        ];
    }
}
