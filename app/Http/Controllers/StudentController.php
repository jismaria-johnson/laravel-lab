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

    // Display the create form
    public function create()
    {
        return view('students.create');
    }

    // Store a new student
    public function store(Request $request)
    {
        $validated = $request->validate([
            'roll_no' => 'required|string',
            'name' => 'required|string',
            'email' => 'required|email',
            'department' => 'required|string',
            'semester' => 'required|integer',
            'cgpa' => 'required|numeric|min:0|max:10',
        ]);

        $student = Student::create($validated);

        return redirect()
            ->route('students.show', $student)
            ->with('status', 'Student added successfully.');
    }

    // Display one student using ID-based implicit binding
    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }

    // Display edit form
    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    // Update student
    public function update(Request $request, Student $student)
    {
        $student->update($request->all());

        return redirect()->route('students.index');
    }

    // Delete student
    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('students.index');
    }
}