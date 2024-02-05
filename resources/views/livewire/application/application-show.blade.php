<div>
    <div class="row mb-2 d-felx justify-content-center">
        <div class="col-12 col-xl-4 col-md-6">
            @livewire('application.application-details', ['application' => $application], key($application->id))
        </div>
    </div>
    <hr />
    <div class="row mb-2 d-felx justify-content-center">
        <div class="col-12 col-xl-4 col-md-6">
            @livewire('application.license.license-create', ['application' => $application], key($application->id))
        </div>
    </div>
    <hr />
    @livewire('application.license.license-index', ['application' => $application], key($application->id))
</div>
