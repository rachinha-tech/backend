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
            'quantity_players' => 'required|integer',
            'quantity_teams' => 'required|integer',
            'players' => 'required|array',
        ];
    }
}
