
<div>
      <!-- Modal -->
  <div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Suppression</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form wire:submit.prevent="destroyCategory">
            <div class="modal-body">
                <h6>Etes vous sure de vouloir supprimer ?</h6>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                <button type="submit" class="btn btn-danger">Oui. Supprimer</button>
              </div>
        </form>
      </div>
    </div>
  </div>
  

<div class="row">
    <div class="col-md-12">
        @if (session('message'))
        <h6 class="alert alert-success">{{ session('message') }}</h6>
        @endif
        <div class="card">
            <div class="card-header">
                <h3>Categories
                    <a href="{{ route('category.create') }}"
                        class="btn btn-outline-primary btn-sm float-end">Ajouter</a>
                </h3>
            </div>
            <div class="card-body">
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
                                    Status
                                </th>
                                <th>
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($categories as $category)
                            <tr>
                                <td>
                                    {{ $category->id }}
                                </td>
                                <td>
                                    {{ $category->name }}
                                </td>
                                
                                <td>
                                    {{ $category->status == '1' ? 'Cacher' : 'Visible' }}
                                </td>
                                <td>
                                    <a href="{{ route("category.edit", $category->id ) }}" class="btn btn-outline-primary">Editer</a>
                                    <a href="#" wire:click="deleteCategory({{ $category->id }})" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">Supprimer</a>
                                </td>
                            </tr>
                            @empty
                                <tr>
                                    <td colspan="5">Aucune de categorie trouvée</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="justify-content-center">
                        {{ $categories->links() }}
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
            $('#deleteModal').modal('hide');
        });
    </script>
@endpush