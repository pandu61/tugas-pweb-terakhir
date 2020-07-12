<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SellProductInfoRequest extends FormRequest
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
//'seller_id' => 'required',
            'product_name' => 'required|max: 115',
            'stock' => 'required|max: 10',
            'price' => "required|max: 20",
            'location' => "required|max: 20",
            'condition' => "required|string|in:new,former",
            'weight' => "required|max: 30",
            'description' => "required",
            'category' => 'required|max: 15'
        ];
    }
}
