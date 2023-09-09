<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FornisseurRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|email',
            'image' => 'nullable|file|mimes:jpeg,png,jpg,svg|max:204833',
            'adresse' => 'nullable|string|max:255',
            'phone' => 'required|string',
            'fix' => 'nullable|string|max:255',
            'company'=> 'required',
        ];
    }
}
