<div>
    <form class="row g-3">
        <div class="col-12">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="jhon"
                wire:model.live.debounce.250ms="name">
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="col-12">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                placeholder="jhon@example.com" wire:model.live.debounce.250ms="email">
            @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="col-12">
            <label for="email" class="form-label">Owner Id</label>
            <div class="input-group">
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                    placeholder="jhon@example.com" wire:model.live.debounce.250ms="email" @readonly(true)>
                <button type="button" class="btn btn-primary px-4">Re-Generate</button>
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-md-12">
            <div class="d-md-flex d-grid align-items-center gap-3">
                <button type="submit" class="btn btn-primary px-4">Save</button>
            </div>
        </div>
    </form>
</div>
