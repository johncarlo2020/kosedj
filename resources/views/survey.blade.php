<x-app-layout>
    <div class="container-fluid start home dashboard survey">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="mb-3 col-12 d-flex justify-content-center">
                    @include('components.branding')
                </div>
                <div class="col-12">
                    <div class="stepper">
                       <!-- Stepper Navigation -->
                        <ul class="mb-3 nav nav-pills" id="pills-tab" role="tablist">
                            @foreach($optionsList as $index => $option)
                            <li class="nav-item" role="presentation">
                                <a class="nav-link @if($index == 0) active @endif" id="pills-step{{ $index }}-tab" data-bs-toggle="pill" href="#pills-step{{ $index }}" role="tab" aria-controls="pills-step{{ $index }}" aria-selected="{{ $index == 0 ? 'true' : 'false' }}">
                                </a>
                            </li>
                            @endforeach
                        </ul>

                        <!-- Stepper Content -->
                        <div class="tab-content" id="pills-tabContent">
                            @foreach($optionsList as $index => $option)
                            <div class="tab-pane fade @if($index == 0) show active @endif" id="pills-step{{ $index }}" role="tabpanel" aria-labelledby="pills-step{{ $index }}-tab">
                                <div class="step">
                                    <div class="mb-3 text-center text-white step-name">
                                        <span>{{ $option->name }}</span>
                                    </div>
                                    <div class="px-3 py-4 check-box-container">
                                        @foreach ($option->questions as $question)
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="question-{{ $question->id }}" name="question-{{ $question->id }}" value="{{ $question->id }}">
                                            <label class="form-check-label" for="question-{{ $question->id }}">{{ $question->name }}</label>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>

                        <!-- Continue Button -->
                        <div class="mt-3 btn-container d-flex justify-content-center align-items-center">
                            <button class="btn btn-info rounded-pill w-50" onclick="nextStep()">Continue</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function nextStep() {
            var activeTab = document.querySelector('.nav-link.active');
            var nextTab = activeTab.parentElement.nextElementSibling;
            if (nextTab) {
                var nextLink = nextTab.querySelector('.nav-link');
                var nextTabInstance = new bootstrap.Tab(nextLink);
                nextTabInstance.show();
            }
        }
    </script>
    <!-- Ensure Bootstrap JS is included -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
</x-app-layout>
