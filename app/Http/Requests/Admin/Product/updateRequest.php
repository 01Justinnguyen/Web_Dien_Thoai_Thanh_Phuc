<?php

namespace App\Http\Requests\Admin\Product;

use Illuminate\Foundation\Http\FormRequest;

class updateRequest extends FormRequest
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
            'brand_id'    => 'required|exists:brands,id',
            'is_view'     => 'required|boolean',
            'price_root'  => 'required|numeric',
            'price_sell'  => 'max:'. $this->price_root,
            'image_product'=>'required',
            // 'code_product'=> 'required|min:5|max:8',
        ];
    }
}
