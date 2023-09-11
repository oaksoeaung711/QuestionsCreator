<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTrueFalseQuestionsRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'truefalsequestion' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'truefalsequestion.required' => 'Question field is required',
        ];
    }
}