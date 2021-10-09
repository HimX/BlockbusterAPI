<?php

namespace App\Domain\Rental\Calculator;

class NewReleaseRentalValue extends AbstractRentalValue
{

    public function getValue(): float
    {
        $days = $this->getDaysOfRental();
        return $days * $this->unitValue;
    }
}
