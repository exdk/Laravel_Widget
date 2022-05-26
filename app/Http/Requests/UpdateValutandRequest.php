<?php

namespace App\Http\Requests;

use App\Models\Valutand;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateValutandRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('valutand_edit');
    }

    public function rules()
    {
        return [
            'code' => [
                'string',
                'nullable',
            ],
            'code_2' => [
                'string',
                'nullable',
            ],
            'title' => [
                'string',
                'nullable',
            ],
            'unicode' => [
                'string',
                'nullable',
            ],
        ];
    }
}
