<?php

namespace App\Http\Requests;

use App\Models\Rfq;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreRfqRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('rfq_create');
    }

    public function rules()
    {
        return [
            'typetrs.*' => [
                'integer',
            ],
            'typetrs' => [
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
            'datestartdogovor' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'dateenddogovor' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'applications' => [
                'array',
            ],
        ];
    }
}
