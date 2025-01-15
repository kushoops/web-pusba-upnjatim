<?php

namespace App\Livewire\Pages\Public\Profil;

use App\Models\Publik;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts/public')]
class StrukturOrganisasi extends Component
{
    public $strukturOrganisasi;

    public function mount()
    {
        $this->strukturOrganisasi = Publik::where('jenis', 'struktur organisasi')->get()[0]['data'];
    }
    public function render()
    {
        return view('livewire.pages.public.profil.struktur-organisasi');
    }
}
