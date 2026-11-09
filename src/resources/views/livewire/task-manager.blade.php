<section>
    <div class="hero">
        <div>
            <h1>مرحباً بك في مَهامي 🌷</h1>
            <p class="subtitle">رتّب يومك، وتابع إنجازاتك، وأنجز أهدافك بخطوات بسيطة.</p>
        </div>
    </div>

    <div class="stats">
        <div class="stat"><span class="stat-label">كل المهام</span><span class="stat-number">{{ $totalTasks }}</span></div>
        <div class="stat"><span class="stat-label">المهام المكتملة</span><span class="stat-number">{{ $completedTasks }}</span></div>
        <div class="stat"><span class="stat-label">المهام المعلّقة</span><span class="stat-number">{{ $pendingTasks }}</span></div>
    </div>

    @if (session()->has('message'))
        <div class="flash">{{ session('message') }}</div>
    @endif

    <div class="panel">
        <h2>＋ أضيفي مهمة جديدة</h2>
        <form wire:submit="addTask">
            <div class="form-grid">
                <div>
                    <input class="field" type="text" wire:model="title" placeholder="عنوان المهمة..." maxlength="120">
                    @error('title') <div class="error">{{ $message }}</div> @enderror
                </div>
                <div>
                    <input class="field" type="text" wire:model="description" placeholder="وصف مختصر (اختياري)...">
                    @error('description') <div class="error">{{ $message }}</div> @enderror
                </div>
                <button class="btn btn-primary" type="submit">إضافة المهمة</button>
            </div>
        </form>
    </div>

    <div class="panel">
        <h2>قائمة مهامي ✨</h2>

        @if ($tasks->isEmpty())
            <div class="empty">لا توجد مهام حتى الآن. ابدئي بإضافة أول مهمة لكِ 💗</div>
        @else
            <div class="task-list">
                @foreach ($tasks as $task)
                    <article class="task-card {{ $task->is_completed ? 'completed' : '' }}" wire:key="task-{{ $task->id }}">
                        @if ($editingId === $task->id)
                            <div class="edit-box">
                                <div>
                                    <input class="field" type="text" wire:model="editTitle" placeholder="عنوان المهمة">
                                    @error('editTitle') <div class="error">{{ $message }}</div> @enderror
                                </div>
                                <div>
                                    <input class="field" type="text" wire:model="editDescription" placeholder="الوصف">
                                    @error('editDescription') <div class="error">{{ $message }}</div> @enderror
                                </div>
                                <div class="actions">
                                    <button class="btn btn-primary" wire:click="updateTask">حفظ</button>
                                    <button class="btn btn-light" wire:click="cancelEditing">إلغاء</button>
                                </div>
                            </div>
                        @else
                            <div class="task-main">
                                <input class="task-check" type="checkbox" wire:click="toggleTask({{ $task->id }})" @checked($task->is_completed) aria-label="تغيير حالة المهمة">
                                <div>
                                    <div class="task-title">{{ $task->title }}</div>
                                    @if ($task->description)
                                        <div class="task-description">{{ $task->description }}</div>
                                    @endif
                                    <span class="status">{{ $task->is_completed ? 'مكتملة' : 'قيد التنفيذ' }}</span>
                                </div>
                            </div>
                            <div class="actions">
                                <button class="btn btn-light" wire:click="startEditing({{ $task->id }})">تعديل</button>
                                <button class="btn btn-danger" wire:click="deleteTask({{ $task->id }})" wire:confirm="هل أنت متأكد من حذف هذه المهمة؟">حذف</button>
                            </div>
                        @endif
                    </article>
                @endforeach
            </div>
        @endif
    </div>
</section>
