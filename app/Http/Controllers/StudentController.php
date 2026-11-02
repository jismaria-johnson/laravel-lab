<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();

        return view('students.index', compact('students'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        $student = Student::create([
            'roll_no' => $request->input('roll_no', 'CS23-99'),
            'name' => $request->input('name', 'Test Student'),
            'email' => $request->input('email', 'test@example.com'),
            'department' => $request->input('department', 'CSE'),
            'semester' => $request->input('semester', 7),
            'cgpa' => $request->input('cgpa', 9.0),
        ]);

        return redirect('/students')
            ->with('status', 'Student added successfully.');
    }

    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }

    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        $student->update($request->all());

        return redirect()->route('students.index');
    }

    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('students.index');
    }
}