<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $movies = Movie::with('actorPrincipal')->get();
        return view('movie.MovieIndex', [
            'movies' => $movies
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $actors = Actor::all();
        return view('movie.MovieCreate', [
            'actors' => $actors
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        
        $validatedData = $request->validate([
            'imagen' => 'sometimes|image',
            'titulo' => 'required|string|max:255',
            'anio' => 'sometimes|integer',
            'duracion' => 'sometimes|integer',
            'actorprincipal' => 'sometimes'
        ]);

        if ($validatedData) {
            $name_portada = time() . '-' . $request->file('imagen')->getClientOriginalName();
            $portada = $request->file('imagen')->storeAs('portadas', $name_portada, 'public');

            $newMovie = Movie::create([
                'MovieYear' => $validatedData['anio'],
                'MovieLength' => $validatedData['duracion'],
                'MovieTitle' => $validatedData['titulo'],
                'ActorPrincipalID' => $validatedData['actorprincipal'],
                'MovieImage' => $portada
            ]);
        }

        return redirect('movie');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
