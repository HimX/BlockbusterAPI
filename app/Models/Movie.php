<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $type
 */
class Movie extends Model
{
    const TYPE_OLDIE = 'OLDIE';
    const TYPE_NEW_RELEASE = 'NEW_RELEASE';
    const TYPE_NORMAL = 'NORMAL';

    /**
     * @var array
     */
    protected $fillable = ['title', 'status', 'type'];

    public function rentals()
    {
        return $this->hasMany(Rental::class);
    }
}
