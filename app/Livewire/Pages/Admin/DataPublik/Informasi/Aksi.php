<?php

namespace App\Livewire\Pages\Admin\DataPublik\Informasi;

use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Storage;
use App\Models\Informasi as ModelsInformasi;
use Livewire\Features\SupportFileUploads\WithFileUploads;

#[Layout('layouts/app')]
class Aksi extends Component
{
    use WithFileUploads;

    public $jenis;
    public $aksi;
    public $id;

    #[Validate('required')]
    public $deskripsi;
    public $quillId;

    #[Validate('required')]
    public $judul;
    #[Validate('required|unique:informasis,gambar|image|max:1024')]
    public $gambar;
    public $gambarLama;

    public $created_at;
    
    public function createInformasi()
    {
        $this->validate([ 
            'judul' => 'required',
            'gambar' => 'required|unique:informasis,gambar|image|max:1024',
            'deskripsi' => 'required',
        ]);

        $array = explode('.', $this->gambar->getClientOriginalName());
        $generateNewName = Str::slug(reset($array)).'-'.time().'.'.end($array);
        $uploaded = $this->gambar->storeAs(path: 'public/images/informasi/'.$this->jenis, name: $generateNewName);

        if ($uploaded) {
            $created = ModelsInformasi::create([
                'jenis' => $this->jenis,
                'judul' => $this->judul,
                'gambar' => $generateNewName,
                'deskripsi' => $this->deskripsi,
            ]);

            if($created) {
                return redirect('/data-publik/informasi/'.$this->jenis)->with('message', Str::title($this->jenis).' berhasil ditambahkan.');
            }
        }
    }

    public function updateInformasi()
    {
        if ($this->gambar == null) {
            $this->validate([ 
                'judul' => 'required',
                'deskripsi' => 'required',
            ]);

            $updated = ModelsInformasi::where('id',$this->id)->update([
                'judul' => $this->judul,
                'deskripsi' => $this->deskripsi,
            ]);

            if($updated) {
                return redirect('/data-publik/informasi/'.$this->jenis)->with('message', Str::title($this->jenis).' berhasil diubah.');
            }
        }else {
            $this->validate([ 
                'judul' => 'required',
                'gambar' => 'required|unique:informasis,gambar|image|max:1024',
                'deskripsi' => 'required',
            ]);

            $array = explode('.', $this->gambar->getClientOriginalName());
            $generateNewName = Str::slug(reset($array)).'-'.time().'.'.end($array);

            if (Storage::delete('public/images/informasi/'.$this->jenis.'/'.$this->gambarLama)) {
                $uploaded = $this->gambar->storeAs(path: 'public/images/informasi/'.$this->jenis, name: $generateNewName);
                if ($uploaded) {
                    $updated = ModelsInformasi::where('id',$this->id)->update([
                        'judul' => $this->judul,
                        'gambar' => $generateNewName,
                        'deskripsi' => $this->deskripsi,
                    ]);
        
                    if($updated) {
                        return redirect('/data-publik/informasi/'.$this->jenis)->with('message', Str::title($this->jenis).' berhasil diubah.');
                    }
                }
            }
        }
    }

    public function mount(string $jenis, string $aksi, int $id = null)
    {
        $this->jenis = $jenis;
        $this->aksi = $aksi;
        $this->id = $id;

        $this->deskripsi = html_entity_decode($this->deskripsi);
        $this->quillId = 'quill-'.uniqid();

        if ($this->aksi == 'ubah') {
            $this->judul = ModelsInformasi::where('id',$id)->get()[0]['judul'];
            $this->gambarLama = ModelsInformasi::where('id',$id)->get()[0]['gambar'];
            $this->deskripsi = ModelsInformasi::where('id',$id)->get()[0]['deskripsi'];
        }

        if ($id && $this->aksi=='lihat') {
            $this->id = $id;
            $informasi = ModelsInformasi::where([['id','=',$id],['jenis','=',$this->jenis]])->get();
            if (empty($informasi[0])) {return abort(404);}
            $this->judul = $informasi[0]['judul'];
            $this->gambar = $informasi[0]['gambar'];
            $this->deskripsi = implode('<br>', explode('<p></p>', $informasi[0]['deskripsi']));
            $this->created_at = $informasi[0]['created_at'];
        }
    }

    public function render()
    {
        return view('livewire.pages.admin.data-publik.informasi.aksi');
    }
}
