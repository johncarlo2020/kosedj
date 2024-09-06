<x-app-layout>
    <style>
        .well {
            font-size: 16px;
            line-height: 1.2;
            text-align: center;
            color: #fff;
            margin-bottom: 15px;
        }

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
            position: absolute;
            bottom: 0;
            width: 100%;
            font-size: 12px;
            text-align: center;
            padding: 10px 0;
            color: #fff;
        }

        footer img {
            width: 35%;
            height: auto;
            margin-bottom: 10px;
        }

        footer a {
            text-decoration: none;
            color: #fff;
        }
    </style>
    <div class="pt-4 container-fluid home start completed-screen congrats-page">
        <div class="col-12 d-flex justify-content-center">
            @include('components.branding')
        </div>
        <h1 class="mt-5 well">
            Well done {{ auth()->user()->fname }} ! <br />
            Head to the ticket counter for your skin consultation
        </h1>
        <div class="mt-3 image-container">
            @foreach ($top as $index => $item)
                <img class="logo image image-{{ $index + 1 }}"
                    src="{{ asset('images/result' . $item['survey'] . '.png') }}" alt="" />
            @endforeach
        </div>
    </div>

    <footer>
        <p>Visit our official website</p>
        <img class="footer-logo" src="{{ asset('images/logo-large.png') }}" alt="" />
        <br>
        <a href="">Click Here for more Information</a>
    </footer>
</x-app-layout>
