<?php

namespace App\Http\Requests;

use App\Models\Statuszaya;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyStatuszayaRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('statuszaya_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:statuszayas,id',
        ];
    }
}
