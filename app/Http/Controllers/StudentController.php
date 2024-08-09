<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Support\Facades\Redirect;

class StudentController extends Controller
{
    public function index(Request $request){
    $query = Student::query();
    if ($request->has('search')) {
        $search = $request->input('search');
        $query->where('student_name', 'LIKE', "%{$search}%");
    }
    $students = $query->with('teacher')->paginate(10);
    return view('students.index', compact('students'));
    }


    public function create(){
        $teachers = Teacher::all();
        return view('students.create', compact('teachers'));
    }

    public function store(Request $request) {
        $request->validate([
            'student_name' => 'required|string|max:255',
            'class_teacher_id' => 'required|exists:teachers,id',
            'class' => 'required|string|max:50',
            'admission_date' => 'required|date',
            'yearly_fees' => 'required|numeric|min:0',
        ]);

        Student::create($request->all());
        return Redirect::route('students.index')->with('message', 'student create successfully !');
    }

    public function edit(Student $student){
        $teachers = Teacher::all();
        return view('students.edit', compact('student', 'teachers'));
    }

    public function update(Request $request, Student $student){
        $request->validate([
            'student_name' => 'required|string|max:255',
            'class_teacher_id' => 'required|exists:teachers,id',
            'class' => 'required|string|max:50',
            'admission_date' => 'required|date',
            'yearly_fees' => 'required|numeric|min:0',
        ]);

        $student->update($request->all());
        return Redirect::route('students.index')->with('message', 'student record updated successfully !');
    }

    public function destroy(Student $student) {
        $student->delete();
        return Redirect::route('students.index')->with('danger', 'student record deleted successfully !');
    }
}
