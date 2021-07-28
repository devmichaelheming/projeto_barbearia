<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\servicos;
use Illuminate\Support\Facades\DB;

class servicosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $servicos = servicos::all();

        return view('admin.servicos.index',[
            'servicos' => $servicos
        ]);
    }
    public function viewCadastrar()
    {
        return view('admin.servicos.cadastrarServico');
    }

    public function cadastrar(Request $request)
    {
        $db = New servicos();
        $db->nome_servico = $request->input('nome_servico');
        $db->valor_servico = $request->input('valor_servico');
        $db->save();

        return redirect()->route('admin.servicos')->with('mensagem', 'O serviço foi cadastrado com sucesso!');
    }

    public function editar(Request $request, $id)
    {
        // $user = users::all();
        // foreach ($user as $users) {
        //     if(Auth::user()->peditar_usuario == 0){
        //         return redirect()->route('admin')->with('mensagem', 'Você não tem permissão para acessar esta página!');
        //     }else{
                $db = servicos::find($id);
                return view('admin.servicos.editarServico',[
                    'id' => $id,
                    'nome_servico' => $db['nome_servico'],
                    'valor_servico' => $db['valor_servico'],
                ]); 
        //     }
        // }
    }

    public function editarSalvar(Request $request, $id)
    {
        $db = servicos::find($id);

        $dados = $request->all();
        
        $db['nome_servico'] = $dados['nome_servico'];
        $db['valor_servico'] = $dados['valor_servico'];

        $db->save();

        return redirect()->route('admin.servicos')->with('mensagem', 'O serviço foi atualizado com sucesso!');
    }
    public function confirm(Request $request, $id)
    {
        $db = servicos::find($id);
        return view('admin.servicos.confirmDelete', [
            'id' => $id,
        ]);
    }

    public function remover(request $request)
    {
        $user = servicos::find($request->id);
        $user->delete();

        return redirect()->route('admin.servicos')->with('invalido', 'O serviço foi deletado com sucesso!');
    }
}
