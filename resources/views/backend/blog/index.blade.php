@extends('backend.master')

@section('title', 'Manage Blog')

@section('content')
    <div class="container-fluid px-4 py-4">
        <div class="row g-4">
            <div class="col-12">
                <h1 class="text-center">Manage Blog</h1>
                @if (Session::get('msg'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ Session::get('msg') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Sl No</th>
                            <th scope="col">Category</th>
                            <th scope="col">Title</th>
                            <th scope="col">Author Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Image</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($blogs as $blog)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $blog->category?->category_name }}</td>
                                <td>{{ $blog->title }}</td>
                                <td>{{ $blog->author_name }}</td>
                                <td>{{ $blog->description }}</td>
                                <td><img src="{{ asset($blog->image) }}" alt="" height="50" width="50"></td>
                                <td>{{ $blog->status == 1 ? 'Active' : 'Inactive' }}</td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="{{ route('blogs.edit', $blog->id) }}"
                                            class="btn btn-sm btn-outline-success">Edit</a>
                                        <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger"
                                                onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
