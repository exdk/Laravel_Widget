<?php

namespace App\Http\Requests;

use App\Models\Typeolpatum;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreTypeolpatumRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('typeolpatum_create');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'nullable',
            ],
        ];
    }
}
