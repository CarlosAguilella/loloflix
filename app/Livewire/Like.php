<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Like extends Component
{

    public $film;

    public function ponerlike(){
        Auth::user()->films_liked()->toggle($this->film);
    }

    public function render()
    {
        return view('livewire.like');
    }
}
