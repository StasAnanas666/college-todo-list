<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Livewire Todo List</title>
    @livewireStyles
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=check,delete,edit" />
</head>
<body>
    
    <nav class="mb-5 bg-dark py-3 sticky-top">
        <ul class="nav justify-content-center">
            <li class="nav-item">
                <a href="{{route("tasks")}}" wire:navigate class="nav-link text-light">Задачи</a>
            </li>
            <li class="nav-item">
                <a href="{{route("tasks")}}" wire:navigate class="nav-link text-light">Выполненные задачи</a>
            </li>
        </ul>
    </nav>

    <main>
        {{$slot}}
    </main>


    @livewireScripts
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>