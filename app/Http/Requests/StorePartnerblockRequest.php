<?php

namespace App\Http\Requests;

use App\Models\Partnerblock;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePartnerblockRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('partnerblock_create');
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
