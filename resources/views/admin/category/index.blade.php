@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12">
        @if (session('message'))
        <h6 class="alert alert-success">{{ session('message') }}</h6>
        @endif
        <div class="card">
            <div class="card-header">
                <h3>Category
                    <a href="{{ route('category.create') }}" class="btn btn-outline-primary btn-sm float-end">Ajouter</a>
                </h3>
            </div>
            <div class="card-body">

            </div>
        </div>
    </div>
</div>
@endsection