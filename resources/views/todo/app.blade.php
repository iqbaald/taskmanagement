@extends('layouts/app')

@section('content')

    <div class="container mt-4">
        <!-- 01. Content-->
        <h1 class="text-center mb-4">To Do List</h1>
        <div class="row justify-content-center">
            <div class="col-md-8">
             <div class="card mb-3">
                <div class="card-body">
                
                    @include('components/message')

                    <!-- 02. Form input data -->
                        <form id="todo-form" action="{{ route('admin.todo.userId.post', ['user_id' => $user_id]) }}" method="post">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="task" id="todo-input"
                                placeholder="Tambah task baru" required value="{{ old('task') }}">
                            <button class="btn btn-primary" type="submit">
                                Simpan
                            </button>
                        </div>
                    </form>
                  </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <!-- 03. Searching -->
                        {{-- <form id="todo-form" action="{{ route('admin.todo.search') }}" method="get">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="search" value="{{ request('search') }}" 
                                    placeholder="masukkan kata kunci">
                                <button class="btn btn-secondary" type="submit">
                                    Cari
                                </button>
                            </div>
                        </form> --}}
                        
                        <ul class="list-group mb-4" id="todo-list">
                            <!-- 04. Display Data -->
                            
                            @foreach ($data as $item)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span class="task-text">
                                    {!! $item->is_done == 1 ? '<del>' : '' !!} 
                                        {{ $item->task }}
                                    {!! $item->is_done == 1 ? '</del>' : '' !!} 
                                </span>
                                <input type="text" class="form-control edit-input" style="display: none;"
                                    value="{{ $item->task }}">
                                <div class="btn-group">
                                    <form action="{{ route('admin.todo.delete',['id'=>$item->id]) }}" method="POST"
                                        onsubmit="return confirm('Apakah yakin akan dihapus?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm delete-btn">✕</button>
                                    </form>
                                    <div>
                                        <button class="btn btn-primary btn-sm edit-btn" data-bs-toggle="collapse"
                                        data-bs-target="#collapse-{{ $loop->index }}" aria-expanded="false">✎</button>
                                    </div>
                                </div>
                            </li>
                            <!-- 05. Update Data -->
                            <li class="list-group-item collapse" id="collapse-{{ $loop->index }}">
                                <form action="{{ route('admin.todo.update', ['id' => $item->id]) }}" method="POST" class="bg-light">
                                    @csrf
                                    @method('PUT')
                                
                                    <div class="mb-3">
                                        <label for="task" class="form-label fw-bold">Tugas</label>
                                        <div class="input-group">
                                            <input 
                                                type="text" 
                                                class="form-control" 
                                                name="task" 
                                                id="task" 
                                                value="{{ $item->task }}" 
                                                placeholder="Masukkan deskripsi tugas">
                                        </div>
                                    </div>
                                
                                    <div class="mb-3">
                                        <label for="userComent" class="form-label fw-bold">Keterangan</label>
                                        <input 
                                            name="user_comment" 
                                            id="userComent" 
                                            class="form-control" 
                                            placeholder="Tugas belum dikerjakan" 
                                            rows="4" 
                                            value="{{ $item->user_comment }}"
                                            readonly>
                                    </div>
                                
                                    @if ($item->proof_file_path)
                                        <div class="mb-3 d-flex flex-column">
                                            <label class="form-label fw-bold">Bukti Pengerjaan</label>
                                            <img 
                                                src="{{ asset('/assets/img/todo/' . $item->proof_file_path) }}" 
                                                alt="{{ $item->task }}" 
                                                class="img-fluid rounded" 
                                                style="width: 300px;">
                                        </div>
                                    @endif
                                
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Status</label>
                                        <div class="d-flex">
                                            <div class="form-check me-3">
                                                <input 
                                                    type="radio" 
                                                    class="form-check-input" 
                                                    name="is_done" 
                                                    id="done" 
                                                    value="1" 
                                                    {{ $item->is_done == '1' ? 'checked' : '' }}>
                                                <label for="done" class="form-check-label">Selesai</label>
                                            </div>
                                            <div class="form-check">
                                                <input 
                                                    type="radio" 
                                                    class="form-check-input" 
                                                    name="is_done" 
                                                    id="not_done" 
                                                    value="0" 
                                                    {{ $item->is_done == '0' ? 'checked' : '' }}>
                                                <label for="not_done" class="form-check-label">Belum</label>
                                            </div>
                                        </div>
                                    </div>
                                
                                    <div class="mb-3">
                                        <label for="adminFeedback" class="form-label fw-bold">Feedback</label>
                                        <textarea 
                                            name="admin_feedback" 
                                            id="adminFeedback" 
                                            class="form-control" 
                                            rows="4" 
                                            placeholder="Masukkan feedback untuk pengguna">{{ $item->admin_feedback }}</textarea>
                                    </div>
                                
                                    <div class="mt-4">
                                        <button type="submit" class="btn btn-primary w-100">Update</button>
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