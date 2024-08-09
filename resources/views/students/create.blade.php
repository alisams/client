@extends('layouts.app')
@section('content')

    <div class="container">
        <h1>Add Student</h1>
        <a href="{{route('students.index')}}">
        <button class="btn btn-info btn-sm">Back   </button> </a>
        
        <form action="{{ route('students.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="student_name">Name</label>
                <input type="text" name="student_name" class="form-control">
            </div>
            <div class="form-group">
                <label for="class_teacher_id">Class Teacher</label>
                <select name="class_teacher_id" class="form-control">
                    @foreach ($teachers as $teacher)
                        <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="class">Class</label>
                <input type="text" name="class" class="form-control">
            </div>
            <div class="form-group">
                <label for="admission_date">Admission Date</label>
                <input type="date" name="admission_date" class="form-control">
            </div>
            <div class="form-group">
                <label for="yearly_fees">Yearly Fees</label>
                <input type="number" name="yearly_fees" step="0.01" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>

        
                

    </div>
@endsection
