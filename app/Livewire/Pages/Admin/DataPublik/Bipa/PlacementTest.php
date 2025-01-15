<?php

namespace App\Livewire\Pages\Admin\DataPublik\Bipa;

use App\Models\Publik;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
class PlacementTest extends Component
{
    public $jenis='placement-test';
    public $placementTest;
    public $quillId;

    public function updatePlacementTest()
    {
        $updated = Publik::where('jenis','placement test')->update([
            'data' => $this->placementTest,
        ]);

        if($updated) {
            return redirect('/data-publik/bipa/'.$this->jenis)->with('message', 'Placement test berhasil diubah.');
        }
    }

    public function mount()
    {
        $this->quillId = 'quill-'.uniqid();
        $this->placementTest = Publik::where('jenis', 'placement test')->get()[0]['data'];
    }

    public function render()
    {
        return view('livewire.pages.admin.data-publik.bipa.placement-test');
    }
}
