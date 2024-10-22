@extends('layouts.layout')
@section('content')
    <section id="create" class="d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="container">
            <div class="form-container w-50 mx-auto">
                <form action="{{ route('save-task')}}" method="POST">
                    @csrf
                    <div class="row g-3"> 
                        <div class="col-12">
                            <label for="task-name" class="form-label">Task Name</label>
                            <input type="text" id="task-name" name="task_name" class="form-control">
                            @error('task_name')
                                <p class="text-small text-danger error mt-1">Task name is required</p>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label for="priority" class="form-label">Priority</label>
                            <select id="priority" class="form-select" name="priority">
                                <option value="" disabled selected>Select Priority Level</option>
                                <option value="1">Drag and drop task items to sort the priority level</option>
                            </select>
                            @error('priority')
                                <p class="text-small text-danger error mt-1">Please enter a priority level</p>
                            @enderror
                        </div>
                    </div>
                    <div class="d-flex float-end">
                        <button class="btn btn-success custom-btn mt-4" type="submit">Create task</button>
                        <button class="btn btn-success custom-btn mt-4 ms-1" type="button">
                            <a href="/" class="text-decoration-none text-white">Go back</a>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection