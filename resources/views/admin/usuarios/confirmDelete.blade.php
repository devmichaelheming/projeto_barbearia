<div class="confirm" style="width:100%;display:flex;justify-content:space-evenly;padding:0.5rem 0;">
    <button type="button" class="btn-remover close btn-success" data-id="{{ url('admin/usuarios/remover/'.$id) }}" style="font-size:1rem;color: white;font-weight: 500;padding:0 1rem;background-color:#0abb87;height: 2.5rem;opacity:1;border-radius:0.3rem;">
        <i class="fas fa-check" style="padding-right: 0.3rem;"></i>
        Sim
    </button>
    <button type="button" class="close btn-danger" data-dismiss="modal" aria-label="Close" style="font-size:1rem;color: white;font-weight: 500;padding:0 1.5rem;background-color:#fd397a;opacity:1;height: 2.5rem;border-radius:0.3rem;">
        <i class="fas fa-times" style="padding-right:0.3rem;"></i>
        Não
    </button>
</div>