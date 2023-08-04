<div wire:ignore.self class="modal fade" id="addBrandModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ajout d'une branche</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="storeBrand()">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name">Nom de la branche</label>
                        <input type="text" wire:model.defer="name" class="form-control" id="name" placeholder="Nom" />
                        @error("name")
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="slug">Slug de la branche</label>
                        <input type="text" wire:model.defer="slug" class="form-control" id="slug" placeholder="Slug" />
                        @error("slug")
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="status">Status de la branche</label> <br>
                        <input type="checkbox" wire:model.defer="status" id="status" /> Cocher=Cacher, Decocher=Visible
                        @error("status")
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-danger">Ajouter</button>
                </div>
            </form>
        </div>
    </div>
</div>