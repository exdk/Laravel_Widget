<?php

namespace App\Http\Requests;

use App\Models\Typeloaddestination;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyTypeloaddestinationRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('typeloaddestination_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:typeloaddestinations,id',
        ];
    }
}
