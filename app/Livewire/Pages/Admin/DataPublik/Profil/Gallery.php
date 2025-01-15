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
class Gallery extends Component
{
    use WithFileUploads;

    public $jenis='gallery';
    #[Validate('required|unique:publiks,data|image|max:1024')]
    public $data;
    public $oldData;
    public $galleries = [];

    public function createPublik()
    {
        $this->validate([ 
            'data' => 'required|unique:publiks,data|image|max:1024',
        ]);

        $array = explode('.', $this->data->getClientOriginalName());
        $generateNewName = Str::slug(reset($array)).'-'.time().'.'.end($array);
        $uploaded = $this->data->storeAs(path: 'public/images/gallery', name: $generateNewName);

        if ($uploaded) {
            $created = Publik::create([
                'jenis' => $this->jenis,
                'data' => $generateNewName,
            ]);

            if($created) {
                return redirect()->route('data-publik.profil.gallery')->with('message', 'Gambar berhasil ditambahkan.');
            }
        }

    }

    public function setOldData($data)
    {
        $this->oldData = $data;
    }

    public function updatePublik()
    {
        $this->validate([ 
            'data' => 'required|unique:publiks,data|image|max:1024',
        ]);

        $deleted = Storage::delete('public/images/gallery/'.$this->oldData);

        if ($deleted) {
            $array = explode('.', $this->data->getClientOriginalName());
            $generateNewName = Str::slug(reset($array)).'-'.time().'.'.end($array);
            $uploaded = $this->data->storeAs(path: 'public/images/gallery', name: $generateNewName);
            
            if ($uploaded) {
                $updated = Publik::where('data',$this->oldData)->update(['data' => $generateNewName]);
    
                if($updated) {
                    return redirect()->route('data-publik.profil.gallery')->with('message', 'Gambar berhasil diubah.');
                }
            }
        }


    }

    public function deletePublik($id, $data)
    {
        if (Storage::delete('public/images/gallery/'.$data)) {
            if (Publik::where('id',$id)->delete()) {
                return redirect()->route('data-publik.profil.gallery')->with('message', 'Gambar berhasil dihapus.');
            }
        }
    }

    public function mount()
    {
        $this->galleries = Publik::where('jenis',$this->jenis)->get();
    }

    public function render()
    {
        return view('livewire.pages.admin.data-publik.profil.gallery');
    }
}