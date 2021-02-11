<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Illuminate\Support\Facades\Gate;
use App\Models\Livro;
use App\Models\Genero;
use App\Models\Autor;
use App\Models\Editora;

class LivrosController extends Controller
{
    public function index(Request $request){
        $idLivro=$request->id;
    	$livros = Livro::all();
        $livro= Livro::where('id_livro',$idLivro)->with(['autor','autores','editora','editoras','user'])->first();
    	return view ('livros.index', [
    		'livros'=>$livros,
            'livro'=>$livro
    	]);
    }

    public function show (Request $request){

    	$idLivro=$request->id;



        $livro= Livro::where('id_livro',$idLivro)->with(['autor','autores','editora','editoras','user'])->first();


    	return view('livros.show', [
    			'livro'=>$livro
    	]);


    }
    public function create(){
        $generos=Genero::all();
        $autores=Autor::all();
        $editoras=Editora::all();
        return view('livros.create', [
            'generos'=>$generos,
            'autores'=>$autores,
            'editoras'=>$editoras
        ]);
    }

    public function store(Request $request){

        $novoLivro=$request->validate([
            'titulo'=>['required','min:3','max:100'],
            'idioma'=>['nullable','min:3','max:20'],
            'total_paginas'=>['nullable','numeric','min:1'],
            'data_edicao'=>['nullable','date'],
            'isbn'=>['required','min:3','max:13'],
            'observacoes'=>['nullable','min:3','max:255'],
            'imagem_capa'=>['nullable'],
            'id_genero'=>['numeric','nullable'],
            'sinopse'=>['nullable','min:3','max:255'],
            'id_user'=>['numeric','nullable'],
        ]);
        $autores=$request->id_autor;
        $editoras=$request->id_editora;

        if(Auth::check()){
            $userAtual=Auth::user()->id;
            $livro['id_user']=$userAtual;
        }


        $livro=Livro::create($novoLivro);
        $livro->autores()->attach($autores);
        $livro->editoras()->attach($editoras);

        return redirect()->route('livros.show', [
            'id'=>$livro->id_livro
        ]);
    }



    public function edit(Request $request){
        $idLivro=$request->id;
        $livro=Livro::where('id_livro',$idLivro)->with('autores','editoras')->first();
        if(Gate::allows('atualizar-livro',$livro)||Gate::allows('admin')){
            $generos=Genero::all();
            $autores=Autor::all();
            $editoras=Editora::all();
            $autoresLivro=[];
        
            foreach ($livro->autores as $autor) {
                $autoresLivro[]=$autor->id_autor;
            }

            $editorasLivro=[];

            foreach ($livro->editoras as $editora) {
                $editorasLivro[]=$editora->id_editora;
            }

            return view('livros.edit',[
                'livro'=>$livro,
                'generos'=>$generos,
                'autores'=>$autores,
                'autoresLivro'=>$autoresLivro,
                'editoras'=>$editoras,
                'editorasLivro'=>$editorasLivro
            ]);
        }
        else{
            return redirect()->route('livros.index')
            ->with('mensagem','Não tem permissão para aceder á area pretendida.');
        }
    }



    public function update (Request $request){

        $idLivro=$request->id;
        $livro=Livro::findOrFail($idLivro);

        $atualizarLivro=$request->validate([
            'titulo'=>['required','min:3','max:100'],
            'idioma'=>['nullable','min:3','max:20'],
            'total_paginas'=>['nullable','numeric','min:1'],
            'data_edicao'=>['nullable','date'],
            'isbn'=>['required','min:3','max:13'],
            'observacoes'=>['nullable','min:3','max:255'],
            'imagem_capa'=>['nullable'],
            'id_genero'=>['numeric','nullable'],
            'id_autor'=>['numeric','nullable'],
            'sinopse'=>['nullable','min:3','max:255'],
        ]);
        $autores=$request->id_autor;
        $editoras=$request->id_editora;
        $livro->update($atualizarLivro);
        $livro->autores()->sync($autores);
        $livro->editoras()->sync($editoras);

        return redirect()->route('livros.show',[
            'id'=>$livro->id_livro
        ]);
    }



    public function delete(Request $request){

        $idLivro=$request->id;

        $livro=Livro::where('id_livro',$idLivro)->first();

        return view('livros.delete',[
            'livro'=>$livro
        ]);
    }



    public function destroy(Request $request){
        $idLivro=$request->id;

        $livro=Livro::findOrFail($idLivro);

        $autoresLivro=Livro::findOrFail($idLivro)->autores;
        $editorasLivro=Livro::findOrFail($idLivro)->editoras;
        $livro->autores()->detach($autoresLivro);
        $livro->editoras()->detach($editorasLivro);

        $livro->delete();

        return redirect()->route('livros.index')->with('mensagem','Livro eliminado!');
    }
}
