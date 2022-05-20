<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentsController extends Controller
{
    
    //Function to load students list page with data
    public function index()
    {

        $students  = Student::latest()->get();
        return view('students.index',compact('students'));

    }

    //Function to load create page with teacher data
    public function create()
    {
        $teachers = Teacher::all();
        return view('students.create',compact('teachers'));
    }

    //Function to store data
    public function store(Request $request)
    {

        $request->validate([
            'name'         => 'required|min:3|unique:students',
            'age'          => 'required|integer',
            'gender'       => 'required',
            'teacher'      => 'required'
        ]);

        $student           = new Student;
        $student->name     = $request->input('name');
        $student->age      = $request->input('age');
        $student->gender   = $request->input('gender');

        $teacher     = Teacher::find($request->input('teacher'));

        $teacher->student()->save($student);

        return redirect()->route('students.create')->with('status', 'Data inserted Successfully!');

    }

    //function to load edit page with data
    public function edit($id)
    {

        $student       = Student::find($id);
        $teachers      = Teacher::all();

        if(empty($student)){
            return abort(404);
        }

        return view('students.edit',compact('student','teachers'));

    }

    //Function to update data
    public function update(Request $request,$id)
    {

        $request->validate([
            'name'         => 'required|min:3|unique:students,name,'.$id,
            'age'          => 'required|integer',
            'gender'       => 'required',
            'teacher'      => 'required'
        ]);

        $student           = Student::find($id);
        $student->name     = $request->input('name');
        $student->age      = $request->input('age');
        $student->gender   = $request->input('gender');

        $teacher     = Teacher::find($request->input('teacher'));

        $teacher->student()->save($student);

        return redirect()->back()->with('status', 'Data updated Successfully!');

    }

    //Function to delete data
    public function delete($id)
    {

        $student   = Student::find($id);

        if(empty($student)){
            return abort(404);
        }

        $student->delete();

        return redirect()->route('students.index')->with('status', 'Data deleted Successfully!');

    }
    
}
