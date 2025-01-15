<?php

namespace App\Livewire\Pages\Admin\DataPublik\Beranda;

use App\Models\Publik;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;

#[Layout('layouts/app')]
class Video extends Component
{
    use WithFileUploads;
    
    public $jenis='video';
    #[Validate('required|unique:publiks,data')]
    public $data;
    public $oldData;
    public $videos = [];

    public function createPublik()
    {
        $this->validate([ 
            'data' => 'required|unique:publiks,data',
        ]);

        $created = Publik::create([
            'jenis' => $this->jenis,
            'data' => $this->data,
        ]);

        if($created) {
            return redirect()->route('data-publik.beranda.video')->with('message', 'Video berhasil ditambahkan.');
        }

    }

    public function setNullData()
    {
        $this->data = null;
    }

    public function setOldData($data)
    {
        $this->oldData = $data;
        $this->data = $data;
    }

    public function updatePublik()
    {
        $this->validate([ 
            'data' => 'required|unique:publiks,data',
        ]);

        $updated = Publik::where('data',$this->oldData)->update(['data' => $this->data]);

        if($updated) {
            return redirect()->route('data-publik.beranda.video')->with('message', 'Video berhasil diubah.');
        }
    }

    public function deletePublik($id)
    {
        if (Publik::where('id',$id)->delete()) {
            return redirect()->route('data-publik.beranda.video')->with('message', 'Video berhasil dihapus.');
        }
    }

    public function mount()
    {
        $this->videos = Publik::where('jenis',$this->jenis)->get();
    }

    public function render()
    {
        return view('livewire.pages.admin.data-publik.beranda.video');
    }
}