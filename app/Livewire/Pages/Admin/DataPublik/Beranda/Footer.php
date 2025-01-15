<?php

namespace App\Livewire\Pages\Admin\DataPublik\Beranda;

use App\Models\Publik;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;

#[Layout('layouts.app')]
class Footer extends Component
{
    public $jenis = 'footer';
    public $alamat;
    public $telephone;
    public $email;
    #[Validate('required')]
    public $kerjasama;
    public $kerjasamaId;
    public $kerjasamas;
    public $wa;
    public $ig;

    public function updateUPAPusatBahasa()
    {
        Publik::where('jenis', 'alamat')->update(['data' => $this->alamat]);
        Publik::where('jenis', 'telephone')->update(['data' => $this->telephone]);
        Publik::where('jenis', 'email')->update(['data' => $this->email]);

        $this->mount();
    }

    public function setNullKerjasama()
    {
        $this->kerjasama = null;
    }

    public function createKerjasama()
    {
        $this->validate([
            'kerjasama' => 'required',
        ]);

        $created = Publik::create([
            'jenis' => 'kerjasama',
            'data' => $this->kerjasama,
        ]);

        if($created) {
            return redirect()->route('data-publik.beranda.footer')->with('message', 'Kerja sama berhasil ditambahkan.');
        }
    }

    public function setKerjasamaId($id)
    {
        $this->kerjasamaId = $id;
        $this->kerjasama = Publik::where('id',$id)->get()[0]['data'];
    }

    public function updateKerjasama()
    {
        $this->validate([
            'kerjasama' => 'required',
        ]);

        Publik::where('id',$this->kerjasamaId)->update(['data' => $this->kerjasama]);

        $this->mount();
    }

    public function deleteKerjasama($id)
    {
        Publik::where('id',$id)->delete();
        $this->mount();
    }

    public function updateMediaSosial()
    {
        Publik::where('jenis', 'wa')->update(['data' => $this->wa]);
        Publik::where('jenis', 'ig')->update(['data' => $this->ig]);

        $this->mount();
    }

    public function mount()
    {
        $this->alamat = Publik::where('jenis','alamat')->get()[0]['data'];
        $this->telephone = Publik::where('jenis','telephone')->get()[0]['data'];
        $this->email = Publik::where('jenis','email')->get()[0]['data'];
        $this->kerjasamas = Publik::where('jenis','kerjasama')->get();
        $this->wa = Publik::where('jenis','wa')->get()[0]['data'];
        $this->ig = Publik::where('jenis','ig')->get()[0]['data'];
    }

    public function render()
    {
        return view('livewire.pages.admin.data-publik.beranda.footer');
    }
}
