<?php

namespace App\Http\Requests;

use App\Models\Titilegruz;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreTitilegruzRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('titilegruz_create');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'nullable',
            ],
        ];
    }
}
