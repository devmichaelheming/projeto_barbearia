<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\user;
use App\Models\agendamento;
use App\Models\clientes;
use DateTime;

class adminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $users = user::all();
        $agendamento = agendamento::all();
        $clientes = clientes::all();

        foreach ($clientes as $cliente) {
            foreach ($agendamento as $value) {
                if($value->id_cliente == $cliente->id){
                    $value->id_cliente = $cliente->nome;
                }
            }
        }

        foreach ($agendamento as $key => $value) {

            // $part1 = explode(' ', $value->data);

            $diasemana = array('Domingo', 'Segunda-Feira', 'Terça-Feira', 'Quarta-Feira', 'Quinta-Feira', 'Sexta-Feira', 'Sábado');
            
            $diasemana_numero = date('w', strtotime($value->data));

            $value->dia = $diasemana[$diasemana_numero];
            
        }

        $translate = array(
            0 => "Dom",
            1 => "Seg",
            2 => "Ter",
            3 => "Qua",
            4 => "Qui",
            5 => "Sex",
            6 => "Sab",
        );
        
        $data = new DateTime(date('Y-m-d'));     // Pega a data de hoje
        $diaN = date( "w", strtotime($data->format('Y-m-d'))); // Dia da semana, começa em 0 com domingo, 1 para segunda...
        
        $data->modify('-' . $diaN . ' day');

        $semanaAtual = [];
        
        for($i=0;$i<=6;$i++) {
            $semanaAtual[] = $data->format('d/m/Y');
            $data->modify('+1 day');
        }

        return view('admin.index', [
            'agendamento' => $agendamento,
            'semanaAtual' => $semanaAtual
        ]);
    }
}