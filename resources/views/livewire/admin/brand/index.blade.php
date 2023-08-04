<div>
    <!-- Modal -->

    @include("livewire.admin.brand.modal-form")

    <div class="row">
        <div class="col-md-12">
            @if (session('message'))
            <h6 class="alert alert-success">{{ session('message') }}</h6>
            @endif
            <div class="card">
                <div class="card-header">
                    <h3>Branches
                        <a href="{{ route('category.create') }}" class="btn btn-outline-primary btn-sm float-end"
                            data-bs-toggle="modal" data-bs-target="#addBrandModal">Ajouter</a>
                    </h3>
                </div>
                <div class=" card-body">
                    <div class="table-responsive pt-3">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>
                                        ID
                                    </th>
                                    <th>
                                        Noms
                                    </th>
                                    <th>
                                        Slugs
                                    </th>
                                    <th>
                                        Status
                                    </th>
                                    <th>
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($brands as $brand)
                                <tr>
                                    <td>
                                        {{ $brand->id }}
                                    </td>
                                    <td>
                                        {{ $brand->name }}
                                    </td>
                                    <td>
                                        {{ $brand->slug }}
                                    </td>
                                    <td>
                                        {{ $brand->status == '1' ? 'Cacher' : 'Visible' }}
                                    </td>
                                    <td>
                                        <a href="#" wire:click="editBrand({{ $brand->id }})"  class="btn
                                            btn-outline-primary" data-bs-toggle="modal" data-bs-target="#updateBrandModal">Editer</a>
                                        <a href="#" wire:click="deleteBrand({{ $brand->id }})"
                                            class="btn btn-outline-danger" data-bs-toggle="modal"
                                            data-bs-target="#deleteBrandModal">Supprimer</a>
                                    </td>
                                </tr>
                                @empty
                                    <tr>
                                        <td colspan="5">Aucune de branche trouvée</td>
                                    </tr>
                                @endforelse

                            </tbody>
                        </table>
                        <div class="justify-content-center">
                            {{ $brands->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push("script")
<script>
    window.addEventListener('close-modal', event => {
          $('#addBrandModal').modal('hide');
          $('#updateBrandModal').modal('hide');
          $('#deleteBrandModal').modal('hide');
      });
</script>
@endpush