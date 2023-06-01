<?php

namespace App\Http\Requests\Ticket;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTicketRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'seatId' => ['required', 'number', 'between:1,32'],
        ];
    }

    public function getSeatId(): int
    {
        return $this->validated('seatId');
    }
}
