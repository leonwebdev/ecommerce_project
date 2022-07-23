<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uptrend | {{ $title }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
    <!-- Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</head>

<body>
    @include('admin/partials/header')

    <!--Main layout-->
    <main>
        <div class="container pt-4">
            <!-- Flash Message -->
            @include('admin.partials.flash')
            <!-- Flash Message -->
            <div class="content">
                @yield('content')
            </div>
        </div>
    </main>
    <!--Main layout-->

    <script src="https://kit.fontawesome.com/c89d7d6e41.js" crossorigin="anonymous"></script>
</body>

</html>
