<h2>deseja eliminar o genero</h2>
<h2>{{$genero->designacao}}</h2>
<form method="post" action="{{route('generos.destroy',['id'=>$genero->id_genero])}}">
	@csrf
	@method('delete')
	<input type="submit" name="enviar">
</form>