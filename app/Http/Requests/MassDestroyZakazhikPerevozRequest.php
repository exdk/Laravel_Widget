<?php

namespace App\Http\Requests;

use App\Models\ZakazhikPerevoz;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyZakazhikPerevozRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('zakazhik_perevoz_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:zakazhik_perevozs,id',
        ];
    }
}
