@extends('layouts.app')

@section('content')
<div class="container">
    <div class="wrapper">
        <div class="content form" id="register">
            <h1>Contact</h1>

            <form method="post" novalidate>
                <p class="col col-6 required">
                    <input type="text" id="first_name" name="first_name" placeholder="First Name" value="" />
                    <span class="error">[error message]</span>
                </p>
                <p class="col col-6 required">
                    <input type="text" id="last_name" name="last_name" placeholder="Last Name" value="" />
                    <span class="error">[error message]</span>
                </p>

                <p class="col col-7 required">
                    <input type="text" id="email" name="email" placeholder="Email"  value=""/>
                    <span class="error">[error message]</span>
                </p>
                <p class="col col-5 required">
                    <input type="text" id="phone" name="phone" placeholder="Phone" value="" />
                    <span class="error">[error message]</span>
                </p>
                <p class="col col-5 required">
                    <input type="text" id="message" name="message" placeholder="message" value="" />
                    <span class="error">[error message]</span>
                </p>
                </form>
                </div>
                </div>
                </div>

@endsection