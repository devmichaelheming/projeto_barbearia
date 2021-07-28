<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\agendamento;
use App\Models\clientes;
use App\Models\servicos;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;

class agendamentoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $clientes = clientes::orderBy('created_at', 'desc')->get();
        $agendamentos = agendamento::orderBy('created_at', 'asc')->get();

        foreach ($clientes as $key => $cliente) {
            foreach ($agendamentos as $key => $agendamento) {
                if ($agendamento['id_cliente'] == $cliente['id']) {
                    $agendamento['id_cliente'] = $cliente['nome'];
                }
            }
        }
                
        return view('admin.agendamento.index')->with('agendamentos_array', $agendamentos);
    }

    public function viewCadastrar()
    {
        date_default_timezone_set('America/Manaus');
        $clientes = clientes::orderBy('created_at', 'desc')->get();
        $servicos = servicos::orderBy('created_at', 'desc')->get();

        return view('admin.agendamento.cadastrarAgendamento', [
            'servicos' => $servicos,
            'clientes' => $clientes
        ]);
    }

    public function cadastrar(Request $request)
    {
        // dd($request->all());

        $db = New agendamento();
        date_default_timezone_set('America/Manaus');

        $agendamentos = agendamento::all();

        $data_hoje = date('Y/m/d H:i');

        if ($request['horarios'] == null) {
            $data_value = str_replace('/', '-', $data_hoje);
        }else{
            $data_convert = $request['horarios'];
            $data_value = str_replace('T', ' ', $data_convert);
        }

        $convert_horario = explode(' ', $data_value);

        $total = [];

        $servicos = $request['servico'];

        foreach ($servicos as $key => $value) {
            $total[] = DB::table('servicos')->where('id', '=', $value)->get();
        }

        $soma = 0;

        foreach ($total as $key => $item) {
            foreach ($item as $key => $item_servico) {
                $soma = $soma + floatval($item_servico->valor_servico);
            }
        }

        if (isset($agendamentos[0])) {
            foreach ($agendamentos as $key => $value_agendamentos) {
                if ($value_agendamentos['data'] == $convert_horario[0] && $value_agendamentos['hora'] == $convert_horario[1]) {
                    return redirect()->route('admin.agendamentos')->with('invalido', 'Horário selecionado esta indisponível');
                } else {
                    $db->data = $convert_horario[0];
                    $db->hora = $convert_horario[1];
                    $db->id_servico = json_encode($request['servico']);
                    $db->id_cliente = $request->input('cliente');
                    $db->valor_total = $soma;
                    $db->save();
    
                    return redirect()->route('admin.agendamentos')->with('mensagem', 'O Cliente foi agendado com sucesso!');
                }
            }
        } else {
            $db->data = $convert_horario[0];
            $db->hora = $convert_horario[1];
            $db->id_servico = json_encode($request['servico']);
            $db->id_cliente = $request->input('cliente');
            $db->valor_total = $soma;
            $db->save();

            return redirect()->route('admin.agendamentos')->with('mensagem', 'O Cliente foi agendado com sucesso!');
        }
    }

    public function editar(Request $request, $id)
    {
        // $user = users::all();
        // foreach ($user as $users) {
        //     if(Auth::user()->peditar_usuario == 0){
        //         return redirect()->route('admin')->with('mensagem', 'Você não tem permissão para acessar esta página!');
        //     }else{
                $db = agendamento::find($id);
                $clientes = clientes::all();
                $servicos = servicos::all();

                foreach ($clientes as $key => $cliente) {
                    if ($db['id_cliente'] == $cliente['id']) {
                        $db['id_cliente'] = $cliente['nome'];
                    }
                }
                
                $servico_array = [];
                
                foreach (json_decode($db['id_servico']) as $key => $item) {
                    
                    $servico_array[] = DB::table('servicos')->where('id', '=', $item)->get()[0];
                }

                $db['servicos'] = $servico_array;

                $date = $db['data'].'T'.$db['hora'];

                foreach ($servicos as $key => $value) {
                    foreach ($db['servicos'] as $key => $item_service) {
                        if ($item_service->id == $value['id']) {
                            $value->ativo = true;
                        }
                    }
                }

                return view('admin.agendamento.editarAgendamento',[
                    'id' => $id,
                    'id_cliente' => $db['id_cliente'],
                    'id_servico' => json_decode($db['id_servico']),
                    'date' =>  $date,
                    'valor_total' => $db['valor_total'],
                    'clientes' => $clientes,
                    'servicos' => $servicos,    
                ]); 
        //     }
        // }
    }

    public function vermais(Request $request, $id)
    {
        $agendamento = agendamento::find($id);
        $servicos = servicos::all();
        $clientes = clientes::all();

        // $query = DB::table('agendamento')->where('id_cliente', '=', $agendamento['id_cliente'])->get();

        foreach ($clientes as $key => $cliente) {
            if ($agendamento['id_cliente'] == $cliente['id']) {
                $agendamento['id_cliente'] = $cliente['nome'];
            }
        }
        
        $servico_array = [];
        
        foreach (json_decode($agendamento['id_servico']) as $key => $item) {
            
            $servico_array[] = DB::table('servicos')->where('id', '=', $item)->get();
        }

        $servicos_item = [];

        foreach ($servico_array as $key => $items_servicos) {
            $items_servicos = json_decode($items_servicos);
            $servicos_item[] = $items_servicos[0];
        }

        $valor_total = $agendamento['valor_total'];

        return view('admin.agendamento.vermais',[
            'agendamento' => $agendamento,
            'servicos' => $servicos_item,
            'valor_total' => $valor_total,
        ]); 
    
    }

    public function editarSalvar(Request $request, $id)
    {
        $db = agendamento::find($id);

        $convert_horario = explode('T', $request['horarios']);

        $total = [];

        $servicos = $request['servico'];

        foreach ($request['servico'] as $key => $value) {
            $total[] = DB::table('servicos')->where('id', '=', $value)->get();
        }

        $soma = 0;

        foreach ($total as $key => $item) {
            foreach ($item as $key => $item_servico) {
                $soma = $soma + floatval($item_servico->valor_servico);
            }
        }
        
        $db['id_cliente'] = $request['cliente'];
        $db['id_servico'] = json_encode($request['servico']);
        $db['valor_total'] = $soma;
        $db['data'] = $convert_horario[0];
        $db['hora'] = $convert_horario[1];
        // $db['descricao'] = $dados['descricao'];

        $db->save();

        return redirect()->route('admin.agendamentos')->with('mensagem', 'O Agendamento foi atualizado com sucesso!');
    }
    public function confirm(Request $request, $id)
    {
        $db = agendamento::find($id);
        return view('admin.agendamento.confirmDelete', [
            'id' => $id,
        ]);
    }

    public function remover(request $request)
    {
        $user = agendamento::find($request->id);
        $user->delete();

        return redirect()->route('admin.agendamentos')->with('invalido', 'O Agendamento foi deletado com sucesso!');
    }
}