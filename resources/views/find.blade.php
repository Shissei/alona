@extends('layout.app')

@section('title')
    Pronađi gosta | Alona Apartmani
@endsection

@section('content')
<div class="container">
    <form action="/show" method="POST">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="find">Pronađi gosta</label>
            <input type="text" name="find" class="form-control" placeholder="id, ime i prezime, smeštaj">
            <br />
            <input type="submit" class="btn btn-info">
        </div>
    </form>
    <br /> <br /> <br />

    <form action="/list" method="POST">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="list">Lista svih gostiju</label>
            <select name="object" class="form-control" id="list">
                <option name="all">Svi apartmani</option>
                <option name="Palata Saraj">Palata Saraj</option>
                <option name="Lenard apartmani">Lenard apartmani</option>
                <option name="Delux apartmani">Delux apartmani</option>
                <option name="Ema apartmani">Ema apartmani</option>
            </select>
            <br />
            <input type="submit" class="btn btn-info">
        </div>
    </form>
</div>
@endsection