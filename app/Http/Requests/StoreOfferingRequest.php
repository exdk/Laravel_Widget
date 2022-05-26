<?php

namespace App\Http\Requests;

use App\Models\Offering;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreOfferingRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('offering_create');
    }

    public function rules()
    {
        return [
            'date_first_load' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'transporeonid' => [
                'string',
                'nullable',
            ],
            'neobhodimie_perevozki' => [
                'string',
                'nullable',
            ],
            'procent_kvoti_vipolneno' => [
                'string',
                'nullable',
            ],
            'poslednie_izmeneniya' => [
                'string',
                'nullable',
            ],
            'opredelennie_mesta_zagryzki' => [
                'string',
                'nullable',
            ],
            'poctoviy_indeks_start' => [
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
            'opredelennie_mesta_razgryzki' => [
                'string',
                'nullable',
            ],
            'poctoviy_indeks_mesto_naznaceniya' => [
                'string',
                'nullable',
            ],
            'strana_mesto_naznaceniya' => [
                'string',
                'nullable',
            ],
            'kommentariy_mesto_naznaceniya' => [
                'string',
                'nullable',
            ],
            'predlozheniya' => [
                'string',
                'nullable',
            ],
            'predlozhenie' => [
                'string',
                'nullable',
            ],
            'tip_predlozheniya' => [
                'string',
                'nullable',
            ],
            'deystvitelno_do' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'kommentarii_k_predlozheniyu' => [
                'string',
                'nullable',
            ],
            'transportnoe_sredstvo_trebovanie' => [
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
            'vnutrenniy_kommentariy_k_perevozke' => [
                'string',
                'nullable',
            ],
            'id_gryppi_perevozok' => [
                'string',
                'nullable',
            ],
            'dopolnitelnie_nomera_gryzootpravitelya' => [
                'string',
                'nullable',
            ],
            'sposob_naznaceniya' => [
                'string',
                'nullable',
            ],
            'dopolnitelniy_n_gryzootpravitelya_2' => [
                'string',
                'nullable',
            ],
            'dopolnitelniy_n_gryzootpravitelya_3' => [
                'string',
                'nullable',
            ],
            'rassoyanie' => [
                'string',
                'nullable',
            ],
            'otdel_planirovaniya' => [
                'string',
                'nullable',
            ],
            'period_zagruzki' => [
                'string',
                'nullable',
            ],
            'period_razgruzki' => [
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
            'mesto_naznaceniya' => [
                'string',
                'nullable',
            ],
            'sostoyanie_chteniya' => [
                'string',
                'nullable',
            ],
            'sostoyanie_pechati' => [
                'string',
                'nullable',
            ],
            'data_pogruzki' => [
                'string',
                'nullable',
            ],
            'data_razgryzki' => [
                'string',
                'nullable',
            ],
            'krainiy_srok' => [
                'string',
                'nullable',
            ],
            'gorod_start' => [
                'string',
                'nullable',
            ],
            'nazvanie_kompanii_mesto_naznaceniya' => [
                'string',
                'nullable',
            ],
            'spravochnaya_cena_perevozki' => [
                'string',
                'nullable',
            ],
            'distetcher_gryzootpravitelya' => [
                'string',
                'nullable',
            ],
            'kategorii' => [
                'string',
                'nullable',
            ],
            'region_mesto_naznacheniya' => [
                'string',
                'nullable',
            ],
            'dispetcher_perevozchika' => [
                'string',
                'nullable',
            ],
            'gryzootpravitel' => [
                'string',
                'nullable',
            ],
            'postavki' => [
                'string',
                'nullable',
            ],
            'naznachennie_perevozki' => [
                'string',
                'nullable',
            ],
        ];
    }
}
