<?php

namespace App\Http\Requests;

use App\Models\AssignedTransport;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyAssignedTransportRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('assigned_transport_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:assigned_transports,id',
        ];
    }
}
