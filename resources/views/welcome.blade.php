@extends('layout.applayout')

@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="/css/welcome.css">
        <title>Document</title>
    </head>

    <body>

        <div class="welcome_container">


            <div class="welcome_grid">
                <div class="welcome_sub_grid">
                    <div class="welcome_img">

                        <img class="welcomer" loading="lazy" src="/img/logo-calendar.png" alt="welcome_logo" />
                    </div>
                    <h2 class="welcome_title">Shareable Online Calendar</h2>
                    <p class="welcome_para">
                        Spend less time planning and more time doing with a shareable calendar that works across Google
                        Workspace.
                    </p>
                    <div class="button_connector">
                        <button class="getstarted">Sign in</button>
                    </div>

                    <div class="downloadables">
                        <div class="cover">
                            <img src="/img/google.png" alt="">
                        </div>
                        <div class="cover">
                            <img src="/img/appstore.png" alt="">
                        </div>
                    </div>
                </div>
                <div class="welcome_sub_grid">

                    <div class="sub_img">
                        <img src="/img/uni.png" loading="lazy" alt="welcome_img">
                    </div>
                </div>
            </div>



        </div>
    </body>

    </html>
@endsection
