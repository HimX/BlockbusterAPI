<?php

namespace App\Domain\Rental\Calculator;

interface RentalValueInterface
{
    public function getValue(): float;
}
