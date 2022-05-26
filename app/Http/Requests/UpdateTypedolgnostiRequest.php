<?php

namespace App\Http\Requests;

use App\Models\Typedolgnosti;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateTypedolgnostiRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('typedolgnosti_edit');
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
            'roles.*' => [
                'integer',
            ],
            'roles' => [
                'array',
            ],
        ];
    }
}
