<?php

namespace App\Repositories;

use App\Models\Indicacoes;
use Illuminate\Database\QueryException;


class IndicacoesRepository 
{

    public static function getIndicacaoById($id){
        try {
            $indicacao = Indicacoes::where('id',$id)->with('status')->first();
            return response()->json($indicacao);
        } catch (QueryException $e) {
            return response()->json([
                "error" => $e
            ]);
        }  
    }

    public static function deleteIndicacao($id){
        try {
            $indicacao = Indicacoes::where('id',$id)->delete();
            $indicacoes = Indicacoes::with('status')->orderBy('id', 'DESC')->get();
            return response()->json($indicacoes);
        } catch (QueryException $e) {
            return response()->json([
                "error" => $e
            ]);
        }  
    }

    public static function getIndicacoes(){
        try {
            $indicacoes = Indicacoes::with('status')->orderBy('id', 'DESC')->get();
            return response()->json($indicacoes);
        } catch (QueryException $e) {
            return response()->json([
                "error" => $e
            ]);
        }  
    }

    public static function createIndicacao($dados){
        try {

            $indicacao = new Indicacoes();
            $indicacao->nome = $dados->nome;
            $indicacao->cpf = $dados->cpf;
            $indicacao->telefone = $dados->telefone;
            $indicacao->email = $dados->email;
            $indicacao->status_id = 1;
            $indicacao->save();

            $indicacoes = Indicacoes::with('status')->orderBy('id', 'DESC')->get();
            return response()->json($indicacoes);
    
            // return response()->json('Indicação Cadastrada Com Sucesso');
        } catch (QueryException $e) {
            return response()->json([
                "error" => $e
            ]);
        }  
    }

    public static function updateIndicacao($dados){
        try {

            $indicacao = Indicacoes::where('id',$dados->id)->first();
            if($indicacao->status_id < 3){
                $indicacao->status_id = $indicacao->status_id+1;
                $indicacao->save();
            }else{
                return response()->json('Indicação Não Alterada');
            }

            $indicacoes = Indicacoes::with('status')->orderBy('id', 'DESC')->get();
            return response()->json($indicacoes);
        } catch (QueryException $e) {
            return response()->json([
                "error" => $e
            ]);
        }  
    }

}