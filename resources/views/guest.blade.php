@extends('layout.app')

@section('content')
    <div class="text-center">
        <img src="images/logo.jpg" class="img-thumbnail" />
    </div>
    <br />
    <div class="container">
    <a href="{{ route('list', ['object' => $host[0]->household]) }}" class="btn btn-success">Nazad na listu</a>
    <br >
        <table class="table table-striped table-bordered table-hover table-condensed">
        @foreach($host as $h)
            <tr>
                <th>Ime i prezime gosta</th>
                <td>{{ $h->guest }}</td>
            </tr>
            <tr>
            <th>Broj telefona</th>
            <td>{{ $h->phone }}</td>
            </tr>
            <tr>
                <th>Naziv objekta</th>
                <td>{{ $h->household }}</td>
            </tr>
            <tr>
                <th>Aranzman</th>
                <td>{{ $h->arr_days }}</td>
            </tr>
            <tr>
                <th>Dolazak</th>
                <td>{{ date("d-M-Y", strtotime($h->from_date)) }}</td>
            </tr>
            <tr>
                <th>Odlazak</th>
                <td>{{ date("d-M-Y", strtotime($h->to_date)) }}</td>
            </tr>
            <tr>
                <th>Cijena aranzmana</th>
                <td>{{ $h->arr_price }} &euro;</td>
            </tr>
            <tr>
                <th>Cijena osirugranja</th>
                <td>{{ $h->insurance }} &euro;</td>
            </tr>
            <tr>
                <th>Ukupno za uplatu</th>
                <td>{{ $h->arr_sum }} &euro;</td>
            </tr>
            <tr>
                <th>Garancija</th>
                <td>{{ $h->guarantee }} &euro;</td>
            </tr>
            <tr>
                <th>Neto za uplatu</th>
                <td>{{ $h->arr_neto }} &euro;</td>
            </tr>
            <tr>
                <th>Napomena</th>
                <td>{{ $h->comment }}</td>
            </tr>
        @endforeach
            
            <br />
            <tr>
                <a href="{{ route('guest_pdf', ['pdf' => 'pdf', 'id' => $h->id]) }}" class="btn btn-info">Print</a>
            </tr>
        </table>
    </div>
@endsection