<?php

namespace App\Http\Requests;

use App\Models\Naznapere;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateNaznapereRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('naznapere_edit');
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
