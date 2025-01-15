<?php

namespace App\Livewire\Pages\Admin\DataPublik\Profil;

use App\Models\Pengajar as ModelsPengajar;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;

#[Layout('layouts.app')]
class Pengajar extends Component
{
    public $jenis='pengajar';
    public $id;
    #[Validate('required')]
    public $dosen;
    #[Validate('required')]
    public $matkul;
    public $pengajars = [];

    public function createPengajar()
    {
        $this->validate([ 
            'dosen' => 'required',
            'matkul' => 'required',
        ]);

        $created = ModelsPengajar::create([
            'dosen' => $this->dosen,
            'matkul' => $this->matkul,
        ]);

        if($created) {
            $this->resetProperties();
            return redirect()->route('data-publik.profil.'.$this->jenis)->with('message', 'Pengajar berhasil ditambahkan.');
        }
    }

    public function setPengajar($id, $dosen, $matkul)
    {
        $this->id = $id;
        $this->dosen = $dosen;
        $this->matkul = $matkul;
    }

    public function updatePengajar()
    {
        $this->validate([ 
            'dosen' => 'required',
            'matkul' => 'required',
        ]);

        $updated = ModelsPengajar::where('id',$this->id)->update([
            'dosen' => $this->dosen,
            'matkul' => $this->matkul,
        ]);

        if($updated) {
            $this->resetProperties();
            return redirect()->route('data-publik.profil.'.$this->jenis)->with('message', 'Pengajar berhasil diubah.');
        }
    }

    public function deletePengajar($id)
    {
        if (ModelsPengajar::where('id',$id)->delete()) {
            $this->mount();
        }
    }

    public function resetProperties()
    {
        $this->pull(['id','dosen','matkul']);
    }

    public function mount()
    {
        $this->pengajars = ModelsPengajar::all();
    }

    public function render()
    {
        return view('livewire.pages.admin.data-publik.profil.pengajar');
    }
}
