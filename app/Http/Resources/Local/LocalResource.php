<?php

namespace App\Http\Resources\Local;

use App\Models\Convenience;
use App\Models\Modality;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LocalResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "name" => $this->name,
            "description" => $this->description,
            "url_image" => $this->url_image,
            "value_of_hour" => $this->value_of_hour,
            "modality_id" => $this->modality_id,
            "points_id" => $this->points_id,
            "modality" => $this->modality,
            "convenience" => $this->convenience,
            "schedule" => $this->schedule,
        ];
    }
}
