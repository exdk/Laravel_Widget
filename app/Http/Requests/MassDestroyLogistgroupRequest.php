<?php

namespace App\Http\Requests;

use App\Models\Logistgroup;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyLogistgroupRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('logistgroup_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:logistgroups,id',
        ];
    }
}
