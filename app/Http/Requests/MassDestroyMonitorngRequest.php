<?php

namespace App\Http\Requests;

use App\Models\Monitorng;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyMonitorngRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('monitorng_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:monitorngs,id',
        ];
    }
}
