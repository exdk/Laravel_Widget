<?php

namespace App\Http\Requests;

use App\Models\Titilegruz;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyTitilegruzRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('titilegruz_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:titilegruzs,id',
        ];
    }
}
