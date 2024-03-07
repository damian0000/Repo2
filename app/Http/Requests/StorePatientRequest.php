<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePatientRequest extends FormRequest
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
            'name' => 'required|min:3|max:50',
            'surname' => 'required|min:3|max:50',
            'disability' => 'required|min:3|max:50',
            'pesel' => 'required|numeric',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:4|max:50',
            'phone' => 'required|regex:/^[0-9]{9}/',
            'street' => 'required',
            'post_code' => 'required|regex:/^[0-9]{2}-[0-9]{3}/',
            'city' => 'required|min:3|max:50',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Wymagane imię',
            'name.min' => 'Imię musi mieć minimum 3 znaki',
            'name.max' => 'Imię musi mieć maksymalnie 50 znaków',
            'surname.required' => 'Wymagane nazwisko',
            'surname.min' => 'Nazwisko musi mieć minimum 3 znaki',
            'surname.max' => 'Nazwisko musi mieć maksymalnie 50 znaków',
            'disability.required' => 'Pole wymagane',
            'disability.min' => 'Pole musi mieć minimum 3 znaki',
            'disability.max' => 'Pole musi mieć maksymalnie 50 znaków',
            'pesel.required' => 'Wymagany pesel',
            'pesel.numeric' => 'Pesel cyfry',
            'email.required' => 'Wymagany email',
            'email.email' => 'Niepoprawny email',
            'email.unique' => 'Podany email już istnieje',
            'password.required' => 'Wymagane hasło',
            'password.min' => 'Hasło musi mieć minimum 3 znaki',
            'password.max' => 'Hasło musi mieć maksymalnie 50 znaków',
            'phone.required' => 'Wymagany telefon',
            'phone.regex' => 'Numer telefonu w formacie 000000000',
            'street.required' => 'Wymagana ulica i numer domu',
            'post_code.required' => 'Wymagany kod pocztowy',
            'post_code.regex' => 'Kod pocztowy w formacie 00-000',
            'city.required' => 'Wymagana miejscowość',
            'city.min' => 'Miejscowość musi mieć minimum 3 znaki',
            'city.max' => 'Miejscowość musi mieć maksymalnie 50 znaków',
        ];
    }
}
