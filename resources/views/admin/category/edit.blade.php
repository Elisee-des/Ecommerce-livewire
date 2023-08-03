@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>Edition de {{ $category->name }}
                    <a href="{{ route('category.index') }}" class="btn btn-outline-primary btn-sm float-end">Retour</a>
                </h3>
            </div>
            <div class="card-body">
                <form action="{{ route("category.update", $category->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method("PUT")

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="name" name="name" class="form-control" value="{{ $category->name }}" id="name"
                                placeholder="name" />
                            @error('name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="slug" class="form-label">Slug</label>
                            <input type="slug" name="slug" class="form-control" value="{{ $category->slug }}" id="slug"
                                placeholder="slug" />
                            @error('slug')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" name="description" value="" id="description"
                                rows="3">{{ $category->description }}</textarea>
                            @error('description')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" name="image" class="form-control" value="" id="image" />
                            @error('image')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <img src="/uploads/category/{{ $category->image }}" alt="" class="fluid-img"
                                style="width: 80px">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="status" class="form-label">Status</label><br>
                            <input type="checkbox" name="status" {{ $category->status == '1' ? 'checked' : '' }}
                            value="" id="status" />
                            @error('status')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <h4>Tags SEO</h4>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="meta_title" class="form-label">Titre meta</label>
                            <input type="text" name="meta_title" class="form-control"
                                value="{{ $category->meta_title }}" id="meta_title" placeholder="Titre meta" />
                            @error('meta_title')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="meta_keyword" class="form-label">Titre meta</label>
                            <textarea class="form-control" name="meta_keyword" value="" id="meta_keyword"
                                placeholder="Mot cle meta" rows="3">{{ $category->meta_keyword }}</textarea>
                            @error('meta_keyword')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="meta_description" class="form-label">Description meta</label>
                            <textarea class="form-control" name="meta_description" value="" id="meta_description"
                                rows="3" placeholder="Desccription meta">{{ $category->meta_description }}</textarea>
                            @error('meta_description')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <button class="btn btn-outline-primary float-end">Editer</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection