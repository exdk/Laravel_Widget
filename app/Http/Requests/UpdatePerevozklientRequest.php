<?php

namespace App\Http\Requests;

use App\Models\Perevozklient;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePerevozklientRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('perevozklient_edit');
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
