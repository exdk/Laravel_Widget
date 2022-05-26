<?php

namespace App\Http\Requests;

use App\Models\Catware;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCatwareRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('catware_create');
    }

    public function rules()
    {
        return [
            'category' => [
                'string',
                'nullable',
            ],
            'dep' => [
                'string',
                'nullable',
            ],
        ];
    }
}
