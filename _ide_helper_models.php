<?php

// @formatter:off

/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */

namespace App\Models {

    /**
     * App\Models\Airport
     *
     * @property int                             $id
     * @property string                          $code
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @method static \Database\Factories\AirportFactory factory($count = null, $state = [])
     * @method static \Illuminate\Database\Eloquent\Builder|Airport newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|Airport newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|Airport query()
     * @mixin \Eloquent
     */
    class IdeHelperAirport
    {
    }
}

namespace App\Models {

    /**
     * App\Models\Flight
     *
     * @property string                                                                 $id
     * @property string                                                                 $source_airport_id
     * @property string                                                                 $destination_airport_id
     * @property string                                                                 $departure_at
     * @property \Illuminate\Support\Carbon|null                                        $created_at
     * @property \Illuminate\Support\Carbon|null                                        $updated_at
     * @property-read \App\Models\Airport|null                                          $destinationAirport
     * @property-read \App\Models\Airport|null                                          $sourceAirport
     * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Ticket> $tickets
     * @property-read int|null                                                          $tickets_count
     * @method static \Database\Factories\FlightFactory factory($count = null, $state = [])
     * @method static \Illuminate\Database\Eloquent\Builder|Flight newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|Flight newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|Flight query()
     * @mixin \Eloquent
     */
    class IdeHelperFlight
    {
    }
}

namespace App\Models {

    /**
     * App\Models\Passport
     *
     * @property int                             $id
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @method static \Database\Factories\PassportFactory factory($count = null, $state = [])
     * @method static \Illuminate\Database\Eloquent\Builder|Passport newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|Passport newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|Passport query()
     * @mixin \Eloquent
     */
    class IdeHelperPassport
    {
    }
}

namespace App\Models {

    /**
     * App\Models\Ticket
     *
     * @property string                          $id
     * @property string                          $passport_id
     * @property string                          $flight_id
     * @property int                             $seat_id
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property-read \App\Models\Flight|null    $flight
     * @method static \Database\Factories\TicketFactory factory($count = null, $state = [])
     * @method static \Illuminate\Database\Eloquent\Builder|Ticket newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|Ticket newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|Ticket query()
     * @mixin \Eloquent
     */
    class IdeHelperTicket
    {
    }
}

