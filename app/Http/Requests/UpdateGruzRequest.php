<?php

namespace App\Http\Requests;

use App\Models\Gruz;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateGruzRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('gruz_edit');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'nullable',
            ],
            'kor' => [
                'string',
                'nullable',
            ],
            'gruz' => [
                'string',
                'nullable',
            ],
            'di' => [
                'string',
                'nullable',
            ],
        ];
    }
}
