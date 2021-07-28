<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\clientes;
use Illuminate\Support\Facades\DB;

class clientesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $clientes = clientes::all();

        return view('admin.clientes.index',[
            'clientes' => $clientes
        ]);
    }
    public function viewCadastrar()
    {
        return view('admin.clientes.cadastrarCliente');
    }

    public function cadastrar(Request $request)
    {
        $db = New clientes();
        $db->nome = $request->input('nome');
        $db->telefone = $request->input('telefone');
        $db->sexo = $request->input('sexo');
        $db->endereco = $request->input('endereco');
        $db->numero = $request->input('numero');
        $db->bairro = $request->input('bairro');
        $db->descricao = $request->input('descricao');
        $db->save();

        return redirect()->route('admin.clientes')->with('mensagem', 'O cliente foi cadastrado com sucesso!');
    }  

    public function editar(Request $request, $id)
    {
        // $user = users::all();
        // foreach ($user as $users) {
        //     if(Auth::user()->peditar_usuario == 0){
        //         return redirect()->route('admin')->with('mensagem', 'Você não tem permissão para acessar esta página!');
        //     }else{
                $db = clientes::find($id);
                return view('admin.clientes.editarCliente',[
                    'id' => $id,
                    'nome' => $db['nome'],
                    'telefone' => $db['telefone'],
                    'sexo' => $db['sexo'],
                    'endereco' => $db['endereco'],
                    'numero' => $db['numero'],
                    'bairro' => $db['bairro'],
                    'descricao' => $db['descricao'],
                ]); 
        //     }
        // }
    }

    public function editarSalvar(Request $request, $id)
    {
        $db = clientes::find($id);

        $dados = $request->all();
        
        $db['nome'] = $dados['nome'];
        $db['telefone'] = $dados['telefone'];
        $db['sexo'] = $dados['sexo'];
        $db['endereco'] = $dados['endereco'];
        $db['numero'] = $dados['numero'];
        $db['bairro'] = $dados['bairro'];
        $db['descricao'] = $dados['descricao'];

        $db->save();

        return redirect()->route('admin.clientes')->with('mensagem', 'O cliente foi atualizado com sucesso!');
    }
    public function confirm(Request $request, $id)
    {
        $db = clientes::find($id);
        return view('admin.clientes.confirmDelete', [
            'id' => $id,
        ]);
    }

    public function remover(request $request)
    {
        $user = clientes::find($request->id);
        $user->delete();

        return redirect()->route('admin.clientes')->with('invalido', 'O cliente foi deletado com sucesso!');
    }
}
