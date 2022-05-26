<?php

namespace App\Http\Requests;

use App\Models\Nooffer;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateNoofferRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('nooffer_edit');
    }

    public function rules()
    {
        return [
            'datefpogr' => [
                'string',
                'nullable',
            ],
            'dateunload' => [
                'string',
                'nullable',
            ],
        ];
    }
}
