<?php

namespace App\Livewire\Pages\Admin\DataPublik\Beranda;

use App\Models\Publik;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
class Sambutan extends Component
{
    public $jenis='sambutan';
    public $sambutan;

    public function updateSambutan()
    {
        Publik::where('jenis', 'sambutan singkat')->update(['data' => $this->sambutan]);
        $this->mount();
    }

    public function mount()
    {
        $this->sambutan = Publik::where('jenis', 'sambutan singkat')->get()[0]['data'];
    }

    public function render()
    {
        return view('livewire.pages.admin.data-publik.beranda.sambutan');
    }
}
