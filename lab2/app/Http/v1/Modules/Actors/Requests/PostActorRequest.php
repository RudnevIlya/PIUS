<?php

namespace App\Http\v1\Modules\Actors\Requests;

use App\Http\v1\Modules\Actors\Requests\BaseFormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

class PostActorRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'full_name' => 'string|max:45',
            'height'=>'integer|min:50|max:250',
            'birthdate'=>['date_format:Y-m-d','before:tomorrow','after:1900-01-01'],
        ];
    }
}