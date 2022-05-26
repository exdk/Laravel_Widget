<?php

namespace App\Http\Requests;

use App\Models\Zakaznagruz;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateZakaznagruzRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('zakaznagruz_edit');
    }

    public function rules()
    {
        return [
            'sapid' => [
                'string',
                'nullable',
            ],
            'tonnag' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'kubatura' => [
                'numeric',
            ],
            'qpack' => [
                'string',
                'nullable',
            ],
            'lendth' => [
                'string',
                'nullable',
            ],
            'width' => [
                'string',
                'nullable',
            ],
            'height' => [
                'string',
                'nullable',
            ],
            'diameter' => [
                'string',
                'nullable',
            ],
            'dateload' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'timeloada' => [
                'string',
                'nullable',
            ],
            'timeloadado' => [
                'string',
                'nullable',
            ],
            'dopinfoload' => [
                'string',
                'nullable',
            ],
            'cdate' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'ctime' => [
                'string',
                'nullable',
            ],
            'ctimedo' => [
                'string',
                'nullable',
            ],
            'cdopinfo' => [
                'string',
                'nullable',
            ],
            'typekuzovs.*' => [
                'integer',
            ],
            'typekuzovs' => [
                'array',
            ],
            'typeloads.*' => [
                'integer',
            ],
            'typeloads' => [
                'array',
            ],
            'type_unloads.*' => [
                'integer',
            ],
            'type_unloads' => [
                'array',
            ],
            'trebs.*' => [
                'integer',
            ],
            'trebs' => [
                'array',
            ],
            'trandocs.*' => [
                'integer',
            ],
            'trandocs' => [
                'array',
            ],
            'qauto' => [
                'string',
                'nullable',
            ],
            'qbelt' => [
                'string',
                'nullable',
            ],
            'tempot' => [
                'string',
                'nullable',
            ],
            'tempdo' => [
                'string',
                'nullable',
            ],
            'uoviaoplati' => [
                'string',
                'nullable',
            ],
            'tekprice' => [
                'string',
                'nullable',
            ],
            'bankday' => [
                'string',
                'nullable',
            ],
            'tart_nd' => [
                'string',
                'nullable',
            ],
            'bank_daynd' => [
                'string',
                'nullable',
            ],
            'nal' => [
                'string',
                'nullable',
            ],
            'naldn' => [
                'string',
                'nullable',
            ],
            'hagponig' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'max' => [
                'string',
                'nullable',
            ],
            'dopinfoplata' => [
                'string',
                'nullable',
            ],
            'kontaktprim' => [
                'string',
                'nullable',
            ],
            'kromezakazs.*' => [
                'integer',
            ],
            'kromezakazs' => [
                'array',
            ],
            'perevozkromes.*' => [
                'integer',
            ],
            'perevozkromes' => [
                'array',
            ],
            'nahalodate' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'nahalotime' => [
                'string',
                'nullable',
            ],
            'finitadate' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'finitatime' => [
                'string',
                'nullable',
            ],
            'idcomp' => [
                'string',
                'nullable',
            ],
            'iduser' => [
                'string',
                'nullable',
            ],
            'dop_1_adr' => [
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
            'dop_2_tot' => [
                'string',
                'nullable',
            ],
            'dop_3_adr' => [
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
            'dop_4_tot' => [
                'string',
                'nullable',
            ],
            'dop_5_adr' => [
                'string',
                'nullable',
            ],
            'dop_5_tot' => [
                'string',
                'nullable',
            ],
            'di' => [
                'string',
                'nullable',
            ],
        ];
    }
}
