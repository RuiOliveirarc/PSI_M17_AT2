<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Edicao;

class EdicoesController extends Controller
{
    public function index(){
    	$edicoes = Edicao::paginate(4);

    	return view ('edicoes.index', [
    		'edicoes'=>$edicoes
    	]);
    }


    public function show (Request $request){
//opção 2
    	$idlivro=$request->id;
        
    	$edicao=Edicao::find($idlivro);

    	return view('edicoes.show', [
    			'edicao'=>$edicao
    	]);
    }
}