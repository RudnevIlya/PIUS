<?php

namespace App\Http\ApiV1\Modules\Casts\Requests;

use App\Http\ApiV1\Modules\Actors\Requests\BaseFormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

class PostCastRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'id_film' => ['exists:film,id'],
            'id_actor'=>['exists:actor,id'],
            'role'=>'string|max:30',
        ];
    }
}