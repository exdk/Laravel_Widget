<?php

namespace App\Http\Requests;

use App\Models\Other;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateOtherRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('other_edit');
    }

    public function rules()
    {
        return [
            'title' => [
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
