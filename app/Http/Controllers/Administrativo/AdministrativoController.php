<?php

namespace App\Http\Controllers\Administrativo;

use App\Http\Controllers\Controller;
use App\Models\Atestados;
use App\Models\User;

class AdministrativoController extends Controller
{
    public function index()
    {
        $funcionarios = User::where('tipo', 'funcionario')->count();
        $funcionariosInativos = User::where('tipo', 'funcionario')->where('status', 0)->count();
        $funcionariosAtivos = User::where('tipo', 'funcionario')->where('status', 1)->count();
        $atestadoPendente = Atestados::where('status', '=', 'pendente')->count();

        return view('administrativo.layout.header', [
            'funcionarios' => $funcionarios,
            'funcionariosInativos' => $funcionariosInativos,
            'funcionariosAtivos' => $funcionariosAtivos,
            'atestadoPendente' => $atestadoPendente
        ]);
    }

    public function getListUsers()
    {
        $funcionarios = User::where('tipo', 'funcionario')->get();

        return response()->json([
            'funcionarios' => $funcionarios
        ]);
    }
}
