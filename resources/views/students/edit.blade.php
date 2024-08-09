@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Student</h1>
    <form action="{{ route('students.update', $student->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="student_name">Student Name</label>
            <input type="text" name="student_name" id="student_name" class="form-control" value="{{ old('student_name', $student->student_name) }}" required>
        </div>

        <div class="form-group">
            <label for="class_teacher_id">Class Teacher</label>
            <select name="class_teacher_id" id="class_teacher_id" class="form-control" required>
                <option value="">Select a Class Teacher</option>
                @foreach($teachers as $teacher)
                    <option value="{{ $teacher->id }}" {{ $student->class_teacher_id == $teacher->id ? 'selected' : '' }}>{{ $teacher->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="class">Class</label>
            <input type="text" name="class" id="class" class="form-control" value="{{ old('class', $student->class) }}" required>
        </div>

        <div class="form-group">
            <label for="admission_date">Admission Date</label>
            <input type="date" name="admission_date" id="admission_date" class="form-control" value="{{ old('admission_date', $student->admission_date) }}" required>
        </div>

        <div class="form-group">
            <label for="yearly_fees">Yearly Fees</label>
            <input type="number" name="yearly_fees" id="yearly_fees" class="form-control" value="{{ old('yearly_fees', $student->yearly_fees) }}" required>
        </div>

        <button type="submit" class="btn btn-success">Update Student</button>
        <a href="{{ route('students.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
