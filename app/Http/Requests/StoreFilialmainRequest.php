<?php

namespace App\Http\Requests;

use App\Models\Filialmain;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreFilialmainRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('filialmain_create');
    }

    public function rules()
    {
        return [
            'inn' => [
                'string',
                'nullable',
            ],
            'title' => [
                'string',
                'nullable',
            ],
            'main' => [
                'string',
                'nullable',
            ],
        ];
    }
}
