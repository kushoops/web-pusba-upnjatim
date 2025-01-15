<?php

namespace App\Livewire\Pages\Public;

use App\Models\Informasi;
use App\Models\Publik;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.public')]
class Beranda extends Component
{
    public $carousels = [];
    public $layanan;
    public $layanan1;
    public $layanan2;
    public $layanan3;
    public $sambutan;
    public $namaKepala;
    public $fotoKepala;
    public $videos = [];
    public $catatanJudul;
    public $catatanDeskripsi;
    public $agendas = [];
    public $agendasNumber;
    public $pengumumans = [];
    public $pengumumansNumber;
    public $beritas = [];
    public $beritasNumber;

    public function mount()
    {
        $this->carousels = Publik::where('jenis','carousel')->get();
        $this->layanan = Publik::where('jenis','layanan')->get()[0]['data'];
        $this->layanan1 = Publik::where('jenis','layanan 1')->get()[0]['data'];
        $this->layanan2 = Publik::where('jenis','layanan 2')->get()[0]['data'];
        $this->layanan3 = Publik::where('jenis','layanan 3')->get()[0]['data'];
        $this->sambutan = Publik::where('jenis','sambutan singkat')->get()[0]['data'];
        $this->namaKepala = Publik::where('jenis','nama kepala')->get()[0]['data'];
        $this->fotoKepala = Publik::where('jenis','foto kepala')->get()[0]['data'];
        $this->videos = Publik::where('jenis','video')->get();
        $this->catatanJudul = Publik::where('jenis','catatan judul')->get()[0]['data'];
        $this->catatanDeskripsi = implode('<br>', explode('<p></p>', Publik::where('jenis','catatan deskripsi')->get()[0]['data']));
        $this->agendas = Informasi::where([['jenis','=','agenda'],['tampilkan','=',true]])->limit(6)->latest()->get();
        $this->agendasNumber = Informasi::where([['jenis','=','agenda'],['tampilkan','=',true]])->get()->count();
        $this->pengumumans = Informasi::where([['jenis','=','pengumuman'],['tampilkan','=',true]])->limit(6)->latest()->get();
        $this->pengumumansNumber = Informasi::where([['jenis','=','pengumuman'],['tampilkan','=',true]])->get()->count();
        $this->beritas = Informasi::where([['jenis','=','berita'],['tampilkan','=',true]])->limit(6)->latest()->get();
        $this->beritasNumber = Informasi::where([['jenis','=','berita'],['tampilkan','=',true]])->get()->count();
    }

    public function render()
    {
        return view('livewire.pages.public.beranda');
    }
}
