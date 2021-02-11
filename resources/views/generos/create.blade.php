@extends('layouts.layout')

	@section('titulo-pagina')
		Generos
	@endsection

	@section('titulo')
		Criar Novo Genero
	@endsection


	@section('conteudo')

<form action="{{route('generos.store')}}" method="post">

	@csrf

	Designação: <input type="text" name="designacao">
	<br>
		@if ($errors->has('designacao'))
			Deverá indicar um designacao correto(Tem letras)<br>
		@endif

	Observações: <textarea name="observacoes"></textarea>
	<br>

		@if ($errors->has('observacoes'))
			Deverá indicar observacoes correto<br>
		@endif
	
	<input type="submit" name="enviar">
</form>

@endsection