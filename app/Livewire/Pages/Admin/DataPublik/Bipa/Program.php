<?php

namespace App\Livewire\Pages\Admin\DataPublik\Bipa;

use App\Models\Publik;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
class Program extends Component
{
    public $jenis='program';
    public $program;
    public $quillId;

    public function updateProgram()
    {
        $updated = Publik::where('jenis','program')->update([
            'data' => $this->program,
        ]);

        if($updated) {
            return redirect('/data-publik/bipa/'.$this->jenis)->with('message', 'Program berhasil diubah.');
        }
    }

    public function mount()
    {
        $this->quillId = 'quill-'.uniqid();
        $this->program = Publik::where('jenis', 'program')->get()[0]['data'];
    }

    public function render()
    {
        return view('livewire.pages.admin.data-publik.bipa.program');
    }
}
