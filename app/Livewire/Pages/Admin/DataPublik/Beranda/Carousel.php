<?php

namespace App\Livewire\Pages\Admin\DataPublik\Beranda;

use App\Models\Publik;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Storage;

#[Layout('layouts/app')]
class Carousel extends Component
{
    use WithFileUploads;
    
    public $jenis='carousel';
    #[Validate('required|unique:publiks,data|image|max:1024')]
    public $data;
    public $oldData;
    public $carousels = [];

    public function createPublik()
    {
        $this->validate([ 
            'data' => 'required|unique:publiks,data|image|max:1024',
        ]);

        $array = explode('.', $this->data->getClientOriginalName());
        $generateNewName = Str::slug(reset($array)).'-'.time().'.'.end($array);
        $uploaded = $this->data->storeAs(path: 'public/images/carousel', name: $generateNewName);

        if ($uploaded) {
            $created = Publik::create([
                'jenis' => $this->jenis,
                'data' => $generateNewName,
            ]);

            if($created) {
                return redirect()->route('data-publik.beranda.carousel')->with('message', 'Gambar berhasil ditambahkan.');
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

        $deleted = Storage::delete('public/images/carousel/'.$this->oldData);

        if ($deleted) {
            $array = explode('.', $this->data->getClientOriginalName());
            $generateNewName = Str::slug(reset($array)).'-'.time().'.'.end($array);
            $uploaded = $this->data->storeAs(path: 'public/images/carousel', name: $generateNewName);
            
            if ($uploaded) {
                $updated = Publik::where('data',$this->oldData)->update(['data' => $generateNewName]);
    
                if($updated) {
                    return redirect()->route('data-publik.beranda.carousel')->with('message', 'Gambar berhasil diubah.');
                }
            }
        }


    }

    public function deletePublik($id, $data)
    {
        if (Storage::delete('public/images/carousel/'.$data)) {
            if (Publik::where('id',$id)->delete()) {
                return redirect()->route('data-publik.beranda.carousel')->with('message', 'Gambar berhasil dihapus.');
            }
        }
    }

    public function mount()
    {
        $this->carousels = Publik::where('jenis',$this->jenis)->get();
    }

    public function render()
    {
        return view('livewire.pages.admin.data-publik.beranda.carousel');
    }
}
