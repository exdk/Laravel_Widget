<?php

namespace App\Http\Requests;

use App\Models\DocTtn;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyDocTtnRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('doc_ttn_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:doc_ttns,id',
        ];
    }
}
