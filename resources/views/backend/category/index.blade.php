@extends('backend.master')

@section('title', 'Manage Category')

@section('content')
    <div class="container-fluid px-4 py-4">
        <div class="row g-4">
            <div class="col-12">
                <h1 class="text-center">Manage Category</h1>
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
                            <th scope="col">Category Name</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $category->category_name }}</td>
                                <td>{{ $category->status == 1 ? 'Active' : 'Inactive' }}</td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="{{ route('categories.edit', $category->id) }}"
                                            class="btn btn-sm btn-outline-success">Edit</a>
                                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
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
