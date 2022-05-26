<?php

namespace App\Http\Requests;

use App\Models\Autobirga;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateAutobirgaRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('autobirga_edit');
    }

    public function rules()
    {
        return [
            'typeloads.*' => [
                'integer',
            ],
            'typeloads' => [
                'array',
            ],
            'gruzoton' => [
                'numeric',
            ],
            'volume' => [
                'numeric',
            ],
            'length' => [
                'numeric',
            ],
            'width' => [
                'numeric',
            ],
            'height' => [
                'numeric',
            ],
            'lengthpri' => [
                'numeric',
            ],
            'widthpri' => [
                'numeric',
            ],
            'heightpri' => [
                'numeric',
            ],
            'adrs.*' => [
                'integer',
            ],
            'adrs' => [
                'array',
            ],
            'fromzip' => [
                'string',
                'nullable',
            ],
            'fromregion' => [
                'string',
                'nullable',
            ],
            'fromcity' => [
                'string',
                'nullable',
            ],
            'fromulitca' => [
                'string',
                'nullable',
            ],
            'fromdom' => [
                'string',
                'nullable',
            ],
            'fromlong' => [
                'string',
                'nullable',
            ],
            'fromlat' => [
                'string',
                'nullable',
            ],
            'fromrad' => [
                'string',
                'nullable',
            ],
            'tocou' => [
                'string',
                'nullable',
            ],
            'tozip' => [
                'string',
                'nullable',
            ],
            'toregion' => [
                'string',
                'nullable',
            ],
            'tocity' => [
                'string',
                'nullable',
            ],
            'toulitca' => [
                'string',
                'nullable',
            ],
            'todom' => [
                'string',
                'nullable',
            ],
            'tolong' => [
                'string',
                'nullable',
            ],
            'tolat' => [
                'string',
                'nullable',
            ],
            'torad' => [
                'string',
                'nullable',
            ],
            'dop_1_adr' => [
                'string',
                'nullable',
            ],
            'dop_1_rad' => [
                'string',
                'nullable',
            ],
            'dop_1_tot' => [
                'string',
                'nullable',
            ],
            'dop_2_adr' => [
                'string',
                'nullable',
            ],
            'dop_2_rad' => [
                'string',
                'nullable',
            ],
            'dop_2_tot' => [
                'string',
                'nullable',
            ],
            'dop_3_adr' => [
                'string',
                'nullable',
            ],
            'dop_3_rad' => [
                'string',
                'nullable',
            ],
            'dop_3_tot' => [
                'string',
                'nullable',
            ],
            'dop_4_adr' => [
                'string',
                'nullable',
            ],
            'dop_4_rad' => [
                'string',
                'nullable',
            ],
            'dop_4_tot' => [
                'string',
                'nullable',
            ],
            'dop_5_adr' => [
                'string',
                'nullable',
            ],
            'dop_5_rad' => [
                'string',
                'nullable',
            ],
            'dop_5_tot' => [
                'string',
                'nullable',
            ],
            'dop_6_adr' => [
                'string',
                'nullable',
            ],
            'dop_6_rad' => [
                'string',
                'nullable',
            ],
            'dop_6_tot' => [
                'string',
                'nullable',
            ],
            'dop_7_adr' => [
                'string',
                'nullable',
            ],
            'dop_7_rad' => [
                'string',
                'nullable',
            ],
            'dop_7_tot' => [
                'string',
                'nullable',
            ],
            'dop_8_adr' => [
                'string',
                'nullable',
            ],
            'dop_8_rad' => [
                'string',
                'nullable',
            ],
            'dop_8_tot' => [
                'string',
                'nullable',
            ],
            'dop_9_adr' => [
                'string',
                'nullable',
            ],
            'dop_9_rad' => [
                'string',
                'nullable',
            ],
            'dop_9_tot' => [
                'string',
                'nullable',
            ],
            'dop_10_adr' => [
                'string',
                'nullable',
            ],
            'dop_10_rad' => [
                'string',
                'nullable',
            ],
            'dop_10_tot' => [
                'string',
                'nullable',
            ],
            'dateload' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'dateloadplu' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'oplatanal' => [
                'string',
                'nullable',
            ],
            'oplatawithnds' => [
                'string',
                'nullable',
            ],
            'oplatanonds' => [
                'string',
                'nullable',
            ],
            'dopinfo' => [
                'string',
                'nullable',
            ],
        ];
    }
}
