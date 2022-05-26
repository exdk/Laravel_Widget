<?php

namespace App\Http\Requests;

use App\Models\Typeloadunload;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateTypeloadunloadRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('typeloadunload_edit');
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
