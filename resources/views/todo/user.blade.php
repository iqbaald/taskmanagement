@extends('layouts/app')

@section('content')

    <div class="container mt-4">
        <!-- 01. Content-->
        <h1 class="text-center mb-4">To Do List</h1>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">

                        @include('components/message')
                        <h5>Cari Tugas</h5>
                        <form id="todo-form" action="{{ route('todo') }}" method="get">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="search" value="{{ request('search') }}" 
                                    placeholder="masukkan kata kunci">
                                <button class="btn btn-secondary" type="submit">
                                    Cari
                                </button>
                            </div>
                        </form>
                        
                        @include('components/filter')

                        <ul class="list-group mb-4" id="todo-list">
                            <!-- 04. Display Data -->
                            
                            @foreach ($data as $item)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span class="task-text">
                                    {{ $item->task }}
                                </span>

                                <div class="btn-group">
                                    <span class="btn {{ $item->is_done == 1 ? 'bg-success' : 'bg-warning me-2 ' }} text-white">
                                        {{ $item->is_done == 1 ? 'Selesai' : 'Belum Selesai' }}
                                    </span>
                                    @if ($item->is_done != 1)
                                        <button class="btn btn-primary btn-sm edit-btn" data-bs-toggle="collapse"
                                        data-bs-target="#collapse-{{ $loop->index }}" aria-expanded="false">✎</button>
                                    @endif
                                </div>
                                <li class="list-group-item collapse" id="collapse-{{ $loop->index }}">
                                    <form action="{{ route('todo.update', $item->id) }}" method="POST" class="update-form bg-light" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')

                                        @if ($item->admin_feedback)
                                        <div class="mb-3">
                                            <label for="adminFeedback" class="form-label fw-bold">Feedback</label>
                                            <textarea 
                                                name="admin_feedback" 
                                                id="adminFeedback" 
                                                class="form-control" 
                                                rows="4" 
                                                readonly>{{ $item->admin_feedback }}</textarea>
                                        </div>
                                        @endif
                                        <div class="mb-3">
                                            <label for="userComent" class="form-label fw-bold">Keterangan</label>
                                            <textarea 
                                                name="user_comment" 
                                                id="userComent" 
                                                class="form-control" 
                                                placeholder="Tulis keterangan bahwa sudah menyelesaikan tugas" 
                                                rows="4">{{ $item->user_comment }}</textarea>
                                        </div>
                                    
                                        <div class="mb-3">
                                            <label for="todoPhoto" class="form-label fw-bold">Bukti Pengerjaan</label>
                                            <input 
                                                type="file" 
                                                class="form-control" 
                                                id="todoPhoto" 
                                                name="proof_file_path" 
                                                accept="image/*">
                                            <div class="form-text">Maksimal ukuran foto 2 MB</div>
                                        </div>
                                    
                                        <div class="mb-3">
                                            <button 
                                                type="submit" 
                                                class="btn btn-primary w-100">
                                                Kirim
                                            </button>
                                        </div>
                                    </form>
                            </li>
                            
                            @endforeach
                        </ul>
                        {{ $data->links() }}
                        
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection