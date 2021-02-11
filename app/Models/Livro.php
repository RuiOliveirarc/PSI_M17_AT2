<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    use HasFactory;

    protected $primaryKey="id_livro";

    protected $table="livros";

    protected $fillable=[
        'titulo',
        'idioma',
        'total_paginas',
        'data_edicao',
        'isbn',
        'observacoes',
        'imagem_capa',
        'id_genero',
        'id_autor',
        'sinopse',
        'id_user',
    ];

    public function autor(){
    	return $this->belongsTo('App\Models\Autor', 'id_autor');
    }
    public function autores(){
    	return $this->belongsToMany(
    		'App\Models\Autor',
    		'autores_livros',
    		'id_livro',
    		'id_autor'
    	)->withTimestamps();
    }

    public function editora(){
        return $this->belongsTo('App\Models\Editora', 'id_editora');
    }
    public function editoras(){
        return $this->belongsToMany(
            'App\Models\Editora',
            'editoras_livros',
            'id_livro',
            'id_editora'
        )->withTimestamps();
    }



    public function user(){
        return $this->belongsTo('App\Models\User', 'id_user');
    }
}