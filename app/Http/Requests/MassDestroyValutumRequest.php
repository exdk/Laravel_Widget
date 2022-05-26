<?php

namespace App\Http\Requests;

use App\Models\Valutum;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyValutumRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('valutum_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:valuta,id',
        ];
    }
}
