<?php include('./adm2/conecta.php')


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script src="js/jquery-1.7.2.min.js"></script>
<script src="js/swfobject_modified.js" type="text/javascript"></script>
<script src="js/jquery.cycle.all.2.72.js" type="text/javascript"></script>
<script src="js/jquery-1.7.2.min.js"></script>
<script src="js/lightbox.js"></script>
<link href="css/lightbox.css" rel="stylesheet" />
<link href="css/lightbox.css" rel="stylesheet" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Home</title>
<link rel="stylesheet" type="text/css" href="./css/estilo.css" />
<style type="text/css"></style>

<script>
 function trocardecor (elemento,cor){
 elemento.style.color=cor;}
</script>
<script> 
	
	var $j = jQuery.noConflict();
	$j('#lightbox').css("background","red");
	
	var jQuery = $;
	$(function(){
			$('#slides').cycle({
					fx: 'zoom', // choose your transition type, ex: fade, scrollUp, shuffle, etc...
					pager:  '#paginador',
					speed: 300,
					timeout: 5000,
					cleartype: false,
					pause: true
			});
	});

</script>

</head>
<body>
<div id="tudo">
	<div id="topo">
		<div id="logo" >
			<a href="?pg=home">
				<div id="logo_imagem">
						<img src="./imagens/layout/logomarca.png" alt="samukar"  
						title="samukar" name="samukar" 
						border="0" width="299" height="190" />
				</div>
			</a>
		</div>
		<div id="link_topo">
			<div id="link_home_imagem">
					<img src="./imagens/layout/telefone.png" alt="samukar"  
					title="samukar" name="samukar" style=" margin-left:40px;
					margin-top:10px;
					border="0" width="197" height="25" />
				</div>				
			<div id="link_home">
				<div id="link_home_imagem">
					<img src="./imagens/layout/lateral22.png" alt="samukar"  
					title="samukar" name="samukar" 
					border="0" width="10" height="43" />
				</div>				
				
				<div id="link_home_conteudo">
				
					<a href="?pg=contato">
						<div class="linkletra20calibra" style="border-left: 2px solid #ffffff; margin-right:30px;">
						Contato
						</div>
					</a>
					<a href="?pg=links">
						<div class="linkletra20calibra" style="border-left: 2px solid #ffffff; margin-right:30px;" >
						links
						</div>
					</a>
		
					<a href="?pg=home">
						<div class="linkletra20calibra" >
						Home
						</div>
					</a>
				</div>
			
			</div>
				<div id="logo_imagem1">
						<img src="./imagens/layout/logomarca1.gif" alt="Samukar"  
						title="Samukar" name="Samukar" 
						border="0" width="660" height="120" />
				</div>	
		</div>
	</div>
	<div class="clear" ></div>
	<div id="menu">
		<div class="lateralmenu">
		<img src="./imagens/layout/lateral_menu1.gif" alt="samukar"  
					title="samukar" name="samukar" 
					border="0" width="13" height="52" />
		</div>
		
		<div id="conteudomenu">
		<?php
	
			
			$sql    = 'SELECT id,titulo FROM categoria;';
			$result = mysql_query($sql, $link);
			while ($row = mysql_fetch_assoc($result)){
	
		?>
		<a href="?pg=categoria_produto&id_categoria=<?php echo $row['id'];?>">
			<div class="menuletra16calibra">
		
			<?php echo $row['titulo'];?>
			</div>
			</a>
			<?php
			}
		
		?>
		
		</div>
		<div class="lateralmenu">
		<img src="./imagens/layout/lateral_menu2.gif" alt="samukar"  
					title="samukar" name="samukar" 
					border="0" width="13" height="52" />
		</div>
	</div>
	<div class="clear" ></div>
	<div id="banner">
	<div id="imagem_banner">
		<div id="slides">
	<?php		
			$sql = "SELECT id,imagem,titulo FROM slide order by id desc"; //altere (clientes) para o nome de sua tabela.
			$result = mysql_query($sql) or die ("N�o foi poss�vel realizar a consulta!!!");
			while ($row = mysql_fetch_assoc($result)){	
		?>
		
  
			<a href="<?php echo $row['titulo']?>" target="_self"> 
				<img src="./produtos/g_<?php echo $row['imagem']?>" width="980" height="361" alt="1" alt="samukar"  
				title="samukar" name="samukar" 
				border="0" /> 
			</a>
		
		<?php
			}
		?>
			</div>
		</div>
	
	</div>
	<div class="clear" ></div>
	<div id="meio">
	<?php 
				$pg=$_GET["pg"];
				if($pg=="home")
					include('home.php');
				else if($pg=="contato")
					include('contato.php');
				else if($pg=="categoria_produto")
					include('categoria_produto.php');
				else if($pg=="produto")
					include('produto.php');
				else if($pg=="links")
					include('links.php');
				else
					include('home.php');
				?>
				
	
	</div>
	<div class="clear" ></div>
	<div id="marcas"style="padding-top:30px;" >
		<div id="titulomarcas">
			<div class="letra20">
				Marcas
			</div>
			<div class="linhaverde">
				
			</div>
		</div>
		<div id="logosmarcas">
		<div id="slide-cervejas">
        <marquee direction="left" scrollamount="3" width="980" height="137" behavior="alternate" onmouseover="this.stop()" onmouseout="this.start()">
				   <?php
				
						$sql    = 'SELECT id,imagem,titulo FROM marcas;';
						$result = mysql_query($sql, $link);
						while ($row = mysql_fetch_assoc($result)){
					?>
						<a target="_self"> <img src="./produtos/g_<?php echo $row['imagem']?>"alt="samukar"  title="samukar" name="samukar" 
			border="0" width="315" height="137"/>
					<?php
						}

					?>
				</marquee>
        </div>
        </div>
		
		<div class="clear" ></div>
	</div>
	<div class="clear" ></div>
