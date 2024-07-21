<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ActorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $actors = Actor::all();
        return view('actor.ActorIndex', [
            'actors' => $actors
        ]);
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        return view('actor.actorCreate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'fecha_nacimiento' => 'sometimes|date'
        ]);
        $actor = $request->all();
        $newActor = Actor::create([
            'ActorName' => $validatedData['nombre'],
            'ActorBirthday' => $validatedData['fecha_nacimiento']
        ]);

        return redirect('/actor');
    }

    /**
     * Display the specified resource.
     */
    public function show(Actor $actor)
    {
        //
        return view('actor.ActorShow', [
            'actor' => $actor
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Actor $actor)
    {
        //
        return view('actor.ActorUpdate', [
            'actor' => $actor
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Actor $actor)
    {
        //

        try {

            $dataValidated = $request->validate([
                'ActorName' => 'sometimes|string|max:255',
                'ActorBirthday' => 'sometimes|date'
            ]);
            $actor->update($dataValidated);

            return $actor;
        } catch (ValidationException $e) {
            return abort(400, $e->validator->errors()->all());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
