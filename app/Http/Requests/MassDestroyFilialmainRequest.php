<?php

namespace App\Http\Requests;

use App\Models\Filialmain;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyFilialmainRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('filialmain_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:filialmains,id',
        ];
    }
}
