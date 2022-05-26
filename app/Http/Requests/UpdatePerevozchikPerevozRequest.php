<?php

namespace App\Http\Requests;

use App\Models\PerevozchikPerevoz;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePerevozchikPerevozRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('perevozchik_perevoz_edit');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'nullable',
            ],
            'perevozperevozs.*' => [
                'integer',
            ],
            'perevozperevozs' => [
                'array',
            ],
        ];
    }
}
