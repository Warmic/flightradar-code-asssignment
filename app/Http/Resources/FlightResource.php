<?php

namespace App\Http\Resources;

use App\Models\IdeHelperFlight;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin IdeHelperFlight
 */
class FlightResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'                 => $this->id,
            'departureTime'      => $this->departure_at,
            'sourceAirport'      => new AirportResource($this->sourceAirport),
            'destinationAirport' => new AirportResource($this->destinationAirport),
        ];
    }
}
