	<div class="container" id="fase1">
		<div class="row">
			<div class="col-md-12">
				<div class="alert alert-info text-center" role="alert">
					<nav>
					  <ul class="pager">
					    <li class="previous"><a href="semifinal"><span aria-hidden="true">&larr;</span> Semi Final </a></li>
					  </ul>
					  <h2>Final</h2>
					</nav>
				</div>
			</div>
		</div>
		<div class="wrap-fases">
			<div class="row">
				<div class="col-md-12">
					<div class="primeira_fase">
						<ul class="list-inline">
							

									<?php 
									
										$numero = 1;
										foreach ($view_times as $key => $value) {
											$emblema = 'default';
											$id_jogo_a_view = str_replace('_',' ',$value['jogo_a']);
											$id_jogo_b_view = str_replace('_',' ',$value['jogo_b']);

											?>

												
														<div class="partidas">
															<li>
																<form class="atualizar_pontos" method="post" id="<?php echo $value['id_jogo']; ?>">
																	<div class="row">

																		<?php if($value['id_time_a'] == NULL){ 
																			echo '
																				<div class="col-md-6 col-xs-6 text-center">
																					<p class="text-center upper">Vencedor '.$id_jogo_a_view.'</p>
																					<img class="img-responsive" data-toggle="tooltip" alt="'.$emblema.'" title="'.$emblema.'" src="'.$_urlSite.'views/files/images/'.$emblema.'.png" data-placement="top">
																					
																						<input type="text" name="field_ponto_a" class="field_ponto" id="field_ponto" value="0" maxlength="6">

																				</div>
																			';
																		}else{
																			echo'
																				<div class="col-md-6 col-xs-6 text-center">
																					<p>'.$value['time_a'].'</p>
																					<img class="img-responsive" data-toggle="tooltip" alt="'.$value['nome_cartola_a'].'" title="'.$value['nome_cartola_a'].'" src="'.$_urlSite.'views/files/images/'.$value['id_emblema_a'].'.svg" data-placement="top">
																					
																						<input type="hidden" name="field_time_id_a" value="'.$value['id_time_a'].'">
																						<input type="text" name="field_ponto_a" class="field_ponto" id="field_ponto" value="'.$value['ponto_a'].'" maxlength="6">

																				</div>
																			';
																		}

																		if($value['id_time_b'] == NULL){ 
																			echo'
																				<div class="col-md-6 col-xs-6 text-center">
																					<p class="text-center upper">Vencedor '.$id_jogo_b_view.'</p>
																					<img class="img-responsive" alt="'.$emblema.'" title="'.$emblema.'" src="'.$_urlSite.'views/files/images/'.$emblema.'.png" data-toggle="tooltip" data-placement="top">
																						<input type="text" name="field_ponto_b" class="field_ponto" id="field_ponto" value="0" maxlength="6">
																				</div>
																			';
																		}else{
																			echo '
																				<div class="col-md-6 col-xs-6 text-center">
																					<p>'.$value['time_b'].'</p>
																					<img class="img-responsive" alt="'.$value['nome_cartola_b'].'" title="'.$value['nome_cartola_b'].'" src="'.$_urlSite.'views/files/images/'.$value['id_emblema_b'].'.svg" data-toggle="tooltip" data-placement="top">
																					
																						<input type="hidden" name="field_time_id_b" value="'.$value['id_time_b'].'">
																						<input type="text" name="field_ponto_b" class="field_ponto" id="field_ponto" value="'.$value['ponto_b'].'" maxlength="6">

																				</div>
																			';
																		} ?>


																	</div>
																	<?php if($value['id_time_a'] == NULL || $value['id_time_b'] == NULL){ 
																		echo ' <center><span class="label label-danger text-center">Aguardando</span></center> ';
																	}else if($view_logado == true){
																		echo '
																			<div class="row">
																				<div class="col-md-12 text-center">
																					<input type="hidden" name="field_fase" value="fase2">
																					<input type="hidden" name="field_jogo" value="'.$value['id_jogo'].'">
																					<button type="button" class="btn btn-default atualizarpontosfinais" data-bt="'.$value['id_jogo'].'">Atualizar pontos</button>
																				</div>
																			</div>
																			<div class="alert alert-success" role="alert" id="resposta_mensagem" style="display:none;"></div>
																		';
																	} ?>

																</form>
															</li>
														</div>
														
												<?php

											$numero++;
										}
								
									?> 

						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>


