<?php

namespace App\Http\Requests;

use App\Models\Condpay;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCondpayRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('condpay_edit');
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
