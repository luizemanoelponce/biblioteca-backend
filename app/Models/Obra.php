<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class Obra
{
    public function create ($titulo, $editora, $foto, $autores)
    {
        $nova_obra = DB::insert("INSERT INTO obras (titulo, editora, foto, autores) VALUES (:titulo, :editora, :foto, :autores)",[
            "titulo" => $titulo,
            "editora" => $editora,
            "foto" => $foto,
            "autores" => $autores
        ]);
        return $nova_obra;
    }

    public function read()
    {
        $list_obras = DB::Select("SELECT * FROM obras");

        return $list_obras;
    }

    public function update($id, $titulo, $editora, $foto, $autores)
    {
        $update_obra = DB::update("UPDATE obras SET titulo = :titulo, editora = :editora, foto = :foto, autores = :autores WHERE id = :id", [
            "titulo" => $titulo,
            "editora" => $editora,
            "foto" => $foto,
            "autores" => $autores,
            "id" =>$id
        ]);

        return $update_obra;
    }  
    
    public function delete($id)
    {
        $delete_obra = DB::delete("DELETE FROM obras WHERE id = :id", [
            "id" => $id
        ]);
        return $delete_obra;
    }
}
