<?php

namespace App\Livewire\Pages\Public;

use App\Models\Faq as ModelsFaq;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.public')]
class Faq extends Component
{
    public $faqs = [];

    public function mount()
    {
        $this->faqs = ModelsFaq::all();
    }

    public function render()
    {
        return view('livewire.pages.public.faq');
    }
}
