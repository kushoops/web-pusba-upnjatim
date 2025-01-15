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
class StrukturOrganisasi extends Component
{
    use WithFileUploads;
    
    public $jenis='struktur-organisasi';
    #[Validate('image|max:1024')]
    public $foto;
    public $fotoLama;

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
                $updated = Publik::where('jenis','struktur organisasi')->update([
                    'data' => $generateNewName,
                ]);
    
                if($updated) {
                    return redirect('/data-publik/profil/'.$this->jenis)->with('message', 'Foto berhasil diubah.');
                }
            }
        }
    }

    public function mount()
    {
        $this->fotoLama = Publik::where('jenis', 'struktur organisasi')->get()[0]['data'];
    }

    public function render()
    {
        return view('livewire.pages.admin.data-publik.profil.struktur-organisasi');
    }
}
