<?php

namespace App\Livewire\Pages\Public\Informasi;

use App\Models\Publik;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.public')]
class JadwalTes extends Component
{
    public $jadwalTes;

    public function mount()
    {
        $this->jadwalTes = implode('<br>', explode('<p></p>', Publik::where('jenis', 'jadwal tes')->get()[0]['data']));
    }

    public function render()
    {
        return view('livewire.pages.public.informasi.jadwal-tes');
    }
}
