<?php

namespace App\Actions\Event;

use App\Models\Event;
use App\Models\Local;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EventStore
{
    public function handle(array $data): Model
    {
        $user = Auth::user();
        $local = Local::query()->firstWhere('id', $data['local_id']);

        if (!$local) {
            throw new \DomainException('Local não encontrado!', Response::HTTP_NOT_FOUND);
        }

        return Event::query()->create([
            'user_id' => $user->id,
            'name' => $data['name'],
            'type' => $data['type'],
            'local_id' => $data['local_id'],
            'schedule_id' => 1,
            'description' => $data['description'],
        ]);
    }
}
