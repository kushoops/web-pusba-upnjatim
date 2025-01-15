<?php

namespace App\Livewire\Pages\Admin\DataPublik\Profil;

use App\Models\Publik;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Storage;
use Livewire\Features\SupportFileUploads\WithFileUploads;

#[Layout('layouts.app')]
class Sambutan extends Component
{
    use WithFileUploads;

    public $jenis='sambutan';
    #[Validate('image|max:1024')]
    public $foto;
    public $fotoLama;
    public $nama;
    public $sambutan;
    public $quillId;

    public function updateFoto()
    {
        if ($this->foto) {
            $this->validate([
                'foto' => 'image|max:1024',
            ]);

            $array = explode('.', $this->foto->getClientOriginalName());
            $generateNewName = Str::slug(reset($array)).'-'.time().'.'.end($array);

            Storage::delete('public/images/'.$this->fotoLama);
            $uploaded = $this->foto->storeAs(path: 'public/images/', name: $generateNewName);
            if ($uploaded) {
                $updated = Publik::where('jenis','foto kepala')->update([
                    'data' => $generateNewName,
                ]);
    
                if($updated) {
                    return redirect('/data-publik/profil/'.$this->jenis)->with('message', 'Foto berhasil diubah.');
                }
            }
        }
    }

    public function updateSambutan()
    {
        Publik::where('jenis','sambutan')->update([
            'data' => $this->sambutan,
        ]);
        Publik::where('jenis','nama kepala')->update([
            'data' => $this->nama,
        ]);

        return redirect('/data-publik/profil/'.$this->jenis)->with('message', 'Sambutan berhasil diubah.');
    }

    public function mount()
    {
        $this->quillId = 'quill-'.uniqid();
        $this->fotoLama = Publik::where('jenis', 'foto kepala')->get()[0]['data'];
        $this->nama = Publik::where('jenis', 'nama kepala')->get()[0]['data'];
        $this->sambutan = Publik::where('jenis', 'sambutan')->get()[0]['data'];
    }

    public function render()
    {
        return view('livewire.pages.admin.data-publik.profil.sambutan');
    }
}
