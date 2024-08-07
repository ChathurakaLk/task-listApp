@extends('layout')
@section('title', 'Edit Tasks')
@section('extra-css')
    <style type="text/css">
        /* jjhh */
    </style>
@endsection

@section('main')
    <div class="container">
        <div class="max-auto">
            <h2 class="text-primary">Edit Task</h2>
        </div>
        <form action="{{ route('tasks.update', $tasks->id) }}" class="form-group needs-validation mt-3" method="POST"
            id="taskForm" novalidate>
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">Task</label>
                <input type="text" class="form-control" name="title" id="title"
                    value="{{ old('title') ? old('title') : $tasks->title }}" required>
                @error('title')
                    <div class="text text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="priority" class="form-label">Priority</label>
                <select class="form-control" name="priority" id="priority" required>
                    <option value="">Choose priority...</option>
                    <option value="high"
                        {{ (old('priority') ? old('priority') : $tasks->priority) == 'high' ? 'selected' : '' }}>High
                    </option>
                    <option value="medium"
                        {{ (old('priority') ? old('priority') : $tasks->priority) == 'medium' ? 'selected' : '' }}>Medium
                    </option>
                    <option value="low"
                        {{ (old('priority') ? old('priority') : $tasks->priority) == 'low' ? 'selected' : '' }}>Low</option>
                </select>
                @error('priority')
                    <div class="text text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-control" name="status" id="status" required>
                    <option value="">Choose status...</option>
                    <option value="to-do"
                        {{ (old('status') ? old('status') : $tasks->status) == 'to-do' ? 'selected' : '' }}>To Do
                    </option>
                    <option value="in-progress"
                        {{ (old('status') ? old('status') : $tasks->status) == 'in-progress' ? 'selected' : '' }}>In
                        Progress
                    </option>
                    <option value="complete"
                        {{ (old('status') ? old('status') : $tasks->status) == 'complete' ? 'selected' : '' }}>Complete
                    </option>
                </select>
                @error('status')
                    <div class="text text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-12 mt-4">
                <input type="submit" class="btn btn-primary" value="Submit">
            </div>
        </form>
    </div>
@endsection
