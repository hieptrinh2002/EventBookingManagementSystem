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
        return false;
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
            'dateStart' => 'required|date',
            'dateExpire' => 'required|date|after:dateStart',
            'condition' => 'required',
            'discount' => 'required|between:0,100',
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'discount' => (float) $this->discount,
            'condition' => (float) $this->condition,
            'dateStart' => Carbon::parse($this->startDate)->format('Y-m-d\TH:i:s\Z'),
            'dateExpire' => Carbon::parse($this->endDate)->format('Y-m-d\TH:i:s\Z'),
        ]);
    }
}
