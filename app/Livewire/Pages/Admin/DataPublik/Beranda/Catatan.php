<?php

namespace App\Livewire\Pages\Admin\DataPublik\Beranda;

use App\Models\Publik;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts/app')]
class Catatan extends Component
{
    public $jenis='catatan';
    public $judul;
    public $deskripsi;
    public $quillId;

    public function updateCatatan()
    {
        Publik::where('jenis', 'catatan judul')->update(['data' => $this->judul]);
        Publik::where('jenis', 'catatan deskripsi')->update(['data' => $this->deskripsi]);
        return redirect('/data-publik/beranda/'.$this->jenis)->with('message', 'Catatan berhasil diubah.');
    }

    public function mount()
    {
        $this->quillId = 'quill-'.uniqid();
        $this->judul = Publik::where('jenis', 'catatan judul')->get()[0]['data'];
        $this->deskripsi = Publik::where('jenis', 'catatan deskripsi')->get()[0]['data'];
    }

    public function render()
    {
        return view('livewire.pages.admin.data-publik.beranda.catatan');
    }
}
