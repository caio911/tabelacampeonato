<div class="container">
	<div class="row">
		<nav class="navbar navbar-inverse">
	      <div class="container-fluid">
	        <!-- Brand and toggle get grouped for better mobile display -->
	        <div class="navbar-header">
	          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-9" aria-expanded="false">
	            <span class="sr-only">Toggle navigation</span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	          </button>
	          <a class="navbar-brand" href="http://localhost/my_files/api/">Se Aposenta</a>
	        </div>

	        <!-- Collect the nav links, forms, and other content for toggling -->
	        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-9">
	          <ul class="nav navbar-nav">
	            <li class="dropdown">
                	<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Mata Mata <span class="caret"></span></a>
	                <ul class="dropdown-menu">
	                  <li><a href="http://localhost/my_files/api//eliminatoria/primeirafase">Primeira Fase</a></li>
	                  <li><a href="http://localhost/my_files/api//eliminatoria/oitavasdefinal">Oitavas de Final</a></li>
	                  <li><a href="http://localhost/my_files/api//eliminatoria/quartasdefinal">Quartas de Final</a></li>
	                  <li><a href="http://localhost/my_files/api/eliminatoria/semifinal">Semi Finais</a></li>
	                  <li><a href="http://localhost/my_files/api/eliminatoria/finais">Final</a></li>
	                </ul>
	              </li>
	              <li><a href="http://localhost/my_files/api/campeoao">Campeão</a></li>
	            <li><a href="http://seaposenta.esy.es/tabelabrasileirao">Tabela Brasileirao</a></li>
	            <li><a href="http://seaposenta.esy.es/campeao">Campeões</a></li>
	            
	            <?php if($view_logado == true){ ?>
	            <li class="dropdown">
                	<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Admin do Campeonato <span class="caret"></span></a>
	                <ul class="dropdown-menu">
	                  <li><a href="http://localhost/my_files/api/cadastro">Cadastrar</a></li>
	                  <li><a href="http://localhost/my_files/api/sortear">Sortear</a></li>
	                  <li><a href="http://localhost/my_files/api/novocampeonato">Novo Campeonato</a></li>
	                  <li><a href="http://localhost/my_files/api/logout">Sair</a></li>
	                </ul>
	              </li>
	            <?php } else if ($view_logado == false){ ?>
	            	<li><a href="http://localhost/my_files/api/login">Login</a></li>
	            <?php } ?>
	          </ul>
	        </div><!-- /.navbar-collapse -->
	      </div><!-- /.container-fluid -->
	    </nav>
	</div>
</div>