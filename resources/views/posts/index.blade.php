@extends('home')

@section('sadrzaj')

<div class="card">
  <div class="card-header">Post
    <a href="{{ asset('posts/create') }}">
      <button type="button" class="btn btn-primary" style="margin-left:20px;">Dodaj post</button>
   </a>
  </div>
  <div class="card-body">

    <table class="table table-bordered">
      <thead class="thead-light">
        <tr>
         <th>ID</th>
         <th>Title</th>
         <th>Body</th>
         <th>Edit</th>
         <th>Delete</th>
       </tr>
      </thead>
     @foreach ($posts as $post)
      <tbody>
         <tr>
           <td>{{$post->id}}</td>
           <td>{{$post->title}}</td>
           <td>{{ str_limit($post->body, 50) }}</td>
           <td>
             <!-- prvi parametar je akcija, drugi parametar je da nam daje odgovorajuci id -->
             <a href="{{ action('PostController@edit', [$post->id]) }}" class="btn btn-secondary">Edit</a>
           </td>
           <td>
             {!! Form::open(['method' => 'DELETE', 'action' => ['PostController@destroy', $post->id]]) !!}
              <div class="form-group">
                {!! Form::submit("Delete", ['class' => 'btn btn-danger']) !!}
              </div>
             {!! Form::close() !!}
           </td>
         </tr>
      </tbody>
     @endforeach
    </table>

  </div>
</div>

@endsection
