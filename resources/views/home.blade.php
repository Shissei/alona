@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Alona Dashboard</div>

                <div class="panel-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8">
                                <img src="images/logo.jpg" alt="Alona Apartmani logo" class="img-thumbnail">
                            </div>
                        </div>
                        <div class="row" style="margin-left: 125px">
                            <div class="col-md-5">
                                <nav class="navbar navbar-default">
                                    <div class="container">
                                        <div class="navbar-header">
                                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                                            <span class="sr-only">Toggle navigation</span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                        </button>
                                        <a class="navbar-brand" href="/home">Alona</a>
                                        </div>
                                        <div id="navbar" class="collapse navbar-collapse">
                                        <ul class="nav navbar-nav">
                                            <li class="active"><a href="/home">Početna</a></li>
                                            <li><a href="/form">Forma</a></li>
                                            <li><button data-toggle="modal" data-target="#findModal" class="btn btn-default center-block" style="margin-top: 7px">Pronadji gosta</button></li>
                                        </ul>
                                        </div><!--/.nav-collapse -->
                                    </div>
                                    </nav>
                            </div>
                        </div>
                                {{--  MODAL  --}}
                                <div class="row">
                                    <!-- line modal -->
                                    <div class="modal fade" id="findModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Zatvori</span></button>
                                                <h3 class="modal-title text-center" id="lineModalLabel">Alona Apartmani | Pronađi gosta</h3>
                                            </div>
                                            <div class="modal-body">
                                                
                                                <!-- content goes here -->
                                                <form action="/show" method="POST">
                                            {{ csrf_field() }}
                                            <div class="form-group">
                                                <label for="find">Pronađi gosta</label>
                                                <input type="text" name="find" class="form-control" placeholder="id, ime i prezime">
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
                                            <div class="modal-footer">
                                                <div class="btn-group btn-group-justified" role="group" aria-label="group button">
                                                    <div class="btn-group" role="group">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal"  role="button">Close</button>
                                                    </div>
                                                    <div class="btn-group btn-delete hidden" role="group">
                                                        <button type="button" id="delImage" class="btn btn-default btn-hover-red" data-dismiss="modal"  role="button">Delete</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                    {{--  MODAL END  --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
