<x-guest-layout>
    <div class="py-5 container-fluid home verify-email">
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
                            <button class="mt-3 main-btn btn btn-primary" type="submit">
                                Resend Verification Email
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <footer>

        <form method="POST" action="{{ route('logout') }}">
            @csrf


            <button type="submit" class="logout-text">
                Logout
            </button>
        </form>
            <a class="footer-text" href="https://wowsome.com.my/">Powered by WOWSOME® 2024</a>
        </footer>
</x-guest-layout>
