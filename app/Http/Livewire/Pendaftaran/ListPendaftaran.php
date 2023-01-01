<?php

namespace App\Http\Livewire\Pendaftaran;

use Livewire\Component;

class ListPendaftaran extends Component
{
    public $pendaftaran;

    public function render()
    {
        return view('livewire.pendaftaran.list-pendaftaran');
    }
}
