<?php

namespace App\Http\Requests\Event;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EventStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'type' => ['required', Rule::in(['amistoso', 'rachinha'])],
            'local_id' => 'required|integer',
//            'schedule_id' => 'required|integer',
            'description' => 'string',
        ];
    }
}
