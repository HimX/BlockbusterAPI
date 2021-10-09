<?php

namespace App\Observers;

use App\Domain\Rental\Calculator\Factory as RentalCalculatorFactory;
use App\Models\Rental;

class RentalObserver
{
    /**
     * @var bool
     */
    public $afterCommit = true;

    public function saving(Rental $rental)
    {
        $value = RentalCalculatorFactory::get($rental)->getValue();
        $value;
    }
}
