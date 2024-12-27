<?php

namespace App\Livewire;

use App\Models\Task;
use Carbon\Carbon;
use Livewire\Component;

class Tasks extends Component
{
    public $id;
    public $title, $description, $priority, $due_date;
    public $tasks;

    //монтирование компонента
    public function mount() {
        $this->loadTasks();
        $this->updateRemainingTime();
    }

    private function loadTasks() {
        $this->tasks = Task::all();
    }

    public function saveTask() {
        $validated = $this->validate([
            "title" => "required|string|max:100",
            "description" => "required|string",
            "priority" => "required|integer",
            "due_date" => "required|date"
        ]);

        Task::create($validated);
        $this->loadTasks();
        $this->resetInputFields();
        $this->updateRemainingTime();
    }

    public function resetInputFields() {
        $this->title = "";
        $this->description = "";
        $this->priority = "";
        $this->due_date = "";
        $this->id = null;
    }

    public function updateRemainingTime() {
        foreach($this->tasks as $task) {
            $deadline = Carbon::parse($task->due_date);
            $remaining_seconds = Carbon::now()->diffInSeconds($deadline, true);

            if($remaining_seconds > 0) {
                $days = floor($remaining_seconds / 86400);
                $hours = floor(($remaining_seconds % 86400) / 3600);
                $minutes = floor(($remaining_seconds % 3600) / 60);
                $seconds = $remaining_seconds % 60;
                $task->remaining_time = sprintf("%d дней %02d:%02d:%02d", $days, $hours, $minutes, $seconds);
            } else {
                $task->remaining_time = "00:00:00";
            }
        }
    }

    public function render()
    {
        $this->updateRemainingTime();
        return view('livewire.tasks')->layout("layouts.app");
    }
}
