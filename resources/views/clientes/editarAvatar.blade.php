<form class="form-horizontal" id="form" role="form" action="{{ url('/avatar/editar') }}/{{ $id }}" method="POST" enctype="multipart/form-data" >
	@csrf
	<div class="group-avatar">
        <label for="avatar">Avatar:</label>
        <span class="obs">Obs: Tamanho recomendado: largura: 64px, Altura: 64px.</span>                          
        <div class="input-group">
            <input type="file" accept="image/*" name="avatar" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" onchange="preview()">
			<label class="preview" for="inputGroupFile04" value="{{$avatar}}">
				@if ($name_img)
					{{$name_img}}
				@else
					Escolha uma imagem <i class="fas fa-upload"></i>
				@endif
			</label>
		</div>
		@if ($avatar)
			<img style="width:64px;height:64px;border-radius:100%;" name="avatar" src="data:image/{{$ext_img}};base64,{{$avatar}}">
		@else
			<img style="width:64px;height:64px;border-radius:100%;" name="avatar" src="{{ asset('img/user2.png') }}">
		@endif
    </div>

	<button type="submit" class="button-cadastrar"><i class="icon ion-checkmark-circled"></i>Atualizar</button>
</form>
<script>

	$('form#form').validate({
		rules: {
			name: {
				required: true
			},
			email: {
				required: true
			},
			password: {
				required: true
			},
			telefone: {
				required: true
			}
		}
	})

	var configuracoes = {}

	$("#avatar").base64({
		"onSuccess": function(inst, base64Str) {
			console.log(base64Str)
			configuracoes['base64'] = base64Str;
			console.log(configuracoes)
		}
	});

	function preview(){
		console.log(configuracoes);

		var imagem = document.querySelector('input[name=avatar]').files[0];
		var preview = document.querySelector('img[name=avatar]');

		var reader = new FileReader();

		reader.onloadend = function () {
			preview.src = reader.result;
		}

		if(imagem){
			reader.readAsDataURL(imagem);
		}else{
			preview.src = "";
		}
    }

</script>