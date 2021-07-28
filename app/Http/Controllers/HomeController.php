<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\clientes;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    // MIDDLEWARE QUE PROTEGE O LOGIN -----------------------

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // if (session()->get('tipo') == 'login') {
        //     $clientes = clientes::all();

        //     foreach ($clientes as $key => $cliente) {
        //         if ($cliente['id'] == session()->get('id')) {
        //             $id = $cliente['id'];
        //             $name = $cliente['name'];
        //             $email = $cliente['email'];
        //             $telefone = $cliente['telefone'];
        //             $cpf = $cliente['cpf'];
        //             $usuario = $cliente['usuario'];
        //             $senha = decrypt($cliente['password']);
        //             $avatar = $cliente['avatar'];
        //             $ext_img = $cliente['ext_img'];
        //             $name_img = $cliente['name_img'];
        //         }
        //     }

        //     $data = ['id'=>$id, 'name'=>$name, 'email'=>$email, 'telefone'=>$telefone, 'cpf'=>$cpf, 'usuario'=>$usuario, 'senha'=>$senha, 'name_img'=>$name_img, 'ext_img'=>$ext_img, 'avatar'=>$avatar];
        
        // } else{

        //     $data = ['id'=>session()->get('token'), 'name'=>session()->get('name'), 'email'=>session()->get('email'), 'avatar'=>session()->get('avatar')];

        // }

        return redirect()->route('admin');
    }
    public function teste()
    {
        return view('teste');
    }
}
