<?php

namespace App\Livewire\Pages\Admin\DataPublik\Bipa;

use App\Models\Publik;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
class Pendaftaran extends Component
{
    public $jenis='pendaftaran';
    public $pendaftaran;
    public $quillId;

    public function updatePendaftaran()
    {
        $updated = Publik::where('jenis','pendaftaran')->update([
            'data' => $this->pendaftaran,
        ]);

        if($updated) {
            return redirect('/data-publik/bipa/'.$this->jenis)->with('message', 'Pendaftaran berhasil diubah.');
        }
    }

    public function mount()
    {
        $this->quillId = 'quill-'.uniqid();
        $this->pendaftaran = Publik::where('jenis', 'pendaftaran')->get()[0]['data'];
    }

    public function render()
    {
        return view('livewire.pages.admin.data-publik.bipa.pendaftaran');
    }
}
