<div class="container-fluid box box-1">


	<div class="container">


					<div class="row">

						<div class="col-md-5">

							<div class="alert alert-info text-left" role="alert">Novo Campeonato</div>

						</div>

					</div>


					<div class="row">
						<div class="col-md-3">

						<?php if($view_participantes > 0){ ?>
							<form action="" method="post" id="form-novocampeonato">

								  <div class="form-group">
								    <input type="password" class="form-control" id="field_senha" name="field_senha" placeholder="Senha">
								  </div>
								
								  <button type="button" class="btn btn-default novocampeonato">Iniciar</button>

								  <div class="alert alert-success" role="alert" id="resposta_mensagem"></div>

								  <div class="alert alert-success" role="alert" id="resposta_mensagem" style="display:none;"></div>

							</form>
						<?php }else{ ?> 

								<div class="alert alert-info text-center" role="alert">Não tem times cadastrado para iniciar um novo Campeonato!</div>

						<?php } ?>
						</div>
					</div>

  
	</div>

</div>







