<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Local extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = ['id'];

    public function modality(): BelongsTo
    {
        return $this->belongsTo(Modality::class, 'modality_id','id');
    }

    public function convenience(): HasMany
    {
        return $this->hasMany(Convenience::class, 'local_id','id');
    }

    public function schedule(): HasMany
    {
        return $this->hasMany(Schedule::class, 'local_id','id');
    }
}
