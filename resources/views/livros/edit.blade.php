@extends('layouts.layout')

	@section('titulo-pagina')
		Livros
	@endsection

	@section('titulo')
		Editar de Livros
	@endsection


	@section('conteudo')

<form action="{{route('livros.update', ['id'=>$livro->id_livro])}}" method="post">

	@csrf
	@method('patch')

	Título: <input type="text" name="titulo" value="{{$livro->titulo}}">
	<br>
		@if ($errors->has('titulo'))
			Deverá indicar um titulo correto(Tem letras)<br>
		@endif

	Idioma: <input type="text" name="idioma" value="{{$livro->idioma}}">
	<br>
		@if ($errors->has('idioma'))
			Deverá indicar um idioma correto(letras)<br>
		@endif

	Total páginas: <input type="text" name="total_paginas" value="{{$livro->total_paginas}}">
	<br>

		@if ($errors->has('total_paginas'))
			Deverá indicar um titulo correto(Numero sem letras)<br>
		@endif

	Data Edição: <input type="date" name="data_edicao" value="{{$livro->data_edicao}}">
	<br>

		@if ($errors->has('data_edicao'))
			Deverá indicar uma data correta<br>
		@endif

	ISBN: <input type="text" name="isbn" value="{{$livro->isbn}}">
	<br>

		@if ($errors->has('isbn'))
			Deverá indicar um isbn correto(13 carateres)<br>
		@endif
	

	Observações: <textarea name="observacoes">{{$livro->observacoes}}</textarea>
	<br>

		@if ($errors->has('observacoes'))
			Deverá indicar observacoes correto<br>
		@endif

	Imagem capa: <input type="text" name="imagem_capa" value="{{$livro->imagem_capa}}">
	<br>

		@if ($errors->has('imagem_capa'))
			Deverá indicar uma imagem correta<br>
		@endif

	Genero:
	<select name="id_genero">
		@foreach($generos as $genero)
			<option value="{{$genero->id_genero}}"
				@if($genero->id_genero==$livro->id_genero)selected @endif
				>{{$genero->designacao}}</option>
		@endforeach
	</select>
	<br>

		@if ($errors->has('id_genero'))
			Deverá indicar um id do genero correto<br>
		@endif

	Autor(es):
	<select name="id_autor" multiple="multiple">
		@foreach ($autores as $autor)
			<option 
				value="{{$autor->id_autor}}"
				@if(in_array($autor->id_autor, $autoresLivro))selected @endif
			>
				{{$autor->nome}}</option>
		@endforeach
	</select>

	<br>

		@if ($errors->has('id_autor'))
			Deverá indicar um id do autor correto<br>
		@endif

	Sinópse: <textarea name="sinopse">{{$livro->sinopse}}</textarea>
	<br>

		@if ($errors->has('sinopse'))
			Deverá indicar ua sinopse correta<br>
		@endif

	Editora(s):
		<select name="id_editora[]" multiple="multiple">
			@foreach ($editoras as $editora)
				<option 
					value="{{$editora->id_editora}}"
					@if(in_array($editora->id_editora, $editorasLivro))selected @endif
				>
					{{$editora->nome}}
				</option>
			@endforeach
		</select>
		<br>
	<input type="submit" name="enviar">
</form>

@endsection