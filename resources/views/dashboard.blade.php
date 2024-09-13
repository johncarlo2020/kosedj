<x-app-layout>
    <div class="container-fluid start home dashboard">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="col-12 d-flex justify-content-center">
                    @include('components.branding')
                </div>
                <div class="mt-3 text-center col-12 text-content welcome">
                    <h1 class="mt-5 heading">Where Wellness Embraces Beauty</h1>
                    <h1 class="mt-2 heading">
                        Japanese Holistic Kampology Skincare
                    </h1>

                    <div class="mt-3 branding">
                        <img
                            class="structure"
                            src="{{ asset('images/structure.png') }}"
                            alt=""
                        />
                    </div>

                    @if ($user == true)
                    <a
                        href="{{ route('congrats') }}"
                        class="mt-5 mb-5 discover-btn btn rounded-pill"
                        >My Result</a
                    >
                    @else
                    <p class="my-2 text-white">Start Survey</p>
                    <div class="button-container">
                            <button type="button" onclick="sendMessage('en')" class="language-btn btn rounded-pill">English</button>
                            <button type="button" onclick="sendMessage('cn')" class="language-btn btn rounded-pill">华语</button>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script>
        function sendMessage(language) {
            // Fetch the CSRF token from the meta tag
            var csrfToken = $('meta[name="csrf-token"]').attr('content');
            console.log(language);

            $.ajax({
                url: '{{ route('lang') }}', // Using Laravel's route() helper function
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken, // Include the CSRF token in the headers
                },
                data: {
                    lang: language,
                },
                success: function(response) {
                    window.location.href = '{{ route('survey') }}';

                },
                error: function(xhr, status, error) {

                }
            });
        }
    </script>
</x-app-layout>
