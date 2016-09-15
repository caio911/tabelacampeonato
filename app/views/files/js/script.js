$(document).ready(function(){

	$('#resposta_mensagem').hide();

	$(".cadastrar").click(function(){

		
	    $.post('cadastro/cadastrar', $("#form-cadastrar").serialize() , function(data , success){

			if(data.result == 'success'){

				$('#form-cadastrar').each(function(){
				  this.reset();
				});

				$('#resposta_mensagem').show();
	    		$('#resposta_mensagem').html(data.msg);
	    		
	    		if(data.numero_participantes == 32){
	    			$('#form-cadastrar').hide();
	    		}

	    		$("#times_cadastrados .list-group").after('<li class="list-group-item text-upper"><p> Nome: '+data.nome_cartola+'</p><p> Time: '+data.nome+'</p></li>');	    		
	    		$('#numero_de_times p').text(data.numero_participantes);
	    	

	    	}else if(data.result == 'error'){

	    		$('#resposta_mensagem').show();
	    		$('#resposta_mensagem').html(data.msg);
	    	}
	    	
	    }, "json");

	});

	$(".sortear").click(function(){

		
	    $.post('http://localhost/my_files/api/sortear/sorteio', $("#form-sorteio").serialize() , function(data , success){

			if(data.result == 'success'){

				$('#cadastrar_pontos').each(function(){
				  this.reset();
				});

				$('#resposta_mensagem').show();
	    		$('#resposta_mensagem').html(data.msg);
	    			    	
	    	}else if(data.result == 'error'){

	    		$('#resposta_mensagem').show();
	    		$('#resposta_mensagem').html(data.msg);
	    	}
	    	
	    }, "json");

	});


	$(".atualizar_pontos_bt").click(function(){

		$form = $(this).attr('data-bt');

	    $.post('http://localhost/my_files/api/eliminatoria/atualizarpontos', $("#"+$form).serialize() , function(data , success){

			if(data.result == 'success'){

				$("#"+$form+' #resposta_mensagem').show();
	    		$("#"+$form+' #resposta_mensagem').html(data.msg);
	    		$("#"+$form+'  .btn-default').css('border','1px solid green');
	    			    	
	    	}else if(data.result == 'error'){

	    		$('#'+$form+' #resposta_mensagem').show();
	    		$('#'+$form+' #resposta_mensagem').html(data.msg);
	    	}
	    	
	    }, "json");

	});

	$(".atualizarpontosoitavasdefinal").click(function(){

		$form = $(this).attr('data-bt');

	    $.post('http://localhost/my_files/api/eliminatoria/atualizarpontosoitavasdefinal', $("#"+$form).serialize() , function(data , success){

			if(data.result == 'success'){

				$("#"+$form+' #resposta_mensagem').show();
	    		$("#"+$form+' #resposta_mensagem').html(data.msg);
	    			    	
	    	}else if(data.result == 'error'){

	    		$('#'+$form+' #resposta_mensagem').show();
	    		$('#'+$form+' #resposta_mensagem').html(data.msg);
	    	}
	    	
	    }, "json");

	});


	$(".atualizarpontosquartasdefinal").click(function(){

		$form = $(this).attr('data-bt');

	    $.post('http://localhost/my_files/api/eliminatoria/atualizarpontosquartasdefinal', $("#"+$form).serialize() , function(data , success){

			if(data.result == 'success'){

				$("#"+$form+' #resposta_mensagem').show();
	    		$("#"+$form+' #resposta_mensagem').html(data.msg);
	    			    	
	    	}else if(data.result == 'error'){

	    		$('#'+$form+' #resposta_mensagem').show();
	    		$('#'+$form+' #resposta_mensagem').html(data.msg);
	    	}
	    	
	    }, "json");

	});


	$(".atualizarpontossemifinal").click(function(){

		$form = $(this).attr('data-bt');

	    $.post('http://localhost/my_files/api/eliminatoria/atualizarpontossemifinal', $("#"+$form).serialize() , function(data , success){

			if(data.result == 'success'){

				$("#"+$form+' #resposta_mensagem').show();
	    		$("#"+$form+' #resposta_mensagem').html(data.msg);
	    			    	
	    	}else if(data.result == 'error'){

	    		$('#'+$form+' #resposta_mensagem').show();
	    		$('#'+$form+' #resposta_mensagem').html(data.msg);
	    	}
	    	
	    }, "json");

	});

	$(".atualizarpontosfinais").click(function(){

		$form = $(this).attr('data-bt');

	    $.post('http://localhost/my_files/api/eliminatoria/atualizarpontosfinais', $("#"+$form).serialize() , function(data , success){

			if(data.result == 'success'){

				$("#"+$form+' #resposta_mensagem').show();
	    		$("#"+$form+' #resposta_mensagem').html(data.msg);
	    			    	
	    	}else if(data.result == 'error'){

	    		$('#'+$form+' #resposta_mensagem').show();
	    		$('#'+$form+' #resposta_mensagem').html(data.msg);
	    	}
	    	
	    }, "json");

	});

	$(".novocampeonato").click(function(){

		$form = $(this).attr('data-bt');

	    $.post('http://localhost/my_files/api/novocampeonato/iniciar', $("#form-novocampeonato").serialize() , function(data , success){

			if(data.result == 'success'){

				$("#resposta_mensagem").show();
	    		$("#resposta_mensagem").html(data.msg);
	    			    	
	    	}else if(data.result == 'error'){

	    		$("#resposta_mensagem").show();
	    		$("#resposta_mensagem").html(data.msg);
	    	}
	    	
	    }, "json");

	});

	$(".logar").click(function(){

		
	    $.post('http://localhost/my_files/api/login/logar', $("#form-login").serialize() , function(data , success){

	    	if(data.result == 'success'){

	    		window.location='http://localhost/my_files/api/eliminatoria/primeirafase';

	    	}else if(data.result == 'error'){

	    		$('#resposta_mensagem').show();
	    		$('#resposta_mensagem').html(data.msg);

	    	}

	    }, "json");

	});

	$(".glyphicon-remove").click(function(){

		$form = $(this).attr('data-bt');
		
	    $.post('http://localhost/my_files/api/cadastro/excluir', $("#"+$form).serialize() , function(data , success){

	    	if(data.result == 'success'){

	    		$('#resposta_mensagem').show();
	    		$('#resposta_mensagem').text(data.msg);
	    		$("#"+form).parents("li").remove();

	    	}else if(data.result == 'error'){

	    		$('#resposta_mensagem').show();
	    		$('#resposta_mensagem').text(data.msg);

	    	}

	    }, "json");

	});




});

$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})