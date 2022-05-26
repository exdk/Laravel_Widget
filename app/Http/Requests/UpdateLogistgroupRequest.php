<?php

namespace App\Http\Requests;

use App\Models\Logistgroup;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateLogistgroupRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('logistgroup_edit');
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
