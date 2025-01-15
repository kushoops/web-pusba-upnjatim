<?php

namespace App\Livewire\Pages\Admin\DataPublik\Beranda;

use App\Models\Publik;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts/app')]
class Layanan extends Component
{
    public $jenis='layanan';
    public $deskripsi;
    public $tesBahasa;
    public $penerjemahan;
    public $pelatihanBahasa;

    public function updateLayanan()
    {
        Publik::where('jenis', 'layanan')->update(['data' => $this->deskripsi]);
        Publik::where('jenis', 'layanan 1')->update(['data' => $this->tesBahasa]);
        Publik::where('jenis', 'layanan 2')->update(['data' => $this->penerjemahan]);
        Publik::where('jenis', 'layanan 3')->update(['data' => $this->pelatihanBahasa]);
        $this->mount();
    }

    public function mount()
    {
        $this->deskripsi = Publik::where('jenis', 'layanan')->get()[0]['data'];
        $this->tesBahasa = Publik::where('jenis', 'layanan 1')->get()[0]['data'];
        $this->penerjemahan = Publik::where('jenis', 'layanan 2')->get()[0]['data'];
        $this->pelatihanBahasa = Publik::where('jenis', 'layanan 3')->get()[0]['data'];
    }

    public function render()
    {
        return view('livewire.pages.admin.data-publik.beranda.layanan');
    }
}
