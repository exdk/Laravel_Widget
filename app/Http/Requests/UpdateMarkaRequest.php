<?php

namespace App\Http\Requests;

use App\Models\Marka;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateMarkaRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('marka_edit');
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
