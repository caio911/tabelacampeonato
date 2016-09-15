	<div class="container" id="fase1">
		<div class="row">
			<div class="col-md-12">
				<div class="alert alert-info text-center" role="alert">
					<nav>
					  <ul class="pager">
					    <li class="next"><a href="/eliminatoria/oitavasdefinal"> Oitavas <span aria-hidden="true">&rarr;</span></a></li>
					  </ul>
					  <h2>Primeira fase <small>32 Times</small></h2>
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
									if(count($view_times) == 16){
										$atualizar_pontos = '';
										$numero = 1;
										$invert_b = '';
										$invert_a = '';
										

											foreach ($view_times as $key => $value) {

												$id_jogo_view = str_replace('_',' ',$value['id_jogo']);

												if($view_logado == true){
													$atualizar_pontos = '<button type="button" class="btn btn-default atualizar_pontos_bt" data-bt="'.$value['id_jogo'].'">Atualizar pontos</button>';
												}else{
													$atualizar_pontos = '';
												}

												if($value['ponto_b'] < $value['ponto_a']){
													$invert_b = 'invert_b';
													$invert_a = '';
												}else{
													$invert_a = 'invert_a';
													$invert_b = '';
												}

													echo '
															<div class="partidas">
																<li>
																	<form class="atualizar_pontos" method="post" id="'.$value['id_jogo'].'">

																		<div class="row">
																			<div class="col-md-6 col-xs-6 text-center '.$invert_a.'">
																				<p>'.$value['time_a'].'</p>
																				<img class="img-responsive" data-toggle="tooltip" alt="'.$value['nome_cartola_a'].'" title="'.$value['nome_cartola_a'].'" src="'.$_urlSite.'views/files/images/'.$value['id_emblema_a'].'.svg" data-placement="top">
																				
																					<input type="hidden" name="field_time_id_a" value="'.$value['id_time_a'].'">
																					<input type="text" name="field_ponto_a" class="field_ponto" id="field_ponto" value="'.$value['ponto_a'].'" maxlength="6" disabled>

																			</div>
																			<div class="col-md-6 col-xs-6 text-center '.$invert_b.'">
																				<p>'.$value['time_b'].'</p>
																				<img class="img-responsive" alt="'.$value['nome_cartola_b'].'" title="'.$value['nome_cartola_b'].'" src="'.$_urlSite.'views/files/images/'.$value['id_emblema_b'].'.svg" data-toggle="tooltip" data-placement="top">
																				
																					<input type="hidden" name="field_time_id_b" value="'.$value['id_time_b'].'">
																					<input type="text" name="field_ponto_b" class="field_ponto" id="field_ponto" value="'.$value['ponto_b'].'" maxlength="6" disabled>

																			</div>
																		</div>
																		<div class="row"><div class="col-md-12  text-center upper">'.$id_jogo_view.'</div></div>
																		<div class="row">
																				<div class="col-md-12 text-center">
																					<input type="hidden" name="field_fase" value="fase1">
																					<input type="hidden" name="field_jogo" value="'.$value['id_jogo'].'">
																					'.$atualizar_pontos.'
																				</div>
																			</div>
																			<div class="alert alert-success" role="alert" id="resposta_mensagem" style="display:none;"></div>
																	</form>
																</li>
															</div>
															
													';

												$numero++;
											}
										}else{
											echo '<div class="alert alert-danger text-center" role="alert">É PRECISO SORTEAR OS TIMES</div>';
										}
								
									?>

						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>


