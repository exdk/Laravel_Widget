<?php

namespace App\Http\Requests;

use App\Models\PerevozchikPerevoz;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyPerevozchikPerevozRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('perevozchik_perevoz_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:perevozchik_perevozs,id',
        ];
    }
}
