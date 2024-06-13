<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Eventos;

class EventosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Eventos::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Criar um novo evento
        $novoEvento = Eventos::create([
            'user_id' => $request->input('user_id'),
            'orcamento' => $request->input('orcamento'),
            'nome_evento' => $request->input('nome_evento'),
            'desc_evento' => $request->input('desc_evento'),
            'data_evento' => $request->input('data_evento'),
            'local_evento' => $request->input('local_evento'),
            'info_contato' => $request->input('info_contato'),
            'status_proposta' => $request->input('status_proposta'),
        ]);

        // Retornar uma resposta adequada
        return response()->json([
            'message' => 'Evento criado com sucesso',
            'data' => $novoEvento
        ], 201); // Código de status 201 indica "Created"
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $evento = Eventos::find($id);

        if (!$evento) {
            return response()->json(['message' => 'Evento não encontrado'], 404);
        }

        return response()->json($evento);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Recuperar o evento com base no ID
        $evento = Eventos::find($id);

        // Verificar se o evento existe
        if (!$evento) {
            return response()->json(['message' => 'Evento não encontrado'], 404);
        }

        // Atualizar os dados do evento
        $evento->user_id = $request->input('user_id');
        $evento->orcamento = $request->input('orcamento');
        $evento->nome_evento = $request->input('nome_evento');
        $evento->desc_evento = $request->input('desc_evento');
        $evento->data_evento = $request->input('data_evento');
        $evento->local_evento = $request->input('local_evento');
        $evento->info_contato = $request->input('info_contato');
        $evento->status_proposta = $request->input('status_proposta');

        // Salvar as alterações no banco de dados
        $evento->save();

        // Retornar uma resposta adequada
        return response()->json([
            'message' => 'Evento atualizado com sucesso',
            'data' => $evento
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Encontrar o evento pelo id e deletá-lo
        $evento = Eventos::findOrFail($id);
        $evento->delete();

        // Retornar uma resposta vazia com código HTTP 204 (No Content)
        return response()->json(['message' => 'Evento apagado com sucesso'], 204);
    }
}
