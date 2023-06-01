<?php

namespace App\Actions;

// Common interface is a good idea,yet we run into problem of different argument types.
// One way of solving it is to introduce a common abstract class/interface DTO as an argument
// and store parameters for actions as properties over there, but for this
// assignment it seems like an over-engineering :)
interface Action
{
    public function execute(): mixed;
}