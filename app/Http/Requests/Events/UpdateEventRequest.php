<?php

namespace App\Http\Requests\Events;
use Illuminate\Foundation\Http\FormRequest;
use Carbon\Carbon;


class UpdateEventRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'startDate' => 'required|date|after_or_equal:today',
            'endDate' => 'required|date|after:startDate',
            'location' => 'required|string|max:255',
            'type' => 'required|string|in:TALK_SHOW,CONFERENCE,SEMINAR',
            'status' => 'required|string|in:NOT_YET_STARTED,HAPPENING,ENDED',
            'minQuantity' => 'required|integer|min:0',
            'stock' => 'required|integer|min:0',
            'maxQuantity' => 'required|integer|min:1|gte:minQuantity',
            'price' => 'required|numeric|min:0',
            'currency' => 'required|string|in:VND,USD',
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'minQuantity' => (int) $this->minQuantity,
            'maxQuantity' => (int) $this->maxQuantity,
            'price' => (float) $this->price,
            'startDate' => Carbon::parse($this->startDate)->format('Y-m-d\TH:i:s\Z'),
            'endDate' => Carbon::parse($this->endDate)->format('Y-m-d\TH:i:s\Z'),
        ]);
    }
}
