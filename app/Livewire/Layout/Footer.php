<?php

namespace App\Livewire\Layout;

use App\Models\Publik;
use Livewire\Component;

class Footer extends Component
{
    public $alamat;
    public $telephone;
    public $email;
    public $kerjasamas;
    public $wa;
    public $ig;

    public function mount()
    {
        $this->alamat = Publik::where('jenis', 'alamat')->get()[0]['data'];
        $this->telephone = Publik::where('jenis', 'telephone')->get()[0]['data'];
        $this->email = Publik::where('jenis', 'email')->get()[0]['data'];
        $this->kerjasamas = Publik::where('jenis', 'kerjasama')->get();
        $this->wa = Publik::where('jenis', 'wa')->get()[0]['data'];
        $this->ig = Publik::where('jenis', 'ig')->get()[0]['data'];
    }

    public function render()
    {
        return view('livewire.layout.footer');
    }
}
