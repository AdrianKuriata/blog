@extends('layouts.app')

@section('content')

<div style="height:30px; width:100%; background-color:#333333; padding:5px; padding-left:15px; margin-bottom:10px; color:black;">
	<ul>
	<li class="dropdown" style="color:white; list-style-type:none;">
			<a href="#" style="color:white; text-decoration:none;" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
				Sortowanie <span class="caret"></span>
			</a>

			<ul class="dropdown-menu" role="menu" style="color:black;">
				<li><a href="#sort">Sortowanie</a></li>
			</ul>
		</li>

	</ul>
</div>

<div style="background-color:#333333; padding:25px; margin-bottom:75px;">

	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Zarejestrowani użytkownicy</h3>
		</div>
		<div class="panel-body">

			<table class="table table-striped">
				<thead>
					<th>#</th>
					<th>Imię</th>
					<th>E-mail</th>
					<th>Ostatnio widziany</th>
					<th>Zablokuj</th>
				</thead>

				<tr>
					<td>#1</td>
					<td>Adrian</td>
					<td>adriandj83@gmail.com</td>
					<td>{{time()}}</td>
					<td>
						<button class="btn btn-danger btn-xs">
							Usuń
						</button>
					</td>
				</tr>

				<tr>
					<td>#1</td>
					<td>Adrian</td>
					<td>adriandj83@gmail.com</td>
					<td>{{time()}}</td>
					<td>
						<button class="btn btn-danger btn-xs">
							Usuń
						</button>
					</td>
				</tr>

				<tr>
					<td>#1</td>
					<td>Adrian</td>
					<td>adriandj83@gmail.com</td>
					<td>{{time()}}</td>
					<td>
						<button class="btn btn-danger btn-xs">
							Usuń
						</button>
					</td>
				</tr>

				<tr>
					<td>#1</td>
					<td>Adrian</td>
					<td>adriandj83@gmail.com</td>
					<td>{{time()}}</td>
					<td>
						<button class="btn btn-danger btn-xs">
							Usuń
						</button>
					</td>
				</tr>

				<tr>
					<td>#1</td>
					<td>Adrian</td>
					<td>adriandj83@gmail.com</td>
					<td>{{time()}}</td>
					<td>
						<button class="btn btn-danger btn-xs">
							Usuń
						</button>
					</td>
				</tr>

				<tr>
					<td>#1</td>
					<td>Adrian</td>
					<td>adriandj83@gmail.com</td>
					<td>{{time()}}</td>
					<td>
						<button class="btn btn-danger btn-xs">
							Usuń
						</button>
					</td>
				</tr>

				<tr>
					<td>#1</td>
					<td>Adrian</td>
					<td>adriandj83@gmail.com</td>
					<td>{{time()}}</td>
					<td>
						<button class="btn btn-danger btn-xs">
							Usuń
						</button>
					</td>
				</tr>

				<tr>
					<td>#1</td>
					<td>Adrian</td>
					<td>adriandj83@gmail.com</td>
					<td>{{time()}}</td>
					<td>
						<button class="btn btn-danger btn-xs">
							Usuń
						</button>
					</td>
				</tr>

				<tr>
					<td>#1</td>
					<td>Adrian</td>
					<td>adriandj83@gmail.com</td>
					<td>{{time()}}</td>
					<td>
						<button class="btn btn-danger btn-xs">
							Usuń
						</button>
					</td>
				</tr>

				<tr>
					<td>#1</td>
					<td>Adrian</td>
					<td>adriandj83@gmail.com</td>
					<td>{{time()}}</td>
					<td>
						<button class="btn btn-danger btn-xs">
							Usuń
						</button>
					</td>
				</tr>

				<tr>
					<td>#1</td>
					<td>Adrian</td>
					<td>adriandj83@gmail.com</td>
					<td>{{time()}}</td>
					<td>
						<button class="btn btn-danger btn-xs">
							Usuń
						</button>
					</td>
				</tr>

				<tr>
					<td>#1</td>
					<td>Adrian</td>
					<td>adriandj83@gmail.com</td>
					<td>{{time()}}</td>
					<td>
						<button class="btn btn-danger btn-xs">
							Usuń
						</button>
					</td>
				</tr>

				<tr>
					<td>#1</td>
					<td>Adrian</td>
					<td>adriandj83@gmail.com</td>
					<td>{{time()}}</td>
					<td>
						<button class="btn btn-danger btn-xs">
							Usuń
						</button>
					</td>
				</tr>

				<tr>
					<td>#1</td>
					<td>Adrian</td>
					<td>adriandj83@gmail.com</td>
					<td>{{time()}}</td>
					<td>
						<button class="btn btn-danger btn-xs">
							Usuń
						</button>
					</td>
				</tr>

				<tr>
					<td>#1</td>
					<td>Adrian</td>
					<td>adriandj83@gmail.com</td>
					<td>{{time()}}</td>
					<td>
						<button class="btn btn-danger btn-xs">
							Usuń
						</button>
					</td>
				</tr>

				<tr>
					<td>#1</td>
					<td>Adrian</td>
					<td>adriandj83@gmail.com</td>
					<td>{{time()}}</td>
					<td>
						<button class="btn btn-danger btn-xs">
							Usuń
						</button>
					</td>
				</tr>

				<tr>
					<td>#1</td>
					<td>Adrian</td>
					<td>adriandj83@gmail.com</td>
					<td>{{time()}}</td>
					<td>
						<button class="btn btn-danger btn-xs">
							Usuń
						</button>
					</td>
				</tr>
			</table>
		</div>
	</div>
