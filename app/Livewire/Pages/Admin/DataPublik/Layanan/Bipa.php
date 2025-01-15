<?php

namespace App\Livewire\Pages\Admin\DataPublik\Layanan;

use App\Models\Publik;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Storage;
use Livewire\Features\SupportFileUploads\WithFileUploads;

#[Layout('layouts.app')]
class Bipa extends Component
{
    use WithFileUploads;

    public $jenis='bipa';
    public $gambar;
    public $gambarLama;
    public $bipa;
    public $quillId;

    public function updateGambar()
    {
        if ($this->gambar) {
            $this->validate([
                'gambar' => 'image|max:1024',
            ]);

            $array = explode('.', $this->gambar->getClientOriginalName());
            $generateNewName = Str::slug(reset($array)).'-'.time().'.'.end($array);

            Storage::delete('public/images/'.$this->gambarLama);
            $uploaded = $this->gambar->storeAs(path: 'public/images/', name: $generateNewName);
            if ($uploaded) {
                $updated = Publik::where('jenis','bipa gambar')->update([
                    'data' => $generateNewName,
                ]);
    
                if($updated) {
                    return redirect('/data-publik/layanan/'.$this->jenis)->with('message', 'Gambar berhasil diubah.');
                }
            }
        }
    }

    public function updateBipa()
    {
        $updated = Publik::where('jenis','bipa')->update([
            'data' => $this->bipa,
        ]);

        if($updated) {
            return redirect('/data-publik/layanan/'.$this->jenis)->with('message', 'BIPA berhasil diubah.');
        }
    }

    public function mount()
    {
        $this->quillId = 'quill-'.uniqid();
        $this->gambarLama = Publik::where('jenis', 'bipa gambar')->get()[0]['data'];
        $this->bipa = Publik::where('jenis', 'bipa')->get()[0]['data'];
    }

    public function render()
    {
        return view('livewire.pages.admin.data-publik.layanan.bipa');
    }
}
