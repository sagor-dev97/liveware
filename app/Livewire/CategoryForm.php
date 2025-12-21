<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;

class CategoryForm extends Component
{
    public $name;
    public $showForm = false;

    protected $rules = [
        'name' => 'required|string|max:255|unique:categories,name'
    ];

    public function toggleForm()
    {
        $this->showForm = !$this->showForm;
    }

    public function submit()
    {
        $this->validate();

        Category::create([
            'name' => $this->name
        ]);

        $this->reset('name');

        session()->flash('success', 'Category created successfully!');
    }

    public function render()
    {
        return view('livewire.category-form');
    }
}
