<?php

namespace App\Domain\Rental\Calculator;

use App\Models\Movie;
use App\Models\Rental;

class Factory
{
    public static function get(Rental $rental): AbstractRentalValue
    {
        $movieType = $rental->movie->type;
        switch ($movieType) {
            case Movie::TYPE_NEW_RELEASE:
                return new NewReleaseRentalValue($rental);
            case Movie::TYPE_NORMAL:
                return new NormalRentalValue($rental);
            case Movie::TYPE_OLDIE:
                return new OldieRentalValue($rental);
        }

        throw new \RuntimeException("Unsupported type of movie");
    }
}
