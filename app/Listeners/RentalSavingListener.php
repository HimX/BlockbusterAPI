<?php

namespace App\Listeners;

use App\Domain\Rental\Calculator\Factory as RentalCalculatorFactory;
use App\Events\RentalSaving;
use App\Models\Client;
use App\Models\Invoice;
use App\Models\Movie;

class RentalSavingListener
{
    public function handle(RentalSaving $event)
    {
        $value = RentalCalculatorFactory::get($event->rental)->getValue();
        $event->rental->value = $value;
        $invoice = $event->rental->invoice;

        if (!$invoice instanceof Invoice) {
            return;
        }

        $invoice->value = $invoice->value + $value;
        $invoice->save();
        $client = $invoice->client;

        if (!$client instanceof Client) {
            return;
        }

        $movie = $event->rental->movie;
        $accumulator = ($movie->type === Movie::TYPE_NEW_RELEASE) ? config('app.client_score_new_release_accumulator') : config('app.client_score_general_accumulator');
        $client->score = $client->score + $accumulator;
        $client->save();
    }
}
