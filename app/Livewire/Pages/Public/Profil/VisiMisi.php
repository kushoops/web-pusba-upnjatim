<?php

namespace App\Livewire\Pages\Public\Profil;

use App\Models\Publik;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts/public')]
class VisiMisi extends Component
{
    public $visiMisi;

    public function mount()
    {
        $this->visiMisi = implode('<br>', explode('<p></p>', Publik::where('jenis', 'visi misi')->get()[0]['data']));
    }

    public function render()
    {
        return view('livewire.pages.public.profil.visi-misi');
    }
}
