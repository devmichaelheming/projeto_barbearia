<div class="vermais">
    <div class="title-cliente">
        <span><i class="fas fa-users" style="padding-right: 0.5rem;"></i>CLIENTE:</span>
        <span>{{ $agendamento['id_cliente'] }}</span>
    </div>
    <div class="lista-servicos">
        <div class="title-lista">
           <i class="fas fa-toolbox" style="padding-right: 0.5rem;"></i> SERVIÇOS: 
        </div>
        @foreach ($servicos as $servico)
            <div class="item-servico">
                <span>{{ $servico->nome_servico }}</span>
                {{-- <a href="{{ url('admin/agendamentos/servicos/deletar') }}/{{ $agendamento['id_servico'] }}">
                    <i class="far fa-trash-alt"></i>
                </a>  --}}
            </div>
        @endforeach
    </div>
    <div class="title-cliente">
        <span><i class="far fa-calendar-alt" style="padding-right: 0.5rem;"></i>DATA DO AGENDAMENTO:</span>
        <span>{{ date( 'd/m/Y' , strtotime($agendamento['data'])) }} - {{ $agendamento['hora'] }}</span>
    </div>
    <div class="title-cliente">
        <span><i class="fas fa-hand-holding-usd" style="padding-right: 0.5rem;"></i></i>VALOR TOTAL:</span>
        <span>R$ {{ $valor_total }},00</span>
    </div>
</div>