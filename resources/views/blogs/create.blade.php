@extends('home')

@section('sadrzaj')

<div class="card">
  <div class="card-header">Dodaj Blog</div>
  <div class="card-body">

  <div class="col-md-6">
    <!-- uzvicnici sluze ako u tekstu ima html koda da se prepozna -->
    <!-- prvi parametar je metoda, drugi parametar je akcija(sta da uradi) -->
    <!-- POST metoda stvara novi zapis -->
    {!! Form::open(['method' => 'POST', 'action' => 'BlogController@store']) !!}

      <div class="form-group">
        <!-- tip polja, koje polje, ono sto mi vidimo -->
        {!! Form::label("title", "Title") !!}
        <!-- klase su za bootstrap -->
        {!! Form::text("title", null, ['class' => 'form-control']) !!}
      </div>
      <div class="form-group">
        {!! Form::label("body", "Body") !!}
        {!! Form::textarea("body", null, ['class' => 'form-control']) !!}
      </div>

      <div class="form-group">
        {!! Form::submit("Posalji formu", ['class' => 'btn btn-success']) !!}
      </div>
    {!! Form::close() !!}
  </div>

  </div>
</div>

@endsection
