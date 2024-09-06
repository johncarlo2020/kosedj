<x-app-layout>
    <div class="pt-4 container-fluid home start completed-screen congrats-page">
        <div class="col-12 d-flex justify-content-center">
            @include('components.branding')
        </div>
        <div class="mt-3 image-container">
            @for ($i = 1; $i <= 3; $i++)
                <img class="logo image image-{{ $i }}" src="{{ asset('images/result' . $i . '.png') }}" alt="">
            @endfor
        </div>
    </div>
</x-app-layout>
