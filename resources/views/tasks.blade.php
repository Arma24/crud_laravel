@extends('layouts.app')

@section('content')

    <!-- Bootstrap Boilerplate... -->
    @include('common.errors')

    <div class="panel-body">
        <!-- Display Validation Errors -->
        

        <!-- New Task Form -->
        <form action="{{ url('task') }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            <!-- Task Name -->
            <div class="form-group">
                <label for="task" class="col-sm-3 control-label">Nama</label>

                <div class="col-sm-6">
                    <input type="text" name="nama" id="task-nama" class="form-control">
                </div>
            </div>

            <div class="form-group">
                <label for="task" class="col-sm-3 control-label">Kelas</label>

                <div class="col-sm-6">
                    <input type="text" name="kelas" id="task-kelas" class="form-control">
                </div>
            </div>

            <!-- Add Task Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Add
                    </button>
                </div>
            </div>
        </form>
    </div>

    <div class="panel-body">
        <table class="table table-stripped task-table">
            <thead>
                <th>ID</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Action</th>
            </thead>

            <tbody>
                @foreach($tasks as $task)
                    <tr>
                        <td>{{ $task->id }}</td>
                        <td>{{ $task->nama }}</td>
                        <td>{{ $task->kelas }}</td>
                        <td>
                            <form class="" action="{{ url('/task/' .$task->id) }}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}

                                <button type="submit" class="btn btn-danger">
                                <i class="fa fa-trash"> Delete </i>
                                </button>
                            </form>
                        </td>
                    </tr>

                @endforeach
            </tbody>
        </table>
    </div>

    <!-- TODO: Current Tasks -->
@endsection