@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <article style="height:100%; background-color:white; margin-bottom:100px; padding-top:15px; padding-left:50px; padding-bottom:15px; border-top-left-radius: 10px; border-top-right-radius:10px; border:1px solid black; box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.75);">
                <h1>To jest artykuł fajny</h1>
                <p>To jest tekst artykułu, który jest naprawde fajny, nikt chyba nie zaprzeczy, prawda?</p>
            </article>
        </div>
    </div>
@endsection

@section('content-2')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-primary">
                <div class="panel-heading">Ostatnie komentarze</div>

                <div class="panel-body">
                Tutaj coś będzie fajnego jeszcze bardziej
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-primary">
                <div class="panel-heading">Ostatnie komentarze</div>

                <div class="panel-body">
                Tutaj coś będzie fajnego jeszcze bardziej
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-primary">
                <div class="panel-heading">Newsletter</div>

                <div class="panel-body">
                    Chcesz wiedzieć więcej niż inni? Wprowadź Swój adres E-mail i otrzymuj nowości jako pierwszy!
                    <BR />
                    <BR />
                    <form>
                        <div class="form-group">
                            <input type="text" name="newsletter" placeholder="Wprowadź adres E-mail..." class="form-control" />
                        </div>
                        
                        <div class="form-group">
                            <button type="submit" class="form-control btn btn-primary">
                                Zapisz się!
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
