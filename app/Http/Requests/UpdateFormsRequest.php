<?php
namespace App\Http\Requests;

use App\Models\Forms;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateFormsRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('forms_edit');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'nullable',
            ],
        ];
    }
}
