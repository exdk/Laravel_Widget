<?php

namespace App\Http\Requests;

use App\Models\Typeloaddest;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateTypeloaddestRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('typeloaddest_edit');
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
