<?php

namespace App\Http\Requests;

use App\Models\Upravlenie;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreUpravlenieRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('upravlenie_create');
    }

    public function rules()
    {
        return [
            'mainauto_id' => [
                'required',
                'integer',
            ],
            'datestart' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'date_fin' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'timetart' => [
                'date_format:' . config('panel.time_format'),
                'nullable',
            ],
            'time_fin' => [
                'date_format:' . config('panel.time_format'),
                'nullable',
            ],
        ];
    }
}
