<div class="container-fluid box box-1">


	<div class="container">


					<div class="row">

						<div class="col-md-5">
						<?php 
							if($view_cadastro){  
								echo '<div class="alert alert-info text-left" role="alert">É PRECISO CADASTRAR OS TIME PARA COMEÇAR O CAMPEONATO!</div>'; 
							}else{ 
								echo '<div class="alert alert-info text-left" role="alert">Cadastro</div>';
							}
						?>
							
						</div>

					</div>


					<div class="row">
						<div class="col-md-3">
							<form action="" method="post" id="form-cadastrar">

								  <div class="form-group">
								    <input type="text" class="form-control" id="field_time" name="field_time" placeholder="Nome do Time">
								  </div>
								
								  <button type="button" class="btn btn-default cadastrar">Cadastrar</button>

								  <div class="alert alert-success" role="alert" id="resposta_mensagem"></div>

								  <div class="alert alert-success" role="alert" id="resposta_mensagem" style="display:none;"></div>

							</form>
						</div>
					</div>
					
					<br>

					<div class="row">
					<?php if(isset($view_dados)){ ?>
						<div class="col-md-3">
							<div class="times_cadastrados" id="times_cadastrados">
									<div class="panel panel-primary">
										<div class="panel-heading">
												<h3 class="panel-title">Cartoleiros</h3> 
										</div> 
											<ul class="list-group text-upper"> 
												<?php

													$times_sorteio = array();

														foreach ($view_dados as $key => $value) {
															echo '
																<li class="list-group-item">
																	<p> Nome: '.$value['nome_cartola'].'</p>
																	<p> Time: '.$value['nome'].'</p>
																		<form action="" method="post" id="form-excluir-usuario-'.$value['id'].'">
																			<span class="glyphicon glyphicon-remove pointer" aria-hidden="true" data-bt="form-excluir-usuario-'.$value['id'].'"></span>
																			<input type="hidden" class="form-control" id="field_excluir"  name="field_excluir" value="'.$value['id'].'" placeholder="Excluir">
																		</form>
																</li>
															';

															array_push($times_sorteio,$dados = array($value['nome_cartola'],$value['id']));
														}

												?>
											</ul>
									</div>
							</div>
						</div>
						<div class="col-md-2">
							<div class="panel panel-danger">
								<div class="panel-heading">
									<h3 class="panel-title">Numero de Cartoleiros</h3> 
								</div> 
								<div class="panel-body"> 
									<div class="numero_de_times" id="numero_de_times">
										<p><?php echo $view_numero_times; ?></p>
									</div>
								</div> 
							</div>
						</div>
					<?php }else { ?>

						<div class="col-md-5">
						<div class="alert alert-danger" role="alert"> Nenhum time cadastrado </div>
						</div>

					<?php } ?>
					</div>







	</div>

</div>







