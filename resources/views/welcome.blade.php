<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <title>Kose</title>

        @vite(['resources/sass/app.scss', 'resources/js/app.js'])

        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
            href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap"
            rel="stylesheet"
        />
    </head>
    <style>
        body,
        html {
            height: 100%;
            margin: 0;
            display: flex;
            flex-direction: column;
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
            text-decoration: none !important;
            /* Remove underline */
            color: #fff;
            /* Keep the link color same as the text color */
        }
    </style>

    <body class="antialiased home">
        <div class="pt-5 container-fluid">
            <div class="row">
                <div
                    class="col-12 p-0 d-flex justify-content-center align-items-center"
                >
                    @include('components.branding')
                </div>
                <div class="welcome-text">
                    <img class="logo" src="{{ asset('images/welcometext.png') }}" alt="">
                </div>
                <div class="text-center col-12 text-content welcome p-0">
                    <div class="mt-3 branding">
                        <img
                            class="structure"
                            src="{{ asset('images/reg bg-visual.webp') }}"
                            alt=""
                        />
                    </div>
                    {{-- <a
                        href="{{ route('register') }}"
                        class="mt-5 mb-5 discover-btn btn rounded-pill"
                        >Sign Up</a
                    > --}}

                    <a class="btn bg-transparent new-sign-in" href="{{ route('register') }}">
                        <img class="logo" src="{{ asset('images/signup-button.webp') }}" alt="">
                    </a>
                    <p class="already-register mt-5">Already Registered</p>
                    <p class="already-register mb-4">
                        Please Login
                        <a href="{{ route('login') }}" class="">here</a>
                    </p>
                    <a class="mt-5" href="https://wowsome.com.my/">Powered by WOWSOME®2024</a>
                </div>
            </div>
        </div>
    </body>
</html>
