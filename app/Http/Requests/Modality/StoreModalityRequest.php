<?php

namespace App\Http\Requests\Modality;

use Illuminate\Foundation\Http\FormRequest;

class StoreModalityRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'quantity_players' => 'required|integer',
            'url_image' => 'required|string',
            'description' => 'required|string',
        ];
    }
}
