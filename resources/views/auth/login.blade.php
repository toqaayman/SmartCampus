@extends('layouts.auth-master')

@section('content')
    <div class="container-fluid">
        <a href="{{ route('home.index') }}" class="btn btn-link">&larr; Go back to the homepage</a>
    </div>
    <!-- Add a container with white background and some padding -->
    <div class="container bg-white p-4 shadow" style="max-width: 480px; border-radius: 5px;">
        <form method="post" action="{{ route('login.perform') }}">

            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <img class="mb-4" src="{{asset('images/logo.png')}}" alt="" width="72" height="57">

            <h1 class="h3 mb-3 fw-normal">Login</h1>

            @include('layouts.partials.messages')

            <div class="form-group form-floating mb-3">
                <input type="text" class="form-control" name="username" value="{{ old('username') }}" placeholder="Username" required="required" autofocus>
                <label for="floatingName">Email or Username</label>
                @if ($errors->has('username'))
                    <span class="text-danger text-left">{{ $errors->first('username') }}</span>
                @endif
            </div>

            <div class="form-group form-floating mb-3">
                <input type="password" class="form-control" name="password" value="{{ old('password') }}" placeholder="Password" required="required">
                <label for="floatingPassword">Password</label>
                @if ($errors->has('password'))
                    <span class="text-danger text-left">{{ $errors->first('password') }}</span>
                @endif
            </div>

            <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
            
            <!-- Add registration link -->
            <div class="mt-3">
                <p class="text-center">Don't have an account? <a href="{{ route('register.perform') }}" class="text-primary">Register now!</a></p>
            </div>

            @include('auth.partials.copy')
        </form>
    </div>
@endsection