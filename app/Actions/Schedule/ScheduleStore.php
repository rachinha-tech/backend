<?php

namespace App\Actions\Schedule;

use App\Models\Local;
use App\Models\Schedule;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\Response;

class ScheduleStore
{
    public function handle(array $data): Model
    {
        $local = Local::query()->firstWhere('id', $data['local_id']);

        if (!$local) {
            throw new \DomainException('Local não encontrado.', Response::HTTP_NOT_FOUND);
        }

        return Schedule::query()
            ->create([
                'local_id' => $local->id,
                'hours_minutes' => $data['hours_minutes']
            ]);
    }
}
