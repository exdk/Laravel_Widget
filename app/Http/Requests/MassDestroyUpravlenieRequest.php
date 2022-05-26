<?php

namespace App\Http\Requests;

use App\Models\Upravlenie;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyUpravlenieRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('upravlenie_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:upravlenies,id',
        ];
    }
}
