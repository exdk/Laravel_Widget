<?php

namespace App\Http\Requests;

use App\Models\Condtorg;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCondtorgRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('condtorg_edit');
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
