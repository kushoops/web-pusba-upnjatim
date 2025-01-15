<?php

namespace App\Livewire\Pages\Admin\DataPublik\Informasi;

use App\Models\Publik;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
class JadwalKelas extends Component
{
    public $jenis='jadwal-kelas';
    public $jadwalKelas;
    public $quillId;

    public function updateJadwalKelas()
    {
        $updated = Publik::where('jenis','jadwal kelas')->update([
            'data' => $this->jadwalKelas,
        ]);

        if($updated) {
            return redirect('/data-publik/informasi/'.$this->jenis)->with('message', 'Jadwal kelas berhasil diubah.');
        }
    }

    public function mount()
    {
        $this->quillId = 'quill-'.uniqid();
        $this->jadwalKelas = Publik::where('jenis', 'jadwal kelas')->get()[0]['data'];
    }
    
    public function render()
    {
        return view('livewire.pages.admin.data-publik.informasi.jadwal-kelas');
    }
}
