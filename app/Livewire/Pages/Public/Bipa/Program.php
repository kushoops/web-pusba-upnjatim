<?php

namespace App\Livewire\Pages\Public\Bipa;

use App\Models\Publik;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.public')]
class Program extends Component
{
    public $program;

    public function mount()
    {
        $this->program = implode('<br>', explode('<p></p>', Publik::where('jenis', 'program')->get()[0]['data']));
    }

    public function render()
    {
        return view('livewire.pages.public.bipa.program');
    }
}
