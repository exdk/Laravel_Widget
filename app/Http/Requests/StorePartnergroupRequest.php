<?php

namespace App\Http\Requests;

use App\Models\Partnergroup;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePartnergroupRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('partnergroup_create');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'nullable',
            ],
            'partners.*' => [
                'integer',
            ],
            'partners' => [
                'array',
            ],
        ];
    }
}
