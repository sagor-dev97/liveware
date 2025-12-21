<div class="container mt-5">

    <button class="btn btn-primary mb-3" wire:click="toggleForm">
        {{ $showForm ? 'Close Category Form' : 'Add Category' }}
    </button>

    @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($showForm)
        <div class="card p-4">
            <form wire:submit.prevent="submit">

                <div class="mb-3">
                    <label>Category Name</label>
                    <input type="text" class="form-control" wire:model="name">
                    @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <button class="btn btn-success">Save Category</button>
            </form>
        </div>
    @endif
</div>
