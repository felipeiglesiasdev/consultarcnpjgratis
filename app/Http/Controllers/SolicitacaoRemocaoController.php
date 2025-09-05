<?php

namespace App\Http\Controllers;

use App\Models\SolicitacaoRemocao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SolicitacaoRemocaoController extends Controller
{
    /**
     * Armazena uma nova solicitação de remoção no banco de dados.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'cnpj' => 'required|string|max:18',
            'razao_social' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'nome' => 'required|string|max:255',
            'motivo' => 'required|string|max:1000',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        SolicitacaoRemocao::create([
            'cnpj' => preg_replace('/[^0-9]/', '', $request->input('cnpj')),
            'razao_social' => $request->input('razao_social'),
            'email_solicitante' => $request->input('email'),
            'nome_solicitante' => $request->input('nome'),
            'motivo' => $request->input('motivo'),
        ]);

        return response()->json(['success' => 'Sua solicitação foi enviada com sucesso! Entraremos em contato em breve.']);
    }
}