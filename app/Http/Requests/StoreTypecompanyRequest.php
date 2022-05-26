<?php

namespace App\Http\Requests;

use App\Models\Typecompany;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreTypecompanyRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('typecompany_create');
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
