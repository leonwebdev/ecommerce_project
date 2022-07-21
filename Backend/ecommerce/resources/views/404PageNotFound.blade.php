@extends('layouts.app')

@section('content')
<div class="container">
<div class="wrapper">
    <article>
    <div>
        <div class="titlepagenotfound">
            <span>Page Not Found</span>
        </div>
        <div class="subtitlepagenotfound">
        <span>This page is not longer available</span>
        </div>
        <div class="actionpagenotfound">
        <a class="button" href="/home"></a>
        <div class="button_line-wrapper">
        <span>Go To Homepage</span>
        </div>
        </div>
    </div>
    </article>
</div>
</div>
@endsection