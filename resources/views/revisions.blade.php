@extends('layout.app')

@section('title')
    Revizije gosta
@endsection

@section('content')
<div class="container">
    <h2>Revizije gosta | Alona Apartmani</h2>                                        
  <table class="table table-striped table-bordered table-hover table-condensed">
    <thead>
      <tr>
        <th>ID</th>
        <th>Ime i prezime gosta</th>
        <th>Revizije</th>
        <th>Datum ažuriranja</th>
      </tr>
    </thead>
    <tbody>
    {{ dump($tasks, $guest) }}
    
      <tr>
        <td>{{ $guest['1'] }}</td>
        <td>{{ $guest['0'] }}</td>
        {{--  <td>{{ $guest->household }}</td>  --}}
        <td>
            @foreach($tasks as $task)
                @foreach($task as $key => $value)
                    {{ $key }} {{ $value[0] }} u {{ $value[1] }} <br />
                @endforeach
                <hr />
            @endforeach
        </td>
        <td>
        @foreach($tasks as $task)
            @foreach($task as $key => $value)
                {{ $task['updated_at'] }}
            @endforeach
            <hr />
        @endforeach
        </td>
      </tr>
    
    </tbody>
  </table>
  </div>
@endsection