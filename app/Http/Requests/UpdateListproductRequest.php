<?php

namespace App\Http\Requests;

use App\Models\Listproduct;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateListproductRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('listproduct_edit');
    }

    public function rules()
    {
        return [
            'id_vnutr' => [
                'string',
                'nullable',
            ],
            'quantity' => [
                'string',
                'nullable',
            ],
            'type_pack' => [
                'string',
                'nullable',
            ],
            'unitcount' => [
                'string',
                'nullable',
            ],
            'tr_quan' => [
                'string',
                'nullable',
            ],
            'qua_pal' => [
                'string',
                'nullable',
            ],
            'total_quant' => [
                'string',
                'nullable',
            ],
            'total_weight' => [
                'string',
                'nullable',
            ],
            'total_sum' => [
                'string',
                'nullable',
            ],
        ];
    }
}
