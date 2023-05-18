@extends('layouts.app-master')

@section('content')
<br>
<form action="{{ route('lockers.assignlocker') }}" method="POST" id="assign-form">
  @csrf
  <div class="form-group">
    <label for="student_id">Student</label>
    <div class="input-group">
      <input list="student_list" name="student_id" id="student_id" class="form-control">
      <datalist id="student_list">
        <option value="">-- Select a student --</option>
        @foreach ($unassignedStudents as $student)
          <option value="{{ $student->id }}">{{ $student->name }} ({{ $student->student_id }})</option>
        @endforeach
      </datalist>
    </div>
  </div>
  <div class="form-group">
    <label for="locker_num">Locker Number</label>
    <input type="text" name="locker_num" id="locker_num" class="form-control">
  </div>
  <br>
  <button type="submit" class="btn btn-primary">Assign Locker</button>
</form>
<br>
@if (session('success'))
  <div class="alert alert-success">
    {{ session('success') }}
  </div>
@endif
@if (session('error'))
  <div class="alert alert-danger">
    {{ session('error') }}
  </div>
@endif
@endsection
