<?php

namespace App\Livewire\Admin\Settings;

use Livewire\Component;

class Profile extends Component
{
 

    public function render()
    {
        return view('livewire.admin.settings.profile')->layout('livewire.admin.app');
    }
}
