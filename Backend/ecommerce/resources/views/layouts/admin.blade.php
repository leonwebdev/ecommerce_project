<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel | {{ $title }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
</head>
<body>
    @include('admin/partials/header')
    <!--Main layout-->
    <main>
        <div class="container pt-4">
            <div class="content">
                @yield('content')
            </div>
        </div>
    </main>
    <!--Main layout-->

    <script src="https://kit.fontawesome.com/c89d7d6e41.js" crossorigin="anonymous"></script>
</body>
</html>