<?php

namespace App\Http\Requests;

use App\Models\Filialmain;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateFilialmainRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('filialmain_edit');
    }

    public function rules()
    {
        return [
            'inn' => [
                'string',
                'nullable',
            ],
            'title' => [
                'string',
                'nullable',
            ],
            'main' => [
                'string',
                'nullable',
            ],
        ];
    }
}
