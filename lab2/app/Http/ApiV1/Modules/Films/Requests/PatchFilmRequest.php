<?php

namespace App\Http\ApiV1\Modules\Films\Requests;

use App\Http\ApiV1\Modules\Actors\Requests\BaseFormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

class PatchFilmRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => 'string|max:30',
            'duration'=>'integer|min:50|max:240',
            'rate'=>'numeric|min:1|max:10',
            'rate'=>'size:3',
            'premiere_date'=>['date_format:Y-m-d','before:tomorrow','after:1900-01-01'],
        ];
    }
}