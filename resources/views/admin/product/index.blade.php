@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">
        @if (session('message'))
        <h6 class="alert alert-success">{{ session('message') }}</h6>
        @endif
        <div class="card">
            <div class="card-header">
                <h3>Liste des produits
                    <a href="{{ route('product.create') }}"
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
                            {{-- @forelse ($categories as $category)
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
                            @endforelse --}}
                        </tbody>
                    </table>
                    <div class="justify-content-center">
                        {{-- {{ $categories->links() }} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection