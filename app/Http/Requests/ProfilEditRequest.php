<?php
//
namespace App\Http\Requests;

use image;
use Illuminate\Foundation\Http\FormRequest;

class ProfilEditRequest extends FormRequest
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
        return[
            'email' => 'required|email',
            'name' => 'required'
           // 'image' => 'image'
        ];
    }
}
