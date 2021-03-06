<?php

namespace App\Http\Requests;

use App\Models\Transport;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreTransportRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('transport_create');
    }

    public function rules()
    {
        return [
            'type' => [
                'string',
                'nullable',
            ],
        ];
    }
}
