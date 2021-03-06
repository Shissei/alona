@extends('layout.app')

@section('title')
    Edit
@endsection

@section('date')
	<script>
	$( function() {
		$( "#datepicker" ).datepicker();
		$( "#format" ).on( "change", function() {
			$( "#datepicker" ).datepicker( "option", "dateFormat", $( this ).val() );
		});
	} );
	</script>
@endsection

@section('content')
<div style="background-image: url('images/ocean.jpg')">
    <div class="container">
        <h1>Alona Apartmani | Dobre Vode, MNE</h1>
        <form action="/update" method="POST">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            @foreach($host as $h)
            <div class="form-group">
                <label for="guest">Ime i prezime gosta</label>
                <input type="text" name="guest" class="form-control" value="{{ $h->guest }}">
            </div>

            <div class="form-group">
                <label for="phone">Broj telefona</label>
                <input type="text" name="phone" class="form-control" value="{{ $h->phone }}">
            </div>

            <div class="form-inline">
                <label for="household">Naziv objekta &nbsp</label>
                <select name="household" class="form-control col-md-8">
                <option name="household" selected>{{$h->household}} </option>
                    {{--  <option name="Palata Saraj" >Palata Saraj</option>
                    <option name="Lenard apartmani">Lenard apartmani</option>
                    <option name="Delux apartmani">Delux apartmani</option>
                    <option name="Ema apartmani" >Ema apartmani</option>  --}}
                    @switch($h->household)
                        @case("Palata Saraj")
                                <option name="Lenard apartmani">Lenard apartmani</option>
                                <option name="Delux apartmani">Delux apartmani</option>
                                <option name="Ema apartmani" >Ema apartmani</option> 
                            @break
                        @case("Lenard apartmani")
                                <option name="Palata saraj">Palata saraj</option>
                                <option name="Delux apartmani">Delux apartmani</option>
                                <option name="Ema apartmani" >Ema apartmani</option>
                            @break
                        @case("Delux apartmani")
                             <option name="Palata saraj">Palata saraj</option>
                                <option name="Lenard apartmani">Lenard apartmani</option>
                                <option name="Ema apartmani" >Ema apartmani</option>
                            @break
                        @case("Ema apartmani")
                             <option name="Palata saraj">Palata saraj</option>
                                <option name="Delux apartmani">Delux apartmani</option>
                                <option name="Lenard apartmani" >Lenard apartmani</option>
                            @break
                    @endswitch
                {{--  @if($h->household != "Palata Saraj")
                    <option name="Palata Saraj" >Palata Saraj</option>
                @elseif($h->household != "Lenard apartmani")
                    <option name="Lenard apartmani" >Lenard apartmani</option>
                @elseif($h->household != "Delux apartmani")
                    <option name="Delux apartmani">Delux apartmani</option>
                @elseif($h->household != "Ema apartmani")
                    <option name="Ema apartmani" >Ema apartmani</option>
                @endif  --}}
                </select>
            
                <label for="room">&nbspBroj sobe &nbsp</label>
                <input type="text" name="room" class="col-md-2 form-control" value="{{ $h->room }}">
            </div>

            <div class="form-group">
                <label for="arr_days">Aranzman</label>
                <input type="text" name="arr_days" class="form-control" value="{{ $h->arr_days }}">
            </div>

            <div class="form-inline">
                <label for="from_date">Dolazak &nbsp</label>
                <input type="date" name="from_date" class="form-control" value="{{ $h->from_date }}">
                
                <label for="to_date" style="margin-left: 200px">Povratak &nbsp</label>
                <input type="date" name="to_date" class="form-control" value="{{ $h->to_date }}">
            </div>

            <div class="form-group">
                <label for="arr_price">Cijena aranzmana</label>
                <input type="text" name="arr_price" class="form-control" value="{{ $h->arr_price }}">
            </div>

            <div class="form-group">
                <label for="insurance">Cijena osiguranja</label>
                <input type="text" name="insurance" class="form-control" value="{{ $h->insurance }}">
            </div>

            <div class="form-group">
                <label for="arr_sum">Ukupno za uplatu</label>
                <input type="text" name="arr_sum" class="form-control" value="{{ $h->arr_sum }}">
            </div>

            <div class="form-group">
                <label for="guarantee">Garancija</label>
                <input type="text" name="guarantee" class="form-control" value="{{ $h->guarantee }}">
            </div>

            <div class="form-group">
                <label for="arr_neto">Neto za uplatu</label>
                <input type="text" name="arr_neto" class="form-control" value="{{ $h->arr_neto }}">
            </div>

            <div class="form-group">
                <label for="comment">Napomena</label>
                <textarea name="comment" class="form-control">{{ $h->comment }}</textarea>
            </div>
            <input type="hidden" name="id" value="{{$h->id}}">
            @endforeach
            <br />
            <input type="submit" value="Update" class="btn btn-default">
            {{--  <input type="reset" value="Reset" class="btn btn-danger" style="margin-left: 50px">  --}}
        </form>
    </div>
</div>
    
    
@endsection
