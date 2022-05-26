<?php

namespace App\Http\Requests;

use App\Models\Typestatus;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyTypestatusRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('typestatus_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:typestatuses,id',
        ];
    }
}
