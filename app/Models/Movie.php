<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string $type
 */
class Movie extends Model
{
    use HasFactory;

    const TYPE_OLDIE = 'OLDIE';
    const TYPE_NEW_RELEASE = 'NEW_RELEASE';
    const TYPE_NORMAL = 'NORMAL';

    const STATUS_FREE = 'FREE';
    const STATUS_RENTED = 'RENTED';

    /**
     * @var array
     */
    protected $fillable = ['title', 'status', 'type'];

    public function rentals()
    {
        return $this->hasMany(Rental::class);
    }
}
