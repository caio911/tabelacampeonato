  <?php
	
	Class Eliminatoria extends Controller{

		/*
		**
		**VIEWS DAS RODADAS
		**
		*/

		public function index_action(){
			$model = new Model;
			if ( $model->verificaSessao()) {
				$data['logado'] = true;
				$dados_cad['logado'] = true;
			}

			$times = new eliminatoriaModel;
			$dados_cad['times'] = $times->timesFase1('fase1');

			$todos_usuario = new cadastroModel;
			$data['dados'] = $todos_usuario->Usuario();
			$data['numero_times'] = $todos_usuario->NumeroTime();
			$data['cadastro'] = false;

			// VERICA SE A SESSAO FOI INICIADA E ENTRA NA VIEW
			if ( $model->verificaSessao()) {
				// VERIFICA SE O NUMERO DE TIMES É MENOR QUE 32 E ABRE UMA VIEW
				// SE TIMES FOR IGUAL A 32 ABRE A VIEW ELIMINATORIA
				if($todos_usuario->NumeroTime() < 32){
					$data['cadastro'] = true;
					$this->view('cadastro', $data);
				}else if($todos_usuario->NumeroTime() == 32){
						$this->view('eliminatoria', $dados_cad);
				}
			}else{
				$this->view('eliminatoria', $dados_cad);
			}
		}

		public function primeirafase(){

			$model = new Model;
			if ( $model->verificaSessao()) {
				$dados_cad['logado'] = true;
			}

			$times = new eliminatoriaModel;
			$dados_cad['times'] = $times->timesFase1('fase1');

			$todos_usuario = new cadastroModel;
			$data['dados'] = $todos_usuario->Usuario();
			$data['numero_times'] = $todos_usuario->NumeroTime();
			$data['cadastro'] = false;

			if ( $model->verificaSessao()) {
				if($todos_usuario->NumeroTime() < 32){
					$data['cadastro'] = true;
					$this->view('cadastro', $data);
				}else if($todos_usuario->NumeroTime() == 32){
					$this->view('eliminatoria', $dados_cad);
				}else{
					$this->view('eliminatoria', $dados_cad);
				}
			}else{
					$this->view('eliminatoria', $dados_cad);
				}
		}

		public function oitavasdefinal(){

			$model = new Model;
			if ( $model->verificaSessao()) {
				$dados['logado'] = true;
			}
			
			$times = new eliminatoriaModel;
			$dados['times'] = $times->times('fase2');

			$this->view('oitavasdefinal', $dados);
			
		}

		public function quartasdefinal(){

			$model = new Model;
			if ( $model->verificaSessao()) {
				$dados['logado'] = true;
			}
			
			$times = new eliminatoriaModel;
			$dados['times'] = $times->times('fase3');

			$this->view('quartasdefinal', $dados);
			
		}

		public function semifinal(){
			
			$model = new Model;
			if ( $model->verificaSessao()) {
				$dados['logado'] = true;
			}

			$times = new eliminatoriaModel;
			$dados['times'] = $times->times('fase4');

			$this->view('semifinal', $dados);
			
		}

		public function finais(){
			$model = new Model;
			if ( $model->verificaSessao()) {
				$dados['logado'] = true;
			}
			
			$times = new eliminatoriaModel;
			$dados['times'] = $times->times('fase5');

			$this->view('final', $dados);
			
		}

		public function campeao(){
			$model = new Model;
			if ( $model->verificaSessao()) {
				$dados['logado'] = true;
			}
			
			$times = new eliminatoriaModel;
			$dados['times'] = $times->times('campeao');

			$this->view('campeao', $dados);
			
		}

		/*
		**
		**ATUALIZAR RODADAS
		**
		*/

		public function atualizarpontos(){

			$ponto_a = $_POST['field_ponto_a'];
			$ponto_b = $_POST['field_ponto_b'];

			$id_time_a = $_POST['field_time_id_a'];
			$id_time_b = $_POST['field_time_id_b'];
		   
		    $dados = array(
		    	"ponto_a" =>  $ponto_a,
		    	"ponto_b" =>  $ponto_b
		    );

		    $id_jogo = $_POST['field_jogo'];

			$tabela_post = 'fase1';

			$atualizarpontos = new eliminatoriaModel;
			$atualizar = $atualizarpontos->AtualizarPontos($dados, $id_jogo, $tabela_post);

			// Atualiza o vencedo do jogo para a segunda rodada
			
			$jogos_a = array('jogo_0','jogo_2','jogo_4','jogo_6','jogo_8','jogo_10','jogo_12','jogo_14');
			$jogos_b = array('jogo_1','jogo_3','jogo_5','jogo_7','jogo_9','jogo_11','jogo_13','jogo_15');

			if(in_array($id_jogo, $jogos_a)){

					if($ponto_a > $ponto_b){
						$id_time = $id_time_a;
						$ponto_time = 0;
					}else{
						$id_time = $id_time_b;
						$ponto_time = 0;
					}

					$dados = array(
						"id_time_a" =>  $id_time,
						"ponto_a" =>  $ponto_time
					);

					$tabela_post2 = 'fase2';
					$jogo = "jogo_a";
					$atualizar = $atualizarpontos->segundafase($dados, $jogo, $id_jogo, $tabela_post2);
			}
			if(in_array($id_jogo, $jogos_b)){

					if($ponto_a > $ponto_b){
						$id_time = $id_time_a;
						$ponto_time = 0;
					}else{
						$id_time = $id_time_b;
						$ponto_time = 0;
					}

					$dados = array(
						"id_time_b" =>  $id_time,
						"ponto_b" =>  $ponto_time
					);

					$tabela_post2 = 'fase2';
					$jogo = "jogo_b";
					$atualizar = $atualizarpontos->segundafase($dados, $jogo, $id_jogo, $tabela_post2);
			}

		}

		public function atualizarpontosoitavasdefinal(){

			$ponto_a = $_POST['field_ponto_a'];
			$ponto_b = $_POST['field_ponto_b'];

			$id_time_a = $_POST['field_time_id_a'];
			$id_time_b = $_POST['field_time_id_b'];
		   
		    $dados = array(
		    	"ponto_a" =>  $ponto_a,
		    	"ponto_b" =>  $ponto_b
		    );

		    $id_jogo = $_POST['field_jogo'];

			$tabela_post = 'fase2';

			$atualizarpontos = new eliminatoriaModel;
			$atualizar = $atualizarpontos->AtualizarPontos($dados, $id_jogo, $tabela_post);

			// Atualiza o vencedo do jogo para a segunda rodada
			
			$jogos_a = array('jogo_0','jogo_2','jogo_4','jogo_6','jogo_8','jogo_10','jogo_12','jogo_14');
			$jogos_b = array('jogo_1','jogo_3','jogo_5','jogo_7','jogo_9','jogo_11','jogo_13','jogo_15');

			if(in_array($id_jogo, $jogos_a)){

					if($ponto_a > $ponto_b){
						$id_time = $id_time_a;
						$ponto_time = 0;
					}else{
						$id_time = $id_time_b;
						$ponto_time = 0;
					}

					$dados = array(
						"id_time_a" =>  $id_time,
						"ponto_a" =>  $ponto_time
					);

					$tabela_post2 = 'fase3';
					$jogo = "jogo_a";
					$atualizar = $atualizarpontos->segundafase($dados, $jogo, $id_jogo, $tabela_post2);
			}
			if(in_array($id_jogo, $jogos_b)){

					if($ponto_a > $ponto_b){
						$id_time = $id_time_a;
						$ponto_time = 0;
					}else{
						$id_time = $id_time_b;
						$ponto_time = 0;
					}

					$dados = array(
						"id_time_b" =>  $id_time,
						"ponto_b" =>  $ponto_time
					);

					$tabela_post2 = 'fase3';
					$jogo = "jogo_b";
					$atualizar = $atualizarpontos->segundafase($dados, $jogo, $id_jogo, $tabela_post2);
			}

		}

		public function atualizarpontosquartasdefinal(){

			$ponto_a = $_POST['field_ponto_a'];
			$ponto_b = $_POST['field_ponto_b'];

			$id_time_a = $_POST['field_time_id_a'];
			$id_time_b = $_POST['field_time_id_b'];
		   
		    $dados = array(
		    	"ponto_a" =>  $ponto_a,
		    	"ponto_b" =>  $ponto_b
		    );

		    $id_jogo = $_POST['field_jogo'];

			$tabela_post = 'fase3';

			$atualizarpontos = new eliminatoriaModel;
			$atualizar = $atualizarpontos->AtualizarPontos($dados, $id_jogo, $tabela_post);

			// Atualiza o vencedo do jogo para a segunda rodada
			
			$jogos_a = array('jogo_0','jogo_2','jogo_4','jogo_6','jogo_8','jogo_10','jogo_12','jogo_14');
			$jogos_b = array('jogo_1','jogo_3','jogo_5','jogo_7','jogo_9','jogo_11','jogo_13','jogo_15');


			if(in_array($id_jogo, $jogos_a)){

					if($ponto_a > $ponto_b){
						$id_time = $id_time_a;
						$ponto_time = 0;
					}else{
						$id_time = $id_time_b;
						$ponto_time = 0;
					}

					$dados = array(
						"id_time_a" =>  $id_time,
						"ponto_a" =>  $ponto_time
					);

					$tabela_post2 = 'fase4';
					if($id_jogo == 'jogo_4'){
						$id_jogo = 'jogo_2';
					}
					$jogo = "jogo_a";
					$atualizar = $atualizarpontos->segundafase($dados, $jogo, $id_jogo, $tabela_post2);
			}
			if(in_array($id_jogo, $jogos_b)){

					if($ponto_a > $ponto_b){
						$id_time = $id_time_a;
						$ponto_time = 0;
					}else{
						$id_time = $id_time_b;
						$ponto_time = 0;
					}

					$dados = array(
						"id_time_b" =>  $id_time,
						"ponto_b" =>  $ponto_time
					);

					$tabela_post2 = 'fase4';
					$jogo = "jogo_b";
					$atualizar = $atualizarpontos->segundafase($dados, $jogo, $id_jogo, $tabela_post2);
			}

		}

		public function atualizarpontossemifinal(){

			$ponto_a = $_POST['field_ponto_a'];
			$ponto_b = $_POST['field_ponto_b'];

			$id_time_a = $_POST['field_time_id_a'];
			$id_time_b = $_POST['field_time_id_b'];
		   
		    $dados = array(
		    	"ponto_a" =>  $ponto_a,
		    	"ponto_b" =>  $ponto_b
		    );

		    $id_jogo = $_POST['field_jogo'];

			$tabela_post = 'fase4';

			$atualizarpontos = new eliminatoriaModel;
			$atualizar = $atualizarpontos->AtualizarPontos($dados, $id_jogo, $tabela_post);

			// Atualiza o vencedo do jogo para a segunda rodada
			
			$jogos_a = array('jogo_0','jogo_2','jogo_4','jogo_6','jogo_8','jogo_10','jogo_12','jogo_14');
			$jogos_b = array('jogo_1','jogo_3','jogo_5','jogo_7','jogo_9','jogo_11','jogo_13','jogo_15');


			if(in_array($id_jogo, $jogos_a)){

					if($ponto_a > $ponto_b){
						$id_time = $id_time_a;
						$ponto_time = 0;
					}else{
						$id_time = $id_time_b;
						$ponto_time = 0;
					}

					$dados = array(
						"id_time_a" =>  $id_time,
						"ponto_a" =>  $ponto_time
					);

					$tabela_post2 = 'fase5';
					$jogo = "jogo_a";
					$atualizar = $atualizarpontos->segundafase($dados, $jogo, $id_jogo, $tabela_post2);
			}
			if(in_array($id_jogo, $jogos_b)){

					if($ponto_a > $ponto_b){
						$id_time = $id_time_a;
						$ponto_time = 0;
					}else{
						$id_time = $id_time_b;
						$ponto_time = 0;
					}

					$dados = array(
						"id_time_b" =>  $id_time,
						"ponto_b" =>  $ponto_time
					);

					$tabela_post2 = 'fase5';
					$jogo = "jogo_b";
					$atualizar = $atualizarpontos->segundafase($dados, $jogo, $id_jogo, $tabela_post2);
			}

		}

		public function atualizarpontosfinais(){

			$ponto_a = $_POST['field_ponto_a'];
			$ponto_b = $_POST['field_ponto_b'];

			$id_time_a = $_POST['field_time_id_a'];
			$id_time_b = $_POST['field_time_id_b'];
		   
		    $dados = array(
		    	"ponto_a" =>  $ponto_a,
		    	"ponto_b" =>  $ponto_b
		    );

		    $id_jogo = $_POST['field_jogo'];

			$tabela_post = 'fase5';

			$atualizarpontos = new eliminatoriaModel;
			$atualizar = $atualizarpontos->AtualizarPontos($dados, $id_jogo, $tabela_post);
			
		}


	}

 ?>