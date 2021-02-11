<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>@yield('titulo-pagina')</title>
	<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	
	<div style="background-color: gray">
		<div class="container">
			<div class="row">

				<div style="text-align: left" class="col-md-2">
						<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                           	{{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
				</div>

				<div class="col-md-6">
					<h1 style="text-align: center">
						@yield('titulo')
					</h1>
				</div>

				<div class="col-md-4" style="text-align: right;">
					<a href="/">
						<h2>
							HOME
						</h2>
					</a>
				</div>
				
			</div>
		</div>
	</div>


	@yield('conteudo')


	@if(session()->has('mensagem'))
		<div class="alert alert-danger" role="alert">
			{{session('mensagem')}}
		</div>
	@endif


	<script src="{{asset('js/jquery-3.5.1.min.js')}}"></script>
	<script src="{{asset('js/bootstrap.js')}}"></script>
</body>
</html>