<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\Locker;

class LockerController extends Controller
{
    public function index()
    {
        return view('home.assignform');
    }

    public function show()
    {
        // Retrieve a list of available lockers that are not already assigned to a student
        $availableLockers = Locker::where('locker_activate', false)->get();

        // Retrieve a list of students that have not been assigned a locker
        $unassignedStudents = Student::whereNull('locker_id')->get();

        // Get the success message from the session
        $successMessage = session('status');

        return view('home.assignform', [
            'availableLockers' => $availableLockers,
            'unassignedStudents' => $unassignedStudents,
            'successMessage' => $successMessage,
        ]);
    }

    public function store(Request $request)
    {
        // Retrieve the selected student or search for the student by name or ID
        $student = null;
        $search = $request->input('search');
        if ($search) {
            // Send a request to the RouterOS API to search for the student
            $response = Http::withBasicAuth('admin', 'password')
                ->get('http://routeros/api/student/search', [
                    'query' => $search
                ]);

            if ($response->ok()) {
                $student = $response->json();
            } else {
                return redirect()->back()->with('error', 'Failed to search for student.');
            }
        } else {
            $student = Student::findOrFail($request->input('student_id'));
        }

        // Check if a locker with the same number already exists in the database
        $existingLocker = Locker::where('locker_num', $request->input('locker_num'))->first();
        if ($existingLocker) {
            // Display an error message to the user and redirect back to the form
            return redirect()->back()->with('error', 'Locker ' . $request->input('locker_num') . ' is already assigned to another student.');
        }

        // Update the locker to associate it with the student
        $locker = new Locker;
        $locker->locker_num = $request->input('locker_num');
        $locker->locker_activate = 0; // Set locker_activate to 0 (inactive)
        $locker->save();

        // Associate the locker with the student
        $student->locker_id = $locker->id;
        $student->save();

        // Set success message and redirect back to the form
        return redirect()->back()->with('success', 'Locker ' . $request->input('locker_num') . ' assigned to student ' . $student->name . ' successfully.');
    }

}


