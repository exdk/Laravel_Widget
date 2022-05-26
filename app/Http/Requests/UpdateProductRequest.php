<?php

namespace App\Http\Requests;

use App\Models\Product;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateProductRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('product_edit');
    }

    public function rules()
    {
        return [
            'product_code' => [
                'string',
                'nullable',
            ],
            'nomer_pricelist' => [
                'string',
                'nullable',
            ],
            'articel' => [
                'string',
                'nullable',
            ],
            'title' => [
                'string',
                'nullable',
            ],
            'price' => [
                'string',
                'nullable',
            ],
            'unit_izm' => [
                'string',
                'nullable',
            ],
            'type_pack' => [
                'string',
                'nullable',
            ],
            'weight' => [
                'string',
                'nullable',
            ],
            'nomer_decalaration' => [
                'string',
                'nullable',
            ],
        ];
    }
}
