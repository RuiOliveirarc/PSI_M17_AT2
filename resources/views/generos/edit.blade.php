@extends('layouts.layout')

	@section('titulo-pagina')
		Generos
	@endsection

	@section('titulo')
		Editar Generos
	@endsection


	@section('conteudo')

<form action="{{route('generos.update', ['id'=>$genero->id_genero])}}" method="post">

	@csrf
	@method('patch')

	Designbação: <input type="text" name="designacao" value="{{$genero->designacao}}">
	<br>
		@if ($errors->has('designacao'))
			Deverá indicar uma designacao correto(Tem letras)<br>
		@endif

	Observações: <textarea name="observacoes">{{$genero->observacoes}}</textarea>
	<br>

		@if ($errors->has('observacoes'))
			Deverá indicar observacoes correto<br>
		@endif
	
	<input type="submit" name="enviar">
</form>


@endsection