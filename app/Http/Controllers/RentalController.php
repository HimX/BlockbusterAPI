<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Rental;
use Illuminate\Http\Request;

class RentalController extends Controller
{
    public function create(Request $request)
    {
        $invoice = new Invoice($request->all());
        $invoice->save();
        $this->validate($request, [
            'movie_id' => 'required|exists:movies,id',
            'client_id' => 'required|exists:clients,id',
            'rental_date' => 'required|date',
            'devolution_date' => 'required|date|after:rental_date'
        ]);
        $rental = Rental::create($request->all());
        $invoice->rentals()->save($rental);
        return response()->json($invoice, 201);
    }
}
