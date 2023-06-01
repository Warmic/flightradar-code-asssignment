<?php

namespace App\Http\Resources;

use App\Models\IdeHelperTicket;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin IdeHelperTicket
 */
class TicketResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'         => $this->id,
            'seatId'     => $this->seat_id,
            'passportId' => $this->passport_id,
            'flight'     => new FlightResource($this->flight),
        ];
    }
}
