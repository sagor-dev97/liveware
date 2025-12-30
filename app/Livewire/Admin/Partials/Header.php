<?php

namespace App\Livewire\Admin\Partials;

use Livewire\Component;

class Header extends Component
{

    public function goToProfile()
    {
        return redirect()->route('profile');
    }
    
    public function render()
    {
        return view('livewire.admin.partials.header');
    }
}
