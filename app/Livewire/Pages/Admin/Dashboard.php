<?php

namespace App\Livewire\Pages\Admin;

use App\Models\Informasi;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts/app')]
class Dashboard extends Component
{
    public $agenda;
    public $pengumuman;
    public $berita;

    public function mount()
    {
        $this->agenda = Informasi::where('jenis', 'agenda')->get();
        $this->pengumuman = Informasi::where('jenis', 'pengumuman')->get();
        $this->berita = Informasi::where('jenis', 'berita')->get();
    }

    public function render()
    {
        return view('livewire.pages.admin.dashboard');
    }
}