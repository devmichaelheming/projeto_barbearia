{{-- MODAL CADASTRAR --}}
<div class="modal-cadastrar fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    <span>
                        <i class="fas fa-user-plus" style="padding-right:0.5rem;"></i>
                        Cadastrar endereço
                    </span>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </h5>
            </div>
            <div class="modal-body-cadastrar"></div>
        </div>
    </div>
</div>

{{-- MODAL EDITAR --}}

<div class="modal fade" id="staticBackdrop" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    <span>
                        <i class="fas fa-user-plus" style="padding-right:0.5rem;"></i>
                        Editar endereço
                    </span>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </h5>
            </div>
            <div class="modal-body"></div>
        </div>
    </div>
</div>

{{-- MODAL CONFIRMAR --}}

<div class="modal-confirm fade" id="staticBackdrop" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header-confirm">
                <i class="fas fa-exclamation"></i>
                <h5 class="modal-title" id="staticBackdropLabel" style="display: flex;justify-content:center;">Você tem certeza?</h5>
                <span>essa ação não pode ser desfeita.</span>
            </div>
            <div class="modal-body-confirm">
            </div>
        </div>
    </div>
</div>

{{-- MODAL REMOVER --}}
<div class="modal-remover fade" id="staticBackdrop" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-body-remover">
            </div>
        </div>
    </div>
</div>