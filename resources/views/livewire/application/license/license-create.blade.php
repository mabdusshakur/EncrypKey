<div>
    @include('components.helper.alert')
    <form class="row g-3" wire:submit.prevent="createLicense">
        <div class="col-12">
            <label for="app" class="form-label">License</label>
            <input type="text" class="form-control @error('license_key') is-invalid @enderror" id="license_key"
                placeholder="HJIK-LJK43-K2JKS-SJOP4" wire:model.live.debounce.250ms="license_key">
            @error('license_key')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="col-12">
            <label class="form-label">Expires At:</label>
            <input type="date" class="form-control @error('expires_at') is-invalid @enderror" wire:model.live.debounce.250ms="expires_at">
            @error('expires_at')
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
