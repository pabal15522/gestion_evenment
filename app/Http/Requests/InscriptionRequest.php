<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class InscriptionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'firstName' => 'required|string',
            'lastName' => 'required|string',
            'email' => 'required|email',
        ];
    }
    public function messages()
    {
        return [
            'firstName.required' => "FIRST_NAME_REQUIRED",
            'firstName.string' => "FIRST_NAME_STRING",
            'lastName.required' => "LAST_NAME_REQUIRED",
            'lastName.string' => "LAST_NAME_STRING",
            'email.required' => "EMAIL_REQUIRED",
            'email.email' => "EMAIL_INVALID",
        ];
    }
     /*    protected function failedValidation(Validator $validator): void
    {
        $code      = $validator->errors()->first();
        $errorCode = constant("App\\Enums\\ErrorCode::$code");

        throw new HttpResponseException(
            response()->json([
                'error'   => $errorCode['code'],
                'message' => $errorCode['message'],
            ], 400)
        );
    } */

    protected function failedValidation(Validator $validator): void
    {
        $errors = $validator->errors()->toArray(); // toutes les erreurs

        $formattedErrors = [];

        foreach ($errors as $field => $codes) {
            foreach ($codes as $code) {
                $errorCode = constant("App\\Enums\\ErrorCode::$code");
                $formattedErrors[] = [
                    'error'   => $errorCode['code'],
                    'message' => $errorCode['message'],
                ];
            }
        }

        throw new HttpResponseException(
            response()->json([
                'errors' => $formattedErrors,
            ], 400)
        );
    }
}
