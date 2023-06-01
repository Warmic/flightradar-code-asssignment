<?php

namespace App\Exceptions\Tickets;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;

class SeatIsOccupiedByOtherPersonException extends HttpException
{
    public function __construct(\Throwable $previous = null, array $headers = [], int $code = 0)
    {
        parent::__construct(
            Response::HTTP_BAD_REQUEST,
            'This seat is already occupied by other user',
            $previous,
            $headers,
            $code
        );
    }
}