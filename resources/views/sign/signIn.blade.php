<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <link rel="stylesheet" href="/css/signIn.css">
    <title>Calendar - Login</title>
</head>

<body>
    <div class="signIn_container">
        <div class="sign_form">
            <div title="Close Sign In" class="signIn_closer">
                <a class="linka" href="{{ url('/') }}">
                    <i class="fa-solid fa-xmark"></i>
                </a>
            </div>
            <form action="{{ route('login') }}" class="sign_main_form" method="POST">
                @csrf
                <h2 class="signin_title">Sign In</h2>
                <h3 class="df">to continue to Google Calendar</h3>
                <div class="sign_input_section">
                    <label for="" class="sign_label">Email</label>
                    <input required type="email" name="email" id="email" class="sign_input">
                </div>
                <div class="sign_input_section">
                    <label for="" class="sign_label">Password</label>
                    <input required type="password" name="password" id="password" class="sign_input">
                </div>
                <div class="btn_margin">
                    <button type="submit" class="sign_btn">Log in</button>
                </div>
                <span class="sign_span">By continuing, you agree to the <span class="style">terms of use</span> and
                    <span class="style">privacy policy</span></span>
                <div class="forgotten_pwd_area">
                    <h2>forget your password</h2>
                </div>
                <div class="community_new">
            </form>
            <h2 class="new">new to our community</h2>
            <div class="liner"></div>
        </div>
        <div class="btn_margin">
            <button class="sign_btn bottom">
                <a class="linka" href="{{ url('/register') }}">create an account</a>
            </button>
        </div>
    </div>
    </div>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script>
        function showErrorToast(message) {
            Toastify({
                text: message,
                duration: 1500,
                gravity: "top",
                position: "center",
                backgroundColor: "linear-gradient(to right, #ff416c, #ff4b2b)"
            }).showToast();
        }

        function showSuccessToast(message) {
            Toastify({
                text: message,
                duration: 1500,
                gravity: "top",
                position: "center",
                backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)"
            }).showToast();
        }

        window.onload = function () {
            var errorMessage = "{{ session('error') }}";
            var successMessage = "{{ session('success') }}";
            if (errorMessage) {
                showErrorToast(errorMessage);
            }
            if (successMessage) {
                showSuccessToast(successMessage);
            }
        };
    </script>
</body>

</html>
