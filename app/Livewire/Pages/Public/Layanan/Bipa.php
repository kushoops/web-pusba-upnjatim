<?php

namespace App\Livewire\Pages\Public\Layanan;

use App\Models\Publik;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts/public')]
class Bipa extends Component
{
    public $bipaGambar;
    public $bipa;

    public function mount()
    {
        $this->bipaGambar = Publik::where('jenis', 'bipa gambar')->get()[0]['data'];
        $this->bipa = implode('<br>', explode('<p></p>', Publik::where('jenis', 'bipa')->get()[0]['data']));
    }

    public function render()
    {
        return view('livewire.pages.public.layanan.bipa');
    }
}
