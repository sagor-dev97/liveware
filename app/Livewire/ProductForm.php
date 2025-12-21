<?php

namespace App\Livewire;

use App\Models\Product;
use App\Models\Category;
use Livewire\Component;

class ProductForm extends Component
{
    public $showForm = false;

    public $categories = [];
    public $category_id;

    public $name;
    public $description;
    public $price;
    public $quantity;

    protected $rules = [
        'category_id' => 'required|exists:categories,id',
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'price' => 'required|numeric|min:0',
        'quantity' => 'required|integer|min:0',
    ];

    // category load
    public function mount()
    {
        $this->categories = Category::select('id', 'name')->get();
    }

    public function toggleForm()
    {
        $this->showForm = !$this->showForm;
    }

    public function submit()
    {
        $this->validate();

        Product::create([
            'category_id' => $this->category_id,
            'name'        => $this->name,
            'description' => $this->description,
            'price'       => $this->price,
            'quantity'    => $this->quantity,
        ]);

        $this->reset([
            'category_id',
            'name',
            'description',
            'price',
            'quantity'
        ]);

        session()->flash('success', 'Product added under category!');
    }

    public function render()
    {
        $products = Product::with('category')->latest()->get();
        return view('livewire.product-form' , compact('products'));
    }
}
