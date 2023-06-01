<?php

namespace App\Actions\Ticket;

use App\Models\Ticket;

final class DeleteAction
{
    public function execute(Ticket $ticket): void
    {
        $ticket->delete();
    }
}