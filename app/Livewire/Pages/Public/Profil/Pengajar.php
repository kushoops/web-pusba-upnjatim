<?php

namespace App\Livewire\Pages\Public\Profil;

use App\Models\Pengajar as ModelsPengajar;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts/public')]
class Pengajar extends Component
{
    public $pengajars;

    public function mount()
    {
        $this->pengajars = ModelsPengajar::all();
    }
    public function render()
    {
        return view('livewire.pages.public.profil.pengajar');
    }
}
