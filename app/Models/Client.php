<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $score
 */
class Client extends Model
{
    use HasFactory;

    /**
     * @var array
     */
    protected $fillable = ['name', 'last_name', 'document'];

    public function rentals()
    {
        return $this->hasMany(Rental::class);
    }
}
