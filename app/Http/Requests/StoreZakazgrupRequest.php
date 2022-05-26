<?php

namespace App\Http\Requests;

use App\Models\Zakazgrup;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreZakazgrupRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('zakazgrup_create');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'nullable',
            ],
            'zakazperevozs.*' => [
                'integer',
            ],
            'zakazperevozs' => [
                'array',
            ],
        ];
    }
}
