@extends('layouts.app-master')

@section('content')
    <section class="py-5">
        <div class="container">
            <h1 class="mb-4">About Nile University Smart Campus</h1>
            <p class="lead">Transforming Nile University into an intelligent environment with cutting-edge contactless access and cloud technology.</p>

            <div class="row mt-5">
                <div class="col-md-6">
                    <h2 class="mb-3">Project Overview</h2>
                    <p>Our team at Nile University has embraced the advancements in contactless access, mobile device integration, and cloud technology to create a smart campus experience. By replacing student ID card scanning with NFC (Near-Field Communication) technology, we aim to streamline and secure campus access for our students and staff.</p>
                </div>
                <div class="col-md-6">
                    <img src="{{asset('images/11.png')}}" class="img-fluid rounded" alt="NFC Technology">
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-md-4">
                    <h3 class="mb-4">NFC Access</h3>
                    <p>Students can easily access campus facilities using their NFC-enabled devices or NFC stickers. This innovative solution removes the need for physical ID cards, reduces wait times, and enhances security measures.</p>
                </div>
                <div class="col-md-4">
                    <h3 class="mb-4">Mobile App</h3>
                    <p>Our Nile University mobile app offers a wide range of services for students, including access to parking, library resources, and locker rentals. The app also allows admins to activate NFC chips for students, ensuring a seamless onboarding process.</p>
                </div>
                <div class="col-md-4">
                    <h3 class="mb-4">Smart Infrastructure</h3>
                    <p>Our campus facilities are equipped with smart technology, including auto gates for parking and smart locks for lockers. This ensures that only authorized users have access to these resources and helps streamline campus operations.</p>
                </div>
            </div>
        </div>
    </section>
@endsection