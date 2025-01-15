<?php

namespace App\Livewire\Pages\Public\Informasi;

use App\Models\Publik;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.public')]
class PendaftaranEpt extends Component
{
    public $pendaftaranEpt;

    public function mount()
    {
        $this->pendaftaranEpt = implode('<br>', explode('<p></p>', Publik::where('jenis', 'pendaftaran ept')->get()[0]['data']));
    }

    public function render()
    {
        return view('livewire.pages.public.informasi.pendaftaran-ept');
    }
}
