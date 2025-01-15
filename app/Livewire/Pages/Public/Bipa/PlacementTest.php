<?php

namespace App\Livewire\Pages\Public\Bipa;

use App\Models\Publik;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.public')]
class PlacementTest extends Component
{
    public $placementTest;

    public function mount()
    {
        $this->placementTest = implode('<br>', explode('<p></p>', Publik::where('jenis', 'placement test')->get()[0]['data']));
    }

    public function render()
    {
        return view('livewire.pages.public.bipa.placement-test');
    }
}
