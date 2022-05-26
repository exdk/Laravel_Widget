<?php

namespace App\Http\Requests;

use App\Models\Typeloaddest;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyTypeloaddestRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('typeloaddest_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:typeloaddests,id',
        ];
    }
}
