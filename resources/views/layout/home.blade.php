<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/layout.css">
    <title>Google-calendar</title>

</head>

<body>

    <div class="nav">
        <div class="nav_left">
            <div class="nav_image">
                <img class="nav_logos" loading="lazy" src="/img/logo.png" alt="">
            </div>
        </div>

        <form action="{{ route('logout') }}" method="POST" class="d-flex" role="search">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger" type="submit">Logout</button>
        </form>
       
    </div>

    <div id="signIn" style="display: none;">
        @include('sign.signIn')
    </div>

    <main>
        @yield('content')
    </main>

    <div class="container">
        <h1> Welcome, {{ Auth::user()->first_name }}</h1>
     </div>
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
