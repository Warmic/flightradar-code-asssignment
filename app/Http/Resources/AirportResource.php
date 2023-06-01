<?php

namespace App\Http\Resources;

use App\Models\IdeHelperAirport;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin IdeHelperAirport
 */
class AirportResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'   => $this->id,
            'code' => $this->code,
        ];
    }
}
