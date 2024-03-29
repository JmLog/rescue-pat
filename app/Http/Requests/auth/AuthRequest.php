<?php

namespace App\Http\Requests\auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class AuthRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        $regex_email = regex_email();
        $regex_password = regex_password();

        return [
            'email' => "required|regex:{$regex_email}",
            'password' => "required|regex:{$regex_password}"
        ];
    }

    public function messages(): array
    {
        return [
            'email.required'    => '이메일은 필수 입니다.',
            'email.regex'       => '이메일형식이 올바르지 않습니다.',
            'password.required' => '비밀번호는 필수 입니다.',
            'password.regex'    => '비밀번호 규정이 올바르지 않습니다.',
        ];
    }

    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        $errors = (new \Illuminate\Validation\ValidationException($validator))->errors();
        $response['success'] = false;
        $response['message'] = 'There were errors in your submission.';
        $response['errors'] = $errors;
        return new HttpResponseException(response()->json($response, 422));
    }
}
