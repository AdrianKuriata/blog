@extends('layouts.acplayout')

@section('content')
<div class="panel panel-primary" id="hidePanel">
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

	<table class="table" id="load-data">
		<thead>
			<th>#</th>
			<th>Tytuł</th>
			<th>Opis</th>
			<th>Status</th>
			<th>Edytuj Wpis</th>
			<th id="testInner">Usuń Wpis</th>
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
				<td><button class="btn btn-warning btn-xs" data-toggle="modal" data-target="#editArticle{{$article->id}}">Edytuj</button></td>
				<td><button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#deleteArticle{{$article->id}}">Usuń</button></td>
			</tr>
		@endforeach
	</table>
	<span class="pull-right">{!! $articles->render() !!}</span>
</div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Utwórz Wpis</h4>
			</div>
			<div class="modal-body">
				{!! Form::open(array('method' => 'post', 'route' => ('store.article'), 'id' => 'create-article')) !!}
				<div class="form-group">
					{!! Form::label('title', 'Wprowadź tytuł wpisu: ') !!}
					{!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Wprowadź tytuł wpisu...', 'id' => 'articleTitle']) !!}
				</div>

				<div class="form-group">
					{!! Form::label('body', 'Wprowadź opis wpisu: ') !!}
					{!! Form::textarea('body', null, ['class' => 'form-control', 'id' => 'summernoteArticle']) !!}
				</div>
				
				<div class="form-group">
					{!! Form::label('selectTags', 'Wprowadź tagi dla swojego wpisu: ') !!}
					{!! Form::select('selectTags', $tags, null, ['class'=>'form-control search-select', 'id' => 'update-tags', 'multiple']) !!}
				</div>
				
			</div>
			<div class="modal-footer">
				<div class="form-group">
					{!! Form::submit('Utwórz wpis', ['class' => 'form-control btn btn-primary', 'id' => 'post-article', 'name' => 'action']) !!}
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

@foreach($articles as $article)
	<div class="modal fade" id="editArticle{{$article->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Edytuj Wpis</h4>
				</div>
				<div class="modal-body">
					{!! Form::model($article, array('method'=>'post', 'route' => array('edit.article', $article->id))) !!}
					<div class="form-group">
						{!! Form::label('article_title', 'Popraw tytuł wpisu: ') !!}
						{!! Form::text('article_title', null, ['class' => 'form-control', 'placeholder' => 'Popraw tytuł wpisu...']) !!}
					</div>

					<div class="form-group">
						{!! Form::label('article_body', 'Wprowadź opis wpisu: ') !!}
						<textarea name="article_body" class="form-control" rows="10" cols="50" id="summernoteArticleEdit{{$article->id}}">{{$article->article_body}}</textarea>
					</div>

					<div class="form-group">
					{!! Form::label('article_lock', 'Status wpisu: ') !!}
					{!! Form::select('article_lock', ['Otwarty', 'Zamknięty'], null,  ['class' => 'form-control']) !!}
					</div>
				</div>
				<div class="modal-footer">
					<div class="form-group">
						{!! Form::submit('Edytuj wpis', ['class' => 'form-control btn btn-primary']) !!}
					</div>
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
@endforeach

@foreach($articles as $article)
	<div class="modal fade" id="deleteArticle{{$article->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Usuń Wpis</h4>
				</div>
				<div class="modal-body">
					{!! Form::open(array('method' => 'post', 'route' => array('delete.article', $article->id))) !!}
					Jesteś pewny, że chcesz usunąć artykuł o ID <b>{{$article->id}}</b>? Ta opcja jest nieodwracalna i nie będziesz miał możliwości przywrócenia tego artykułu.
				</div>
				<div class="modal-footer">
					<div class="form-group">
						{!! Form::submit('Usuń wpis', ['class' => 'btn btn-danger']) !!}
					</div>
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
@endforeach

@endsection

@section('script')
<script>
	$(document).ready(function() {
		$('#summernoteArticle').summernote({
			lang: 'pl-PL',
			height: 200,
			placeholder: 'Wprowadź opis Swojego wpisu...',
		});
	});
	@foreach($articles as $article)
		$(document).ready(function() {
			$('#summernoteArticleEdit{{$article->id}}').summernote({
				lang: 'pl-PL',
				height: 200,
				placeholder: 'Popraw opis Swojego wpisu...',
			});
		});
	@endforeach
</script>

<script>
@foreach($articles as $article)
	$('#showArticleBody{{$article->id}}').hide();
	$('#body{{$article->id}}').click(function()
	{
		$('#hidePanel').hide();
		$('#showArticleBody{{$article->id}}').show().addClass("animated zoomIn");
	});

	$('#closeShowArticle{{$article->id}}').click(function()
	{
		$('#showArticleBody{{$article->id}}').hide();
		$('#hidePanel').show();
	});
@endforeach
</script>

<script>
	/*$('#update-tags').keypress(function(e)
	{
		if(e.which === 13)
		{
			e.preventDefault();
			$.ajax({
				method: 'POST',
				url: '{{route('store.tag')}}',
				data: {
					_token: '{{Session::token()}}',
					selectTags: $('#update-tags').val(),
				}
			}).done(function(message)
			{
				console.log(JSON.stringify(message['test']));
				document.getElementById("update-tags").value = "";
			});
		}
	});*/
$('#update-tags').select2({
	tags:true,
	$.ajax({
		method: 'POST',
		url: '{{route('store.tag')}}',
		data: {
			_token: '{{Session::token()}}',
			selectTags: $('#update-tags').val(),
		}
		success: function(message)
		{
			console.log(JSON.stringify(message['test']));
		}
	});
});

	/*$('#update-tags').select2().on("keydown", function(e) {
		if (e.keyCode == 13) {
			e.preventDefault();   
			$.ajax({
				method: 'POST',
				url: '{{route('store.tag')}}',
				data: {
					_token: '{{Session::token()}}',
					selectTags: $('#update-tags').val(),
				}
			}).done(function(message)
			{
				console.log(JSON.stringify(message['test']));
				
			});
		}
	});*/
</script>



<!--<script>
	$('#post-article').click(function(e) {
		e.preventDefault();
		$.ajax({
			method: 'POST',
			url: '{{route('store.article')}}',
			data: {
				title : $('#articleTitle').val(),
				body : $('#summernoteArticle').val(),
				_token : '{{Session::token()}}'
			},
		}).done(function(msg = lastData)
		{
			$('#load-data').prepend("<tr><td>"+msg['id']+"</td><td>"+msg['article_title']+"</td><td>Kliknij tutaj</td><td>Wpis otwarty</td><td>Edytuj</td><td>Usuń</td></tr>");
			$("#myModal").modal('hide');
		});
	});
</script>-->
@endsection