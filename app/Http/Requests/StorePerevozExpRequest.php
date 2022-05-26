<?php

namespace App\Http\Requests;

use App\Models\PerevozExp;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePerevozExpRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('perevoz_exp_create');
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
