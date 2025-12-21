<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Category;

class ProductList extends Component
{
    public $showProducts = false;

    public $product_id;
    public $category_id;
    public $name;
    public $price;
    public $quantity;

    public $categories = [];
    public $showModal = false;

    protected $rules = [
        'category_id' => 'required|exists:categories,id',
        'name' => 'required|string|max:255',
        'price' => 'required|numeric|min:0',
        'quantity' => 'required|integer|min:0',
    ];

    public function mount()
    {
        $this->categories = Category::all();
    }

    public function toggleProducts()
    {
        $this->showProducts = !$this->showProducts;
    }

    // Open modal and load product data
    public function editProduct($id)
    {
        $product = Product::findOrFail($id);

        $this->product_id = $product->id;
        $this->category_id = $product->category_id;
        $this->name = $product->name;
        $this->price = $product->price;
        $this->quantity = $product->quantity;

        $this->showModal = true;
    }

    // Update product
    public function updateProduct()
    {
        $this->validate();

        Product::where('id', $this->product_id)->update([
            'category_id' => $this->category_id,
            'name' => $this->name,
            'price' => $this->price,
            'quantity' => $this->quantity,
        ]);

        $this->showModal = false;
        $this->resetForm();

        session()->flash('success', 'Product updated successfully!');
    }

    public function deleteProduct($id)
    {
        Product::findOrFail($id)->delete();
        session()->flash('success', 'Product deleted successfully!');
    }

    public function resetForm()
    {
        $this->reset(['product_id', 'category_id', 'name', 'price', 'quantity']);
    }

    public function render()
    {
        return view('livewire.product-list', [
            'products' => Product::with('category')->latest()->get()
        ]);
    }
}
