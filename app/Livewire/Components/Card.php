<?php

namespace App\Livewire\Components;

use Livewire\Component;

class Card extends Component
{
    public $id;
    public $jenis;
    public $judul;
    public $gambar;
    public $deskripsi;
    public $created_at;

    public function render()
    {
        return view('livewire.components.card');
    }
}
