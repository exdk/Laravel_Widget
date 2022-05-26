<?php

namespace App\Http\Requests;

use App\Models\Naznaotm;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyNaznaotmRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('naznaotm_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:naznaotms,id',
        ];
    }
}
