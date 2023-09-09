<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
            'email' => 'email|min:6',
            'password'=> 'min:6|max:17|confirmed',
            'image' => 'image|mimes:png,jpeg,jpg,svg',
            'adresse'=> 'min:3|max:56',
            'description' =>'min:8',
            'phone' => 'min:10|max:10',
            'role' => 'required'
        ];
    }
}
