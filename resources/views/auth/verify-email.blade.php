<x-guest-layout>
    <div class="px-5 pb- container-fluid home verify-email">
        <div class="row">
            <div
                class="col-12 d-flex justify-content-center align-items-center"
            >
                @include('components.branding')
            </div>
            <div class="mt-3 text-center col-12 ">
                <h1>Thanks for signing up!</h1>
                <p class="text"> Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn't receive the email, we will gladly send you another.</p>
                <p class="text">A new verification link has been sent to the email address you provided during registration.</p>

                <div class="flex items-center justify-between mt-4">
                    <form method="POST" action="{{ route('verification.send') }}">
                        @csrf

                        <div>
                            {{-- <button class="mt-3 main-btn btn btn-primary" type="submit">
                                Resend Verification Email
                            </button> --}}
                            <button class="mt-3 btn btn-transparent submit-btn" type="submit">
                                <img class="logo" src="{{ asset('images/verification-button.webp') }}" alt="">
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
        <form class="d-flex justify-content-center w-100 align-items-center mt-5" method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-link text-center">
                Logout
            </button>
        </form>
    </div>
    <footer>
            <a class="footer-text" href="https://wowsome.com.my/">Powered by WOWSOME® 2024</a>
        </footer>
</x-guest-layout>
