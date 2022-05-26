<?php

namespace App\Http\Requests;

use App\Models\Driver;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateDriverRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('driver_edit');
    }

    public function rules()
    {
        return [
            'fam' => [
                'string',
                'nullable',
            ],
            'name' => [
                'string',
                'nullable',
            ],
            'oth' => [
                'string',
                'nullable',
            ],
            'date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'birth_place' => [
                'string',
                'nullable',
            ],
            'pa_ty' => [
                'string',
                'nullable',
            ],
            'pa_nomer' => [
                'string',
                'nullable',
            ],
            'pachecked' => [
                'string',
                'nullable',
            ],
            'pa_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'pa_kod' => [
                'string',
                'nullable',
            ],
            'adr_pro' => [
                'string',
                'nullable',
            ],
            'pro_date' => [
                'string',
                'nullable',
            ],
            'pro_vr_adr' => [
                'string',
                'nullable',
            ],
            'pro_vr_date_ot' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'pro_vr_date_do' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'nomervu' => [
                'string',
                'nullable',
            ],
            'vuchecked' => [
                'string',
                'nullable',
            ],
            'datevu' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'byvu' => [
                'string',
                'nullable',
            ],
            'vu_gorod' => [
                'string',
                'nullable',
            ],
            'taho' => [
                'string',
                'nullable',
            ],
            'inn' => [
                'string',
                'nullable',
            ],
            'pfr' => [
                'string',
                'nullable',
            ],
            'mobile_a' => [
                'string',
                'nullable',
            ],
            'mobile_b' => [
                'string',
                'nullable',
            ],
            'medb_nomer' => [
                'string',
                'nullable',
            ],
            'medb_typ' => [
                'string',
                'nullable',
            ],
            'medb_date_ot' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'medb_perv' => [
                'array',
            ],
            'trud_nomer' => [
                'string',
                'nullable',
            ],
            'trud_date_ot' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'trud_dol' => [
                'string',
                'nullable',
            ],
        ];
    }
}
