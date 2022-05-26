<?php

namespace App\Http\Requests;

use App\Models\TypePalet;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateTypePaletRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('type_palet_edit');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'nullable',
            ],
            'weight' => [
                'string',
                'nullable',
            ],
            'long' => [
                'string',
                'nullable',
            ],
        ];
    }
}
