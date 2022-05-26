<?php

namespace App\Http\Requests;

use App\Models\Auto;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreAutoRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('auto_create');
    }

    public function rules()
    {
        return [
            'own_inn' => [
                'string',
                'nullable',
            ],
            'govnomer' => [
                'string',
                'nullable',
            ],
            'marka' => [
                'string',
                'nullable',
            ],
            'model' => [
                'string',
                'nullable',
            ],
            'vin' => [
                'string',
                'nullable',
            ],
            'category_tc' => [
                'string',
                'nullable',
            ],
            'year_ot' => [
                'string',
                'nullable',
            ],
            'color' => [
                'string',
                'nullable',
            ],
            'horse' => [
                'string',
                'nullable',
            ],
            'ecoclass' => [
                'string',
                'nullable',
            ],
            'pt_type' => [
                'string',
                'nullable',
            ],
            'pt_nomer' => [
                'string',
                'nullable',
            ],
            'max_nagruz' => [
                'string',
                'nullable',
            ],
            'beznagruz' => [
                'string',
                'nullable',
            ],
            'pt_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'registry' => [
                'string',
                'nullable',
            ],
            'bakov' => [
                'string',
                'nullable',
            ],
            'bakov_volume' => [
                'string',
                'nullable',
            ],
            'bakov_volume_2' => [
                'string',
                'nullable',
            ],
            'levelco_2' => [
                'string',
                'nullable',
            ],
            'vnutr_dlina' => [
                'string',
                'nullable',
            ],
            'vnutr_weight' => [
                'string',
                'nullable',
            ],
            'vnutr_height' => [
                'string',
                'nullable',
            ],
            'vnutr_kub' => [
                'string',
                'nullable',
            ],
            'holod' => [
                'string',
                'nullable',
            ],
            'temp_ot' => [
                'string',
                'nullable',
            ],
            'temp_do' => [
                'string',
                'nullable',
            ],
            'type_tahograf' => [
                'string',
                'nullable',
            ],
            'fuel' => [
                'string',
                'nullable',
            ],
            'typeloads.*' => [
                'integer',
            ],
            'typeloads' => [
                'array',
            ],
            'gidrolift' => [
                'string',
                'nullable',
            ],
            'adrs.*' => [
                'integer',
            ],
            'adrs' => [
                'array',
            ],
            'palet' => [
                'string',
                'nullable',
            ],
            'volume' => [
                'string',
                'nullable',
            ],
            'gruzopod' => [
                'string',
                'nullable',
            ],
            'operator_gps' => [
                'string',
                'nullable',
            ],
            'nomer_dat_gps' => [
                'string',
                'nullable',
            ],
            'nomer_mac' => [
                'string',
                'nullable',
            ],
            'ob_type' => [
                'string',
                'nullable',
            ],
            'op_nemer' => [
                'string',
                'nullable',
            ],
            'ob_date_ot' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'ka_type' => [
                'string',
                'nullable',
            ],
            'ka_nomer' => [
                'string',
                'nullable',
            ],
            'ka_date_ot' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
        ];
    }
}
