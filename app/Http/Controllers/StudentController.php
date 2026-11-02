<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    // Display all students
    public function index()
    {
        $students = Student::all();

        return view('students.index', compact('students'));
    }

    // Show student creation form
    public function create()
    {
        return view('students.create');
    }

    // Save a new student
    public function store(Request $request)
    {
        $validated = $request->validate([
            'roll_no' => 'required|unique:students,roll_no',
            'name' => 'required|string',
            'email' => 'required|email|unique:students,email',
            'department' => 'required|string',
            'semester' => 'required|integer',
            'cgpa' => 'required|numeric|min:0|max:10',
        ]);

        Student::create($validated);

        return redirect()->route('students.index')
            ->with('status', 'Student created successfully!');
    }

    // Display an individual student
    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }

    // Show edit form (not required for this activity)
    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    // Update student (not required for this activity)
    public function update(Request $request, Student $student)
    {
        $student->update($request->all());

        return redirect()->route('students.index');
    }

    // Delete student (not required for this activity)
    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('students.index');
    }
}
