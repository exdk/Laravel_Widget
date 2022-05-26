<?php

namespace App\Http\Requests;

use App\Models\Other;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreOtherRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('other_create');
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
