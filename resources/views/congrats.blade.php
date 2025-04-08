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
    <div class="pt-5 container-fluid home start completed-screen ">
        <div class="col-12 d-flex justify-content-center">
            @include('components.branding')
        </div>
        <div class="d-flex justify-content-center align-items-center flex-column">
            <p class="yellow-text">Congratulations, {{ auth()->user()->fname }}!<br>
                <span>You have completed</span><br>
                </p>

                <p class="yellow-text2">Collect Your Gift<br><span class="ml-4">at Counter</span></p>
                <img class="gift" src="{{ asset('images/step/step-img-2.webp') }}" alt=""  alt="">
        </div>

        <div class="more-info mt-5 text-center container">
            <p class="mb-4">Visit our official website</p>
            <div class="col-12 d-flex justify-content-center mb-4">
                @include('components.branding')
            </div>
            <a href="https://www.kose.com.my">Click Here for more Information</a>
        </div>

        <div class="footer">
            <a class="mt-5" href="https://wowsome.com.my/">Powered by WOWSOME®2024</a>
        </div>
    </div>

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