</div>

@endsection

@section('content-2')
<div class="nav-side-menu" style="width:29%; padding-left:0px;">
	<div class="brand">Nawigacja Panelu Blogger'a</div>
	<i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>

	<div class="menu-list">

		<ul id="menu-content" class="menu-content collapse out">
			<li>
				<a href="#">
					<i class="fa fa-dashboard fa-lg"></i> Dashboard
				</a>
			</li>

			<li  data-toggle="collapse" data-target="#products" class="collapsed active">
				<a href="#"><i class="fa fa-gift fa-lg"></i> UI Elements <span class="arrow"></span></a>
			</li>
			<ul class="sub-menu collapse" id="products">
				<li class="active"><a href="#">CSS3 Animation</a></li>
				<li><a href="#">General</a></li>
				<li><a href="#">Buttons</a></li>
				<li><a href="#">Tabs & Accordions</a></li>
				<li><a href="#">Typography</a></li>
				<li><a href="#">FontAwesome</a></li>
				<li><a href="#">Slider</a></li>
				<li><a href="#">Panels</a></li>
				<li><a href="#">Widgets</a></li>
				<li><a href="#">Bootstrap Model</a></li>
			</ul>


			<li data-toggle="collapse" data-target="#service" class="collapsed">
				<a href="#"><i class="fa fa-globe fa-lg"></i> Services <span class="arrow"></span></a>
			</li>  
			<ul class="sub-menu collapse" id="service">
				<li>New Service 1</li>
				<li>New Service 2</li>
				<li>New Service 3</li>
			</ul>


			<li data-toggle="collapse" data-target="#new" class="collapsed">
				<a href="#"><i class="fa fa-car fa-lg"></i> New <span class="arrow"></span></a>
			</li>
			<ul class="sub-menu collapse" id="new">
				<li>New New 1</li>
				<li>New New 2</li>
				<li>New New 3</li>
			</ul>


			<li>
				<a href="#">
					<i class="fa fa-user fa-lg"></i> Profile
				</a>
			</li>

			<li>
				<a href="#">
					<i class="fa fa-users fa-lg"></i> Users
				</a>
			</li>
		</ul>
	</div>
</div>
@endsection