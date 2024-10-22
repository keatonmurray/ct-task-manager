@extends('layouts.layout')
@section('content')
    <section id="home">
        <div class="container">
            <h4 class="page-title mb-4">October To-do's</h4>
            <div class="row d-flex align-items-center justify-content-start my-4" id="sortable">
                @if(count($tasks) > 0)
                    @foreach ($tasks as $task)
                        <div class="col-12 col-md-4 mb-4" data-id="{{ $task->id }}">
                            <a href="/show/{{$task->id}}" class="text-decoration-none">
                                <div class="card shadow">
                                    <div class="card-body text-center">
                                        <h5 class="card-title">{{ $task->task_name }}</h5> 
                    
                                        <p class="card-text">
                                            <span class="badge bg-primary">Priority level: {{ $task->priority }}</span> 
                                        </p>
                                
                                        <p class="card-text">
                                            <small class="text-muted">{{ $task->created_at }}</small>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                    @else
                    <p class="text-center">No tasks have been created yet</p>
                @endif
            </div>
            <button class="btn btn-success float-end custom-btn" type="button">
                <a href="{{ route('add-task') }}" class="text-white text-decoration-none">
                    Add more tasks
                </a>
            </button>
        </div>
    </section>
@endsection