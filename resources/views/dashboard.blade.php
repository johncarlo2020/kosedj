<x-app-layout>
    <div class="container-fluid start home dashboard">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="col-12 d-flex justify-content-center">
                    @include('components.branding')
                </div>
                <div class="mt-3 text-center col-12 text-content welcome">
                    <h1 class="mt-5 heading">
                        The Debut of Japanese Holistic Kampology Skincare
                    </h1>

                    <div class="mt-3 branding">
                        <img
                            class="structure"
                            src="{{ asset('images/structure.png') }}"
                            alt=""
                        />
                    </div>
                    <a
                        href="{{ route('survey') }}"
                        class="mt-5 mb-5 discover-btn btn rounded-pill"
                        >Start Survey</a
                    >
                </div>
            </div>
        </div>
    </div>

    <script>
        function congrats() {
            var url = "{{ route('congrats') }}";
            // Redirect to the generated URL
            window.location.href = url;
        }
    </script>
</x-app-layout>
