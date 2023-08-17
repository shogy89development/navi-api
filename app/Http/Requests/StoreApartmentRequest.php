<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreApartmentRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'building' => 'required|integer',
            'name' => 'required|string',
            'floor' => 'required|string',
            'room' => 'required|integer',
            'price' => 'required|decimal',
            'rental' => 'required|decimal',
            'surface' => 'required|decimal',
            'bedrooms' => 'required|integer',
            'bathrooms' => 'required|integer',
            'reserver' => 'required|boolean',
            'type' => 'required|integer',
            'tour' => 'required|integer',
            'side' => 'string'
        ];        
    }

    protected function failedAuthorization(): void
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'message' => 'You dont have permission to access this page'
        ], 401));
    }

    public function failedValidation(Validator $validator): void
    {
        throw new HttpResponseException(response()->json([
            'success' => false, 'errors' => $validator->errors(),
        ], 422));
    }
}
