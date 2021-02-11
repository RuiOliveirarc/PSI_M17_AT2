<h2>deseja eliminar o livro</h2>
<h2>{{$livro->titulo}}</h2>
<form method="post" action="{{route('livros.destroy',['id'=>$livro->id_livro])}}">
	@csrf
	@method('delete')
	<input type="submit" name="enviar">
</form>