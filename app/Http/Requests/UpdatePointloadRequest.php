<?php

namespace App\Http\Requests;

use App\Models\Pointload;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePointloadRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('pointload_edit');
    }

    public function rules()
    {
        return [
            'sapid' => [
                'string',
                'nullable',
            ],
            'title' => [
                'string',
                'required',
            ],
            'gorod' => [
                'string',
                'nullable',
            ],
            'zip' => [
                'string',
                'nullable',
            ],
            'region' => [
                'string',
                'nullable',
            ],
            'ulitca' => [
                'string',
                'nullable',
            ],
            'dom' => [
                'string',
                'nullable',
            ],
            'komment' => [
                'string',
                'nullable',
            ],
            'innfio' => [
                'string',
                'nullable',
            ],
            'fioload' => [
                'string',
                'nullable',
            ],
            'mobileload' => [
                'string',
                'nullable',
            ],
            'hemaproezda' => [
                'array',
            ],
            'pnot' => [
                'string',
                'nullable',
            ],
            'pndo' => [
                'string',
                'nullable',
            ],
            'pnbrot' => [
                'string',
                'nullable',
            ],
            'pnbrdo' => [
                'string',
                'nullable',
            ],
            'thot' => [
                'string',
                'nullable',
            ],
            'thdo' => [
                'string',
                'nullable',
            ],
            'thbrot' => [
                'string',
                'nullable',
            ],
            'thbrdo' => [
                'string',
                'nullable',
            ],
            'wedot' => [
                'string',
                'nullable',
            ],
            'weddo' => [
                'string',
                'nullable',
            ],
            'wedbrot' => [
                'string',
                'nullable',
            ],
            'wedbrto' => [
                'string',
                'nullable',
            ],
            'thuot' => [
                'string',
                'nullable',
            ],
            'thudo' => [
                'string',
                'nullable',
            ],
            'thubrot' => [
                'string',
                'nullable',
            ],
            'thubrdo' => [
                'string',
                'nullable',
            ],
            'friot' => [
                'string',
                'nullable',
            ],
            'frido' => [
                'string',
                'nullable',
            ],
            'fribrot' => [
                'string',
                'nullable',
            ],
            'fribrdo' => [
                'string',
                'nullable',
            ],
            'satot' => [
                'string',
                'nullable',
            ],
            'satdo' => [
                'string',
                'nullable',
            ],
            'satbrot' => [
                'string',
                'nullable',
            ],
            'satbrdo' => [
                'string',
                'nullable',
            ],
            'sunot' => [
                'string',
                'nullable',
            ],
            'sundo' => [
                'string',
                'nullable',
            ],
            'sunbrot' => [
                'string',
                'nullable',
            ],
            'sunbrdo' => [
                'string',
                'nullable',
            ],
            'lat' => [
                'string',
                'nullable',
            ],
            'long' => [
                'string',
                'nullable',
            ],
            'holidaylis.*' => [
                'integer',
            ],
            'holidaylis' => [
                'array',
            ],
        ];
    }
}
