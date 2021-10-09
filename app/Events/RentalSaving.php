<?php

namespace App\Events;

use App\Models\Rental;
use Illuminate\Broadcasting\InteractsWithSockets;

class RentalSaving extends Event
{
    use InteractsWithSockets;

    public Rental $rental;

    /**
     * @param Rental $rental
     */
    public function __construct(Rental $rental)
    {
        $this->rental = $rental;
    }
}
