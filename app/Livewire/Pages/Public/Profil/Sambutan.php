<?php

namespace App\Livewire\Pages\Public\Profil;

use App\Models\Publik;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts/public')]
class Sambutan extends Component
{
    public $sambutan;
    public $fotoKepala;
    public $namaKepala;

    public function mount()
    {
        $this->sambutan = implode('<br>', explode('<p></p>', Publik::where('jenis', 'sambutan')->get()[0]['data']));
        $this->fotoKepala = Publik::where('jenis', 'foto kepala')->get()[0]['data'];
        $this->namaKepala = Publik::where('jenis', 'nama kepala')->get()[0]['data'];
    }

    public function render()
    {
        return view('livewire.pages.public.profil.sambutan');
    }
}