</div>
<div class="clear" ></div>
<div id="rodape">
	<div id="rede_socias">
		<div class="lateralrodape">
			<img src="./imagens/layout/rodape1.png" alt="samukar"  
			title="samukar" name="samukar" 
			border="0" width="25" height="66" />
		</div>
		<div id="conteudorede_socias" style="border-top: 1px solid #FF9326;">
			<!--<div class="letra30" style=" margin-top:10px;">
				Siga Na Web >
			</div>
			<div class="redesociais_logo">
				<img src="./imagens/layout/face.gif" alt="samukar"  
				title="samukar" name="samukar" 
				border="0" width="156" height="30" />
			</div>
			<div class="redesociais_logo">
				<img src="./imagens/layout/twiter.gif" alt="samukar"  
				title="samukar" name="samukar" 
				border="0" width="156" height="30" />
			</div>
			<div class="redesociais_logo">
				<img src="./imagens/layout/you.gif" alt="samukar"  
				title="samukar" name="samukar" 
				border="0" width="156" height="30" />
			</div>-->
		</div>

		<div class="lateralrodape">
			<img src="./imagens/layout/rodape22.png" alt="samukar"  
			title="samukar" name="samukar" 
			border="0" width="25" height="66" />
		</div>
		<div class="clear" ></div>
	</div>
	<div class="conteudo_rodape">
	
			<?php
	
			
			$sql    = 'SELECT id,titulo FROM categoria;';
			$result = mysql_query($sql, $link);
			while ($row = mysql_fetch_assoc($result)){
	
		?>
		<a href="?pg=categoria_produto&id_categoria=<?php echo $row['id'];?>">
			<div class="menuletra21calibra">
		
			<?php echo $row['titulo'];?>
			</div>
			</a>
			<?php
			}
		
		?>

	</div>

	<div class="fundo_rodape">
	
		<div class="rodape_img">
		<img src="./imagens/layout/rodape_img.png" style="widht:589;height:107;boder:0;">
		</div>

		
		<div class="img_midiamix">
		<img src="./imagens/layout/midiamix.png" style="widht:171;height:33;boder:0">
		
		</div>
		<div class="img_direitos">
		
		<img src="./imagens/layout/Direitos.png" style="widht:171;height:33;boder:0">
		</div>
	</div>








	
</div>


</body>