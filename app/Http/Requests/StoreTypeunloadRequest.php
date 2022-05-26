<?php

namespace App\Http\Requests;

use App\Models\Typeunload;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreTypeunloadRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('typeunload_create');
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
        ];
    }
}
