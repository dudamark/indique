<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\IndicacoesRepository;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;

class IndicacoesController extends Controller
{

    public function cadastrarIndicacao(Request $request){
        try {
            $validator = Validator::make($request->all(), [
                'email' => [
                    'email',
                ],
                'cpf' => [
                    'cpf',
                    'unique:indicacoes'
                ]
            ]);
    
            if ($validator->fails()){
                return response()->json(['error'=>0]);
            }
            return IndicacoesRepository::createIndicacao($request);
        } catch (QueryException $e) {
            return response()->json([
                "error" => $e
            ]);
        }  
    }

    public function selecionarIndicacao(Request $request){
        try {
            return IndicacoesRepository::getIndicacaoById($request->id);
        } catch (QueryException $e) {
            return response()->json([
                "error" => $e
            ]);
        }  
    }

    public function excluirIndicacao(Request $request){
        try {
            return IndicacoesRepository::deleteIndicacao($request->id);
        } catch (QueryException $e) {
            return response()->json([
                "error" => $e
            ]);
        }  
    }

    public function listarIndicacoes(){
        try {
            return IndicacoesRepository::getIndicacoes();
        } catch (QueryException $e) {
            return response()->json([
                "error" => $e
            ]);
        }  
    }

    public function editarIndicacoes(Request $request){
        try {
            return IndicacoesRepository::updateIndicacao($request);
        } catch (QueryException $e) {
            return response()->json([
                "error" => $e
            ]);
        }  
    }


}