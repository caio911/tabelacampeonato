	<div class="container" id="fase1">
		<div class="row">
			<div class="col-md-12">
			<div class="alert alert-info text-left" role="alert">Tabela de Campeões</div>
			</div>
		</div>
		<div class="wrap-fases">
			<div class="row">
				<div class="col-md-12">
					<div class="primeira_fase">
						<ul class="list-inline">
							

									<?php 

										foreach ($view_times as $key => $value) {

											if($value['ponto_b'] < $value['ponto_a']){
													$invert_b = 'invert_b';
													$invert_a = '';
													$img_a = '<img class="img-responsive img-campeao"  src="'.$_urlSite.'views/files/images/trofeu.png">';
													$img_b = '';
												}else{
													$invert_a = 'invert_a';
													$invert_b = '';
													$img_b = '<img class="img-responsive img-campeao"  src="'.$_urlSite.'views/files/images/trofeu.png">';
													$img_a = '';
												}
											?>

												
														<div class="partidas">
															<li>
																<form class="atualizar_pontos" method="post" id="<?php echo $value['id_jogo']; ?>">
																	<div class="row">

																	<?php 
																			echo'
																				<div class="col-md-6 col-xs-6 text-center '.$invert_a.'">
																					<p>'.$value['time_a'].'</p>
																					<img class="img-responsive" data-toggle="tooltip" alt="'.$value['nome_cartola_a'].'" title="'.$value['nome_cartola_a'].'" src="'.$_urlSite.'views/files/images/'.$value['id_emblema_a'].'.svg" data-placement="top">
																					
																						<input type="hidden" name="field_time_id_a" value="'.$value['id_time_a'].'">
																						<input type="text" name="field_ponto_a" class="field_ponto" id="field_ponto" value="'.$value['ponto_a'].'" maxlength="6">

																						'.$img_a.'

																				</div>
																			';
																			echo '
																				<div class="col-md-6 col-xs-6 text-center '.$invert_b.'">

																					<p>'.$value['time_b'].'</p>
																					<img class="img-responsive" alt="'.$value['nome_cartola_b'].'" title="'.$value['nome_cartola_b'].'" src="'.$_urlSite.'views/files/images/'.$value['id_emblema_b'].'.svg" data-toggle="tooltip" data-placement="top">
																					
																						<input type="hidden" name="field_time_id_b" value="'.$value['id_time_b'].'">
																						<input type="text" name="field_ponto_b" class="field_ponto" id="field_ponto" value="'.$value['ponto_b'].'" maxlength="6">

																						'.$img_b.'

																				</div>
																			';
																	?>

																	</div>
																	
																</form>
															</li>
														</div>
														
												<?php
										}
								
									?> 

						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>


