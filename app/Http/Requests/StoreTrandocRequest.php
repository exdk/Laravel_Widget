<?php

namespace App\Http\Requests;

use App\Models\Trandoc;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreTrandocRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('trandoc_create');
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
