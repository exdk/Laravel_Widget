<?php

namespace App\Http\Requests;

use App\Models\Typestatus;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreTypestatusRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('typestatus_create');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'nullable',
            ],
            'kor' => [
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
