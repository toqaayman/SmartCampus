@extends('layouts.app-master')

@section('content')
<br>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12 mx-auto">
                <div class="card bg-light shadow p-4 mb-5 custom-card">
                    <h1 class="text-center mb-4">Add New Student</h1>
                    <form method="post" action="{{ route('students.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="student_id">Student ID:</label>
                            <input type="number" name="student_id" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary w-100">Submit</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div>
                    <h1 class="text-center mb-4">Students</h1>
                    <form method="GET" action="{{ route('students.index') }}">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="search" placeholder="Search by Student ID or Name" value="{{ request('search') }}">
 
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit"> Search</button>
                            </div>
                        </div>
                    </form>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Student ID</th>
                                <th>Name</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($students as $student)
                            <tr>
                                <td>{{ $student->student_id }}</td>
                                <td>{{ $student->name }}</td>
                                <td>{{ $student->email }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center mt-4">
                        <ul class="pagination">
                            {{-- Previous Page Link --}}
                            @if ($page <= 1)
                                <li class="page-item disabled">
                                    <span class="page-link">Previous</span>
                                </li>
                            @else
                                <li class="page-item">
                                    <a class="page-link" href="{{ route('students.index', array_merge(request()->query(), ['page' => $page - 1])) }}">Previous</a>
                                </li>
                            @endif

                            {{-- Next Page Link --}}
                            @if ($page >= $lastPage)
                                <li class="page-item disabled">
                                    <span class="page-link">Next</span>
                                </li>
                            @else
                                <li class="page-item">
                                    <a class="page-link" href="{{ route('students.index', array_merge(request()->query(), ['page' => $page + 1])) }}">Next</a>
                                </li>
                            @endif
                        </ul>
                    </div>
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <style>
        .custom-button {
            width: 120px; /* Adjust this value to your desired width */
        }
        .custom-card {
            max-width: 600px; /* adjust the value as needed */
        }
    </style>
@endsection