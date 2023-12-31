<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductsRequest extends FormRequest
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
         'name' => 'required|max:32',
         'image' => 'image|mimes:png,jpeg,jpg,svg',
         'liblillé' =>  'required',
         'description' =>  'required|max:322',
         'price'   =>  'required',
         'category_id' => 'required'
        ];
    }
}
