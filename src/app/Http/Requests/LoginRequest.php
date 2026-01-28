<?php

namespace App\Http\Requests\Fortify;

use Illuminate\Foundation\Http\FormRequest;

use Laravel\Fortify\Http\Requests\LoginRequest as FortifyLoginRequest;

class LoginRequest extends FortifyLoginRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     *
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     *
     */
    public function rules(): array
    {
        return [
            'email' => ['required','email'],
            'password' => ['required'],
        ];
    }

    public function attributes(): array
    {
        return [
            'email' => 'メールアドレス',
            'password' => 'パスワード',
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => 'メールアドレスを入力してください',
            'password.required' => 'パスワードを入力してください',
            'email.required' => 'ログイン情報が登録されていません',
            'email.email' => 'ログイン情報が登録されていません',
            'password.required' => 'ログイン情報が登録されていません',
        ];
    }
}
