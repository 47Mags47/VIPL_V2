<?php

namespace App\Livewire\Table;

use App\Models\Main\Raport as MainRaport;
use Livewire\Component;

class Raport extends Component
{
    public function render()
    {
        $raports = MainRaport::orderBy('created_at', 'desc')->get();
        return view('livewire.table.raport', compact('raports'));
    }
}
