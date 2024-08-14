@extends('layout')
@section('title', 'Show Task')
@section('main')

    <div class="container mt-5">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Tasks</th>
                    <th scope="col">Priority</th>
                    <th scope="col">Status</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $tasks->title }}</td>
                    <td>{{ $tasks->priority }}</td>
                    <td>{{ $tasks->status }}</td>
                </tr>
            </tbody>
        </table>
    </div>

@endsection
