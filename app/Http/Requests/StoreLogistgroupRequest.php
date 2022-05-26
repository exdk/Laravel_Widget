<?php

namespace App\Http\Requests;

use App\Models\Logistgroup;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreLogistgroupRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('logistgroup_create');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'nullable',
            ],
            'de' => [
                'string',
                'nullable',
            ],
        ];
    }
}
