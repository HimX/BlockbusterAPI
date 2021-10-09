<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Invoice;
use App\Models\Rental;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        return response()->json(Client::all());
    }

    public function showOne($id)
    {
        return response()->json(Client::find($id));
    }

    public function create(Request $request)
    {
        $rental = Client::create($request->all());
        return response()->json($rental, 201);
    }

    public function rentSeveralMovies($id, Request $request)
    {
        /** @var Client $client */
        $client = Client::findOrFail($id);

        $movies = $request->input('movies', null);

        if (!is_array($movies)) {
            return response()->json(['message' => 'There must be a "movies" array for this request'], 400);
        }

        $invoice = new Invoice();
        $invoice->client()->associate($client);
        $invoice->saveOrFail();
        $movieInstances = [];

        foreach ($movies as $movie) {
            $movieInstances[] = new Rental($movie);
        }

        $invoice->rentals()->saveMany($movieInstances);
        $invoice = Invoice::where('id', $invoice->id)->with('rentals')->get();
        return response()->json($invoice);
    }
}
