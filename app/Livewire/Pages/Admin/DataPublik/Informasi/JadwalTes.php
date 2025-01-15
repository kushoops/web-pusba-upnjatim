<?php

namespace App\Livewire\Pages\Admin\DataPublik\Informasi;

use App\Models\Publik;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
class JadwalTes extends Component
{
    public $jenis='jadwal-tes';
    public $jadwalTes;
    public $quillId;

    public function updateJadwalTes()
    {
        $updated = Publik::where('jenis','jadwal tes')->update([
            'data' => $this->jadwalTes,
        ]);

        if($updated) {
            return redirect('/data-publik/informasi/'.$this->jenis)->with('message', 'Jadwal tes berhasil diubah.');
        }
    }

    public function mount()
    {
        $this->quillId = 'quill-'.uniqid();
        $this->jadwalTes = Publik::where('jenis', 'jadwal tes')->get()[0]['data'];
    }
    
    public function render()
    {
        return view('livewire.pages.admin.data-publik.informasi.jadwal-tes');
    }
}
