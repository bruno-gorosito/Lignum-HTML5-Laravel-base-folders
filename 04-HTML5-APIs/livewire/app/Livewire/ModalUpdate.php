<?php

namespace App\Livewire;

use Livewire\Component;

class ModalUpdate extends Component
{

    public $use = false;
    public $title = false;

    public function useModal() {

    }

    public function render()
    {
        return view('livewire.modal-update');
    }
}
