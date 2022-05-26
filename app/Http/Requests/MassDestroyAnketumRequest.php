<?php

namespace App\Http\Requests;

use App\Models\Anketum;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyAnketumRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('anketum_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:anketa,id',
        ];
    }
}
