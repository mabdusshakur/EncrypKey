<div>
    <div class="card">
        <div class="card-body">
            <div class="text-center">
                <img src="{{ asset('assets/images/logo.png') }}" width="60" height="60"
                    class="rounded-circle raised bg-white" alt="">
            </div>
            <div class="text-center mt-4">
                <h5 class="mb-2">{{ $application->name }}</h5>
            </div>
            <div class="d-flex align-items-center justify-content-around mt-5">
                <div class="d-flex flex-column gap-2">
                    <h6 class="mb-0">License : {{ $application->license_count }}</h6>
                </div>
            </div>
            <hr>
            <div class="d-flex align-items-center justify-content-center gap-3">
                <button class="btn btn-primary" wire:click="showApplication">Manage</button>
            </div>
        </div>
    </div>
</div>
