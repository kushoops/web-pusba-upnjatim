<?php

namespace App\Livewire\Pages\Admin\DataPublik\Layanan;

use App\Models\Publik;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
class PelatihanBahasa extends Component
{
    public $jenis='pelatihan-bahasa';
    public $pelatihanBahasa;
    public $quillId;

    public function updatePelatihanBahasa()
    {
        $updated = Publik::where('jenis','pelatihan bahasa')->update([
            'data' => $this->pelatihanBahasa,
        ]);

        if($updated) {
            return redirect('/data-publik/layanan/'.$this->jenis)->with('message', 'Pelatihan bahasa berhasil diubah.');
        }
    }

    public function mount()
    {
        $this->quillId = 'quill-'.uniqid();
        $this->pelatihanBahasa = Publik::where('jenis', 'pelatihan bahasa')->get()[0]['data'];
    }

    public function render()
    {
        return view('livewire.pages.admin.data-publik.layanan.pelatihan-bahasa');
    }
}
