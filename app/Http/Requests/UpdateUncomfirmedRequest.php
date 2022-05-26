<?php

namespace App\Http\Requests;

use App\Models\Uncomfirmed;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateUncomfirmedRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('uncomfirmed_edit');
    }

    public function rules()
    {
        return [
            'transpareon' => [
                'string',
                'nullable',
            ],
            'kolonka' => [
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
            'strana_mesto_naznacheniya' => [
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
            'dopolnitelniy_n_gryzootpravitelya_2' => [
                'string',
                'nullable',
            ],
            'pochtoviy_indeks_mesto_naznacheniya' => [
                'string',
                'nullable',
            ],
            'dopolnitelniy_n_gryzootpravitelya_3' => [
                'string',
                'nullable',
            ],
            'kategorii' => [
                'string',
                'nullable',
            ],
            'dispetcher_gryzootpravitelya' => [
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
            'otdel_planirovaniya' => [
                'string',
                'nullable',
            ],
            'period_zagryzki' => [
                'string',
                'nullable',
            ],
            'period_razgryzki' => [
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
            'krainiy_srok' => [
                'string',
                'nullable',
            ],
            'rassoyanie' => [
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
            'transporeonid' => [
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
            'data_pogryzki' => [
                'string',
                'nullable',
            ],
            'data_razgryzki' => [
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
            'nazvanie_kompanii_start' => [
                'string',
                'nullable',
            ],
            'gorod_start' => [
                'string',
                'nullable',
            ],
            'opredelennie_mesta_razgryzki' => [
                'string',
                'nullable',
            ],
            'nazvanie_kompanii_mesto_naznacheniya' => [
                'string',
                'nullable',
            ],
            'gorod_mesto_naznacheniya' => [
                'string',
                'nullable',
            ],
            'spravochnaya_cena_perevozki' => [
                'string',
                'nullable',
            ],
            'region_mesto_naznacheniya' => [
                'string',
                'nullable',
            ],
            'kommentariy_mesto_naznacheniya' => [
                'string',
                'nullable',
            ],
        ];
    }
}
