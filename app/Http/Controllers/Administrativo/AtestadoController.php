<?php

namespace App\Http\Controllers\Administrativo;

use App\Http\Controllers\Controller;
use App\Models\Atestados;
use App\Models\Perfil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AtestadoController extends Controller
{
    public function storeAtestado(Request $request)
    {
        $id = Auth::id();

        // Validação mínima recomendada
        $request->validate([
            'descricao'    => 'required|string',
            'data_inicio'  => 'required|date',
            'data_fim'     => 'required|date|after_or_equal:data_inicio',
            'status'       => 'required|string',
            'justificativa'=> 'nullable|string',
            'arquivo.*'    => 'required|file|mimes:pdf,jpg,jpeg,png|max:5120' // 5MB máx por arquivo
        ]);

        if ($request->hasFile('arquivo')) {
            foreach ($request->file('arquivo') as $file) {
                // Gera um nome único baseado no tempo e ID do usuário
                $filename = time() . '_' . uniqid() . '_' . $file->getClientOriginalName();
                $path = $file->storeAs("atestados/{$id}", $filename, 'public');

                // Cria um novo registro para cada arquivo
                Atestados::create([
                    'descricao'    => $request->descricao,
                    'data_inicio'  => $request->data_inicio,
                    'data_fim'     => $request->data_fim,
                    'status'       => $request->status,
                    'justificativa'=> $request->justificativa,
                    'arquivo'      => $path,
                    'user_id'      => $id
                ]);
            }

            return redirect()->back()->with('success', 'Atestados enviados com sucesso.');
        }

        return redirect()->back()->withErrors(['arquivo' => 'Nenhum arquivo enviado.']);
    }

    public function createAtestado()
    {
        return view('administrativo.atestados.create');
    }

    // Pega o atestado expecifico
    public function editAtestado($id, $user_id)
    {
        $atestados = Atestados::where('id', $id)->where('user_id', $user_id)->first();

        if ($atestados) {
            return view('administrativo.atestados.edit', [
                'atestados' => $atestados
            ]);
        } else {
            return redirect()->back();
        }
    }

    // Lista todos os atestados
    public function getListAtestados()
    {
        $user = Auth::user();

        $perfil = Perfil::where('user_id', Auth::user()->id)->first();

        if ($user->tipo === 'rh') {
            $qtdAtestados = Atestados::all()->count();
            $atestados = Atestados::all();

            return view('administrativo.atestados.list', [
                'qtdAtestados' => $qtdAtestados,
                'atestados' => $atestados,
                'perfil' => $perfil
            ]);
        } else {
            $qtdAtestados = Atestados::where('user_id', $user->id)->count();
            $atestados = Atestados::where('user_id', $user->id)->get();

            return view('administrativo.atestados.list', [
                'qtdAtestados' => $qtdAtestados,
                'atestados' => $atestados,
                'perfil' => $perfil
            ]);
        }
    }
}
