<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
class EventRegisterRequest extends FormRequest
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
            //
            'title' => 'required|string|max:100',
            'description' => 'nullable|string',
            'date' => 'required|date',
            'location' => 'required|string',
            'capacity' => 'required|integer|min:1',
        ];
    }
    public function messages(): array
    {
        return [
            'title.required' => "TITLE_REQUIRED",
            'title.string' => "TITLE_STRING",
            'title.max' => "TITLE_MAX_100",
            'date.required' => "DATE_REQUIRED",
            'date.date' => "DATE_DATE",
            'location.required' => "LOCATION_REQUIRED",
            'location.string' => "LOCATION_STRING",
            'capacity.required' => "CAPACITY_REQUIRED",
            'capacity.integer' => "CAPACITY_INTEGER",
            'capacity.min' => "CAPACITY_MIN_1",
        ];
    }

    protected function failedValidation(Validator $validator): void
    {
        $code      = $validator->errors()->first(); // ex: "TITLE_REQUIRED"
        $errorCode = constant("App\\Enums\\ErrorCode::$code");

        throw new HttpResponseException(
            response()->json([
                'error'   => $errorCode['code'],
                'message' => $errorCode['message'],
            ], 422)
        );
    }
}
