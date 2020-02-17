<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255',
                Rule::unique('users')->ignore($this->id)],
            'password' => ['required', 'alpha_dash', 'alpha_num', 'min:4', 'confirmed'],
            'password_confirmation' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '名前は、必ず指定して下さい。',
            'name.string' => '名前は、文字でして下さい。',
            'name.max:255' => '名前は、２５５文字以内で入力して下さい。',
            'email.required' => 'メールアドレスは、必ず指定して下さい。',
            'email.string' => 'メールアドレスは、文字でして下さい。',
            'email.email' => 'メールアドレスの形式で入力して下さい。',
            'email.max:255' => 'メールアドレスは、２５５文字以内で入力して下さい。',
            'email.unique:users' => '登録済みのメールアドレスです。',
            'password.required' => 'パスワードは、必ず指定して下さい。',
            'password.alpha_num' => 'パスワードは、英数字で指定して下さい。',
            'password.min:4' => 'パスワードは、4文字以上にして下さい。',
            'password.confirmed' => 'パスワードとパスワード（確認）が一致しません。',
        ];
    }
}



