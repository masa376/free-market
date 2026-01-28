<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => ['required','max:20'],
            'email' => ['required','email'],
            'password' => ['required','min:8'],
            'password_confirmation' => ['required', 'min:8', 'same:password'],
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'ユーザー名',
            'email' => 'メールアドレス',
            'password' => 'パスワード',
            'password_confirmation' => '確認用パスワード',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => ':attributeを入力してください',
            'email.required' => ':attributeを入力してください',
            'email.email' => ':attributeはメール形式で入力してください',
            'password.required' => ':attributeを入力してください',
            'password.min' => ':attributeは8文字以上で入力してください',
            'password_confirmation.same' => ':attributeと一致しません',
        ];
    }
}
