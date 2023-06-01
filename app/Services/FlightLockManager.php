<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;

final class FlightLockManager
{
    public function runWithinLock(callable $callback): mixed
    {
        return Cache::lock('flights')->block(5, $callback);
    }
}