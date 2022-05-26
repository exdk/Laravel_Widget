<?php

namespace App\Http\Requests;

use App\Models\Rolecomp;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateRolecompRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('rolecomp_edit');
    }

    public function rules()
    {
        return [
            'titlerole' => [
                'string',
                'nullable',
            ],
        ];
    }
}
