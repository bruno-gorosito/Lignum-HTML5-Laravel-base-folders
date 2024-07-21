<?php

namespace App\Livewire;

use App\Models\Actor;
use App\Models\Movie;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class TableMovie extends Component
{

    use WithFileUploads;

    #[Validate('sometimes|string|max:255')]
    public $title;
    #[Validate('sometimes|integer')]
    public $length;
    #[Validate('sometimes|integer')]
    public $year;

    public $actorPrincipal;
    public $image;
    public $movieID;
    public $modal = false;
    public $actors;
    public $typeModal;

    #[Validate('sometimes|nullable|image')]
    public $newImage;

    public function rules()
    {
        return [
            'actorPrincipal.ActorID' => Rule::exists('actor', 'ActorID')
        ];
    }

    public function messages()
    {
        return [
            'title.max' => 'Debe tener menos de 20 caracteres',
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function editMovie()
    {
        try {
            $this->validate();

            // dd($this);
            $movie = Movie::find($this->movieID);
            if ($this->newImage) {

                $name_portada = time() . '-' . $this->newImage->getClientOriginalName();
                $portada = '/storage/' . $this->newImage->storeAs('portadas', $name_portada, 'public');
            }
            $movie->update([
                'ActorPrincipalID' => $this->actorPrincipal ?? $movie->actorPrincipal->ActorID,
                'MovieTitle' => $this->title ?? $movie->MovieTitle,
                'MovieLength' => $this->length ?? $movie->MovieLength,
                'MovieYear' => $this->year ?? $movie->MovieYear,
                'MovieImage' => $portada ?? $movie->MovieImage
            ]);
            $this->cerrarModal();
        } catch (ValidationException $e) {
            // Manejar la excepción de validación
            // Por ejemplo, puedes devolver mensajes de error o redirigir a una página anterior
            dd($e->validator->errors()->all());
        }
    }

    public function modalVer(string $id)
    {
        $this->cargarDatos($id);
        $this->typeModal = 'show';
        $this->modal = true;
    }

    public function modalEditar(string $id)
    {
        $this->cargarDatos($id);
        $this->typeModal = 'edit';
        $this->modal = true;
    }

    public function cargarDatos(string $id)
    {
        $movie = Movie::with('actorPrincipal')->find($id);
        $this->title = $movie->MovieTitle;
        $this->length = $movie->MovieLength;
        $this->year = $movie->MovieYear;
        $this->actorPrincipal = $movie->actorPrincipal->ActorID;
        $this->image = $movie->MovieImage;
        $this->movieID = $movie->MovieID;
        $this->actors = Actor::all();
    }

    public function cerrarModal()
    {
        $this->typeModal = '';
        $this->modal = false;
        $this->title = "";
        $this->year = 0;
        $this->actorPrincipal = null;
        $this->newImage = null;
        $this->image = "";
        $this->length = 0;
    }

    public function render()
    {
        $movies = Movie::all();
        return view('livewire.table-movie', [
            'movies' => $movies
        ]);
    }
}
