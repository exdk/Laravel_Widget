<?php

namespace App\Http\Requests;

use App\Models\Condtorg;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyCondtorgRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('condtorg_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:condtorgs,id',
        ];
    }
}
