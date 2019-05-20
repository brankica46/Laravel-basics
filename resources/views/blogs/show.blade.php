@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12 main-pic">

      </div>
    </div>
  </div>

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12 content-div">
        <div class="container blog-div">
          <div class="row justify-content-center">
          <h1>{{$list->title}}</h1>
        </div>
        <div class="row justify-content-center">
          <div class="col-md-3">
            <img class="img-responsive" src="/pictures/{{$list->photo ? $list->photo->photo : ''}}"/>
          </div>
          <div class="col-md-9">
            <p>
               {{$list->body}}
            </p>
          </div>
        </div>
        <br />
        <div class="row justify-content-center">
          <div class="col-md-12">
          </div>
        </div>
        </div>
        </div>
</div>
</div>
      </div>
  @endsection
