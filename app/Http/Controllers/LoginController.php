<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\clientes;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // VIEW DE LOGIN
    public function index()
    {
        return view('login.login');
    }
    
    // FUNÇÃO QUE REALIZA O LOGIN
    public function save(request $request)
    {
        $credentials = $request->only('email', 'password');

        $verific_email = DB::table('clientes')->where('email', $request['email'])->get();

        if (isset($verific_email[0])) {
            foreach ($verific_email as $key => $login) {
                if (decrypt($login->password) == $request['password']) {
                    
                    session()->put('id', $login->id);
                    session()->put('name', $login->name);
                    session()->put('email', $login->email);
                    session()->put('usuario', $login->usuario);
                    session()->put('tipo', "login");

                    return redirect()->route('index');
                }else{
                    return redirect()->route('index.login')->with('invalido', 'Senha incorreta!');
                }
            }
        } else{
            return redirect()->route('index.login')->with('invalido', 'Usuário inexistente!');
        }
    }

    // VIEW DO REGISTER
    public function register()
    {
        return view('login.register');
    }

    // FUNÇÃO QUE REALIZA O CADASTRO
    public function register_save(request $request)
    {
        $db = New clientes();

        $verific_email = DB::table('clientes')->where('email', $request['email'])->count() == 1;

        if($verific_email == "true") {
            return redirect()->route('index.register')->with('invalido', 'E-Mail já existente!');
        } else{

            $db->name = $request->input('name');
            $db->email = $request->input('email');
            $db->telefone = $request->input('telefone');
            $db->cpf = $request->input('cpf');
            $db->usuario = $request->input('usuario');
            $db->password = encrypt($request->input('password'));
            $db->save();

            return redirect()->route('index.register')->with('mensagem', 'Cadastrado com sucesso!');
        }
    }

    public function editarAvatar(Request $request, $id)
    {
       $db = clientes::find($id);
       
        return view('clientes.editarAvatar',[
            'id' => $id,
            'avatar' => $db['avatar'],
            'ext_img' => $db['ext'],
            'name_img' => $db['name_img'],
        ]); 
    }

    public function avatar(Request $request, $id)
    {
        $db = clientes::find($id);

        $file = $request->file('avatar');

        if(isset($file)){

            $name_img = $file->getClientOriginalName();

            $ext_img = pathinfo($name_img, PATHINFO_EXTENSION);

            $upload = base64_encode(file_get_contents($request->file('avatar')));

            $db['avatar'] = $upload;
        };

        if(isset($name_img)){
            $db['name_img'] = $name_img;
        }

        if(isset($ext_img)){
            $db['ext_img'] = $ext_img;
        }

         $db->save();
        return redirect()->route('page.clientes')->with('mensagem', 'Avatar atualizado com sucesso!');
    }
    public function logout(Request $request) {

        $request->session()->forget(['name', 'usuario', 'tipo', 'email', 'id']);
        
        return redirect()->route('index.login');
    }
}