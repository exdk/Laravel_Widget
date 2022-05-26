<?php

namespace App\Http\Requests;

use App\Models\DocTtn;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreDocTtnRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('doc_ttn_create');
    }

    public function rules()
    {
        return [];
    }
}
