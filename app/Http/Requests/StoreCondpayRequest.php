<?php

namespace App\Http\Requests;

use App\Models\Condpay;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCondpayRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('condpay_create');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'nullable',
            ],
            'di' => [
                'string',
                'nullable',
            ],
        ];
    }
}
