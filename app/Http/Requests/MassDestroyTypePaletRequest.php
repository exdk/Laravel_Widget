<?php

namespace App\Http\Requests;

use App\Models\TypePalet;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyTypePaletRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('type_palet_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:type_palets,id',
        ];
    }
}
