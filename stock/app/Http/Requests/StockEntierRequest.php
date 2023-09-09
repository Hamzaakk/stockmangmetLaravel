<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StockEntierRequest extends FormRequest
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
        'product_id' => 'required' ,
        'fornisseur_id'  => 'required',
        'lieux_id'   => 'required',
        'quantité'  => 'required',
        'priceforOne' => 'required',
        'description' => 'required|max:225',
        'status' => 'required',
        'created_at' => 'date'

        ];
    }
}
