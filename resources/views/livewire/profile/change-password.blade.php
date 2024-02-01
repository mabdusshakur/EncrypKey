<div>
    @include('components.helper.alert')
    <form class="row g-3" wire:submit.prevent="changePassword">
        <div class="col-12">
            <label for="password" class="form-label">Current Password</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                placeholder="Enter Current Password" wire:model.live.debounce.250ms="password">
            @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="col-12">
            <label for="new_password" class="form-label">New Password</label>
            <input type="password" class="form-control @error('new_password') is-invalid @enderror" id="new_password"
                placeholder="Enter New Password" wire:model.live.debounce.250ms="new_password">
            @error('new_password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="col-12">
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Change Password</button>
            </div>
        </div>
    </form>
</div>
