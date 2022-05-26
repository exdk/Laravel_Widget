<?php

namespace App\Http\Requests;

use App\Models\Offering;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyOfferingRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('offering_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:offerings,id',
        ];
    }
}
