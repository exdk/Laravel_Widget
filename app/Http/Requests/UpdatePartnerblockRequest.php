<?php

namespace App\Http\Requests;

use App\Models\Partnerblock;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePartnerblockRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('partnerblock_edit');
    }

    public function rules()
    {
        return [
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
