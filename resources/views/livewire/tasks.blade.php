<div class="container my-3">
    <form wire:submit.prevent={{"saveTask"}}>
        <div class="form-group my-2">
            <label for="title" class="form-label">Название: </label>
            <input type="text" id="title" wire:model="title" class="form-control">
            @error('title')
                <span class="text-danger my-2">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group my-2">
            <label for="description" class="form-label">Описание: </label>
            <input type="text" id="description" wire:model="description" class="form-control">
            @error('description')
                <span class="text-danger my-2">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group my-2">
            <label for="priority" class="form-label">Приоритет: </label>
            <select id="priority" wire:model="priority" class="form-select">
                <option disabled selected>Выберите приоритет...</option>
                <option value="1">Низкий</option>
                <option value="2">Средний</option>
                <option value="3">Высокий</option>
            </select>
            @error('priority')
                <span class="text-danger my-2">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group my-2">
            <label for="due_date" class="form-label">Выполнить до: </label>
            <input type="datetime-local" id="due_date" wire:model="due_date" class="form-control">
            @error('due_date')
                <span class="text-danger my-2">{{$message}}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-outline-success my-2">Добавить задачу</button>
    </form>

    @if (!empty($tasks))
    <table class="table table-striped table-hover align-middle my-3">
        <thead>
            <tr class="table-info">
                <th>Название</th>
                <th class="w-50">Описание</th>
                <th>Времени осталось</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tasks as $task)
            <tr class="{{$task->priority == 1 ? 'table-success' : ($task->priority == 2 ? 'table-warning' : 'table-danger')}}">
                <td>{{$task->title}}</td>
                <td>{{$task->description}}</td>
                <td>
                    <span wire:poll.500ms>{{$task->remaining_time}}</span>
                </td>
                <td>
                    <button class="btn btn-sm btn-success me-3">
                        <span class="material-symbols-outlined">
                            check
                        </span>
                    </button>
                    <button class="btn btn-sm btn-warning me-3">
                        <span class="material-symbols-outlined">
                            edit
                        </span>
                    </button>
                    <button class="btn btn-sm btn-danger">
                        <span class="material-symbols-outlined">
                            delete
                        </span>
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <div class="alert alert-success my-5" role="alert">
        Нет задач на выполнение!
      </div>
    @endif
</div>
