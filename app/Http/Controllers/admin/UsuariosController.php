<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\user;
use Illuminate\Support\Facades\DB;

class UsuariosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = user::all();

        return view('admin.usuarios.index',[
            'users' => $users
        ]);
    }
    public function viewCadastrar()
    {
        return view('admin.usuarios.cadastrarUsuario');
    }

    public function cadastrar(Request $request)
    {
        $verific_email = DB::table('users')->where('email', $request['email'])->count() == 1;

        if($verific_email == "true") {
            return redirect()->route('admin.usuarios')->with('invalido', 'E-Mail já existente!');
        } else{
            $db = New user();
            $db->name = $request->input('name');
            $db->email = $request->input('email');
            $db->password = $request->input('password');

            $db->pvisualizar_usuarios = (isset($request['pvisualizar_usuarios'])) ? 1 : 0;
            $db->pcadastrar_usuarios = (isset($request['pcadastrar_usuarios'])) ? 1 : 0;
            $db->pdeletar_usuarios = (isset($request['pdeletar_usuarios'])) ? 1 : 0;
            $db->peditar_usuarios = (isset($request['peditar_usuarios'])) ? 1 : 0;

            $db->pvisualizar_clientes = (isset($request['pvisualizar_clientes'])) ? 1 : 0;
            $db->pcadastrar_clientes = (isset($request['pcadastrar_clientes'])) ? 1 : 0;
            $db->pdeletar_clientes = (isset($request['pdeletar_clientes'])) ? 1 : 0;
            $db->peditar_clientes = (isset($request['peditar_clientes'])) ? 1 : 0;
            $db->save();

            return redirect()->route('admin.usuarios')->with('mensagem', 'Administrador cadastrado com sucesso!');
        }
    }

    public function editar(Request $request, $id)
    {
        // $user = user::all();
        // foreach ($user as $users) {
        //     if(Auth::user()->peditar_usuario == 0){
        //         return redirect()->route('admin')->with('mensagem', 'Você não tem permissão para acessar esta página!');
        //     }else{
                
                $db = user::find($id);

                return view('admin.usuarios.editarUsuario',[
                    'id' => $id,
                    'name' => $db['name'],
                    'email' => $db['email'],
                    'password' => $db['password'],

                    'pvisualizar_usuarios' => $db['pvisualizar_usuarios'],
                    'pcadastrar_usuarios' => $db['pcadastrar_usuarios'],
                    'pdeletar_usuarios' => $db['pdeletar_usuarios'],
                    'peditar_usuarios' => $db['peditar_usuarios'],

                    'pvisualizar_clientes' => $db['pvisualizar_clientes'],
                    'pcadastrar_clientes' => $db['pcadastrar_clientes'],
                    'pdeletar_clientes' => $db['pdeletar_clientes'],
                    'peditar_clientes' => $db['peditar_clientes'],
                ]); 
        //     }
        // }
    }

    public function editarSalvar(Request $request, $id)
    {
        $db = user::find($id);
        $dados = $request->all();
        
        $name = $dados['name'];
        $email = $dados['email'];
        if ($db['password'] == $dados['password']) {
            $password = $dados['password'];
        }else{
            $password = bcrypt($dados['password']);
        }

        $pvisualizar_usuarios = (isset($request['pvisualizar_usuarios'])) ? 1 : 0;
        $pcadastrar_usuarios = (isset($request['pcadastrar_usuarios'])) ? 1 : 0;
        $pdeletar_usuarios = (isset($request['pdeletar_usuarios'])) ? 1 : 0;
        $peditar_usuarios = (isset($request['peditar_usuarios'])) ? 1 : 0;

        $pvisualizar_clientes = (isset($request['pvisualizar_clientes'])) ? 1 : 0;
        $pcadastrar_clientes = (isset($request['pcadastrar_clientes'])) ? 1 : 0;
        $pdeletar_clientes = (isset($request['pdeletar_clientes'])) ? 1 : 0;
        $peditar_clientes = (isset($request['peditar_clientes'])) ? 1 : 0;

        $db['name'] = $name;
        $db['email'] = $email;
        $db['password'] = $password;

        $db['pvisualizar_usuarios'] = $pvisualizar_usuarios;
        $db['pcadastrar_usuarios'] = $pcadastrar_usuarios;
        $db['pdeletar_usuarios'] = $pdeletar_usuarios;
        $db['peditar_usuarios'] = $peditar_usuarios;

        $db['pvisualizar_clientes'] = $pvisualizar_clientes;
        $db['pcadastrar_clientes'] = $pcadastrar_clientes;
        $db['pdeletar_clientes'] = $pdeletar_clientes;
        $db['peditar_clientes'] = $peditar_clientes;
    
        $db->save();

        return redirect()->route('admin.usuarios')->with('mensagem', 'Administrador atualizado com sucesso!');
    }
    public function confirm(Request $request, $id)
    {
        $db = user::find($id);
        return view('admin.usuarios.confirmDelete', [
            'id' => $id,
        ]);
    }

    public function remover(request $request)
    {
        $user = user::find($request->id);
        $user->delete();

        return redirect()->route('admin.usuarios')->with('invalido', 'O Administrador foi deletado com sucesso!');
    }
}
