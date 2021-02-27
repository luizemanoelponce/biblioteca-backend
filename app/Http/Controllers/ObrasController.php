<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Obra;

class ObrasController extends Controller
{
    public function read()
    {
        $read = new Obra;
        $read = $read->read();

        if (!$read){
            $read = ["Falha" => "nenhum registro encontrado"];
        }

        return response()->json($read);
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'titulo' => 'required',
            'editora' => 'required',
            'foto' => 'required',
            'autores' => 'required'
        ]);
        $nova_obra = new Obra;
        $nova_obra = $nova_obra->create( $request->titulo, $request->editora, $request->foto, $request->autores );

            if ($nova_obra){

                $nova_obra = ["sucesso" => "registro criado com sucesso"];

            } else {
                $nova_obra = ["falha" => "não foi possível registrar a obra"];
            }
        return response()->json($nova_obra);
        
    }

    public function update ($id, $titulo, $editora, $foto, $autores)
    {

        $atualiza_obra = new Obra;
        $atualiza_obra = $atualiza_obra->update(  $id, $titulo, $editora, $foto, $autores);

        return response()->json($atualiza_obra);
        
    }

    public function delete ($id)
    {

        $deletar_obra = new Obra;
        $deletar_obra = $deletar_obra->delete( $id );

        return response()->json($deletar_obra);
        
    }
}
