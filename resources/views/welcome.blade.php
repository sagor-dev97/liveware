<!DOCTYPE html>
<html>

<head>
    <title>Livewire Product Form</title>
    {{-- @livewireStyles --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@flasher/flasher@latest/dist/flasher.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="card-body">
        <livewire:welcome />
    </div>

    @livewireScripts
    <script src="//unpkg.com/alpinejs" defer></script>


    <<script src="https://cdn.jsdelivr.net/npm/@flasher/flasher@latest/dist/flasher.min.js"></script>

    <script>
        window.addEventListener('flasher-message', event => {
            Flasher.get().add({
                type: event.detail.type, // success, error, info, warning
                message: event.detail.message
            });
        }); <
        />script> <
        /body> <
        /html>
