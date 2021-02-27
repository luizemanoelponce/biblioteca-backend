<?php

use App\Http\Controllers\ObrasController;
use Illuminate\Http\Request;

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', "ObrasController@read");

$router->post('/', "ObrasController@create");

$router->put('/{id}', function ($id, Request $request) {

    $this->validate($request, [
        'titulo' => 'required',
        'editora' => 'required',
        'foto' => 'required',
        'autores' => 'required'
    ]);
    
    $atualizar = new ObrasController;
    $atualizar = $atualizar->update($id, $request->titulo, $request->editora, $request->foto, $request->autores );
    if ($atualizar){
        $atualizar = ["sucesso" => "Obra atualizada"];
    } else {
        $atualizar = ["falha" => "Nao foi possivel atualizar"];
    }
    return $atualizar;
});

$router->delete('/{id}', function ($id) {
    
    $deletar = new ObrasController;
    $deletar = $deletar->delete($id);
    if ($deletar){
        $deletar = ["sucesso" => "Obra deletada"];
    } else {
        $deletar = ["falha" => "Nao foi possivel deletar"];
    }
    return $deletar;
});