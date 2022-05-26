<?php

namespace App\Http\Requests;

use App\Models\Rfi;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateRfiRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('rfi_edit');
    }

    public function rules()
    {
        return [
            'typetrans.*' => [
                'integer',
            ],
            'typetrans' => [
                'array',
            ],
            'title' => [
                'string',
                'nullable',
            ],
            'finish' => [
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'nullable',
            ],
            'limited' => [
                'string',
                'nullable',
            ],
            'applications' => [
                'array',
            ],
        ];
    }
}
