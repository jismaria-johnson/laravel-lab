@extends('layouts.app')

@section('content')

<h1>Add New Student</h1>

@if($errors->any())
    <ul style="color: red;">
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('students.store') }}" method="POST">

    @csrf

    <label>Roll Number:</label>
    <input type="text" name="roll_no" required>
    <br><br>

    <label>Name:</label>
    <input type="text" name="name" required>
    <br><br>

    <label>Email:</label>
    <input type="email" name="email" required>
    <br><br>

    <label>Department:</label>
    <input type="text" name="department" required>
    <br><br>

    <label>Semester:</label>
    <input type="number" name="semester" required>
    <br><br>

    <label>CGPA:</label>
    <input type="number" name="cgpa" step="0.01" min="0" max="10" required>
    <br><br>

    <button type="submit">Save Student</button>

</form>

@endsection