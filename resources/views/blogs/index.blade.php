@extends('home')

@section('sadrzaj')

<div class="card">
  <div class="card-header">Blog
    <a href="{{ asset('blogs/create') }}">
      <button type="button" class="btn btn-primary" style="margin-left:20px;">Dodaj blog</button>
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
    <tbody>
      @foreach ($blogs as $blog)
       <tr>
         <th>{{$blog->id}}</th>
         <td>{{$blog->title}}</td>
         <td>{{ str_limit($blog->body, 50) }}</td>
         <td>
           <!-- prvi parametar je akcija, drugi parametar je da nam daje odgovorajuci id -->
           <a href="{{ action('BlogController@edit', [$blog->id]) }}" class="btn btn-secondary">Edit</a>
         </td>
         <td>
           {!! Form::open(['method' => 'DELETE', 'action' => ['BlogController@destroy', $blog->id]]) !!}
            <div class="form-group">
              {!! Form::submit("Delete", ['class' => 'btn btn-danger']) !!}
            </div>
           {!! Form::close() !!}
         </td>
       </tr>
       @endforeach
    </tbody>
  </table>

  </div>
</div>
@endsection
