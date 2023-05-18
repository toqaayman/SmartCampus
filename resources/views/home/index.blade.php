@extends('layouts.app-master')

@section('content')
    <div class="py-5">
        @auth
            <div class="container">
                <h1 class="mb-4">Admin Dashboard</h1>
                <p class="lead mb-4">Manage students, NFC cards, and campus facilities with ease.</p>
                <div>
                    <h1 class="mb-3">Students</h1>
                    <a href="{{ route('students.index') }}" class="btn btn-primary mb-2">View/Add Students</a>
                    <a href="{{ route('lockers.assignform') }}" class="btn btn-primary mb-2">Lockers</a>
                    
                </div>

                <!-- New Section: Additional Content for Authorized Users -->
                <div class="mt-5">
                    <h2 class="mb-4">Campus Management Features</h2>
                    <div class="row g-5">
                        <div class="col-md-4">
                            <figure class="text-center">
                                <img src="{{asset('images/8.png')}}" class="figure-img img-fluid rounded equal-img" alt="Attendance Tracking">
                                <figcaption class="figure-caption">Attendance Tracking</figcaption>
                            </figure>
                            <p>Keep track of student attendance in classes and events to monitor engagement and ensure compliance with university policies.</p>
                        </div>
                        <div class="col-md-4">
                            <figure class="text-center">
                                <img src="{{asset('images/9.jpg')}}" class="figure-img img-fluid rounded equal-img" alt="Reporting and Analytics">
                                <figcaption class="figure-caption">Reporting and Analytics</figcaption>
                            </figure>
                            <p>Analyze data on student performance, facility usage, and more to make informed decisions and improve campus operations.</p>
                        </div>
                        <div class="col-md-4">
                            <figure class="text-center">
                                <img src="{{asset('images/10.png')}}" class="figure-img img-fluid rounded equal-img" alt="Schedule Management">
                                <figcaption class="figure-caption">Schedule Management</figcaption>
                            </figure>
                            <p>Manage course schedules, event calendars, and room bookings to optimize campus resources and facilitate student success.</p>
                        </div>
                    </div>
                </div>
                <!-- End of New Section -->

            </div>
        @endauth

    </div>


        @guest
            <!-- Carousel with added margin bottom -->
            <div id="carouselExampleControls" class="carousel slide mb-5" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{asset('images/1.jpg')}}" class="d-block w-100" alt="Lockers">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Lockers</h5>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{asset('images/3.jpg')}}" class="d-block w-100" alt="Gym">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Gym</h5>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{asset('images/2.jpg')}}" class="d-block w-100" alt="Campus">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Campus</h5>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>

            <div class="container">
                <h1 class="mb-4">Admin Portal for University Management</h1>
                <p class="lead mb-5">This website allows administrators to manage students, activate NFC cards, and grant access to campus facilities.</p>

                <div class="row g-5">
                    <div class="col-md-4">
                        <figure class="text-center">
                            <img src="{{asset('images/4.png')}}" class="figure-img img-fluid rounded equal-img" alt="Student Management">
                            <figcaption class="figure-caption">Student Management</figcaption>
                        </figure>
                        <p>Admins can easily add, update, and remove students from the database, ensuring up-to-date records for campus management.</p>
                    </div>
                    <div class="col-md-4">
                        <figure class="text-center">
                            <img src="{{asset('images/5.webp')}}" class="figure-img img-fluid rounded equal-img" alt="NFC Card Activation">
                            <figcaption class="figure-caption">NFC Card Activation</figcaption>
                        </figure>
                        <p>Activate and manage NFC cards for students to enable seamless access to campus facilities and enhance security.</p>
                    </div>
                    <div class="col-md-4">
                        <figure class="text-center">
                            <img src="{{asset('images/6.jpg')}}" class="figure-img img-fluid rounded equal-img" alt="Facility Access Management">
                            <figcaption class="figure-caption">Facility Access Management</figcaption>
                        </figure>
                        <p>Control and monitor access to campus facilities, ensuring that only authorized students can enter specific areas.</p>
                    </div>
                </div>
            </div>
        @endguest
    </div>

    <style>
        .equal-img {
            height: 200px;
            width: 100%;
            object-fit: cover;
        }
    </style>
@endsection