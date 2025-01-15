<?php

namespace App\Livewire\Pages\Public\Informasi;

use App\Models\Publik;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.public')]
class JadwalKelas extends Component
{
    public $jadwalKelas;

    public function mount()
    {
        $this->jadwalKelas = implode('<br>', explode('<p></p>', Publik::where('jenis', 'jadwal kelas')->get()[0]['data']));
    }

    public function render()
    {
        return view('livewire.pages.public.informasi.jadwal-kelas');
    }
}
