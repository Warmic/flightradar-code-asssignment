<?php

namespace App\Models;

use App\Http\Resources\TicketResource;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Collection;

/**
 * @mixin IdeHelperTicket
 */
class Ticket extends Model
{
    use HasFactory, HasUuids;

    protected $guarded = [];

    public function flight(): BelongsTo
    {
        return $this->belongsTo(Flight::class);
    }

    public static function getSeatRange(): Collection
    {
        return collect(range(1, 32));
    }

    public function toResource(): TicketResource
    {
        return new TicketResource($this);
    }
}
