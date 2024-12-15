@extends('layouts/app')

@section('content')

    <div class="container mt-4">
        <!-- 01. Content-->
        <h1 class="text-center mb-4">To Do List</h1>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <!-- 03. Searching -->
                        <form id="todo-form" action="{{ route('todo') }}" method="get">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="search" value="{{ request('search') }}" 
                                    placeholder="masukkan kata kunci">
                                <button class="btn btn-secondary" type="submit">
                                    Cari
                                </button>
                            </div>
                        </form>
                        
                        <ul class="list-group mb-4" id="todo-list">
                            <!-- 04. Display Data -->
                            
                            @foreach ($data as $item)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span class="task-text">
                                    {!! $item->is_done == 1 ? '<del>' : '' !!} 
                                        {{ $item->task }}
                                    {!! $item->is_done == 1 ? '</del>' : '' !!} 
                                </span>

                                <div class="btn-group">
                                    <form action="{{ route('todo.update',['id'=>$item->id]) }}" method="POST" class="update-form">
                                        @csrf
                                        @method('PUT')
                                        <div class="d-flex">
                                            <div class="radio px-2">
                                                <label>
                                                    <input type="radio" value="1" name="is_done" {{ $item->is_done == '1' ? 'checked' : '' }} onchange="submitForm(this)"> Selesai
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" value="0" name="is_done" {{ $item->is_done == '0' ? 'checked' : '' }} onchange="submitForm(this)"> Belum
                                                </label>
                                            </div>
                                        </div>
                                    </form>
                                </div>
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