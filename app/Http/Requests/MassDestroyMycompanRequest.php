<?php

namespace App\Http\Requests;

use App\Models\Mycompan;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyMycompanRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('mycompan_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:mycompans,id',
        ];
    }
}
