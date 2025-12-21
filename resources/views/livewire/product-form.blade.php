<div class="container mt-5">

    {{-- Button --}}
    <button class="btn btn-success mb-3" wire:click="toggleForm">
        {{ $showForm ? 'Close Form' : 'Add Product' }}
    </button>

    {{-- Success Message --}}
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Product Form --}}
    @if ($showForm)
        <div class="card p-4">
            <form wire:submit.prevent="submit">

{{-- Category --}}
    <div class="mb-3">
        <label>Category</label>
        <select class="form-control" wire:model="category_id">
            <option value="">-- Select Category --</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>


                <div class="mb-3">
                    <label>Name</label>
                    <input type="text" class="form-control" wire:model="name">
                    @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="mb-3">
                    <label>Description</label>
                    <textarea class="form-control" wire:model="description"></textarea>
                </div>

                <div class="mb-3">
                    <label>Price</label>
                    <input type="number" class="form-control" wire:model="price" step="0.01">
                    @error('price') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="mb-3">
                    <label>Quantity</label>
                    <input type="number" class="form-control" wire:model="quantity">
                    @error('quantity') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <button class="btn btn-primary">Save Product</button>
            </form>
        </div>
    @endif
</div>
