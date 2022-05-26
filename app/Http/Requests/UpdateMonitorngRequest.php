<?php

namespace App\Http\Requests;

use App\Models\Monitorng;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateMonitorngRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('monitorng_edit');
    }

    public function rules()
    {
        return [
            'lang' => [
                'string',
                'nullable',
            ],
            'lat' => [
                'string',
                'nullable',
            ],
        ];
    }
}
