<?php

namespace App\Http\Requests;

use App\Models\Typeload;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyTypeloadRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('typeload_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:typeloads,id',
        ];
    }
}
