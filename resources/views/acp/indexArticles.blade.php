@extends('layouts.acplayout')

@section('content')
<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title">
			Wszystkie wpisy

			<button type="button" class="btn btn-success btn-xs pull-right" data-toggle="modal" data-target="#myModal">
				Dodaj wpis
			</button>
		</h3>
	</div>
	<div class="panel-sort">Halo</div>
	<div class="panel-body">
		W tym miejscu znajdują się wszystkie wpisy, które zostały przez Ciebie dodane, możesz je dowolnie edytować, usuwać, zmieniać ich kolejność, zezwalać na dodawanie komentarzy, czy ich wyłączenie.
	</div>

	<table class="table">
		<thead>
			<th>#</th>
			<th>Tytuł</th>
			<th>Opis</th>
			<th>Status</th>
			<th>Edytuj Wpis</th>
			<th>Usuń Wpis</th>
		</thead>

		@foreach($articles as $article)
			<tr>
				<td>{{$article->id}}</td>
				<td data-toggle="tooltip" data-placement="bottom" title="{{$article->article_title}}">{{substr($article->article_title, 0, 20)}}</td>
				<td id="body{{$article->id}}">Kliknij w tym miejscu</td>
					@if($article->article_lock == true)
						<td>Wpis zamknięty</td>
					@else
						<td>Wpis otwarty</td>
					@endif
				<td><button class="btn btn-warning btn-xs">Edytuj</button></td>
				<td><button class="btn btn-danger btn-xs">Usuń</button></td>
			</tr>
		@endforeach

		{!! $articles->render() !!}
	</table>
</div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Utwórz Wpis</h4>
			</div>
			<div class="modal-body">
				{!! Form::open(array('method' => 'post', 'route' => ('store.article'))) !!}
				<div class="form-group">
					{!! Form::label('article_title', 'Wprowadź tytuł wpisu: ') !!}
					{!! Form::text('article_title', null, ['class' => 'form-control', 'placeholder' => 'Wprowadź tytuł wpisu...']) !!}
				</div>

				<div class="form-group">
					{!! Form::label('article_body', 'Wprowadź opis wpisu: ') !!}
					{!! Form::textarea('article_body', null, ['class' => 'form-control', 'id' => 'summernoteArticle']) !!}
				</div>
			</div>
			<div class="modal-footer">
				<div class="form-group">
					{!! Form::submit('Utwórz wpis', ['class' => 'form-control btn btn-primary']) !!}
				</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>

@foreach($articles as $article)
	<div class="show-article-body" id="showArticleBody{{$article->id}}">
		<button style="background-color:transparent; border: 0;" type="button" class="pull-right fa fa-times fa-lg" id="closeShowArticle{{$article->id}}"></button style="background-color:transparent; border: 0;">
		{!! $article->article_body !!}
	</div>
@endforeach

@endsection

@section('script')
<script>
	$(document).ready(function() {
		$('#summernoteArticle').summernote({
			lang: 'pl-PL',
			height: 300,
			placeholder: 'Wprowadź opis Swojego wpisu...',
		});
	});
</script>

<script>
@foreach($articles as $article)
	$('#showArticleBody{{$article->id}}').hide();
	$('#body{{$article->id}}').click(function()
	{
		$('#showArticleBody{{$article->id}}').show().addClass("animated zoomIn");
	});

	$('#closeShowArticle{{$article->id}}').click(function()
	{
		$('#showArticleBody{{$article->id}}').hide();
	});
@endforeach
</script>
@endsection