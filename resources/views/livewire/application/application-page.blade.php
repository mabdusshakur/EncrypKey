<div>
    <div class="row mb-2 d-felx justify-content-center">
        <div class="col-12 col-xl-4 col-md-6">
            @livewire('application.application-create')
        </div>
    </div>
    <hr />
    <div class="row g-4">
        @foreach ($applications as $application)
            <div class="col-12 col-xl-4 col-md-6">
                @livewire('application.application-card', ['application' => $application], key($application->id))
            </div>
        @endforeach
    </div>
</div>
