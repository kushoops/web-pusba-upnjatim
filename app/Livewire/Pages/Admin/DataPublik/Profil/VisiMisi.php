<?php

namespace App\Livewire\Pages\Admin\DataPublik\Profil;

use App\Models\Publik;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
class VisiMisi extends Component
{
    public $jenis='visi-misi';
    public $visiMisi;
    public $quillId;

    public function updateVisiMisi()
    {
        $updated = Publik::where('jenis','visi misi')->update([
            'data' => $this->visiMisi,
        ]);

        if($updated) {
            return redirect('/data-publik/profil/'.$this->jenis)->with('message', 'Visi misi berhasil diubah.');
        }
    }

    public function mount()
    {
        $this->quillId = 'quill-'.uniqid();
        $this->visiMisi = Publik::where('jenis', 'visi misi')->get()[0]['data'];
    }

    public function render()
    {
        return view('livewire.pages.admin.data-publik.profil.visi-misi');
    }
}