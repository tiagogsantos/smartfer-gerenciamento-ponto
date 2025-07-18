<?php

namespace App\Http\Controllers\Administrativo;

use App\Http\Controllers\Controller;
use App\Models\Atestados;
use Illuminate\Http\Request;

class AtestadoController extends Controller
{
    public function createAtestado()
    {
        return view('administrativo.atestados.edit');
    }

    // Pega o atestado expecifico
    public function editAtestado($id, $user_id)
    {
        $atestados = Atestados::where('id', $id)->where('user_id', $user_id)->first();
        $atestados->user();
        dd($atestados->user->name);

        if ($atestados) {
            return view('administrativo.atestados.edit', [
                'atestado' => $atestados
            ]);
        } else {
            return redirect()->back();
        }
    }

    // Lista todos os atestados
    public function getListAtestados()
    {
        $qtdAtestados = Atestados::all()->count();
        $atestados = Atestados::all();

        return view('administrativo.atestados.list', [
            'qtdAtestados' => $qtdAtestados,
            'atestados' => $atestados
        ]);
    }
}
