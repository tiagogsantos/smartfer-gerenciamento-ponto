<?php

namespace App\Http\Controllers\Administrativo;

use App\Http\Controllers\Controller;

class FuncionariosController extends Controller
{
    public function editFuncionario($id)
    {
        return view('administrativo.usuarios.edit');
    }

}
