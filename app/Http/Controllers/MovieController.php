<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Rules\MovieType;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index(Request $request)
    {
        $movies = (new Movie())->newQuery();

        if ($request->has('type')) {
            $movies->where('type', '=', $request->input('type'));
        }

        return response()->json($movies->get());
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'type' => ['required', 'string', new MovieType()]
        ]);
        $movie = Movie::create($request->all());

        return response()->json($movie, 201);
    }

    public function update($id, Request $request)
    {
        $movie = Movie::findOrFail($id);
        $movie->update($request->all());

        return response()->json($movie, 200);
    }

    public function delete($id)
    {
        Movie::findOrFail($id)->delete();
        return response('Deleted Successfully', 200);
    }

    public function showOne($id)
    {
        $movie = Movie::findOrFail($id);
        return response($movie);
    }
}
