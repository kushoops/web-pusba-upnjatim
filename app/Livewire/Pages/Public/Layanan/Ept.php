<?php

namespace App\Livewire\Pages\Public\Layanan;

use App\Models\Publik;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts/public')]
class Ept extends Component
{
    public $ept;

    public function mount()
    {
        $this->ept = implode('<br>', explode('<p></p>', Publik::where('jenis', 'ept')->get()[0]['data']));
    }

    public function render()
    {
        return view('livewire.pages.public.layanan.ept');
    }
}
