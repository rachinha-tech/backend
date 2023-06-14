<?php

namespace App\Http\Requests\Local;

use Illuminate\Foundation\Http\FormRequest;

class StoreLocalRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'description' => 'nullable|string',
            'modality_id' => 'required|integer',
            'value_of_hour' => 'required|numeric',
            'schedule' => 'required|array',
            'schedule.*.hours_minutes' => 'required|string',
//            'latitude' => 'required|numeric',
//            'longitude' => 'required|numeric',
//            'url_image' => 'nullable|string',
        ];
    }
}
