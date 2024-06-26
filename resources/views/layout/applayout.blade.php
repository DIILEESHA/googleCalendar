<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/layout.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Google-calendar</title>

</head>

<body>

    <div class="nav">
        <div class="nav_left">
            <div class="nav_image">
                <a href="/"">
                    <img class="nav_logos" loading="lazy" src="/img/logo.png" alt="">
                </a>
            </div>
        </div>
        <div class="nav_left">
            <h4  class="sign_in"><a class="linka" href="{{ url('/login') }}">Sign in</a></h4>

        </div>
    </div>

    <div id="signIn" style="display: none;">
        @include('sign.signIn')
    </div>

    <main>
        @yield('content')
    </main>
    <script>
        function toggleCreateForm() {
            var modal = document.getElementById('signIn');
            if (modal.style.display === 'none' || modal.style.display === '') {
                modal.style.display = 'block';
            } else {
                modal.style.display = 'none';
            }
        }
    </script>
</body>

</html>
