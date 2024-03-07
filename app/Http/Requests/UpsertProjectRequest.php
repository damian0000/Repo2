<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpsertProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:3|max:50'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Wymagana nazwa projektu',
            'name.min' => 'Nazwa musi mieć minimum 3 znaki',
            'name.max' => 'Nazwa musi mieć maksymalnie 50 znaków',
            'name.unique' => 'Podana organizacja już istnieje'
        ];
    }
}
