<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contato;
use Illuminate\Support\Facades\Validator;

class ContatosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $registros = Contato::all(); 

        $contador = $registros->count(); 

        if ($contador > 0) {
            return response()->json([
                'success' => true,
                'message' => 'Contato encontrado com sucesso!',
                'data' => $registros,
                'total' => $contador
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Nenhum contato encontrado.'
            ], 400); 
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'Nome' => 'required',
            'idade' => 'required',
            'telefone' => 'required',
            'email' => 'required'
        ]); 

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Registros invalidos',
                'errors' => $validator->errors()
            ], 400); 
        }

        $registros = Contato::create($request->all()); 

        if ($registros) {
            return response()->json([
                'success' => true,
                'message' => 'Contato cadastrado com sucesso!',
                'data' => $registros
            ], 201); 
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Erro ao cadastrar contato'
            ], 500); 
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $registros = Contato::find($id); 

        if ($registros) {
            return response()->json([
                'success' => true,
                'message' => 'Contato localizado!!!',
                'data' => $registros
            ], 200); 
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Contato não localizado',
            ], 404); 
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'Nome' => 'required',
            'idade' => 'required',
            'telefone' => 'required',
            'email' => 'required'
        ]); 

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Registros inválidos',
                'errors' => $validator->errors()
            ], 400); 
        }

        $registrosBanco = Contato::find($id);

        if (!$registrosBanco) {
            return response()->json([
                'success' => false,
                'message' => 'Contato não encontrado'
            ], 404);
        }

        $registrosBanco->Nome = $request->Nome;
        $registrosBanco->idade = $request->idade;
        $registrosBanco->telefone = $request->telefone;
        $registrosBanco->email = $request->email; 

        if ($registrosBanco->save()) {
            return response()->json([
                'success' => true,
                'message' => 'Contato atualizado com sucesso!',
                'data' => $registrosBanco
            ], 200); 
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Erro ao atualizar o contato'
            ], 500); 
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $registros = Contato::find($id);

        if (!$registros) {
            return response()->json([
                'success' => false,
                'message' => 'Contato não encontrado'
            ], 404); 
        }

        if ($registros->delete()) {
            return response()->json([
                'success' => true, 
                'message' => 'Contato deletado com sucesso'
            ], 200); 
        }

        return response()->json([
            'success' => false,
            'message' => 'Erro ao deletar o contato'
        ], 500); 
    }
}
