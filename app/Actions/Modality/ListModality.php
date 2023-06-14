<?php

namespace App\Actions\Modality;

use App\Models\Modality;
use Illuminate\Database\Eloquent\Collection;

class ListModality
{
    public function handle(): Collection
    {
        return Modality::query()->orderBy('name')->get();
    }
}
