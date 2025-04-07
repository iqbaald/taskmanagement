@extends('layouts.app')

@section('content')
<div class="container">
    <section>
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-12 col-xl-10">
                <div class="card mask-custom">
                <div class="card-body p-2 text-white">

                    <table class="table table-striped text-white mb-0">
                    <thead>
                        <tr>
                            <th scope="col">Nama</th>
                            <th scope="col"> </th>
                        <th scope="col">Role</th>
                        <th scope="col">Level Kesibukan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)                            
                            <tr class="fw-normal">
                                <th>
                                    <img src="{{ $user->profile_picture_link }}"
                                    alt="avatar 1" style="width: 45px; height: auto;">
                                    <span class="ms-2">{{ $user->username }}</span>
                                </th>
                                <td class="align-middle">
                                    @include('components/role')
                                </td>
                                <td class="align-middle">
                                    @include('components/task_count')
                                </td>
                                <td class="align-middle">
                                    <a href="{{ url('todo/' . $user->id) }}" class="btn btn-primary">View Task</a>
                                </td>
                            </tr>
                        @endforeach
                        
                    </tbody>
                    </table>
                </div>
                </div>  
            </div>
            </div>
        </div>
</div>
@endsection
