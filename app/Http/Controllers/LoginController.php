<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
    */
    public function index()
    {
        return view('login.index');
    }

    public function testeUsuario(Request $request) {
        $dados = Usuario::Login($request->email, $request->senha);

        if(sizeof($dados) > 0) {
            session()->put('permissao', $dados[0]->nivel);
            session()->put('infoUser', $dados[0]->cd_usuario . ' / ' . $dados[0]->nm_usuario);
            return redirect()->action([UsuarioController::class, 'index']);
        }

        return redirect()->action([self::class, 'index'])->with("status", "Nenhum Usuario encontrado.");
    }
}
