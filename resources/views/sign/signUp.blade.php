@extends('layout.applayout')

@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="/css/signup.css">
        <title>Sign Up</title>
    </head>

    <body>
        <div class="signup_container">
            <form method="POST" action="{{ route('register') }}" class="sign_up_form">
                @csrf <!-- CSRF Token -->
                <div class="form_grid_container">
                    <div class="form_sub_grid">
                        <h2 class="create_account">Create an account</h2>
                        <h3 class="already">
                            Already have an account? <a href="{{ route('login') }}" class="style">Login</a>
                        </h3>
                        <div class="input_grid">
                            <div class="input_sub_grid">
                                <label for="first_name" class="signup_labels">First Name</label>
                                <input required type="text" id="first_name" name="first_name" class="signup_input">
                            </div>
                            <div class="input_sub_grid">
                                <label for="last_name" class="signup_labels">Last Name</label>
                                <input required type="text" id="last_name" name="last_name" class="signup_input">
                            </div>
                            <div class="input_sub_grid">
                                <label for="email" class="signup_labels">Email Address</label>
                                <input required type="email" id="email" name="email" class="signup_input">
                            </div>
                            <div class="input_sub_grid">
                                <label for="password" class="signup_labels">Password</label>
                                <input required type="password" id="password" name="password" class="signup_input">
                            </div>
                            <div class="input_sub_grid">
                                <label for="password_confirmation" class="signup_labels">Confirm Password</label>
                                <input required type="password" id="password_confirmation" name="password_confirmation" class="signup_input">
                            </div>
                        </div>
                        <div class="create_btn">
                            <button type="submit" class="create">Create an Account</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </body>

    </html>
@endsection
