<?php

namespace App\Http\Requests;

use App\Models\Typeperevoz;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreTypeperevozRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('typeperevoz_create');
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
