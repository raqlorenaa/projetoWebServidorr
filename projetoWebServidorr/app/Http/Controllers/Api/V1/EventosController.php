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
        return Eventos::select('nome_evento as NomeEvento', 'desc_evento as Descricao',  'data_evento as Data', 'local_evento as Local', 'info_contato as Email', 'status_proposta as Status', )->get();
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
