<?php

namespace App\Http\Requests;

use App\Models\Trebovan;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreTrebovanRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('trebovan_create');
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
