<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContatosController;


//Visualizar
Route::get('/', function(){return response()->json(['Sucesso'=>true]);});
Route::get('/contato',[ContatosController::class, 'index']);
Route::get('/contato/{id}',[ContatosController::class,'show']);

//Inserir 
Route::post('/contato',[ContatosController::class,'store']);

//Alterar
Route::put('/contato/{id}',[ContatosController::class,'update']);

//Excluir
Route::delete('contato/{id}',[ContatosController::class,'destroy']);

