<?php

namespace App\Http\Requests;

use App\Models\Dopeq;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreDopeqRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('dopeq_create');
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
