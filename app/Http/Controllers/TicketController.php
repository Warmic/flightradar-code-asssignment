<?php

namespace App\Http\Controllers;

use App\Actions\Ticket\CreateAction;
use App\Actions\Ticket\DeleteAction;
use App\Actions\Ticket\UpdateAction;
use App\Http\Requests\Ticket\StoreTicketRequest;
use App\Http\Requests\Ticket\UpdateTicketRequest;
use App\Http\Resources\TicketResource;
use App\Models\Ticket;
use Illuminate\Http\JsonResponse;

class TicketController extends Controller
{
    public function store(StoreTicketRequest $request, CreateAction $action): TicketResource
    {
        $ticket = $action->execute(
            flight: $request->getFlight(),
            passport: $request->getPassport()
        );

        return $ticket->toResource();
    }

    public function delete(Ticket $ticket, DeleteAction $action): JsonResponse
    {
        $action->execute(
            ticket: $ticket
        );

        return new JsonResponse();
    }

    public function update(
        Ticket $ticket,
        UpdateTicketRequest $request,
        UpdateAction $action
    ): TicketResource {
        $ticket = $action->execute(
            ticket: $ticket,
            newSeatId: $request->getSeatId(),
        );

        return $ticket->toResource();
    }
}
