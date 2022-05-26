<?php

namespace App\Http\Requests;

use App\Models\Typepack;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreTypepackRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('typepack_create');
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
