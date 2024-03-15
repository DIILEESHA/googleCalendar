<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/layout.css">
    <title>Document</title>
</head>

<body>

    <div class="nav">
        <div class="nav_left">
            <div class="nav_image">
                <img class="nav_logos" loading="lazy" src="/img/logo.png" alt="">
            </div>
        </div>
        <div class="nav_left">
            <h4 class="sign_in">sign in</h4>
        </div>
    </div>

    <main>
        @yield('content')
    </main>
</body>

</html>
