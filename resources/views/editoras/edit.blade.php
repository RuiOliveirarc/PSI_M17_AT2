@extends('layouts.layout')

	@section('titulo-pagina')
		Editoras
	@endsection

	@section('titulo')
		Editar Editoras
	@endsection


	@section('conteudo')

<form action="{{route('editoras.update', ['id'=>$editora->id_editora])}}" method="post">

	@csrf
	@method('patch')

	Nome: <input type="text" name="nome" value="{{$editora->nome}}">
	<br>
		@if ($errors->has('nome'))
			Deverá indicar um nome correto(Tem letras)<br>
		@endif

	Morada: <input type="text" name="morada" value="{{$editora->morada}}">
	<br>
		@if ($errors->has('morada'))
			Deverá indicar uma morada correta(letras)<br>
		@endif

	Observações: <textarea name="observacoes">{{$editora->observacoes}}</textarea>
	<br>

		@if ($errors->has('observacoes'))
			Deverá indicar observacoes correto<br>
		@endif
	
	<input type="submit" name="enviar">
</form>

@endsection