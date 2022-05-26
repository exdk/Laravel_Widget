<?php

namespace App\Http\Requests;

use App\Models\Typestatus;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateTypestatusRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('typestatus_edit');
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
            'di' => [
                'string',
                'nullable',
            ],
        ];
    }
}
