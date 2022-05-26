<?php

namespace App\Http\Requests;

use App\Models\Ltlftl;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateLtlftlRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('ltlftl_edit');
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
