<?php

namespace App\Livewire\Pages\Admin\DataPublik\Informasi;

use Livewire\Component;
use App\Models\Informasi;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Storage;
use Livewire\WithPagination;

#[Layout('layouts/app')]
class Jenis extends Component
{
    use WithPagination;

    public $jenis;
    public $search='';

    public function deleteInformasi($id, $gambar)
    {
        if (Storage::delete('public/images/informasi/'.$this->jenis.'/'.$gambar)) {
            if (Informasi::where('id',$id)->delete()) {
                $this->mount($this->jenis);
            }
        }
    }

    public function toggleTampilkan($id, $tampilkan)
    {
        if($tampilkan) {
            Informasi::where('id',$id)->update(['tampilkan' => false]);
        }else {
            Informasi::where('id',$id)->update(['tampilkan' => true]);
        }
    }

    public function mount(string $jenis)
    {
        $this->jenis = $jenis;
    }

    public function render()
    {
        return view('livewire.pages.admin.data-publik.informasi.jenis', [
            'informasis' => Informasi::where([
                ['jenis', '=', $this->jenis],
                ['judul', 'like', '%'.$this->search.'%'],
            ])->orWhere([
                ['jenis', '=', $this->jenis],
                ['created_at', 'like', '%'.$this->search.'%'],
            ])->orderBy('created_at', 'desc')->paginate(10)
        ]);
    }
}
