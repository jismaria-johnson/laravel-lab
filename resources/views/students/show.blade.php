@extends('layouts.app')

@section('content')

<h1>Student Details</h1>

@if(session('status'))
    <p style="color: green;">
        {{ session('status') }}
    </p>
@endif

<p>
    <strong>ID:</strong> {{ $student->id }}
</p>

<p>
    <strong>Roll Number:</strong> {{ $student->roll_no }}
</p>

<p>
    <strong>Name:</strong> {{ $student->name }}
</p>

<p>
    <strong>Email:</strong> {{ $student->email }}
</p>

<p>
    <strong>Department:</strong> {{ $student->department }}
</p>

<p>
    <strong>Semester:</strong> {{ $student->semester }}
</p>

<p>
    <strong>CGPA:</strong> {{ $student->cgpa }}
</p>

<a href="{{ route('students.index') }}">
    Back to Students
</a>

@endsection