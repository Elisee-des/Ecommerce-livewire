@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>Ajout d'une categorie
                    <a href="{{ route('category.index') }}" class="btn btn-outline-primary btn-sm float-end">Retour</a>
                </h3>
            </div>
            <div class="card-body">
                <form action="{{ route("category.store") }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="name" name="name" class="form-control" id="name" placeholder="name" />
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="slug" class="form-label">Slug</label>
                            <input type="slug" name="slug" class="form-control" id="slug" placeholder="slug" />
                            @error('slug')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" name="description" id="description" rows="3"></textarea>
                            @error('description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" name="image" class="form-control" id="image" />
                            @error('image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="status" class="form-label">Status</label><br>
                            <input type="checkbox" name="status" id="status" />
                            @error('status')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <h4>Tags SEO</h4>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="meta_title" class="form-label">Meta title</label>
                            <input type="text" name="meta_title" class="form-control" id="meta_title"
                                placeholder="Titre meta" />
                                @error('meta_title')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="meta_keyword" class="form-label">Meta keyword</label>
                            <textarea class="form-control" name="meta_keyword" id="meta_keyword"
                                placeholder="Mot cle meta" rows="3"></textarea>
                                @error('meta_keyword')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="meta_description" class="form-label">Meta description</label>
                            <textarea class="form-control" name="meta_description" id="meta_description" rows="3"
                                placeholder="Desccription meta"></textarea>
                                @error('meta_description')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                        </div>
                        <div class="col-md-12">
                            <button class="btn btn-outline-primary float-end">Enregistré</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection