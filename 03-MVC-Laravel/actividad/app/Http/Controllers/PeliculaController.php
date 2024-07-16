<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use App\Models\Pelicula;
use Illuminate\Http\Request;

class PeliculaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $peliculasFavoritas = Pelicula::with('actorprincipal')->where('favorito', true)->orderBy('titulo')->get();
        $peliculas = Pelicula::with('actorprincipal')->orderByDesc('favorito')->get();
        $title = 'Peliculas';
        return view('pelicula.index', compact('peliculas', 'peliculasFavoritas','title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $actors = Actor::all();
        $title = 'Peliculas - Crear';
        return view('pelicula.create', compact('actors', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'titulo' => 'required|string|max:255',
            'anio' => 'required|int',
            'sipnosis' => 'required|max:255',
            'duracion' => 'required|int',
            'actorprincipal' => 'required|exists:actors,id'
        ]);





        if ($validated) {
            $name_portada = time() . '-' . $request->file('imagen')->getClientOriginalName();
            $portada = $request->file('imagen')->storeAs('portadas', $name_portada, 'public');
            //Todo hacer que reemplace caracteres especiales y espacios por _
            // $pelicula = new Pelicula([
            //     'titulo' => $validated['titulo'],
            //     'duracion' => $validated['duracion'],
            //     'sipnosis' => $validated['sipnosis'],
            //     'anio' => $validated['anio'],
            //     'actorprincipal_id' => $validated['actorprincipal'],
            //     'imagen' => $portada,
            // ]);
            $pelicula = Pelicula::create([
                'titulo' => $validated['titulo'],
                'duracion' => $validated['duracion'],
                'sipnosis' => $validated['sipnosis'],
                'anio' => $validated['anio'],
                'actorprincipal_id' => $validated['actorprincipal'],
                'imagen' => $portada,
            ]);


            return redirect(route('pelicula.index'));
        }


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $pelicula = Pelicula::find($id);
        return view('pelicula.show', compact('pelicula'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pelicula $pelicula)
    {
        // $pelicula = Pelicula::find($id);
        $actors = Actor::all();
        // $title = "Peliculas - Editar";
        return view('pelicula.edit', compact('pelicula', 'actors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pelicula $pelicula)
    {


        $validated = $request->validate([
            'titulo' => 'sometimes|string|max:255',
            'anio' => 'sometimes|int',
            'sipnosis' => 'sometimes|max:255',
            'duracion' => 'sometimes|int',
            'actorprincipal' => 'sometimes|exists:actors,id'
        ]);



        if ($validated) {
            $dataUpdated = [
                'titulo' => $validated['titulo'] ?? $pelicula->titulo,
                'duracion' => $validated['duracion'] ?? $pelicula->duracion,
                'anio' => $validated['anio'] ?? $pelicula->anio,
                'sipnosis' => $validated['sipnosis'] ?? $pelicula->sipnosis,
                'actorprincipal_id' => $validated['actorprincipal'] ?? $pelicula->actorprincipal,
                'favorito' => $validated['favorito'] ?? $pelicula->favorito
            ];
            if ($request->hasFile('imagen')) {
                $name_portada = time() . '-' . $request->file('imagen')->getClientOriginalName();
                $portada = $request->file('imagen')->storeAs('portadas', $name_portada, 'public');
                $dataUpdated['imagen'] = $portada;
            }
            $pelicula->update($dataUpdated);
            return redirect(route('pelicula.index'));
        }
        return 'Estoy en problema';
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $pelicula = Pelicula::find($id);
        $pelicula->delete();
        return redirect(route('pelicula.index'));
    }


    public function updateFav(Request $request, Pelicula $pelicula) {
        $pelicula->update(['favorito' => !$pelicula->favorito]);
        return $pelicula;
    }



}
