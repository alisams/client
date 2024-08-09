@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Students</h1>

           <form action="{{ route('students.index') }}" method="GET" class="form-inline mb-3">
            <input type="text" name="search" class="form-control mr-sm-2" placeholder="Search by Name" value="{{ request('search') }}">
            <button type="submit" class="btn btn-primary">Search</button>
        </form>

        
        <a href="{{route('home')}}">
        <button class="btn btn-secondary">Back  </button> </a>

        <a href="{{ route('students.create') }}" class="btn btn-primary">Add Student</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Class Teacher</th>
                    <th>Class</th>
                    <th>Admission Date</th>
                    <th>Yearly Fees</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr>
                        <td>{{ $student->student_name }}</td>
                        <td>{{ $student->teacher->name }}</td>
                        <td>{{ $student->class }}</td>
                        <td>{{ $student->admission_date }}</td>
                        <td> INR {{ number_format($student->yearly_fees, 2) }}</td>
                        <td>
                            <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $students->appends(['search' => request('search')])->links() }}
    </div>

    @endsection
