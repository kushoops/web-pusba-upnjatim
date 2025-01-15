<?php

namespace App\Livewire\Components;

use Livewire\Component;
use Livewire\Attributes\On;

class Quill extends Component
{
    public $value;
    public $quillId;

    #[On('sendJawaban')]
    public function sendJawaban() {$this->dispatch('saveJawaban', value: $this->value);}

    public function mount(){
        $this->value = html_entity_decode($this->value);
        $this->quillId = 'quill-'.uniqid();
    }

    public function render()
    {
        return view('livewire.components.quill');
    }
}
