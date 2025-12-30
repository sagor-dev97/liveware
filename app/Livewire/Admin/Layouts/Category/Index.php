<?php

namespace App\Livewire\Admin\Layouts\Category;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.admin.layouts.category.index')->layout('livewire.admin.app');
    }
}
