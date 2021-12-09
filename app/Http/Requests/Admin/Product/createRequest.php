<?php

namespace App\Http\Requests\Admin\Product;

use Illuminate\Foundation\Http\FormRequest;

class createRequest extends FormRequest
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
            'name'        => 'required|max:100',
            'slug'        => 'required|max:100',
            'category_id' => 'required|exists:categories,id',
            'is_view'     => 'required|boolean',
            'price_root'  => 'required|numeric',
            'price_sell'  => 'numeric|max:'. $this->price_root,
            'code_product'=> 'required|min:8|max:15',
            'color'=> 'required',
            'status'=> 'required',
            'image_product'=>'required',
        ];
    }
}
