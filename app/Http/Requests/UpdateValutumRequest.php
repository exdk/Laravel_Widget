<?php

namespace App\Http\Requests;

use App\Models\Valutum;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateValutumRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('valutum_edit');
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
