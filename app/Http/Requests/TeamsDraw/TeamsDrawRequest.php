<?php

namespace App\Http\Requests\TeamsDraw;

use Illuminate\Foundation\Http\FormRequest;

class TeamsDrawRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'modality_id' => 'required|integer',
            'quantity_teams' => 'required|integer',
            'players' => 'required|array',
        ];
    }
}
