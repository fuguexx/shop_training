<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductCategoriesRequest extends FormRequest
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
            'name' => ['required'],
            'order_no' => ['required']
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '名称を入力して下さい。',
            'order_no.required' => '並び順番号を入力して下さい。'
        ];
    }
}
