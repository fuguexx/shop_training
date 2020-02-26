<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

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
        if (is_null($this->password) || $this->password === '') {
            if (is_null($this->image_path) || $this->image_path === '') {
                return [
                    'name' => ['required', 'string', 'max:255',],
                    'email' => ['required', 'string', 'email', 'max:255',
                        Rule::unique('users')->ignore($this->id),],
                ];
            }
        }
        return [
            'name' => ['required', 'string', 'max:255',],
            'email' => ['required', 'string', 'email', 'max:255',
                Rule::unique('users')->ignore($this->id),],
            'password' => ['alpha_dash', 'alpha_num', 'min:4','confirmed'],
            'password_confirmation' => ['required'],
            'image_path' => ['image','mimes:jpeg,jpg,png,gif'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '名前は、必ず指定して下さい。',
            'name.string' => '名前は、文字で入力して下さい。',
            'name.max:255' => '名前は、２５５文字以内で入力して下さい。',
            'email.required' => 'メールアドレスは、必ず指定して下さい。',
            'email.string' => 'メールアドレスは、文字で入力して下さい。',
            'email.email' => 'メールアドレスの形式で入力して下さい。',
            'email.max:255' => 'メールアドレスは、２５５文字以内で入力して下さい。',
            'email.unique:users' => '登録済みのメールアドレスです。',
            'password.alpha_num' => 'パスワードは、英数字で指定して下さい。',
            'password.min:4' => 'パスワードは、4文字以上にして下さい。',
            'password.confirmed' => 'パスワードとパスワード（確認）が一致しません。',
            'image_path.image' => 'イメージは画像にして下さい。',
            'image_path.mimes' => 'イメージはjpeg,jpg,png,gifタイプのファイルにして下さい。',
        ];
    }

    public function updateParameters() :array
    {
        if ($this->delete_image === "1") {
            return ['image_path' => ''];
        }

        if (is_null($this->password) || $this->password === '') {
            if (is_null($this->image_path) || $this->image_path === '') {
                return [
                    'name' => $this->name,
                    'email' => $this->email,
                ];
            }
        }
        return [
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'image_path' => $this->file('image_path')->store('public/photo'),
        ];
    }
}
