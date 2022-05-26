<?php

namespace App\Http\Requests;

use App\Models\Custom;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCustomRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('custom_create');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'nullable',
            ],
            'number' => [
                'string',
                'nullable',
            ],
            'address' => [
                'string',
                'nullable',
            ],
            'types.*' => [
                'integer',
            ],
            'types' => [
                'array',
            ],
        ];
    }
}
