<?php

namespace App\Livewire\Admin\Partials;

use Livewire\Component;

class Sidebar extends Component
{

    public function goToDashboard()
    {
        return redirect()->route('dashboard');
    }
    public function goToCategoryIndex()
    {
        return redirect()->route('category');
    }

    public function render()
    {
        return view('livewire.admin.partials.sidebar');
    }
}
