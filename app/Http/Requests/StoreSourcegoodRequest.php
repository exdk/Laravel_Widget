<?php

namespace App\Http\Requests;

use App\Models\Sourcegood;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreSourcegoodRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('sourcegood_create');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'nullable',
            ],
            'de' => [
                'string',
                'nullable',
            ],
        ];
    }
}
