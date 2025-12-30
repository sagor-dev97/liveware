<?php

namespace App\Livewire\Admin\Layouts;

use Livewire\Component;

class Dashboard extends Component
{


    public function render()
    {
        return view('livewire.admin.layouts.dashboard')->layout('livewire.admin.app');;
    }
}
