ID:{{$autor->id_autor}}<br>
Nome:{{$autor->nome}}<br>
Nacionalidade:{{$autor->nacionalidade}}


<h2>Livros:</h2>
@foreach ($autor->livros as $livro)
	<h4>{{$livro->titulo}}</h4>
@endforeach