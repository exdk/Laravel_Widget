<?php

namespace App\Http\Requests;

use App\Models\Anketum;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateAnketumRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('anketum_edit');
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
            'contactperson' => [
                'string',
                'nullable',
            ],
            'contactdol' => [
                'string',
                'nullable',
            ],
            'contactmobile' => [
                'string',
                'nullable',
            ],
            'auto' => [
                'string',
                'nullable',
            ],
            'dolya' => [
                'string',
                'nullable',
            ],
            'autoage' => [
                'string',
                'nullable',
            ],
            'qtyotgruzok' => [
                'string',
                'nullable',
            ],
            'qtypersonal' => [
                'string',
                'nullable',
            ],
            'qtydrivers' => [
                'string',
                'nullable',
            ],
            'targetservice' => [
                'string',
                'nullable',
            ],
            'onlinetender' => [
                'string',
                'nullable',
            ],
            'onlineauto' => [
                'string',
                'nullable',
            ],
            'total' => [
                'string',
                'nullable',
            ],
            'toplivo' => [
                'string',
                'nullable',
            ],
            'opit' => [
                'string',
                'nullable',
            ],
            'attractive' => [
                'string',
                'nullable',
            ],
            'better' => [
                'string',
                'nullable',
            ],
            'tools' => [
                'string',
                'nullable',
            ],
            'best' => [
                'string',
                'nullable',
            ],
            'titleanketa' => [
                'string',
                'nullable',
            ],
        ];
    }
}
