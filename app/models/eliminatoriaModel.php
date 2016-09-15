<?php
		
	Class EliminatoriaModel extends Model{

		public $_tabela = 'usuario';

		public function pegarId($id_user){

			$dados = $this->db->prepare("SELECT id FROM usuarios WHERE time_id = '{$id_user}' LIMIT 1");

			$dados->execute();
			if($dados->rowCount() > 0){
				return $dados->fetchAll(PDO::FETCH_ASSOC);
			}else{
				return false;
			}
		}

		public function inserirdados($dados){
			$this->insert($dados);
		}

		public function timesFase1($tabela = ''){
			$dados_tabelas = $this->db->query("SELECT 
												id_jogo, 
												id_time_a, 
												ponto_a, 
												id_time_b, 
												ponto_b,
												(SELECT nome FROM usuarios WHERE id = F.id_time_a) as time_a, 
												(SELECT nome_cartola FROM usuarios WHERE id = F.id_time_a) as nome_cartola_a,
												(SELECT slug FROM usuarios WHERE id = F.id_time_a) as id_emblema_a,
												(SELECT nome FROM usuarios WHERE id = F.id_time_b) as time_b, 
												(SELECT nome_cartola FROM usuarios WHERE id = F.id_time_b) as nome_cartola_b,
												(SELECT slug FROM usuarios WHERE id = F.id_time_b) as id_emblema_b
												FROM `{$tabela}` AS F order by id ASC");

			if($dados_tabelas->rowCount() > 0){
				return $dados_tabelas->fetchAll(PDO::FETCH_ASSOC);
			}else{
				return false;
			}
		}

		public function times($tabela = ''){
			$dados_tabelas = $this->db->query("SELECT 
												id_jogo, 
												jogo_a,
												id_time_a, 
												ponto_a, 
												jogo_b,
												id_time_b, 
												ponto_b,
												(SELECT nome FROM usuarios WHERE id = F.id_time_a) as time_a, 
												(SELECT nome_cartola FROM usuarios WHERE id = F.id_time_a) as nome_cartola_a,
												(SELECT slug FROM usuarios WHERE id = F.id_time_a) as id_emblema_a,
												(SELECT nome FROM usuarios WHERE id = F.id_time_b) as time_b, 
												(SELECT nome_cartola FROM usuarios WHERE id = F.id_time_b) as nome_cartola_b,
												(SELECT slug FROM usuarios WHERE id = F.id_time_b) as id_emblema_b
												FROM `{$tabela}` AS F order by id ASC");

			if($dados_tabelas->rowCount() > 0){
				return $dados_tabelas->fetchAll(PDO::FETCH_ASSOC);
			}else{
				return false;
			}
		}

		public function timesOld($tabela = ''){

			$dados_tabelas = $this->db->query("SELECT * FROM $tabela order by id ASC");

			if($dados_tabelas->rowCount() > 0){
				return $dados_tabelas->fetchAll(PDO::FETCH_ASSOC);
			}else{
				return false;
			}

		}

		public function AtualizarPontos(array $dados, $id_jogo, $tabela){
			$dados_tabelas = $this->update($dados, 'id_jogo="'.$id_jogo.'"', $tabela);
		}

		public function segundafase(array $dados, $jogo, $id_jogo, $tabela_post2){
			$dados_tabelas = $this->update($dados, $jogo.'="'.$id_jogo.'"', $tabela_post2);
		}

		public function terceirafase(array $dados, $id_jogo, $tabela_post3){
			$dados_tabelas = $this->update($dados, 'id_jogo="'.$id_jogo.'"', $tabela_post3);
		}

		public function quartafase(array $dados, $id_jogo, $tabela_post3){
			$dados_tabelas = $this->update($dados, 'id_jogo="'.$id_jogo.'"', $tabela_post3);
		}

		public function quintafase(array $dados, $id_jogo, $tabela_post3){
			$dados_tabelas = $this->update($dados, 'id_jogo="'.$id_jogo.'"', $tabela_post3);
		}

		public function campeao($tabela = ''){
			$dados_tabelas = $this->db->query("SELECT 
												id_time_a, 
												ponto_a, 
												id_time_b, 
												ponto_b,
												(SELECT nome FROM usuarios WHERE id = F.id_time_a) as time_a, 
												(SELECT nome_cartola FROM usuarios WHERE id = F.id_time_a) as nome_cartola_a,
												(SELECT slug FROM usuarios WHERE id = F.id_time_a) as id_emblema_a,
												(SELECT nome FROM usuarios WHERE id = F.id_time_b) as time_b, 
												(SELECT nome_cartola FROM usuarios WHERE id = F.id_time_b) as nome_cartola_b,
												(SELECT slug FROM usuarios WHERE id = F.id_time_b) as id_emblema_b
												FROM `{$tabela}` AS F order by id ASC");

			if($dados_tabelas->rowCount() > 0){
				return $dados_tabelas->fetchAll(PDO::FETCH_ASSOC);
			}else{
				return false;
			}
		}
	}
	
 ?>
