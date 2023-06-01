<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @mixin IdeHelperFlight
 */
class Flight extends Model
{
    use HasFactory, HasUuids;

    public function destinationAirport(): BelongsTo
    {
        return $this->belongsTo(Airport::class);
    }

    public function sourceAirport(): BelongsTo
    {
        return $this->belongsTo(Airport::class);
    }

    public function tickets(): HasMany
    {
        return $this->hasMany(Ticket::class);
    }
}
