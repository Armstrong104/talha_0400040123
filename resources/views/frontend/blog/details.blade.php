@extends('frontend.master')

@section('title','Blog Details')

@section('content')
    <div class="container-fluid py-4 px-4">
        <div class="row g-4">
            <div class="col-8 offset-2 my-5">
                <div class="card">
                    <img src="{{asset($blog->image)}}" class="card-img-top" alt="..." height="400" width="200">
                    <div class="card-body">
                      <h5 class="card-title">{{$blog->category?->category_name }}</h5>
                      <h3 class="card-title">{{$blog->title}}</h3>
                      <p class="card-text">{{$blog->description}}</p>
                      <a href="{{route('blogs.show',$blog->id)}}" class="btn btn-primary">Go somewhere</a>
                    </div>
                  </div>
            </div>
        </div>
    </div>
@endsection
