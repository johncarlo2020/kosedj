<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>Rohto</title>

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap"
        rel="stylesheet" />
</head>
<style>
    body,
    html {
        height: 100%;
        margin: 0;
        display: flex;
        flex-direction: column;
        font-family: "Nunito", sans-serif;
        /* Set the font to Nunito */
        font-size: 16px;
        /* Set the font size to 16px */
    }

    .container-fluid {
        flex: 1;
    }

    footer {
        font-size: 12px;
        /* Adjust the font size for the footer as needed */
        text-align: center;
        padding: 10px 0;
    }

    footer a {
        text-decoration: none;
        /* Remove underline */
        color: #fff;
        /* Keep the link color same as the text color */
    }
</style>

<body class="antialiased home">
    <div class="py-5 container-fluid">
        <div class="row">
            <div class="col-12 d-flex justify-content-center align-items-center">
                @include('components.branding')
            </div>
            <div class="mt-3 text-center col-12 text-content welcome">
                <h1 class="mt-5 heading">
                    The Debut of Japanese Holistic Kampology Skincare
                </h1>
                <div class="mt-3 branding">
                    <img class="structure" src="{{ asset('images/structure.png') }}" alt="" />
                </div>
                <a href="{{ route('register') }}" class="mt-5 mb-5 discover-btn btn rounded-pill">Sign Up</a>
                <p class="already-register">Already Registered</p>
                <p class="already-register">
                    Please Login
                    <a href="{{ route('login') }}" class="">here</a>
                </p>
            </div>
        </div>
    </div>
    <footer>
        <a href="https://wowsome.com.my/">Powered by WOWSOME®2024</a>
    </footer>
</body>

</html>
