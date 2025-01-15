<?php

namespace App\Livewire\Pages\Admin\DataPublik\Informasi;

use App\Models\Publik;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
class PendaftaranEpt extends Component
{
    public $jenis='pendaftaran-ept';
    public $pendaftaranEpt;
    public $quillId;

    public function updatePendaftaranEpt()
    {
        $updated = Publik::where('jenis','pendaftaran ept')->update([
            'data' => $this->pendaftaranEpt,
        ]);

        if($updated) {
            return redirect('/data-publik/informasi/'.$this->jenis)->with('message', 'Pendaftaran EPT berhasil diubah.');
        }
    }

    public function mount()
    {
        $this->quillId = 'quill-'.uniqid();
        $this->pendaftaranEpt = Publik::where('jenis', 'pendaftaran ept')->get()[0]['data'];
    }
    
    public function render()
    {
        return view('livewire.pages.admin.data-publik.informasi.pendaftaran-ept');
    }
}
