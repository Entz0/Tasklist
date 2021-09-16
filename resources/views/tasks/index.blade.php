@extends('layouts.app')

@section('content')
    <div class="row">
        <h1 class="mt-5">Tasks</h1>
        <div class="col-12 mt-4">
            <div class="card">
                <div class="card-body">
                    @include('common.errors')
                    <form action="{{ url('task') }}" method="post" class="col-lg-6 offset-lg-3 py-2">
                        @csrf
                        <div class="form-floating mb-3 row justify-content-center">
                            <input type="text" class="form-control" name="name" id="name" placeholder="Task name">
                            <label for="name">What task do you want to add?</label>
                            <div class="d-grid justify-content-end px-0 mt-2">
                                <button type="submit" class="btn btn-outline-success">Add task</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        @if ($tasks->count())
        <div class="col-12 mt-4">
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Current tasks</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tasks as $task)
                                <tr>
                                    <td class="align-middle">{{ $task->name }}</td>
                                    <td class="py-2 span style="font-size: 10px;">
                                        <form action="{{ url('task/' .  $task->id) }}" method="post">
                                            <button type="submit" class="btn btn-outline-danger d-grid justify-content-end px-2 mt-0">Delete</button>
                                            {{ method_field('DELETE') }}
                                            @csrf
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @endif
    </div>
@endsection