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

    <body class="antialiased home discover-page">
        <div class="pt-5 container-fluid">
            <div class="row">
                <div
                    class="col-12 d-flex justify-content-center align-items-center"
                >
                    @include('components.branding')
                </div>
                <div class="mt-3 text-center col-12 text-content welcome">
                    <h1 class="mt-5 heading">Where Wellness Embraces Beauty</h1>
                    <h1 class="mt-2 heading">
                        Japanese Holistic Kampology Skincare
                    </h1>
                    <div class="mt-3 branding">
                        <img
                            class="structure"
                            src="{{ asset('images/structure.png') }}"
                            alt=""
                        />
                    </div>
                    <p class="my-2 text-white">Start Survey</p>
                    <div class="button-container">
                        <a
                            href="{{ route('survey') }}"
                            class="language-btn btn rounded-pill"
                            >English</a
                        >
                        <a
                            href="{{ route('survey') }}"
                            class="language-btn btn rounded-pill"
                            >华语</a
                        >
                    </div>
                </div>
            </div>
        </div>
        <footer>
            <a href="https://wowsome.com.my/">Powered by WOWSOME® 2024</a>
        </footer>
    </body>
</html>
