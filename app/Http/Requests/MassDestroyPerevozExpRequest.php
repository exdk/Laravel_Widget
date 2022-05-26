<?php

namespace App\Http\Requests;

use App\Models\PerevozExp;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyPerevozExpRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('perevoz_exp_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:perevoz_exps,id',
        ];
    }
}
