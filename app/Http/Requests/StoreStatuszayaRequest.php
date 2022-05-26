<?php

namespace App\Http\Requests;

use App\Models\Statuszaya;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreStatuszayaRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('statuszaya_create');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'nullable',
            ],
            'kor' => [
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
