<div style="background-color: gray"><h1 style="text-align: center">Show</h1></div>

ID:{{$livro->id_livro}}<br>
Título:{{$livro->titulo}}<br>
Idioma:{{$livro->idioma}}<br>

Autor:
@foreach ($livro->autores as $autor)
	{{$autor->nome}}<br>
@endforeach

<br>
Editora:
@foreach ($livro->editoras as $editora)
	{{$editora->nome}}<br>
@endforeach

<br>

@if($livro->user->name==Auth::user()->name)
Users:

{{$livro->user->name}}

@endif
