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
            'product_category_id' => ['required', 'numeric'],
            'name' => ['required'],
            'price' => ['required', 'numeric'],
            'image_path' => ['image','mimes:jpeg,jpg,png,gif'],
        ];
    }

    public function messages()
    {
        return [
            'product_category_id.required' => '商品カテゴリーは、必ず選択して下さい。',
            'name.required' => '名前は、必ず指定して下さい。',
            'price.required' => '価格は、必ず指定して下さい。',
            'price.numeric' => '価格は、数値で入力して下さい。',
            'image_path.image' => 'イメージは画像にして下さい。',
            'image_path.mimes' => 'イメージはjpeg,jpg,png,gifタイプのファイルにして下さい。',
        ];
    }
}
