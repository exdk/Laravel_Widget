<?php
namespace App\Http\Requests;

use App\Models\FormsItems;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreFormsItemsRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('forms_create');
    }

    public function rules()
    {
        return [
            'placeholder' => [
                'string',
                'nullable',
            ],
        ];
    }
}
