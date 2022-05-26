<?php

namespace App\Http\Requests;

use App\Models\Autotypload;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateAutotyploadRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('autotypload_edit');
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
