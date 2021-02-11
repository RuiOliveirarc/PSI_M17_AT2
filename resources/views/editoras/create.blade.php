@extends('layouts.layout')

	@section('titulo-pagina')
		Editoras
	@endsection

	@section('titulo')
		Criar Nova Editora
	@endsection


	@section('conteudo')

<form action="{{route('editoras.store')}}" method="post">

	@csrf

	Nome: <input type="text" name="nome">
	<br>
		@if ($errors->has('nome'))
			Deverá indicar um nome correto(Tem letras)<br>
		@endif

	Morada: <input type="text" name="morada">
	<br>
		@if ($errors->has('morada'))
			Deverá indicar uma morada correta(letras)<br>
		@endif

	Observações: <textarea name="observacoes"></textarea>
	<br>

		@if ($errors->has('observacoes'))
			Deverá indicar observacoes correto<br>
		@endif
	
	<input type="submit" name="enviar">
</form>

@endsection