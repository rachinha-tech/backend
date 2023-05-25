<?php

namespace App\Actions\Local;

use App\Http\Resources\Local\LocalResource;
use App\Models\Local;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ListLocal
{
    public function handle(): AnonymousResourceCollection
    {
        $local = Local::query()->get();

        return LocalResource::collection($local);
    }
}
