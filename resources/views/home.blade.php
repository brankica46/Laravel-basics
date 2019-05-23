@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content">
        <div class="col-md-2 float-left">
            <div class="card">
                <div class="card-header">You are logged in!
                </div>
                <div class="card-body">
                    <ul class="navbar-nav mr-auto">
                      <li class="nav-item">
                        <a class="nav-link" href="{{ asset('blogs') }}">Blog</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="{{ asset('posts') }}">Post</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="{{ asset('categories') }}">Categories</a>
                      </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-10">
          @yield('sadrzaj')
        </div>
    </div>
</div>
@endsection
