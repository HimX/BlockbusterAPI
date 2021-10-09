<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property float $value
 * @property Client $client;
 */
class Invoice extends Model
{
    protected $fillable = ['client_id'];

    public function rentals()
    {
        return $this->hasMany(Rental::class, 'invoice_id');
    }

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }
}
