@extends('layout')
@section('title', 'Show Tasks')
@section('extra-css')
    <style type="text/css">
        .btn2 {
            color: red;
            border: none;
            background-color: white;
            font-size: 25px;
        }

        .btn1 {
            color: black;
            border: none;
            font-size: 25px;
        }

        .btn3 {
            border: none;
            color: #61bfe7;
            font-size: 25px;
        }

        .btn-info {
            background-color: rgb(182, 93, 182) !important;
            color: white;
            border: none;
        }

        .table {
            color: wheat !important;
        }
    </style>
@endsection

@section('main')
    <div class="container">
        <div class="container d-flex mt-5">
            <div>
                <h2 style="color: black">Task List</h2>
            </div>
            <div>
                <div class="col-10 m-5" id="alert">
                    @if (session()->has('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                    @endif
                </div>
            </div>
            <div class="ms-auto">
                <a href="{{ route('tasks.create') }}" class="btn btn-info"><i class="fa-solid fa-plus"></i> Add Tasks</a>
            </div>
        </div>

        <table class="table mt-3">
            <thead>
                @forelse ($tasks as $task)
                    <tr>
                        <th scope="col" style="color:rgb(182, 93, 182)">Tasks</th>
                        <th scope="col" style="color:rgb(182, 93, 182)">Priority</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
            </thead>
            <tbody>

                <?php
                $priorityColor = '';
                switch ($task->priority) {
                    case 'high':
                        $priorityColor = 'red';
                        break;
                    case 'medium':
                        $priorityColor = '#e5ad06';
                        break;
                    case 'low':
                        $priorityColor = '#61bfe7';
                        break;
                }
                ?>
                <tr>
                    <td style="color: {{ $priorityColor }}">{{ $task->title }}</td>
                    <td style="color: {{ $priorityColor }}">{{ $task->priority }}</td>
                    <td>{{ $task->status }}</td>
                    <td colspan="4">
                        <div class="d-flex justify-content-end">
                            <div class="mx-1">
                                <a href="{{ route('tasks.edit', $task->id) }}" class="btn1"><i
                                        class="fa-solid fa-pen-to-square"></i></a>
                            </div>
                            <div class="mx-1">
                                <a href="{{ route('tasks.show', $task->id) }}" class="btn3"><i
                                        class="fa-regular fa-eye"></i></a>
                            </div>
                            <div class="mx-1">
                                <form id="delete-task-form-{{ $task->id }}"
                                    action="{{ route('tasks.delete', $task->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn2 delete-task-btn" data-task-id="{{ $task->id }}">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-primary text-center">Tasks not found!</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection

@section('extra-jq')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#alert').fadeOut(5000, function() {
                let visible = false;
            });

            // Delete confirm
            $('.delete-task-btn').on('click', function() {
                var taskId = $(this).data('task-id');
                var form = $('#delete-task-form-' + taskId);

                if (confirm('Are you sure you want to delete this task?')) {
                    form.submit();
                }
            });
        });
    </script>
@endsection
