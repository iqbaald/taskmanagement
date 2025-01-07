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
                        <form id="todo-form" action="{{ route('admin.todo.role.post', ['role' => $role]) }}" method="post">
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
                                <form action="{{ route('admin.todo.update',['id'=>$item->id]) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" name="task" value="{{ $item->task }}">
                                            <button class="btn btn-outline-primary" type="sumbit">Update</button>
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        <div class="radio px-2">
                                            <label>
                                                <input type="radio" value="1" name="is_done" {{ $item->is_done == '1' ? 'checked' : '' }}> Selesai
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" value="0" name="is_done" {{ $item->is_done == '0' ? 'checked' : '' }}> Belum
                                            </label>
                                        </div>
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