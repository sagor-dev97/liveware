<div class="container mt-4">

    <button class="btn btn-dark mb-3" wire:click="toggleProducts">
        {{ $showProducts ? 'Hide Products' : 'View Products' }}
    </button>

    @if (session()->has('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Product Table --}}
    @if ($showProducts)
        <div class="card">
            <div class="card-body p-0">
                <table class="table table-bordered mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Category</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Qty</th>
                            <th width="120">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($products as $product)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $product->category->name ?? '-' }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->quantity }}</td>
                                <td class="text-center">

                                    {{-- Edit --}}
                                <td class="text-center">
                                    {{-- Edit --}}
                                    <button class="btn btn-sm btn-warning"
                                        wire:click="editProduct({{ $product->id }})">
                                        ✏️
                                    </button>

                                    {{-- Delete with SweetAlert --}}
                                    <button class="btn btn-sm btn-danger" onclick="confirmDelete({{ $product->id }})">
                                        🗑
                                    </button>
                                </td>


                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">No products found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    @endif

    {{-- Edit Modal --}}
    @if ($showModal)
        <div class="modal fade show d-block" style="background: rgba(0,0,0,0.5);">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-header bg-warning">
                        <h5 class="modal-title">Edit Product</h5>
                        <button type="button" class="btn-close" wire:click="$set('showModal', false)"></button>
                    </div>

                    <div class="modal-body">
                        <form wire:submit.prevent="updateProduct">

                            <div class="mb-3">
                                <label>Category</label>
                                <select class="form-control" wire:model="category_id">
                                    <option value="">-- Select Category --</option>
                                    @foreach ($categories as $cat)
                                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label>Name</label>
                                <input type="text" class="form-control" wire:model="name">
                            </div>

                            <div class="mb-3">
                                <label>Price</label>
                                <input type="number" class="form-control" wire:model="price">
                            </div>

                            <div class="mb-3">
                                <label>Quantity</label>
                                <input type="number" class="form-control" wire:model="quantity">
                            </div>

                            <button class="btn btn-primary">Update</button>
                            <button type="button" class="btn btn-secondary"
                                wire:click="$set('showModal', false)">Cancel</button>

                        </form>
                    </div>

                </div>
            </div>
        </div>
    @endif

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function confirmDelete(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    @this.deleteProduct(id); // Livewire method call
                }
            });
        }
    </script>

</div>
