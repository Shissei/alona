@extends('layout.app')

@section('title')
    Form
@endsection

@section('content')
<div style="background-image: url('images/ocean.jpg')">
    <div class="container">
        <h1>Alona Apartmani | Dobre Vode, MNE</h1>
        <form action="/store" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="guest">Ime i prezime gosta</label>
                <input type="text" name="guest" class="form-control">
            </div>

            <div class="form-group">
                <label for="phone">Broj telefona</label>
                <input type="text" name="phone" class="form-control">
            </div>

            <div class="form-inline">
                <label for="household">Naziv objekta &nbsp</label>
                <select name="household" class="form-control col-md-8">
                    <option name="Palata Saraj">Palata Saraj</option>
                    <option name="Lenard apartmani">Lenard apartmani</option>
                    <option name="Delux apartmani">Delux apartmani</option>
                    <option name="Ema apartmani">Ema apartmani</option>
                </select>
            
                <label for="room">&nbspBroj sobe &nbsp</label>
                <input type="text" name="room" class="col-md-2 form-control">
            </div>

            <div class="form-group">
                <label for="arr_days">Aranzman</label>
                <input type="text" name="arr_days" class="form-control">
            </div>

            <div class="form-inline">
                <label for="from_date">Dolazak &nbsp</label>
                <input type="date" name="from_date" class="form-control">
                
                <label for="to_date" style="margin-left: 200px">Povratak &nbsp</label>
                <input type="date" name="to_date" class="form-control">
            </div>

            <div class="form-group">
                <label for="arr_price">Cijena aranzmana</label>
                <input type="text" name="arr_price" class="form-control" >
            </div>

            <div class="form-group">
                <label for="insurance">Cijena osiguranja</label>
                <input type="text" name="insurance" class="form-control" >
            </div>

            <div class="form-group">
                <label for="arr_sum">Ukupno za uplatu</label>
                <input type="text" name="arr_sum" class="form-control" >
            </div>

            <div class="form-group">
                <label for="guarantee">Garancija</label>
                <input type="text" name="guarantee" class="form-control" >
            </div>

            <div class="form-group">
                <label for="arr_neto">Neto za uplatu</label>
                <input type="text" name="arr_neto" class="form-control" >
            </div>

            <div class="form-group">
                <label for="comment">Napomena</label>
                <textarea name="comment" class="form-control"></textarea>
            </div>
            <br />
            <input type="submit" value="Submit" class="btn btn-default">
            <input type="reset" value="Reset" class="btn btn-danger" style="margin-left: 50px">
        </form>
    </div>
</div>
    
    
@endsection
