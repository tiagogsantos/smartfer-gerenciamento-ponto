<?php

namespace App\Http\Controllers\Administrativo;

use App\Http\Controllers\Controller;
use App\Models\Atestados;
use App\Models\Perfil;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdministrativoController extends Controller
{
    public function index()
    {
        $funcionarios = User::where('tipo', 'funcionario')->count();
        $funcionariosInativos = User::where('tipo', 'funcionario')->where('status', 0)->count();
        $funcionariosAtivos = User::where('tipo', 'funcionario')->where('status', 1)->count();
        $atestadoPendente = Atestados::where('status', '=', 'pendente')->count();
        $perfil = Perfil::where('user_id', Auth::user()->id)->first();

        if (Auth::user()->tipo === 'rh') {
            return view('administrativo.usuarios.list', [
                'funcionarios' => $funcionarios,
                'funcionariosInativos' => $funcionariosInativos,
                'funcionariosAtivos' => $funcionariosAtivos,
                'atestadoPendente' => $atestadoPendente,
                'perfil' => $perfil
            ]);
        } else {
            $controller = new AtestadoController();
            return $controller->getListAtestados();
        }
    }

    public function getListUsers()
    {
        $funcionarios = User::where('tipo', 'funcionario')->get();

        return response()->json([
            'funcionarios' => $funcionarios
        ]);
    }
}
