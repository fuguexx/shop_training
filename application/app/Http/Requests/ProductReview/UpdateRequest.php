<?php

namespace App\Http\Requests\ProductReview;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the users is authorized to make this request.
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
            'title' => ['required', 'string', 'max:255'],
            'body' => ['required', 'string', 'max:255'],
            'rank' => ['required', 'numeric', 'between:1,5'],
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'タイトルは、必ず指定してください。',
            'title.string' => 'タイトルは、文字で入力して下さい。',
            'title.max:255' => 'タイトルは、２５５文字以内で入力して下さい。',
            'body.required' => '本文は、必ず指定してください。',
            'body.string' => '本文は、文字で入力して下さい。',
            'body.max:255' => '本文は、２５５文字以内で入力して下さい。',
            'rank.required' => '評価は、必ず選択して下さい。',
            'rank.numeric' => '評価は、数値で入力して下さい。',
            'rank.between:1,5' => '評価は、1〜5の整数で入力して下さい。',
        ];
    }

    public function updateParameters() :array
    {
        return [
            'product_id' => $this->productId,
            'user_id' => $this->userId,
            'title' => $this->title,
            'body' => $this->body,
            'rank' => $this->rank,
        ];
    }
}
