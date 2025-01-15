<?php

namespace App\Livewire\Pages\Public\Layanan;

use App\Models\Publik;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts/public')]
class PelatihanBahasa extends Component
{
    public $pelatihanBahasa;

    public function mount()
    {
        $this->pelatihanBahasa = implode('<br>', explode('<p></p>', Publik::where('jenis', 'pelatihan bahasa')->get()[0]['data']));
    }

    public function render()
    {
        return view('livewire.pages.public.layanan.pelatihan-bahasa');
    }
}
