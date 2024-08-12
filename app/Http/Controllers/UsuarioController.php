<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userData = Usuario::obtemTodos();

        return view("manutencao.index")
            ->with('acao', 0)
            ->with('userData', $userData);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $usuario = new Usuario();
            $usuario->nm_usuario = $request->nome;
            $usuario->nivel = $request->nivel;
            $usuario->email = $request->email;
            $usuario->senha = $request->senha;
            $usuario->save();
            DB::commit();

            return redirect()->action([UsuarioController::class, 'index'])
                ->with('success', "Usuario adicionado com sucesso.)");

        } catch (\Exception $ex) {
            DB::rollBack();
            return redirect()->action([UsuarioController::class, 'index'])
                ->with("status", "Erro ao adicionar usuário. (Código: {$ex->getMessage()})");
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($usuario)
    {
        $usuario = Usuario::where('cd_usuario', '=', $usuario)->first();
        $userData = Usuario::obtemTodos();
        return view("manutencao.index")
            ->with('acao', 1)
            ->with('usuario', $usuario)
            ->with('userData', $userData);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Usuario $usuario)
    {
        try {
            DB::beginTransaction();
            $usuario->nm_usuario = $request->nome;
            $usuario->nivel = $request->nivel;
            $usuario->email = $request->email;
            $usuario->senha = $request->senha;
            $usuario->save();
            DB::commit();

            return redirect()->action([UsuarioController::class, 'index'])
                ->with('success', "Usuario Atualizado com sucesso.");

        } catch (\Exception $ex) {
            DB::rollBack();
            return redirect()->action([UsuarioController::class, 'index'])
                ->with("status", "Erro ao atualizar usuário. (Código: {$ex->getMessage()})");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Usuario $usuario)
    {
        try {
            DB::beginTransaction();
            $usuario->delete();
            DB::commit();

            return redirect()->action([UsuarioController::class, 'index'])
                ->with('success', "Usuario excluido com sucesso.");

        } catch (\Exception $ex) {
            DB::rollBack();
            return redirect()->action([UsuarioController::class, 'index'])
                ->with("status", "Erro ao excluir usuário. (Código: {$ex->getMessage()})");
        }
    }
}
