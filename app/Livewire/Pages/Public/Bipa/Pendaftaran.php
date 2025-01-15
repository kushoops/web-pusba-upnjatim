<?php

namespace App\Livewire\Pages\Public\Bipa;

use App\Models\Publik;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.public')]
class Pendaftaran extends Component
{
    public $pendaftaran;

    public function mount()
    {
        $this->pendaftaran = implode('<br>', explode('<p></p>', Publik::where('jenis', 'pendaftaran')->get()[0]['data']));
    }

    public function render()
    {
        return view('livewire.pages.public.bipa.pendaftaran');
    }
}
