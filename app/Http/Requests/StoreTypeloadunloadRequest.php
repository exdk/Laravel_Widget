<?php

namespace App\Http\Requests;

use App\Models\Typeloadunload;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreTypeloadunloadRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('typeloadunload_create');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'nullable',
            ],
            'de' => [
                'string',
                'nullable',
            ],
        ];
    }
}
