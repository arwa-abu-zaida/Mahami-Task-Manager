<?php

namespace App\Livewire;

use App\Models\Task;
use Livewire\Component;

class TaskManager extends Component
{
    public string $title = '';
    public string $description = '';
    public ?int $editingId = null;
    public string $editTitle = '';
    public string $editDescription = '';

    protected function rules(): array
    {
        return [
            'title' => ['required', 'string', 'min:2', 'max:120'],
            'description' => ['nullable', 'string', 'max:1000'],
        ];
    }

    public function addTask(): void
    {
        $validated = $this->validate();

        Task::create($validated);

        $this->reset(['title', 'description']);
        session()->flash('message', 'تمت إضافة المهمة بنجاح 🌸');
    }

    public function startEditing(int $id): void
    {
        $task = Task::findOrFail($id);

        $this->editingId = $task->id;
        $this->editTitle = $task->title;
        $this->editDescription = $task->description ?? '';
    }

    public function updateTask(): void
    {
        $this->validate([
            'editTitle' => ['required', 'string', 'min:2', 'max:120'],
            'editDescription' => ['nullable', 'string', 'max:1000'],
        ]);

        Task::findOrFail($this->editingId)->update([
            'title' => $this->editTitle,
            'description' => $this->editDescription,
        ]);

        $this->cancelEditing();
        session()->flash('message', 'تم تحديث المهمة بنجاح 🌷');
    }

    public function cancelEditing(): void
    {
        $this->reset(['editingId', 'editTitle', 'editDescription']);
    }

    public function toggleTask(int $id): void
    {
        $task = Task::findOrFail($id);
        $task->update(['is_completed' => ! $task->is_completed]);
    }

    public function deleteTask(int $id): void
    {
        Task::findOrFail($id)->delete();
        session()->flash('message', 'تم حذف المهمة.');
    }

    public function render()
    {
        $tasks = Task::query()->latest()->get();

        return view('livewire.task-manager', [
            'tasks' => $tasks,
            'totalTasks' => $tasks->count(),
            'completedTasks' => $tasks->where('is_completed', true)->count(),
            'pendingTasks' => $tasks->where('is_completed', false)->count(),
        ])->layout('layouts.app');
    }
}
