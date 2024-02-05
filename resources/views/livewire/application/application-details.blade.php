<div>
    <div class="row g-1">
        <div class="col-4">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" wire:model="name"
                @readonly(true)>
        </div>
        <div class="col-8">
            <label for="secret" class="form-label">Secret</label>
            <input type="text" class="form-control" id="secret" wire:model="secret"
                @readonly(true)>
        </div>
        <div class="col-3">
            <label for="owner_id" class="form-label">Owner ID</label>
            <input type="text" class="form-control" id="owner_id" wire:model="owner_id"
                @readonly(true)>
        </div>
    </div>
</div>
