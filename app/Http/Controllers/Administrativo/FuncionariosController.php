<?php

namespace App\Http\Controllers\Administrativo;

use App\Http\Controllers\Controller;
use App\Models\Perfil;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class FuncionariosController extends Controller
{
    public function editFuncionario($id): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $user = User::where('id', $id)->first();
        $perfil = Perfil::where('user_id', $id)->first();

        return view('administrativo.usuarios.edit', [
            'user' => $user,
            'perfil' => $perfil
        ]);
    }

    public function atualizarFuncionario(Request $request, $id): \Illuminate\Http\JsonResponse
    {
        try {
            $userPerfil = Perfil::where('user_id', $id)->firstOrFail();
            $user = User::where('id', $id)->firstOrFail();

            $data = $request->only([
                'estado_civil', 'cpf', 'rg', 'data_nascimento', 'cep', 'rua',
                'numero', 'complemento', 'bairro', 'cidade', 'uf', 'telefone',
            ]);

            $dataUser = $request->only([
                'name', 'email', 'tipo', 'status'
            ]);

            $dataUser['tipo'] = $request->input('tipo') === 'rh' ? 'rh' : 'funcionario';
            $dataUser['status'] = $request->input('status') == 1 ? 1 : 0;

            if ($request->hasFile('foto_capa')) {
                // Remove old photo if exists
                if ($userPerfil->foto_capa) {
                    Storage::disk('public')->delete($userPerfil->foto_capa);
                }

                $file = $request->file('foto_capa');
                $filename = time() . '_' . $file->getClientOriginalName();
                $path = $file->storeAs("avatar/{$id}", $filename, 'public');

                $data['foto_capa'] = $path;
            }

            $userPerfil->update($data);
            $user->update($dataUser);

            return response()->json([
                'message' => 'Dados atualizados com sucesso!',
                'foto_path' => $userPerfil->foto_capa ?? null
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Erro ao atualizar.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function excluirFuncionario($id)
    {
        $retorno = ['error' => ''];

        $user = User::where('id', $id)->firstOrFail();

        if ($user) {
            User::where('id', $id)->update([
                'status' => 0
            ]);

            return response()->json(['message' => 'Funcionário excluído com sucesso!']);

        } else {
            $retorno['mensagem'] = 'Não foi possível excluir o funcionário!';
            return response()->json($retorno);
        }


    }


}
