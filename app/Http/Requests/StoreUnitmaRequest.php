<?php

namespace App\Http\Requests;

use App\Models\Unitma;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreUnitmaRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('unitma_create');
    }

    public function rules()
    {
        return [
            'titleru' => [
                'string',
                'nullable',
            ],
            'rubol' => [
                'string',
                'nullable',
            ],
            'megd' => [
                'string',
                'nullable',
            ],
            'megd_bol' => [
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
