
<div class="mb-2 ms-12">
    <div class="bg-white rounded p-0 d-flex align-items-center justify-content-between mb-2 shadow-list dmk-tasks h-35px task-list task-on-subtask z-index-1" data-task="{{ $subtask->id }}">
       <div class="d-flex align-items-center justify-content-between w-100 h-100">
          <div class="d-flex align-items-center h-100 w-100 task-left-side">
             <div style="background: {{ $subtask->project->color }}" class="rounded-start h-100 w-40px d-flex align-items-center justify-content-center color-task">
                   <div class="form-check form-check-custom form-check-solid">
                      <input class="form-check-input w-15px h-15px cursor-pointer check-task" data-task="{{ $subtask->id }}" type="checkbox" value="1" style="border-radius: 3px" @if($subtask->checked == true) checked @endif/>
                   </div>
             </div>
             <div class="d-flex align-items-center h-100 w-100">
                <i class="fa-solid fa-ellipsis-vertical text-hover-primary cursor-pointer py-2 px-3 mx-3 fs-3"></i>
                <div class="d-block min-w-300px w-100">
                   <input type="text" class="text-gray-600 fs-6 lh-1 fw-normal p-0 m-0 border-0 w-100 task-name d-flex @if($subtask->checked == true) text-decoration-line-through @endif" value="{{ $subtask->name }}" name="name" data-task="{{ $subtask->id }}">
                </div>
             </div>
          </div>
          <span class="task-priority" data-task="{{ $subtask->id }}">
          <i class="fa-solid fa-font-awesome p-2 
             @if ($subtask->priority == 0)
             text-gray-300
             @elseif($subtask->priority == 1)
             text-warning
             @elseif($subtask->priority == 2)
             text-info
             @elseif($subtask->priority == 3)
             text-danger
             @endif
             cursor-pointer me-5"></i>
          </span>
       </div>
       <div class="d-flex align-items-center h-100">
          <!-- SEPARATOR -->
          <div class="separator-vertical h-100"></div>
          <!-- SEPARATOR -->
          <div class="w-125px text-center designated-div">
             <div class="symbol symbol-30px symbol-circle cursor-pointer" data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-start">
                <div class="symbol symbol-25px symbol-circle me-2">
                      <img alt="Pic" src="{{ findImage('users/' . $subtask->designated_id . '/' . 'perfil-35px.jpg') }}" class="designated">
                </div>
                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-250px py-4" data-kt-menu="true">
                   @foreach ($users as $user)
                   <div class="menu-item px-3">
                      <a href="{{ route('tasks.designated') }}" class="menu-link px-3 py-1 task-designated" data-task="{{ $subtask->id }}" data-designated="{{ $user->id }}">
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
          <div class="d-flex p-0 align-items-center justify-content-center cursor-pointer h-100 w-150px rounded-0 actual-status" style="background: {{ $subtask->statusInfo->color }}">
             <div class="w-100 h-100 d-flex align-items-center justify-content-center" data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-start">
                <p class="text-white fw-bold m-0 status-name">{{ $subtask->statusInfo->name }}</p>
                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-250px py-4" data-kt-menu="true" style="">
                      @foreach ($subtask->project->statuses as $status)
                      <div class="menu-item px-3 mb-2">
                         <span data-task="{{ $subtask->id }}" data-status="{{ $status->id }}" class="menu-link px-3 d-block text-center tasks-status" style="background: {{ $status->color }}; color: white">
                         <span class="">{{ $status->name }}</span>
                         </span>
                      </div>
                      @endforeach
                </div>
             </div>
          </div>
          <input type="text" class="form-control border-0 form-control-sm flatpickr w-auto text-center w-200px task-date" data-task="{{ $subtask->id }}" placeholder="Prazo da tarefa" value="@if($subtask->date) {{ date('Y-m-d H:i:s', strtotime($subtask->date)) }} @endif"/>
          <!-- SEPARATOR -->
          <div class="separator-vertical h-100"></div>
          <!-- SEPARATOR -->
          <div>
             <i class="fa-solid fa-arrows-to-dot text-hover-primary py-2 px-3 mx-3 fs-6 draggable-handle"></i>
          </div>
       </div>
    </div>
 </div>