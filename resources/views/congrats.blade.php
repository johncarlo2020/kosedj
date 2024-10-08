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
            @if ($lang == 'cn')
            做得好 {{ auth()->user()->fname }} ! <br />
            根据您的体质需求选择一张建议卡，做您的美容茶吧
            @else
            Well done {{ auth()->user()->fname }} ! <br />
            Pick a suggestion card based on your body condition and DIY your
            beauty tea.
            @endif

        </h1>
        <div class="my-3 ranking-container">
            @foreach ($top as $index => $item)
                <div class="ranking ranking__{{ $item['survey'] }} mb-2 {{ $index >= 3 ? 'd-none' : '' }}">
                    <img src="{{ asset('images/bubble' . $item['survey'] . '.png') }}" alt="" />
                    <div class="barholder">
                        <p class="rank-name">
                            @if ($lang == 'cn')
                                {{ $item['survey_cn_name'] }}
                            @else
                            {{ $item['survey_name'] }}

                            @endif
                        <div class="progress">
                            <div class="progress-bar" roley="progressbar"
                                style="width: {{ $item['percentage_answered'] }}%;"
                                aria-valuenow="{{ $item['percentage_answered'] }}" aria-valuemin="0"
                                aria-valuemax="100"></div>
                        </div>
                        <p class="rank-points">
                            {{ $item['count'] }}/{{ $item['total'] }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="btn-container">
            <a href="#" class="show-more">Show more</a>
        </div>
    </div>

    <footer class="p-2">
        <p>Visit our official website</p>
        <img class="footer-logo" src="{{ asset('images/logo-large.png') }}" alt="" />
        <br />
        <a href="https://www.kose.com.my/sekkisei-blue-brochure ">Click Here for more Information</a>
    </footer>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const showMoreBtn = document.querySelector(".show-more");
            const hiddenItems = document.querySelectorAll(".ranking.d-none");

            showMoreBtn.addEventListener("click", function(e) {
                e.preventDefault();
                hiddenItems.forEach((item) => item.classList.remove("d-none"));
                showMoreBtn.style.display = "none";
            });
        });
    </script>
</x-app-layout>
