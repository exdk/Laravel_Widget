<?php

namespace App\Http\Requests;

use App\Models\Zakazchikklient;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreZakazchikklientRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('zakazchikklient_create');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'nullable',
            ],
            'inn' => [
                'string',
                'nullable',
            ],
            'telefon' => [
                'string',
                'nullable',
            ],
            'contactperson' => [
                'string',
                'nullable',
            ],
        ];
    }
}
