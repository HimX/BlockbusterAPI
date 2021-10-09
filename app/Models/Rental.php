<?php

namespace App\Models;

use App\Events\RentalSaving;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string $rental_date
 * @property string $devolution_date
 * @property float $value;
 * @property Movie $movie
 * @property Invoice $invoice
 */
class Rental extends Model
{
    protected $dispatchesEvents = [
        'saving' => RentalSaving::class
    ];

    protected $fillable = ['rental_date', 'devolution_date', 'movie_id'];

    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }

    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }
}
