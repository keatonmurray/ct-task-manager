@extends('layouts.layout')
@section('content')
    <section id="home">
        <div class="container">
            <h4 class="page-title mb-4">October To-do's</h4>
            <div class="row d-flex align-items-center justify-content-center my-4">
                <div class="col-12">
                    <div class="card shadow d-flex justify-content-center align-items-center">
                        <div class="card-body text-center">
                            <h5 class="card-title">{{ $task->task_name }}</h5> 
        
                            <p class="card-text">
                                <span class="badge bg-primary">Priority level: {{ $task->priority }}</span> 
                            </p>
                    
                            <p class="card-text">
                                <small class="text-muted">{{ $task->created_at }}</small>
                            </p>
                        </div>
                        <div class="d-flex">
                            <button class="btn btn-success float-end custom-btn me-1" type="button">
                                <a href="/edit/{{ $task->id }}" class="text-decoration-none text-white">
                                    Edit Task
                                </a>
                            </button>
                            <form action="/delete/{{ $task->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-success float-end custom-btn" type="submit">
                                    Delete
                                </button>
                            </form>
                            <button class="btn btn-success float-end custom-btn ms-1" type="button">
                                <a href="/" class="text-decoration-none text-white">
                                    Go back
                                </a>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection