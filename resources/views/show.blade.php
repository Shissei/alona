@extends('layout.app')

@section('title')
    Gosti | Alona Apartmani
@endsection

@section('content')
<div class="container">
<a href="/home" class="btn btn-success">Nazad na pretragu</a>
  <h2>Tabela gostiju | Alona Apartmani</h2>                                        
  <table class="table table-striped table-bordered table-hover table-condensed">
    <thead>
      <tr>
        <th>ID</th>
        <th>Ime i prezime gosta</th>
        <th>Objekat</th>
        <th>Akcije</th>
      </tr>
    </thead>
    <tbody>
    @foreach($guests as $guest)
      <tr>
        <td>{{ $guest->id }}</td>
        <td>{{ $guest->guest }}</td>
        <td>{{ $guest->household }}</td>
        <td>
            {{--  <form action="guest/{{$guest->id}}" method="POST">
              {{ csrf_field() }}
              <input type="hidden" name="id" value="{{$guest->id}}">
              <button type="submit" class="btn btn-info">Print</button>
            </form>  --}}
            <a href="{{ route('guest', ['id' => $guest->id]) }}" class="btn btn-info">Print</a>
            <a href="{{ route('edit', ['id' => $guest->id]) }}" class="btn btn-warning">Edit</a>
            <a href="#" class="btn btn-danger" style="margin-left: 2em">Report</a>
        </td>
      </tr>
    @endforeach
    </tbody>
  </table>
</div>
<div class="container">
  <nav class="pagination">
  {{--  Rade oba slucaja isto  --}}
  {{--  {{$guests->appends(request()->input())->links()}}  --}} 
{!! $guests->appends(Request::capture()->except('page'))->render('vendor.pagination.bootstrap-4') !!}
  </nav>
</div>
@endsection