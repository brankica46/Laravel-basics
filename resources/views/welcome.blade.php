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
        <div class="container">
          <div class="row justify-content-center">
            @foreach ($lists as $list)
            <div class="col-md-12 blog-div">
              <div class="row">
              <div class="col-md-4 inline">


                <img class="img-responsive image-blog-thumb" src="/pictures/{{$list->photo ? $list->photo->photo : ''}}"/>

              </div>

              <div class="col-md-8 inline blog-text">
                <h1><a href="{{action('ListController@show', [$list->id])}}">{{$list->title}}</a></h1>
                <p>
                  {{ str_limit($list->body, 400) }}
                </p>
              </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
      {{ $lists->links() }}
      <example-component></example-component>
    </div>
  </div>
</div>

@endsection
