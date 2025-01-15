<?php

namespace App\Livewire\Pages\Admin\DataPublik\Layanan;

use App\Models\Publik;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
class Ept extends Component
{
    public $jenis='ept';
    public $ept;
    public $quillId;

    public function updateEpt()
    {
        $updated = Publik::where('jenis','ept')->update([
            'data' => $this->ept,
        ]);

        if($updated) {
            return redirect('/data-publik/layanan/'.$this->jenis)->with('message', 'EPT berhasil diubah.');
        }
    }

    public function mount()
    {
        $this->quillId = 'quill-'.uniqid();
        $this->ept = Publik::where('jenis', 'ept')->get()[0]['data'];
    }

    public function render()
    {
        return view('livewire.pages.admin.data-publik.layanan.ept');
    }
}