<?php

namespace App\Domain\Rental\Calculator;

use App\Models\Rental;
use DateTime;

abstract class AbstractRentalValue implements RentalValueInterface
{
    protected Rental $rental;

    protected float $unitValue;

    public function __construct(Rental $rental)
    {
        $this->rental = $rental;

        $unitValue = config('app.unit_value', null);

        if (is_null($unitValue)) {
            throw new \RuntimeException("There is not unit value configured.");
        }

        $this->unitValue = $unitValue;
    }

    protected function getDaysOfRental(): int
    {
        $rentalDate = new DateTime($this->rental->rental_date);
        $devolutionDate = new DateTime($this->rental->devolution_date);

        $diff = $devolutionDate->diff($rentalDate);
        return (int)$diff->format('%a');
    }
}
