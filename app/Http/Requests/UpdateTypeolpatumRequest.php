<?php

namespace App\Http\Requests;

use App\Models\Typeolpatum;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateTypeolpatumRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('typeolpatum_edit');
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
