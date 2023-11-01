<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Despesas;

class DespesaController extends Controller
{
    public function index()
    {
        $despesas = Despesas::all();

        return response()->json($despesas);
    }

    public function store(Request $request)
    {
        if(!empty($request->usuario) && $request->valor > 0 && strtotime($request->data) <= strtotime("now") &&  count($request->descricao) <= 191)
        {
            $despesa = new Despesas;
            $despesa->descricao = $request->descricao;
            $despesa->data = $request->data;
            $depesa->usuario = $request->usuario;
            $despesa->valor = $request->valor;
            $despesa->save();

            return response()->json([
                "message" => "Despesa adicionada"
            ], 201);
            }
        else
            return response()->json([
                "message" => "verifique os parametros da sua despesa"
            ], 500);
        

    }

    public function show($id)
    {
        $despesa = Despesas::find($id);
        if(!empty($despesa))
            return response()->json($despesa);
        else
            return response()->json([
                "message"=>"Livro não encontrado"
            ], 404);

    }

    public function update(Request $request, $id)
    {
        if(Despesas::where('id', $id)->exists()){
            $despesa = Despesas::find($id);
            $despesa->descricao = is_null($request->descricao) ? $despesa->descricao : $request->descricao;
            $despesa->data = is_null($request->data) ? $despesa->data : $request->data;
            $despesa->usuario = is_null($request->usuario) ? $despesa->usuario : $request->usuario;
            $despesa->valor = is_null($request->valor) ? $despesa->valor : $request->valor;
            $despesa->save();

            return response()->json([
                "message" => "Despesa atualizada"
            ], 202);
        }
        else
            return response()->json([
                "message" => "Despesa não encontrada"
            ], 404);
    }

    public function destroy($id)
    {
        if(Despesas::where('id', $id)->exists()){
            $despesa = Despesas::find($id);
            $despesa->delete();

            return response()->json([
                "message" => "registros deletados"
            ], 202);
        }
        else
            return response()->json([
                "message" => "Despesa não encontrada"
            ], 404);
    }
}
