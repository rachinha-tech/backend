<?php

namespace App\Actions\Modality;

use App\Models\Modality;

class UpdateModality
{
    public function handle(array $data): bool
    {
        $modality = Modality::query()
            ->firstWhere('id', $data['modality_id']);

        return $modality->update($data);
    }
}
