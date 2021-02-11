@extends('layouts.layout')

	@section('titulo-pagina')
		Livros
	@endsection

	@section('titulo')
		Criar Novo livro
	@endsection


	@section('conteudo')

<form action="{{route('livros.store')}}" method="post">

	@csrf

	Título: <input type="text" name="titulo">
	<br>
		@if ($errors->has('titulo'))
			Deverá indicar um titulo correto(Tem letras)<br>
		@endif

	Idioma: <input type="text" name="idioma">
	<br>
		@if ($errors->has('idioma'))
			Deverá indicar um idioma correto(letras)<br>
		@endif

	Total páginas: <input type="text" name="total_paginas">
	<br>

		@if ($errors->has('total_paginas'))
			Deverá indicar um titulo correto(Numero sem letras)<br>
		@endif

	Data Edição: <input type="date" name="data_edicao">
	<br>

		@if ($errors->has('data_edicao'))
			Deverá indicar uma data correta<br>
		@endif

	ISBN: <input type="text" name="isbn" >
	<br>

		@if ($errors->has('isbn'))
			Deverá indicar um isbn correto(13 carateres)<br>
		@endif
	

	Observações: <textarea name="observacoes"></textarea>
	<br>

		@if ($errors->has('observacoes'))
			Deverá indicar observacoes correto<br>
		@endif

	Imagem capa: <input type="text" name="imagem_capa">
	<br>

		@if ($errors->has('imagem_capa'))
			Deverá indicar uma imagem correta<br>
		@endif

	Genero: 
	<select name="id_genero">
		@foreach($generos as $genero)
			<option value="{{$genero->id_genero}}">{{$genero->designacao}}</option>
		@endforeach
	</select>

		@if ($errors->has('id_genero'))
			Deverá indicar um id do genero correto<br>
		@endif
		<br>

	Autor(es):
		<select name="id_autor[]" multiple="multiple">
			@foreach ($autores as $autor)
				<option value="{{$autor->id_autor}}">{{$autor->nome}}</option>
			@endforeach
		</select>

	<br>

		@if ($errors->has('id_autor'))
			Deverá indicar um id do autor correto<br>
		@endif

	Sinópse: <textarea name="sinopse"></textarea>
	<br>

		@if ($errors->has('sinopse'))
			Deverá indicar ua sinopse correta<br>
		@endif

	Editora(s):
		<select name="id_editora[]" multiple="multiple">
			@foreach ($editoras as $editora)
				<option value="{{$editora->id_editora}}">{{$editora->nome}}</option>
			@endforeach
		</select>

		@if ($errors->has('id_editora'))
			Deverá indicar um id da editora correto<br>
		@endif

		<br>
		
	<input type="submit" name="enviar">


<!-- ////////////// SAVE USER /////////////////-->
	<select style="visibility: hidden;" name="id_user">
			<option value="{{Auth::user()->id}}"></option>
		</select>

</form>




@endsection