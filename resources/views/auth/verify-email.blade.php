<x-guest-layout>
    <div class="modal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">BYPASS</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <input type="number" class="bypassInput">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="saveButton" disabled>Save</button>
                </div>
            </div>
        </div>
    </div>
    <div class="py-5 container-fluid home verify-email">
        <div class="row">
            <div class="col-12 d-flex justify-content-center align-items-center bypass">
                @include('components.branding')
            </div>
            <div class="mt-3 text-center col-12">
                <h1>Thanks for signing up!</h1>
                <p class="text">
                    Before getting started, could you verify your email address
                    by clicking on the link we just emailed to you? If you
                    didn't receive the email, we will gladly send you another.
                </p>
                <p class="text">
                    A new verification link has been sent to the email address
                    you provided during registration.
                </p>

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

            <button type="submit" class="logout-text">Logout</button>
        </form>
        <a class="footer-text" href="https://wowsome.com.my/">Powered by WOWSOME® 2024</a>
    </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script>
        $(document).ready(function() {
            $(".modal").modal("show");

            $('.bypassInput').keyup(function() {
                var val = $(this).val();
                if (val == 1945) {
                    console.log(true);
                    $('#saveButton').prop('disabled', false); // Enable Save button
                } else {
                    console.log(false);
                    $('#saveButton').prop('disabled', true); // Disable Save button
                }
            });

            $('#saveButton').click(function() {
                bypass();
            });

            function bypass() {
                // Fetch the CSRF token from the meta tag
                var csrfToken = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    url: '{{ route('bypass') }}', // Using Laravel's route() helper function
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken, // Include the CSRF token in the headers
                    },
                    data: {},
                    success: function(response) {},
                    error: function(xhr, status, error) {}
                });
            }

        });
    </script>
</x-guest-layout>
