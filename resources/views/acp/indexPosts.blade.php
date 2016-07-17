@extends('layouts.acplayout')
@section('content')
	<div class="panel panel-primary">
	<!-- Default panel contents -->
		<div class="panel-heading">Posty <span class="label label-danger" data-toggle="tooltip" data-placement="bottom" title="Jest to ilość nowych postów, które pojawiły się i nie zostały jeszcze przejrzane, zaznaczone są na czerwono.">{{$posts->where('checked_post', 0)->count()}}</span></div>
		<div class="panel-body">
		<p>W tym miejscu znajdują się posty do artykułów, które wymagają moderacji przed pojawieniem się na stronie.
			Możesz również w ustawieniach zmienić opcję bez sprawdzania postów i wtedy będą pojawiały się od razu na stronie.</p>
		</div>

		<!-- Table -->
		<table class="table">
			<thead>
				<th>Id artykułu</th>
				<th>Dodał</th>
				<th>E-mail</th>
				<th>Dodano</th>
				<th>Dodatkowe informacje</th>
				<th>Weryfikacja</th>
			</thead>
			@foreach($posts as $post)
			<tbody style="@if($post->checked_post == false)background-color:#ff6565;@elseif($post->checked_post==true)background-color:#8dc68d;@endif">
				<td><a href="#showArticle{{$post->article['id']}}" data-toggle="modal" data-target="#showArt{{$post->article['id']}}">{{$post->article['id']}}</a></td>
				<td>{{$post->name}}</td>
				<td>{{$post->email}}</td>
				<td>{!! date("H:i:s, d.m.Y", strtotime($post->created_at)) !!}</td>
				<td><button class="btn btn-info btn-xs" data-toggle="modal" data-target="#showMoreInfo{{$post->id}}">Więcej info</button></td>
				<td><button class="btn btn-success btn-xs" data-toggle="modal" data-target="#postVerify{{$post->id}}">Weryfikuj</button></td>
			</tbody>
			@endforeach
		</table>
	</div>

	{!! $posts->render() !!}

	@foreach($posts as $post)
	<div class="modal fade" id="showArt{{$post->article['id']}}" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="gridSystemModalLabel">{{$post->article['article_title']}}</h4>
				</div>
				<div class="modal-body">
					{!! $post->article['article_body'] !!}
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	@endforeach

	@foreach($posts as $post)
	<div class="modal fade" id="showMoreInfo{{$post->id}}" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="gridSystemModalLabel">Informacje dotyczące użytkownika</h4>
				</div>
				<div class="modal-body">
					<table class="table table-striped">
						<tbody>
							<th>Imię: </th>
							<td> {{$post->name}}</td>
						</tbody>

						<tbody>
							<th>E-mail: </th>
							<td> {{$post->email}}</td>
						</tbody>

						<tbody>
							<th>Adres IP: </th>
							<td> {{$post->ip_user}}</td>
						</tbody>

						<tbody>
							<th>Kraj pochodzenia: </th>
							<td> @if(!$post->country_user)Brak danych @else {{$post->country_user}}@endif</td>
						</tbody>

						<tbody>
							<th>Miasto: </th>
							<td> @if(!$post->city_user)Brak danych @else {{$post->city_user}}@endif</td>
						</tbody>

						<tbody>
							<th>Przeglądarka: </th>
							<td> @if(!$post->browser_user)Brak danych @else {{$post->browser_user}}@endif</td>
						</tbody>

						<tbody>
							<th>Szerokość geograficzna: </th>
							<td> @if(!$post->latitude_user || $post->latitude_user == 0)Brak danych @else {{$post->latitude_user}}@endif</td>
						</tbody>

						<tbody>
							<th>Długość geograficzna: </th>
							<td> @if(!$post->longitude_user || $post->longitude_user == 0)Brak danych @else {{$post->longitude_user}}@endif</td>
						</tbody>
					</table>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	@endforeach

	@foreach($posts as $post)
	<div class="modal fade" id="postVerify{{$post->id}}" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="gridSystemModalLabel">Weryfikacja postu</h4>
				</div>
				<div class="modal-body">
					{!! Form::model($post, array('method' => 'post', 'route' => array('verify.post', $post->id))) !!}
						<div class="form-group">
							{!! Form::label('name', 'Imię: ') !!}
							{!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Imię']) !!}
						</div>

						<div class="form-group">
							{!! Form::label('email', 'E-mail: ') !!}
							{!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'E-mail']) !!}
						</div>

						<div class="form-group">
							{!! Form::label('body', 'Treść postu: ') !!}
							{!! Form::textarea('body', null, ['class' => 'form-control', 'placeholder' => 'Treść postu', 'id' => 'boxPost']) !!}
						</div>
					
				</div>
				<div class="modal-footer">
						{!! Form::submit('Akceptuj', ['class' => 'btn btn-success', 'style' => 'float:right; margin-right:10px']) !!}
					{!! Form::close() !!}

					{!! Form::open(array('method' => 'delete', 'route' => array('delete.post', $post->id))) !!}
						{!! Form::submit('Usuń post', ['class' => 'btn btn-danger', 'style' => 'float:right; margin-right:10px']) !!}
					{!! Form::close() !!}
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	@endforeach

	@endsection

	@section('script')
		<script>

			$('#boxPost').summernote({height:200,});
		</script>
	@endsection