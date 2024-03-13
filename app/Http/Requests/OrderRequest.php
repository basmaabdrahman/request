<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'status'=>"required|in:['pending','processing','shipped','delivering','complete']",
            'order_id'=>'required|exists:orders',
            'firstname'=>'required|string',
            'lastname'=>'required|string'
            ,'email'=>'required|email',
            'phone'=>'required|max:11'
            ,'street_address'=>'required|string'
            ,'city'=>'required|string',
            'product_id'=>'required|exists:products',
            'quantity'=>'required|exists:products',
            'product_name'=>'required|exists:products'
        ];
    }
}
