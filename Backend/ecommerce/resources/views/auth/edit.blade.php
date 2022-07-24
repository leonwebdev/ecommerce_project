@extends('layouts.app')
@section('content')
    <main class="signup-form">
        <div class="container">
            <div class="wrapper">
                <div class="content form" id="register">
                    <h1>Edit Profile</h1>
                    <form action="/profile/{{ $user->id }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" value="{{ $user->id }}">

                        <p class="col col-6">
                            <input type="text" id="first_name" name="first_name" placeholder="First Name"
                                value="{{ old('first_name', $user->first_name) }}" />
                            @error('first_name')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </p>
                        <p class="col col-6">
                            <input type="text" id="last_name" name="last_name" placeholder="Last Name"
                                value="{{ old('last_name', $user->last_name) }}" />
                            @error('last_name')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </p>
                        <p class="col col-12">
                            <input type="text" id="email" name="email" placeholder="Email"
                                value="{{ old('email', $user->email) }}" />
                            @error('email')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </p>
                        <p class="col col-12">
                            <input type="text" id="phone" name="phone" placeholder="Phone"
                                value="{{ old('phone', $user->phone) }}" />
                            @error('phone')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </p>
                        <p class="col col-6">
                            <input type="password" id="password" name="password" placeholder="Password" />
                            @error('password')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </p>
                        <p class="col col-6">
                            <input type="password" id="password_confirmation" name="password_confirmation"
                                placeholder="Confirm Password" />
                            @error('password_confirmation')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </p>
                        <p class="col col-12 terms">
                            <input type="checkbox" name="terms" id="terms" />
                            <label for="terms">I accept the <a href="#" target="_blank">Terms of Use</a> & <a
                                    href="#" target="_blank">Privacy Policy</a> .</label>
                        </p>
                        <p>
                            <button id="register_btn" class="btn btn_white" disabled>Update</button>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <script>
        $(document).ready(function() {
            console.log("jQuery loaded, register form displayed");
            $('#terms').click(function() {
                $('#register_btn').attr("disabled", !this.checked);
            });
        });
    </script>
@endsection
