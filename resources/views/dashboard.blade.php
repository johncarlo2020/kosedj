<x-app-layout>
    <style>
        .message {
            color: black;
        }

        .station-name-modal {
            color: black;
            font-size: 20px;
            font-weight: bolder;
            letter-spacing: 3px;
        }
    </style>
    <div class="modal fade " id="scanCompleteModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="text-center content">
                        <div class="image-check d-flex justify-content-center">
                            <div class="border rounded-circle d-flex justify-content-center align-items-center"
                                style="width: 50px; height: 50px; margin-bottom:20px;">
                                <i class="fa-solid fa-exclamation d-block" style="font-size: 25px;
                                                                "></i>
                            </div>
                        </div>

                        <div class="text-content">
                            <p class="px-5 station-name-modal">
                                UNLEASH YOUR INNER LIGHTS THIS RAMADAN
                            </p>
                            <p class="px-5 message">Kindly complete
                                Station 1 - Station 2 to proceed to the Gift Redemption Station</p>
                        </div>
                        <div class="">
                            <button type="button" onclick="test()" class="button" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
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
