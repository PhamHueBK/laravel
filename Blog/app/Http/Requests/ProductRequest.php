<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        	'name' => 'required',
        	'price' => 'required|numeric',
        	'quantity' => 'required|numeric'
        ];
    }
    public function messages(){
    	return [
    		'name.required' => "Tên sản phẩm bắt buộc nhập",
    		'price.required' => "Giá bắt buộc nhập",
    		'price.numeric' => "Giá bắt buộc nhập số",
    		'quantity.required' => "Số lượng sản phẩm là bắt buộc nhập",
    		'quantity.numeric' => "Số lượng sản phẩm bắt buộc nhập số"
    	];
    }
}
