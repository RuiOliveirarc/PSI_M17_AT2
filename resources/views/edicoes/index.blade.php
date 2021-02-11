<ul>
@foreach($edicoes as $edicao)
	<li>
		<a href="{{route('edicoes.show',['id'=>$edicao->id_livro])}}">
			{{$edicao->id_livro}}
		</a>
	</li>
@endforeach
</ul>
{{$edicoes->render()}}