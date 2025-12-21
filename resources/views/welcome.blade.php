<!DOCTYPE html>
<html>
<head>
    <title>Livewire Product Form</title>
    {{-- @livewireStyles --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
 <livewire:category-form />
     <div class="card-body">
    <livewire:product-form />
    <hr>
    <livewire:product-list />
</div>

    @livewireScripts
    <script src="//unpkg.com/alpinejs" defer></script>
</body>
</html>