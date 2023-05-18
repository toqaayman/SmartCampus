<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $limit = 7; // Number of records per page
        $page = $request->input('page', 1); // Get the current page or set the default page to 1
    
        $offset = ($page - 1) * $limit; // Calculate the offset
    
        if ($search) {
            $students = Student::where('student_id', 'LIKE', '%' . $search . '%')
                                ->orWhere('name', 'LIKE', '%' . $search . '%')
                                ->skip($offset)
                                ->take($limit)
                                ->get();
            $total = Student::where('student_id', 'LIKE', '%' . $search . '%')
                            ->orWhere('name', 'LIKE', '%' . $search . '%')
                            ->count();
        } else {
            $students = Student::skip($offset)
                                ->take($limit)
                                ->get();
            $total = Student::count();
        }
    
        $lastPage = ceil($total / $limit);
    
        return view('home.students', compact('students', 'total', 'page', 'lastPage'));
    }

    public function create()
    {
        return view('home.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'student_id' => 'required|integer',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:students,email',
        ]);

        $student = new Student();
        $student->student_id = $validatedData['student_id'];
        $student->name = $validatedData['name'];
        $student->email = $validatedData['email'];
        $student->save();

        return redirect()->route('students.index');
    }
    
    public function activate($id)
    {
        $student = Student::findOrFail($id);
        $student->activity_mood = true;
        $student->save();
    
        return response()->json(['success' => true]);
    }
    public function show($id)
    {
        $student = Student::findOrFail($id);
        return view('students.show', compact('student'));
    }
    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);
        $student->activity_mood = $request->activity_mood;
        $student->save();

        return redirect()->route('students.show', $id)->with('success', 'Student activity mood updated successfully!');
    }
    public function activateSavingMood($id)
    {
        $student = Student::findOrFail($id);
        $student->activity_mood = $student->activity_mood ? 0 : 1;
        $student->save();
    
        // set success message
        session()->flash('success', 'Saving mood updated successfully.');
    
        // redirect back to the page
        return redirect()->back();
    }
    
    public function deactivateSavingMood($id)
    {
        $student = Student::findOrFail($id);
        $student->activity_mood = 0;
        $student->save();
    
        // set success message
        session()->flash('success', 'Saving mood deactivated successfully.');
    
        // redirect back to the page
        return redirect()->back();
    }
    public function search(Request $request)
    {
        $search = $request->input('search');

        // You might need to adjust the table and column names based on your database schema
        $students = DB::table('students')
                        ->where('student_id', 'LIKE', '%' . $search . '%')
                        ->orWhere('name', 'LIKE', '%' . $search . '%')
                        ->get();

        return view('students.index', compact('students'));
    }
    
}
