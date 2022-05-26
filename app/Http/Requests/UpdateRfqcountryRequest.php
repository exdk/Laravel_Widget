<?php

namespace App\Http\Requests;

use App\Models\Rfqcountry;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateRfqcountryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('rfqcountry_edit');
    }

    public function rules()
    {
        return [
            'lead_time' => [
                'string',
                'nullable',
            ],
            'otif' => [
                'string',
                'nullable',
            ],
            'pack_weight' => [
                'string',
                'nullable',
            ],
            'qty' => [
                'string',
                'nullable',
            ],
            'qty_auto' => [
                'string',
                'nullable',
            ],
            'additional' => [
                'string',
                'nullable',
            ],
            'target' => [
                'string',
                'nullable',
            ],
            'price' => [
                'string',
                'nullable',
            ],
            'garant' => [
                'string',
                'nullable',
            ],
            'comment' => [
                'string',
                'nullable',
            ],
        ];
    }
}
