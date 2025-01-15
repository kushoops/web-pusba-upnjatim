<?php

namespace App\Livewire\Pages\Admin;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class Settings extends Component
{
    public function render()
    {
        return view('livewire.pages.admin.settings');
    }
}
