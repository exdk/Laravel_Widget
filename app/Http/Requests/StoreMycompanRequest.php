<?php

namespace App\Http\Requests;

use App\Models\Mycompan;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreMycompanRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('mycompan_create');
    }

    public function rules()
    {
        return [
            'hortname' => [
                'string',
                'nullable',
            ],
            'longname' => [
                'string',
                'nullable',
            ],
            'typecomps.*' => [
                'integer',
            ],
            'typecomps' => [
                'array',
            ],
            'typeperevozs.*' => [
                'integer',
            ],
            'typeperevozs' => [
                'array',
            ],
            'oporg' => [
                'string',
                'nullable',
            ],
            'datet' => [
                'string',
                'nullable',
            ],
            'direktor' => [
                'string',
                'nullable',
            ],
            'uradres' => [
                'string',
                'nullable',
            ],
            'factadr' => [
                'string',
                'nullable',
            ],
            'telefonorg' => [
                'string',
                'nullable',
            ],
            'orgmobile' => [
                'string',
                'nullable',
            ],
            'web' => [
                'string',
                'nullable',
            ],
            'email' => [
                'string',
                'nullable',
            ],
            'innkpp' => [
                'string',
                'nullable',
            ],
            'kpp' => [
                'string',
                'nullable',
            ],
            'innogrn' => [
                'string',
                'nullable',
            ],
            'bik' => [
                'string',
                'nullable',
            ],
            'bank' => [
                'string',
                'nullable',
            ],
            'rathet' => [
                'string',
                'nullable',
            ],
            'korhet' => [
                'string',
                'nullable',
            ],
            'reitopen' => [
                'string',
                'nullable',
            ],
            'reiin' => [
                'string',
                'nullable',
            ],
            'geogorod' => [
                'string',
                'nullable',
            ],
            'megdus.*' => [
                'integer',
            ],
            'megdus' => [
                'array',
            ],
            'note' => [
                'string',
                'nullable',
            ],
            'newfilll' => [
                'array',
            ],
        ];
    }
}
