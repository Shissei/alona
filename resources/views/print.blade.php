@extends('layout.app')

@section('content')
    <div class="text-center">
        <img src="images/logo.jpg" class="img-thumbnail" />
    </div>
    <br />
    <div class="container">
          <table class="table table-striped table-bordered table-hover table-condensed">
            <tr>
                <th>Ime i prezime gosta</th>
                <td>{{ $host->guest }}</td>
            </tr>
            <tr>
            <th>Broj telefona</th>
            <td>{{ $host->phone }}</td>
            </tr>
            <tr>
                <th>Naziv objekta</th>
                <td>{{ $host->household }}</td>
            </tr>
            <tr>
                <th>Aranzman</th>
                <td>{{ $host->arr_days }}</td>
            </tr>
            <tr>
                <th>Dolazak</th>
                <td>{{ date("d-M-Y", strtotime($host->from_date)) }}</td>
            </tr>
            <tr>
                <th>Odlazak</th>
                <td>{{ date("d-M-Y", strtotime($host->to_date)) }}</td>
            </tr>
            <tr>
                <th>Cijena aranzmana</th>
                <td>{{ $host->arr_price }} &euro;</td>
            </tr>
            <tr>
                <th>Cijena osirugranja</th>
                <td>{{ $host->insurance }} &euro;</td>
            </tr>
            <tr>
                <th>Ukupno za uplatu</th>
                <td>{{ $host->arr_sum }} &euro;</td>
            </tr>
            <tr>
                <th>Garancija</th>
                <td>{{ $host->guarantee }} &euro;</td>
            </tr>
            <tr>
                <th>Neto za uplatu</th>
                <td>{{ $host->arr_neto }} &euro;</td>
            </tr>
            <tr>
                <th>Napomena</th>
                <td>{{ $host->comment }}</td>
            </tr>
            <br />
            <tr>
                <a href="{{ route('pdf', ['download' => 'pdf']) }}" class="btn btn-info">Print</a>
            </tr>
        </table>
    </div>
@endsection