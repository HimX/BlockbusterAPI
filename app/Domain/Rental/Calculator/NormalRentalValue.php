<?php

namespace App\Domain\Rental\Calculator;

use App\Models\Rental;

class NormalRentalValue extends AbstractRentalValue
{
    protected int $minDaysWithNormalFee = 0;
    protected float $increaseRate = 0;

    public function __construct(Rental $rental)
    {
        parent::__construct($rental);
        $this->minDaysWithNormalFee = config('app.normal_movie_min_days_with_normal_fee', 3);
        $this->increaseRate = config('app.normal_movie_increase_rate', 1);
    }

    public function getValue(): float
    {
        $days = $this->getDaysOfRental();

        if ($days <= $this->minDaysWithNormalFee) {
            return $days * $this->unitValue;
        }

        $value = $this->unitValue * $this->minDaysWithNormalFee;
        $days = $days - $this->minDaysWithNormalFee;
        $unitValue = $this->unitValue;

        for ($i = $days; $i > 0; --$i) {
            $unitValue += $this->increaseRate;
            $value += $unitValue;
        }

        return $value;
    }
}
