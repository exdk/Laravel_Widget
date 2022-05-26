<?php

namespace App\Http\Requests;

use App\Models\ZakazhikPerevoz;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateZakazhikPerevozRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('zakazhik_perevoz_edit');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'nullable',
            ],
            'inn' => [
                'string',
                'nullable',
            ],
            'telefon' => [
                'string',
                'nullable',
            ],
            'contactperson' => [
                'string',
                'nullable',
            ],
        ];
    }
}
