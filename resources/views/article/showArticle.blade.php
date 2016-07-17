@extends('layouts.app')
@section('content')
	<div class="row" style="margin-bottom:60px; min-height:300px;height:100%; width:100%; background-color:#f8f8f8; padding-top:15px; padding-left:50px; padding-right:50px; padding-bottom:15px; border:2px solid black;">
		<h1 style="text-align:center;">{{$showArticle->article_title}}{{$showArticle->id}}</h1>
		<p>{!! $showArticle->article_body !!}</p>
	</div>
	@if($showArticle->article_lock != true)
		<div class="row" style="background-color:#333333; opacity:0.9; width:100%; height:100%; padding:40px; border: 1px solid white;">
			<div style="color:white; font-size:35px;">Dodaj komentarz</div>
			{!! Form::open(array('method' => 'post', 'route' => array('store.post', $showArticle->id))) !!}
				<div class="form-group">
					{!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Wprowadź imię...']) !!}
				</div>

				<div class="form-group">
					{!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Wprowadź E-Mail...']) !!}
				</div>

				<div class="form-group">
					{!! Form::textarea('body', null, ['class' => 'form-control', 'placeholder' => 'Dodaj komentarz...'] ) !!}
				</div>

				<div class="form-group">
					{!! Form::submit('Dodaj wiadomość', ['class' => 'btn btn-primary pull-right']) !!}
				</div>
			{!! Form::close() !!}
		</div>
	@endif

	<div style="font-size: 35px; padding-top:20px; padding-bottom:20px;">Komentarze</div>
	@foreach($showArticle->post()->where('is_moderated', false)->latest('created_at')->get() as $post)
		<div class="row" style="min-height:100px;height:100%; width:100%; background-color:#f8f8f8; padding-top:15px; padding-left:50px; padding-right:50px; padding-bottom:15px; border:2px solid grey;">
			<div class="col-md-8" style="border-left: 3px solid blue;">
			{!!$post->body!!}
			</div>
			<div class="col-md-4">
				<div><b>Dodał:</b> {{$post->name}}</div>
				<div><b>E-mail:</b> {{$post->email}}</div>
				<div><b>Dodano</b> {!!date("H:i:s, d.m.Y", strtotime($post->created_at))!!}</div>
			</div>
		</div>
	@endforeach
@endsection

@section('content-2')
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">Na skróty</h3>
				</div>
				<div class="panel-body">
					@foreach($articles as $article)
						<div>
							<a href="/article/{{$article->article_title}}" style="text-decoration:none;">{{$article->article_title}}</a>
						</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">Archiwum</h3>
				</div>
				<div class="panel-body">
					A tutaj archiwum z collapse z ostatniego roku, gdzie dla każdego miesiąca są jego artykuły posortowane od najnowszych
				</div>
			</div>
		</div>
	</div>
@endsection