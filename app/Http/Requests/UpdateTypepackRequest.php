<?php

namespace App\Http\Requests;

use App\Models\Typepack;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateTypepackRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('typepack_edit');
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
