<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
        if (is_null($this->image_path) || $this->image_path === '') {
            return [
                'product_category_id' => ['required', 'numeric'],
                'name' => ['required'],
                'price' => ['required', 'numeric', 'min:0'],
            ];
        }
        return [
            'product_category_id' => ['required', 'numeric'],
            'name' => ['required'],
            'price' => ['required', 'numeric', 'min:0'],
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

    public function updateParameters() :array
    {
        if ($this->delete_image === "1") {
            return ['image_path' => ''];
        }

        if (is_null($this->image_path) || $this->image_path === '') {
            return [
                'product_category_id' => $this->product_category_id,
                'name' => $this->name,
                'price' => $this->price,
            ];
        }
        return [
            'product_category_id' => $this->product_category_id,
            'name' => $this->name,
            'price' => $this->price,
            'image_path' => $this->file('image_path')->store('public/photo'),
        ];
    }
}
