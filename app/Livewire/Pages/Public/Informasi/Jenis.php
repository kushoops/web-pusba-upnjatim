<?php

namespace App\Livewire\Pages\Public\Informasi;

use Livewire\Component;
use App\Models\Informasi;
use Livewire\Attributes\Layout;

#[Layout('layouts.public')]
class Jenis extends Component
{
    public $id;
    public $jenis;
    public $search='';
    public $judul;
    public $gambar;
    public $deskripsi;
    public $created_at;

    public function mount($jenis, $id=null)
    {
        $this->jenis = $jenis;
        if ($id) {
            $this->id = $id;
            $informasi = Informasi::where([['id','=',$id],['jenis','=',$this->jenis],['tampilkan', '=', true]])->get();
            if (empty($informasi[0])) {return abort(404);}
            $this->judul = $informasi[0]['judul'];
            $this->gambar = $informasi[0]['gambar'];
            $this->deskripsi = implode('<br>', explode('<p></p>', $informasi[0]['deskripsi']));
            $this->created_at = $informasi[0]['created_at'];
        }
    }

    public function render()
    {
        return view('livewire.pages.public.informasi.jenis', [
            'jeniss' => Informasi::where([
                ['jenis', '=', $this->jenis],
                ['judul', 'like', '%'.$this->search.'%'],
                ['tampilkan', '=', true]
            ])->orWhere([
                ['jenis', '=', $this->jenis],
                ['created_at', 'like', '%'.$this->search.'%'],
                ['tampilkan', '=', true]
            ])->orderBy('created_at', 'desc')->paginate(10)
        ]);
    }
}
