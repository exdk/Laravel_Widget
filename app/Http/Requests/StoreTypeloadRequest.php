<?php

namespace App\Http\Requests;

use App\Models\Typeload;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreTypeloadRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('typeload_create');
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
