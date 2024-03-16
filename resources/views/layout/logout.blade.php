<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/layout.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Google-calendar</title>

</head>

<body>

    <div class="navs ona">
        <div class="nav_left">
            <div class="nav_image">
                <a href="#"">
                    <img class="nav_logos" loading="lazy" src="/img/logo.png" alt="">
                </a>
            </div>
        </div>
        <div class="nav_left">
            <button onclick="togglePopup()">
                <i class="fas fa-bars"></i>
            </button>
            <!-- Popup card -->
            <div class="popup-card" id="popupCard">
                <div class="container">
                    <h4>Hi {{ Auth::user()->first_name }}</h4>
                </div>
                <h4><a href="{{ url('/') }}">Sign out</a></h4>
            </div>
        </div>
    </div>

    <main>
        @yield('contents')
    </main>

    <script>
        // Function to toggle the visibility of the popup card
        function togglePopup() {
            var popup = document.getElementById('popupCard');
            if (popup.style.display === 'none' || popup.style.display === '') {
                popup.style.display = 'block';
            } else {
                popup.style.display = 'none';
            }
        }
    </script>
</body>

</html>
