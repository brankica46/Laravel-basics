@extends('home')

@section('sadrzaj')

<div class="card">
  <div class="card-header">Kategorija
    <a href="{{ asset('categories/create') }}">
      <button type="button" class="btn btn-primary" style="margin-left:20px;">Dodaj kategoriju</button>
   </a>
  </div>
  <div class="card-body">

  <table class="table table-bordered">
    <thead class="thead-light">
      <tr>
       <th>ID</th>
       <th>Title</th>
       <th>Edit</th>
       <th>Delete</th>
     </tr>
    </thead>
    <tbody>
      @foreach ($categories as $category)
       <tr>
         <th>{{$category->id}}</th>
         <td>{{$category->title}}</td>
         <td>
           <!-- prvi parametar je akcija, drugi parametar je da nam daje odgovorajuci id -->
           <a href="{{ action('CategoryController@edit', [$category->id]) }}" class="btn btn-secondary">Edit</a>
         </td>
         <td>
           {!! Form::open(['method' => 'DELETE', 'action' => ['CategoryController@destroy', $category->id]]) !!}
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
