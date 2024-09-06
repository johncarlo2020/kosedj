<x-app-layout>
    <style>
        .icon-badge {
            width: 150px;
            height: auto;
            margin-bottom: 25px;
        }

        .iconNew {
            width: 60px;
        }

        * {
            margin: 0;
            padding: 0;
        }

        body {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100vw;
            height: 100vh;
            background-color: #202020;
            overflow: hidden;
        }

        .roulette-container {
            transform: rotate(180deg);
        }

        .roulette-container::before {
            content: "";
            background-image: url('{{ asset('images/rouletArrow.png') }}');
            width: 5vw;
            height: 100px;
            background-size: contain;
            background-repeat: no-repeat;
            position: absolute;
            z-index: 1;
            bottom: -20px;
            left: 50%;
            transform: translate(-50%) rotate(180deg);
            pointer-events: none;
        }

        .roulette {
            border-radius: 50%;
            position: relative;
            overflow: hidden;

            -webkit-animation-timing-function: cubic-bezier(0, 0.4, 0.4, 1.04);
            animation-timing-function: cubic-bezier(0, 0.4, 0.4, 1.04);
            -webkit-animation-duration: 5.8s;
            animation-duration: 5.8s;
            -webkit-animation-fill-mode: forwards;
            animation-fill-mode: forwards;
            -webkit-animation-iteration-count: 1;
            animation-iteration-count: 1;
        }

        .roulette::before {
            content: "";
            width: 30px;
            height: 30px;
            background-color: #fff;
            /* outline: 5px solid #ABE0F9; */
            position: absolute;
            z-index: 2;
            border-radius: 360px;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            cursor: pointer;
        }

        .option {
            border: 0 solid transparent;
            position: absolute;
            transform-origin: top center;
            top: 50%;
        }

        .option::before {
            z-index: 10;
            position: absolute;
            background-position: center;
            background-repeat: no-repeat;
            background-size: contain;
            margin-bottom: 20px;
            content: '';
            left: -20px;
            width: 10vw;
            height: 40vw;
        }

        .centered-image {
            width: 100%;
            height: 100%;
            object-fit: contain;
            top: 0;
            left: -20px;
        }
        .wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 310px;
            height: 310px;
            margin: 0 auto;
            background-color: #ABE0F9;
            border-radius: 50%;
            padding: 10px;
            position: relative;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .dot {
        position: absolute;
        width: 12px;
        height: 12px;
        background-color: #fff;
        border-radius: 50%;
    }

    .dot:nth-child(1) { transform: rotate(0deg) translate(143px); }
    .dot:nth-child(2) { transform: rotate(45deg) translate(143px); }
    .dot:nth-child(3) { transform: rotate(90deg) translate(143px); }
    .dot:nth-child(4) { transform: rotate(135deg) translate(143px); }
    .dot:nth-child(5) { transform: rotate(180deg) translate(143px); }
    .dot:nth-child(6) { transform: rotate(225deg) translate(143px); }
    .dot:nth-child(7) { transform: rotate(270deg) translate(143px); }
    .dot:nth-child(8) { transform: rotate(315deg) translate(143px); }

        .roulette {
            margin: 0 auto;
            border: 4px solid #FFF8AD;
        }
        .option-image-container {
            width: 20%;
            height: auto;
            margin: 0 auto;
            display: block;
        }
        .option-image-container .option-image {
            width: 100%;
            height: auto;
            object-fit: contain;
        }
        .modal-background {
            background-color: transparent;
        }
    </style>
    <div class="modal fade " id="scanCompleteModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="text-center content">
                        <div class="image-check">
                            <i class="fa-regular check"></i>
                        </div>
                        <div class="text-content">
                            <img class="icon-badge" id="badge" src="">
                            <img class="check" id="badge" src="">

                            <p class="station-text">Station <span class="station_id"></span></p>
                            <p class="message">
                                Check-in Successful
                            </p>
                        </div>
                        <div class="">
                            <a href="{{ route('dashboard') }}" class="button">
                                Close
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="stationPage" class="station-page home ">
        <div class="mb-3 branding-container">
            @include('components.branding')
        </div>
        <div id="mainContent" class="mt-3 text-center col-12 text-content">
            <div id="{{ $user ? '' : 'forceQr' }}" class="mt-4 icon-container">
                <img class="icon-bg iconNew" src="{{ asset('images/Icon4.png') }}" alt="Lock Image">
            </div>
            <h1 class="mt-4 station-heading">
                @if ($station->id == 6)
                Gift House
                @else
                Station {{ $station->id }}
                @endif
            </h1>
            <h2 class="station-subheading">{{ $station->name }}</h2>
            <img class="mt-5 station-image" src="{{ asset('images/step/step-img-' . $station->id . '.png') }}"
                alt="Station Image">
            @if ($user != true)

            <button id="start-scanner" class="mx-auto mt-4 camera-btn"><img src="{{ asset('images/camera.svg') }}"
                    alt=""></button>
            <p class="px-4 mt-3 bottom-text">Scan the QR code at the station to proceed</p>

            @else
            <p class="px-4 mt-3 bottom-text">Already Completed</p>
            @endif
            <div class="wrapper">
                @for ($i = 0; $i < 8; $i++)
                    <div class="dot"></div>
                @endfor
                <div class="roulette-container">
                    <div class="roulette"></div>
                </div>
            </div>
        </div>
        <div id="scannerContainer" class="scanner-container d-none">
            <!-- <button id="close" class="mx-auto mt-4 camera-btn">x</button> -->
            <div id="reader"></div>
            <div class="p-3 mt-3">
                <p class="px-4 text-center bottom-text">Find the QR code & Scan to check in the station</p>
            </div>
        </div>
    </div>

    <style>
        #customModal .modal-content {
            background: transparent;
            border: none;
            position: relative;
            width: 359px;
            height: 538px;
            margin: 0 auto;
        }
        .button-container {
            position: absolute;
            bottom: 45px;
            left: 50%;
            transform: translateX(-50%);
        }
        .button-container button {
           width: 200px ;
           height: 40px;
           border-radius: 40px;
        }

        .button-container button.btn-secondary {
            border: none;
            background: linear-gradient(90deg, #EBA5C2 0%, #DF689A 100%);
            margin-bottom: 6px;
        }

        .button-container button.btn-primary {
            border: none;
            border: 0.4px solid;
            border-image-source: linear-gradient(90deg, #EBA5C2 0%, #DF689A 100%);
            box-shadow: 0px 7.95px 15.9px 0px #C77CB961;
            background-color: #fff;
            color: #DF689A;
        }
    </style>

    <div class="modal fade" id="customModal" tabindex="-1" role="dialog" aria-labelledby="customModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-background">
                <div class="button-container">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Yes</button>
                    <button type="button" class="btn btn-primary">No</button>
                </div>
                <img src="{{ asset('images/modal.png') }}" alt="">
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.5.1/dist/confetti.browser.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <!-- Ensure Bootstrap JS is included -->
    <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.4.0/dist/confetti.browser.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#customModal').modal('show');
        });
    </script>
    <script>
        const mainContent = document.getElementById('mainContent');
        const scannerContainer = document.getElementById('scannerContainer');
        var message = '';
        var count = 0;
        var lastClick = 0;
        document.getElementById('start-scanner').addEventListener('click', function(event) {
            event.preventDefault();

            mainContent.classList.add('d-none');
            scannerContainer.classList.remove('d-none');

            //get permission to use camera dont start qr scanner until permission is granted

            const html5QrCode = new Html5Qrcode("reader");

            html5QrCode.start({
                        facingMode: "environment"
                    }, {
                        fps: 10,
                        qrbox: 150,
                        aspectRatio: 9 / 16 // Set the aspect ratio to 16:9
                    },
                    qrCodeMessage => {
                        sendMessage(`${qrCodeMessage}`);
                        html5QrCode.stop();

                    },
                    errorMessage => {
                        console.log(`QR Code no longer in front of camera.`);
                    })
                .catch(err => {
                    console.log(`Unable to start scanning, error: ${err}`);
                });

        });

        function sendMessage(message) {
            // Fetch the CSRF token from the meta tag
            var csrfToken = $('meta[name="csrf-token"]').attr('content');
            console.log(message);

            $.ajax({
                url: '{{ route('process_qr_code') }}', // Using Laravel's route() helper function
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken, // Include the CSRF token in the headers
                },
                data: {
                    qrCodeMessage: message,
                    station: {{ $station->id }}
                },
                success: function(response) {
                    // Create a new canvas element for confetti
                    const confettiCanvas = document.createElement('canvas');
                    confettiCanvas.style.position = 'fixed';
                    confettiCanvas.style.top = 0;
                    confettiCanvas.style.left = 0;
                    confettiCanvas.style.width = '100%';
                    confettiCanvas.style.height = '100%';
                    confettiCanvas.style.pointerEvents = 'none';
                    confettiCanvas.style.zIndex = 9999;
                    document.body.appendChild(confettiCanvas);

                    // Trigger confetti using the new canvas
                    const myConfetti = confetti.create(confettiCanvas, {
                        resize: true,
                        useWorker: true
                    });

                    myConfetti({
                        particleCount: 100,
                        spread: 70,
                        origin: {
                            y: 0.6
                        }
                    });

                    // Optional: Remove the canvas after a short delay
                    setTimeout(() => {
                        document.body.removeChild(confettiCanvas);
                    }, 5000);
                    console.log('QR Code message sent successfully:', response);
                    // Handle success response if needed
                    const trimmedMessage = message.trim();
                    // Get the last character of the QR code message
                    const lastCharacter = trimmedMessage.charAt(trimmedMessage.length - 1);

                    $('.station_id').html(lastCharacter);
                    const dynamicImage = `{{ asset('images/badge') }}${lastCharacter}.png`;
                    $('#badge').attr('src', dynamicImage);

                    $(scanCompleteModal).modal('show');

                },
                error: function(xhr, status, error) {
                    console.error('Error sending QR Code message:', error);
                    $('.station-text').html('Failed');
                    $('.message').html('Invalid QR code. Please try again.');
                    $('.check').attr('src', '{{ asset('images/error.svg') }}');
                    $(scanCompleteModal).modal('show');
                }
            });
        }

    $(document).ready(function(){
        var rouletteSize = 267;
        var numberOfSlots = 8;
        var slotAngle = 360 / numberOfSlots;
        var degrees = (180 - slotAngle) / 2;
        var slotHeight = Math.tan(degrees * Math.PI / 180) * (rouletteSize / 2);

        var colors = ['#A6D7C0', '#FFF8AD']; // Define the two colors
        var images = [];

        for (var i = 1; i <= numberOfSlots; i++) {
            images.push('{{ asset("images") }}/badge' + i + '.png');
        }

        $(".roulette").css({
            'width' : rouletteSize + 'px',
            'height' : rouletteSize + 'px'
        });

        $('head').append('<style id="afterNumber"></style>');

        for(var i=1; i<=numberOfSlots; i++){

            $(".roulette").append('<div class="option option-'+ i +'"></div>');
            var classSelector = '.option-' + i;

            $(classSelector).css({
                'transform' : 'rotate(' + slotAngle * i + 'deg)',
                'border-bottom-color' : colors[i % 2] // Alternate between the two colors
            });

            var dynamicSize = window.innerWidth * 0.1; // 10% of the screen width
                $('#afterNumber').append('.option-' + i + '::before {content: ""; z-index: 9999 !important; background-image: url("' + images[i-1] + '");}');

            $(".option")
                .attr('data-content', i)
                .attr('data-width', (rouletteSize / 2) + 'px')
                .attr('data-line', (rouletteSize / 2) + 'px');
        }

        $(".option").css({
            'border-bottom-width' : slotHeight + 'px',
            'border-right-width' : (rouletteSize / 2) + 'px',
            'border-left-width' : (rouletteSize / 2) + 'px'
        });

        $('.roulette').before().click(function(){
            var num;
            var numID = 'number-';
            num = 1 + Math.round(Math.random() * (numberOfSlots - 1));
            numID += num;

            $('#rouletteAnimation').remove();
            $('head').append('<style id="rouletteAnimation">'+
                '#number-'+ num +' { animation-name: number-'+ num +'; } '+
            '@keyframes number-'+ num +' {'+
                'from { transform: rotate(0); } '+
                'to { transform: rotate('+ (360 * (numberOfSlots - 1) - slotAngle * num) +'deg); }'+
            '}'+
            '</style>'
            );

            $('.roulette').removeAttr('id').attr('id', numID);
        });

    });
    </script>
</x-app-layout>
