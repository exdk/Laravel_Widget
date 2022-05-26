<?php

namespace App\Http\Requests;

use App\Models\Adr;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateAdrRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('adr_edit');
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
