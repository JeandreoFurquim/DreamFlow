
<div class="bg-white rounded p-0 d-flex align-items-center justify-content-between mb-2 shadow-list dmk-tasks h-45px task-list task-on-subtask" data-task="{{ $task->id }}">
    <div class="d-flex align-items-center justify-content-between w-100 h-100">
        <div class="d-flex align-items-center h-100 w-100">
            <div style="background: {{ $task->project->color }};" class="rounded-start h-100 d-flex align-items-center color-task task-icons">
                <div class="form-check form-check-custom form-check-solid py-2 px-5">
                    <input class="form-check-input w-15px h-15px cursor-pointer check-task task-main" data-task="{{ $task->id }}" type="checkbox" value="1" style="border-radius: 3px" @if($task->checked == true) checked @endif/>
                    <span class="show-task" data-task="{{ !$task->task_id ? $task->id : $task->task_id }}">
                        <i class="fa-solid fa-eye p-1 fs-5 text-white ms-5 cursor-pointer zoom-hover zoom-hover-03"></i>
                    </span>
                    <i class="fa-solid p-1 fa-list-check p-1 fs-5 text-white ms-3 cursor-pointer zoom-hover zoom-hover-03 add-subtasks" data-task="{{ $task->id }}" data-project="{{ $task->project->id }}"></i>
                    <span class="stand-by" data-task="{{ $task->id }}">
                        <i class="fa-solid fa-hourglass-start p-1 fs-5 text-white ms-3 cursor-pointer zoom-hover zoom-hover-03"></i>
                    </span>
                    <span class="tasks-destroy" data-task="{{ $task->id }}">
                        <i class="fa-solid p-1 fa-trash-alt fs-5 text-white ms-3 cursor-pointer zoom-hover zoom-hover-03"></i>
                    </span>
                </div>
            </div>
            <div class="d-flex align-items-center h-100 w-100 div-name-task z-index-9">
                <div class="d-block min-w-md-300px w-100 px-3 px-md-0 ms-5">
                    <input type="text" class="text-gray-600 fs-6 lh-1 fw-normal p-0 m-0 border-0 w-100 input-name" maxlength="80" value="{{ $task->name }}" name="name" data-task="{{ $task->id }}" id="rename-task-{{ $task->id }}">
                    <div class="input-phrase" @if($task->phrase == '') style="display: none;" @endif>
                        <input type="text" class="text-gray-500 fs-6 lh-1 fw-normal p-0 m-0 border-0 w-100 fs-7 d-flex task-phrase z-index-9 h-15px mt-n1" maxlength="255" name="phrase" value="{{ $task->phrase }}" @if($task->phrase == '') style="border-bottom: dashed 1px #bbbdcb63 !important;" @endif data-task="{{ $task->id }}">
                    </div>
                </div>
            </div>
        </div>
        @if ($task->comments->count())
        <span>
            <i class="fa-regular fa-comments text-gray-300 p-2 ms-5"></i>
        </span>
        @endif
        @if ($task->subtasks->where('status', true)->count())
        <i class="fa-solid fa-angle-right p-2 cursor-pointer text-gray-300 show-subtasks rotate @if($task->open_subtasks) rotate-90 @endif" data-task="{{ $task->id }}"></i>
        @endif
        @if ($task->task_id)
        <i class="fa-solid fa-diagram-predecessor pe-2 text-gray-300" data-bs-toggle="tooltip" title="{{ $task->father->name }}"></i>
        @endif
        <span class="task-priority d-none d-md-flex" data-task="{{ $task->id }}">
        <i class="fa-solid fa-font-awesome p-2 
            @if ($task->priority == 0)
            text-gray-300
            @elseif($task->priority == 1)
            text-warning
            @elseif($task->priority == 2)
            text-info
            @elseif($task->priority == 3)
            text-danger
            @endif
            cursor-pointer me-5"></i>
        </span>
    </div>
    <div class="d-flex align-items-center h-100 d-none d-md-flex">
        <div class="separator-vertical h-100"></div>
        <div class="w-125px text-center designated-div">
            <div class="symbol symbol-30px symbol-circle cursor-pointer" data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-start">
                <div class="symbol symbol-25px symbol-circle me-2">
                    <img alt="Pic" src="{{ findImage('users/' . $task->designated_id . '/' . 'perfil-35px.jpg') }}" class="designated">
                </div>
                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-250px py-4" data-kt-menu="true">
                @foreach ($users as $user)
                <div class="menu-item px-3">
                    <a href="{{ route('tasks.designated') }}" class="menu-link px-3 py-1 task-designated" data-task="{{ $task->id }}" data-designated="{{ $user->id }}">
                        <div class="cursor-pointer symbol symbol-25px symbol-md-35px">
                            <div class="symbol symbol-25px symbol-circle me-2">
                                <img alt="Pic" src="{{ findImage('users/' . $user->id . '/' . 'perfil-35px.jpg') }}">
                            </div>
                        </div>
                        <span class="ms-4">
                        {{ $user->name }}
                        </span>
                    </a>
                </div>
                @endforeach
                </div>
            </div>
        </div>
        <div class="d-flex p-0 align-items-center justify-content-center cursor-pointer h-100 w-200px rounded-0 actual-project" style="background: {{ $task->project->color }}">
            <div class="w-100 h-100 d-flex align-items-center justify-content-center" data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-start">
                <p class="text-white fw-bold m-0 text-center project-name">{{ $task->project->name }}</p>
                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-250px py-4" data-kt-menu="true" style="">
                    @foreach ($projects as $project)
                    <div class="menu-item px-3 mb-2">
                        <span data-task="{{ $task->id }}" data-project="{{ $project->id }}" class="menu-link px-3 d-block text-center tasks-projects" style="background: {{ $project->color }}; color: white">
                        <span class="">{{ $project->name }}</span>
                        </span>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="d-flex p-0 align-items-center cursor-pointer mx-4 actual-status">
            <div class="w-100 h-100 d-flex align-items-center" data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-start">
                <div class="h-15px w-15px rounded-sm status-icon" style="background: {{ $task->statusInfo->color }}"></div>
                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-250px py-4" data-kt-menu="true" style="">
                    @foreach ($task->project->statuses as $status)
                    <div class="menu-item px-3 mb-2">
                        <span data-task="{{ $task->id }}" data-status="{{ $status->id }}" class="menu-link px-3 d-block text-center tasks-status" style="background: {{ $status->color }}; color: white">
                        <span class="">{{ $status->name }}</span>
                        </span>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="separator-vertical h-100"></div>
        <div class="position-relative opacity-1">
            <input type="text" class="form-control border-0 form-control-sm flatpickr w-auto text-center w-200px task-date task-date-{{ $task->id }} 
            @if(date('Y-m-d', strtotime($task->date)) == date('Y-m-d'))
                text-success
            @elseif(strtotime($task->date) < time())
                text-danger
            @elseif(\Carbon\Carbon::parse($task->date)->diffInDays() <= 2)
                text-primary
            @else
                text-gray-700
            @endif" data-task="{{ $task->id }}" placeholder="Prazo da tarefa" value="@if($task->date) {{ date('Y-m-d H:i:s', strtotime($task->date)) }} @endif"/>
            <i class="fa-solid fa-calendar-xmark text-hover-primary text-gray-300 py-2 px-3 fs-7 position-absolute opacity-0 cursor-pointer remove-date" data-task={{ $task->id }}" style="top: 15%; right: 0"></i>
        </div>
        <div class="separator-vertical h-100"></div>
        <div>
            <i class="fa-solid fa-arrows-to-dot text-hover-primary py-2 px-3 mx-3 fs-6 draggable-handle"></i>
        </div>
    </div>
</div>