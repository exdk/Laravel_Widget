<?php

namespace App\Http\Requests;

use App\Models\Lastevent;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreLasteventRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('lastevent_create');
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
            'user' => [
                'string',
                'nullable',
            ],
        ];
    }
}
