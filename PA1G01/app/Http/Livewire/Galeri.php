<?php

namespace App\Http\Livewire;

use App\Models\Galery;
use Livewire\Component;

class Galeri extends Component
{
    public $search;

    public function render()
    {
        $galeri = Galery::when($this->search, function ($query) {
            $query->where('nama', 'like', '%' . $this->search . '%');
        })->get();

        return view('livewire.galeri', compact('galeri'));
    }

    public function filterData()
    {
        // Menjalankan pemrosesan pencarian
        $this->render();
    }
}
