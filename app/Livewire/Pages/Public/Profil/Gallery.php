<?php

namespace App\Livewire\Pages\Public\Profil;

use App\Models\Publik;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts/public')]
class Gallery extends Component
{
    public $galleries;

    public function mount()
    {
        $this->galleries = Publik::where('jenis', 'gallery')->get();
    }
    public function render()
    {
        return view('livewire.pages.public.profil.gallery');
    }
}
