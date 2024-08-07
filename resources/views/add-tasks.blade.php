@extends('layout')
@section('title', 'Add Tasks')
@section('extra-css')
    <style type="text/css">
        /*  */
    </style>
@endsection

@section('main')
    <div class="container">
        <div class="max-auto">
            <h2 class="text-primary">Add Task</h2>
        </div>
        <form action="{{ route('tasks.store') }}" class="form-group needs-validation mt-3" method="POST" id="taskForm"
            novalidate>
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Task</label>
                <input type="text" class="form-control" name="title" id="title" required>
                <div class="invalid-feedback">
                    Please add a task.
                </div>
            </div>
            <div class="mb-3">
                <label for="priority" class="form-label">Priority</label>
                <select class="form-control" name="priority" id="priority" required>
                    <option value="">Choose priority...</option>
                    <option value="high">High</option>
                    <option value="medium">Medium</option>
                    <option value="low">Low</option>
                </select>
                <div class="invalid-feedback">
                    Please choose a priority.
                </div>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-control" name="status" id="status" required>
                    <option value="">Choose status...</option>
                    <option value="to-do">To Do</option>
                    <option value="in-progress">In Progress</option>
                    <option value="complete">Complete</option>
                </select>
                <div class="invalid-feedback">
                    Please choose a status.
                </div>
            </div>
            <div class="col-12 mt-4">
                <button class="btn btn-primary" type="submit">Submit form</button>
            </div>
        </form>
    </div>
@endsection

@section('extra-jq')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#taskForm').on('submit', function(event) {
                let isValid = true;

                // Validate title
                const title = $('#title').val().trim();
                if (title === "") {
                    $('#title').addClass('is-invalid');
                    isValid = false;
                } else {
                    $('#title').removeClass('is-invalid').addClass('is-valid');
                }

                // Validate priority
                const priority = $('#priority').val().trim();
                if (priority === "") {
                    $('#priority').addClass('is-invalid').removeClass('is-valid');
                    isValid = false;
                } else {
                    $('#priority').removeClass('is-invalid').addClass('is-valid');
                }

                // Validate status
                const status = $('#status').val().trim();
                if (status === "") {
                    $('#status').addClass('is-invalid').removeClass('is-valid');
                    isValid = false;
                } else {
                    $('#status').removeClass('is-invalid').addClass('is-valid');
                }

                if (!isValid) {
                    event.preventDefault();
                }
            });

            // Remove validation messages on input
            $('#taskForm input, #taskForm select').on('input change', function() {
                $(this).removeClass('is-invalid');
            });
        });
    </script>
@endsection
