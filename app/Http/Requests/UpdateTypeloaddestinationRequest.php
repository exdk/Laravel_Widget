<?php

namespace App\Http\Requests;

use App\Models\Typeloaddestination;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateTypeloaddestinationRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('typeloaddestination_edit');
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
