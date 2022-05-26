<?php

namespace App\Http\Requests;

use App\Models\Typedolgnosti;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreTypedolgnostiRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('typedolgnosti_create');
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
            'roles.*' => [
                'integer',
            ],
            'roles' => [
                'array',
            ],
        ];
    }
}
