<?php

namespace App\Http\Controllers;

use App\Models\Mark;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MarksController extends Controller
{
    
    //Function to load marks list page with data
    public function index()
    {

        $marklists  = Mark::all();
        return view('marks.index',compact('marklists'));

    }

    //Function to load create page with student data
    public function create()
    {
        $students = Student::select('id','name')->get();
        return view('marks.create',compact('students'));
    }

    //Function to store data
    public function store(Request $request)
    {

        $request->validate([
            'maths'         => 'required|integer',
            'science'       => 'required|integer',
            'history'       => 'required|integer',
            'term'          => 'required'
        ]);

        $mark           = new Mark;
        $mark->term     = $request->input('term');
        $mark->maths    = $request->input('maths');
        $mark->science  = $request->input('science');
        $mark->history  = $request->input('history');

        $student     = Student::find($request->input('student'));

        $student->mark()->save($mark);

        return redirect()->route('marks.create')->with('status', 'Data inserted Successfully!');

    }

    //function to load edit page with data
    public function edit($id)
    {

        $mark       = Mark::find($id);
        $students   = Student::all();

        if(empty($mark)){
            return abort(404);
        }

        return view('marks.edit',compact('mark','students'));

    }

    //Function to update data
    public function update(Request $request,$id)
    {

        $request->validate([
            'maths'         => 'required|integer',
            'science'       => 'required|integer',
            'history'       => 'required|integer',
            'term'          => 'required'
        ]);

        $mark           = Mark::find($id);
        $mark->term     = $request->input('term');
        $mark->maths    = $request->input('maths');
        $mark->science  = $request->input('science');
        $mark->history  = $request->input('history');

        $student     = Student::find($request->input('student'));

        $student->mark()->save($mark);

        return redirect()->back()->with('status', 'Data updated Successfully!');

    }

    //Function to delete data
    public function delete($id)
    {

        $mark   = Mark::find($id);

        if(empty($mark)){
            return abort(404);
        }

        $mark->delete();

        return redirect()->route('marks.index')->with('status', 'Data deleted Successfully!');

    }
    
}
