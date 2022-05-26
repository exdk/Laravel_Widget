<?php

namespace App\Http\Requests;

use App\Models\Titilegruz;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateTitilegruzRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('titilegruz_edit');
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
