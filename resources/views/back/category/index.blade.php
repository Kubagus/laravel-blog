@extends('back.layout.template')

@section('title', 'Kategori')
@section('content')
    
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Categories</h1>
        </div>
        @include('back.layout.notif')
        <div class="mt-3">
            <button class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#modalCreate">Create</button>
            <table class="table table-stripped table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Created at</th>
                        <th>Function</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->slug }}</td>
                            <td>{{ $category->created_at }}</td>
                            <td>
                                <button class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#modalUpdate{{ $category->id }}">Edit</button>
                                <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modalDelete{{ $category->id }}">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        @include('back.category.create-modal')
        @include('back.category.update-modal')
        @include('back.category.delete-modal')
    </main>
    
@endsection