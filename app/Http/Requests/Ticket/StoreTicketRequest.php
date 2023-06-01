<?php

namespace App\Http\Requests\Ticket;

use App\Models\Flight;
use App\Models\Passport;
use Illuminate\Foundation\Http\FormRequest;

class StoreTicketRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'flightId'   => ['required', 'string', 'exists:flights,id'],
            'passportId' => ['required', 'string', 'exists:passports,id'],
        ];
    }

    public function getFlight(): Flight
    {
        return Flight::findOrNew($this->validated('flightId'));
    }

    public function getPassport(): Passport
    {
        return Passport::findOrFail($this->validated('passportId'));
    }
}
