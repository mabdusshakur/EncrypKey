<div>
    @include('components.helper.alert')
    <form class="row g-3" wire:submit.prevent="changeAvatar">
        <div class="col-12">
            <label for="avatar" class="form-label">Select Avatar</label>
            <input class="form-control @error('avatar') is-invalid @enderror" type="file" id="avatar" wire:model="avatar">
            @error('avatar')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="col-12">
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Upload Avatar</button>
            </div>
        </div>
    </form>
</div>
