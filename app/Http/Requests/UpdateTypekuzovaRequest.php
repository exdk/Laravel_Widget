<?php

namespace App\Http\Requests;

use App\Models\Typekuzova;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateTypekuzovaRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('typekuzova_edit');
    }

    public function rules()
    {
        return [
            'typekuzova' => [
                'string',
                'nullable',
            ],
            'korot' => [
                'string',
                'nullable',
            ],
            'world' => [
                'string',
                'nullable',
            ],
        ];
    }
}
