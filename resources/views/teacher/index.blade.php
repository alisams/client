@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Teachers</h1>

           

        <a href="{{route('home')}}">
        <button class="btn btn-secondary">Back  </button> </a>

        <a href="{{ route('teachers.create') }}" class="btn btn-primary">Add  Teacher</a>
        <table class="table">
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($teachers as $teacher)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $teacher->name }}</td>
                        <td>
                            <a href="{{ route('teachers.edit', $teacher->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('teachers.destroy', $teacher->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    
    </div>

    @endsection
