<?php

namespace App\Http\Requests;

use App\Models\PartnerBb;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePartnerBbRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('partner_bb_edit');
    }

    public function rules()
    {
        return [
            'typedogovor' => [
                'required',
            ],
            'dogovor_number' => [
                'string',
                'nullable',
            ],
            'dogovor_start' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'dogovor_end' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'description' => [
                'string',
                'nullable',
            ],
            'contactperson' => [
                'string',
                'nullable',
            ],
            'telefon' => [
                'string',
                'nullable',
            ],
        ];
    }
}
