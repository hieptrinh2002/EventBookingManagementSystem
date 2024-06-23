<?php

namespace App\Http\Requests\promotions;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class CreatePromotionRequest extends FormRequest
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
            'code' => 'required|string|max:25',
            'dateStart' => 'required|date|after_or_equal:today',
            'dateExpire' => 'required|date|after:dateStart',
            'condition' => 'required|integer|min:1',
            'discount' => 'required|numeric|min:1|max:100',
            'quantityAvailable' => 'required|integer|min:1'
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'discount' => (float) $this->discount,
            'condition' => (float) $this->condition,
            'quantityAvailable' => (int) $this->quantityAvailable,
            'dateStart' => Carbon::parse($this->dateStart)->format('Y-m-d\TH:i:s\Z'),
            'dateExpire' => Carbon::parse($this->dateExpire)->format('Y-m-d\TH:i:s\Z'),
        ]);
    }
}
