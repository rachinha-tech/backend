<?php

namespace App\Actions\Modality;

use App\Models\Modality;
use Illuminate\Database\Eloquent\Model;

class StoreModality
{
    public function handle(array $data): Model
    {
        $modality = Modality::query()->create($data);

        return $modality;
    }
}
