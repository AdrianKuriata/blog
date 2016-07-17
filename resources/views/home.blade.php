@extends('layouts.app')

@section('content')
    @foreach($articles as $article)
        <a href="/article/{{$article->article_title}}" style="text-decoration:none; color:black;">
            <div class="row" style="min-height:300px;height:100%; width:100%; background-color:#f8f8f8; padding-top:15px; padding-left:30px; padding-bottom:15px; border:2px solid gray; @if($article->article_lock == true) border-left:4px solid red; @else border-left: 4px solid green; @endif">
                <div class="col-md-8">
                    <h1>{{ substr($article->article_title, 0, 30)}} @if(strlen($article->article_title) >= 30) ...@endif</h1>
                    <p>{!! substr($article->article_body, 0, 1000) !!} ...</p>
                </div>
                <div class="col-md-4">
                    <div><b>Dodał:</b> {{$article->user['username']}}</div>
                    <div><b>Dodano:</b> {{date("H:i:s, d.m.Y", strtotime($article->created_at))}}</div>
                    <div><b>Ilość odpowiedzi:</b> {{$article->post()->where('checked_post', true)->count()}}</div>
                    <div><b>Tagi:</b> @foreach($article->tag as $tag){{$tag->tag_name}}@endforeach </div>
                    <div><b>Ostatnia odpowiedź: </b></div>
                    @foreach($article->post()->latest('created_at')->where('is_moderated', false)->get() as $key=>$post)
                        @if($key == 0)
                            <div><p>{!! $post->body !!} - <b>{{$post->name}}</b></p></div>
                        @endif
                    @endforeach

                </div>
            </div>
        </a>
    @endforeach
    {!! $articles->render() !!}
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
