@extends('layouts.layout')

	@section('titulo-pagina')
		Autores
	@endsection

	@section('titulo')
		Editar Autores
	@endsection


	@section('conteudo')

<form action="{{route('autores.update', ['id'=>$autor->id_autor])}}" method="post">

	@csrf
	@method('patch')

	Nome: <input type="text" name="nome" value="{{$autor->nome}}">
	<br>
		@if ($errors->has('nome'))
			Deverá indicar um nome correto(Tem letras)<br>
		@endif

	Nacionalidade: <input type="text" name="nacionalidade" value="{{$autor->nacionalidade}}">
	<br>
		@if ($errors->has('nacionalidade'))
			Deverá indicar uma nacionalidade correta(letras)<br>
		@endif

	Data de nascimento: <input type="date" name="data_nascimento" value="{{$autor->data_nascimento}}">
	<br>

		@if ($errors->has('data_nascimento'))
			Deverá indicar uma data correta<br>
		@endif

	
	Fotografia: <input type="text" name="fotografia" value="{{$autor->fotografia}}">
	<br>

		@if ($errors->has('fotografia'))
			Deverá indicar uma imagem correta<br>
		@endif

	
	<input type="submit" name="enviar">
</form>

@endsection