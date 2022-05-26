<?php

namespace App\Http\Requests;

use App\Models\Naznaotm;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreNaznaotmRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('naznaotm_create');
    }

    public function rules()
    {
        return [
            'datefpogr' => [
                'string',
                'nullable',
            ],
            'dateunload' => [
                'string',
                'nullable',
            ],
        ];
    }
}
