<?php

namespace App\Http\Requests\events;

use Illuminate\Foundation\Http\FormRequest;

class CreateEventRequest extends FormRequest
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
            'title' => 'required|string',
            'description' => 'required|string',
            'startDate' => 'required|date',
            'endDate' => 'required|date|after:startDate',
            'location' => 'required|string',
            'type' => 'required|string',
            'minQuantity' => 'required|integer|min:1',
            'maxQuantity' => 'required|integer|min:1|gte:minQuantity',
            'price' => 'required|numeric|min:0',
            'currency' => 'required|string',
        ];
    }
}
