<?php

namespace App\Livewire\Pages\Admin\DataPublik;

use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Models\Faq as ModelsFaq;
use Livewire\Attributes\Validate;

#[Layout('layouts/app')]
class Faq extends Component
{
    public $id;
    #[Validate('required')]
    public $pertanyaan;
    #[Validate('required')]
    public $jawaban;
    public $faqs = [];

    public function createFaq()
    {
        $this->validate([ 
            'pertanyaan' => 'required',
            'jawaban' => 'required',
        ]);

        $created = ModelsFaq::create([
            'pertanyaan' => $this->pertanyaan,
            'jawaban' => $this->jawaban,
        ]);

        if($created) {
            $this->resetProperties();
            return redirect()->route('data-publik.faq')->with('message', 'FAQ berhasil ditambahkan.');
        }
    }

    public function setFaq($id, $pertanyaan, $jawaban)
    {
        $this->id = $id;
        $this->pertanyaan = $pertanyaan;
        $this->jawaban = $jawaban;
    }

    public function updateFaq()
    {
        $this->validate([ 
            'pertanyaan' => 'required',
            'jawaban' => 'required',
        ]);

        $updated = ModelsFaq::where('id',$this->id)->update([
            'pertanyaan' => $this->pertanyaan,
            'jawaban' => $this->jawaban,
        ]);

        if($updated) {
            $this->resetProperties();
            return redirect()->route('data-publik.faq')->with('message', 'FAQ berhasil diubah.');
        }
    }

    public function deleteFaq($id)
    {
        if (ModelsFaq::where('id',$id)->delete()) {
            $this->mount();
        }
    }

    public function resetProperties()
    {
        $this->pull(['id','pertanyaan','jawaban']);
    }

    public function mount()
    {
        $this->faqs = ModelsFaq::all();
    }

    public function render()
    {
        return view('livewire.pages.admin.data-publik.faq');
    }
}
