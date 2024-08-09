<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Support\Facades\Redirect;

class TeacherController extends Controller
{
    public function index(Request $request){
    $teachers = Teacher::all();
    return view('teacher.index', compact('teachers'));
    }


    public function create(){
        $teachers = Teacher::all();
        return view('teacher.create', compact('teachers'));
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Teacher::create($request->all());
        return Redirect::route('teachers.index')->with('message', 'teacher create successfully !');
    }

    public function edit(Teacher $teacher){
        return view('teacher.edit', compact('teacher'));
    }
    

    public function update(Request $request, Teacher $teacher){
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
    
        $teacher->update($request->all());
        return Redirect::route('teachers.index')->with('message', 'Teacher updated successfully!');
    }
    

    public function destroy(Teacher $teacher) {
        $teacher->delete();
        return Redirect::route('teachers.index')->with('danger', 'Teacher deleted successfully!');
    }
    
}
