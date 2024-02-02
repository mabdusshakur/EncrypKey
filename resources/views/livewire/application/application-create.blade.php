<div>
    <form class="row g-3" wire:submit.prevent="createApp">
        <div class="col-12">
            <label for="app" class="form-label">Application Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="My App"
                wire:model.live.debounce.250ms="name">
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="col-12">
            <div class="d-grid">
                <button type="submit" class="btn btn-outline-primary">Create App</button>
            </div>
        </div>
    </form>
</div>
