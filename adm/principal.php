<html>
<?php	
	include('cabecalho.php');
?>
<head>
	<meta http-equiv="Content-Type" />
	<title>CRM Midiamix</title>
	<link rel="stylesheet" type="text/css" href="./css/estilocrm.css" />
	  <link rel="shortcut icon" href="./imagenscrm/mini_logo.png" type="image/x-icon" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<style type="text/css">
	body {
		width:100%;
		height:100%;
		margin-left:0px;
		margin-right:0px;
		margin-top:0px;
		margin-bottom:0px;
		position:absolute;
		background-color:#FFF;
	}
	</style>
	<script type="text/javascript">
		function MM_swapImgRestore() { //v3.0
		  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
		}
		function MM_preloadImages() { //v3.0
		  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
			var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
			if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
		}	
		function MM_findObj(n, d) { //v4.01
		  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
			d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
		  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
		  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
		  if(!x && d.getElementById) x=d.getElementById(n); return x;
		}	
		function MM_swapImage() { //v3.0
		  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
		   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
	}
	</script>
</head>
<body onLoad="relogio();">

	<div id="tudo">
		<div class="topo_adm" style="background-color:#000;">
		  <div id="barrasair">
			<div id="sair">
			  <a class="textosair" href="./logout.php">
				<div id="botaooff">
					<img src="imagenscrm/off.gif" width="26" height="30" border="0" /></div>
				<div id="divtextosair">
					SAIR
				</div>
			  </a>
			</div>
			<div class="branco" style="width:750px; height:30px;">
			<div id="sair" style="margin-left:40px;">
			   <a class="textosair" target="_blank" href="../index.php"><div id="botaooff">
			   <img src="imagenscrm/mini_logo.png" width="26" height="30" border="0" /></div>
			  <div id="divtextosair">VER SITE</div></a>
			</div>
				
			</div>
			<div id="encerramento">
			<a class="texto3">Sessão encerra em:&nbsp;</a><label id="cronometro"></label><br>
			</div>
		  </div>
		</div>
		<div class="linhas" style="background-color:#E8E8E8; ">
			<div class="linhalogo" >
				  <div id="containercrm">
					<div id="crmmidiamix"><img src="imagenscrm/crmmidiamix.jpg" width="210" height="84" /></div>
				  </div>
				  <div id="containercliente">
					<div class="foto_m">
						<img src="imagenscrm/logo.png" width="150" height="100" />
					</div>
				  </div>
				 
				  <div id="riscobarra"></div>
				  <div id="containerjava">
					<div class="branco" style="width:197px; height:76px; margin-top:14px; display:inline;">
					  <div class="branco" style="height:71px; width:80px; font-family:Verdana, Geneva, sans-serif; font-size:14px; padding-top:5px; color:#666666;">Tecnologia</div>
					  <div class="branco" style="margin-top:25px;"> <img src="imagenscrm/php.png" width="80" height="50" border="0"></div>
					  <div id="logojava"></div>
					</div>
					<div class="branco" style="width:197px; height:50px;">
					  <div id="logomix"></div>
					  <div class="branco" style="width:153px; height:50px; display:block; overflow:hidden; font-family:Verdana, Geneva, sans-serif; font-size:08px; color:#666666;">Developed by<br>
						<a style="font-size:10px;">Studio Midiamix</a><br>
						Todos os direitos reservados&copy;</div>
					</div>
				 
			  </div>
			</div>
		</div>
		<div class="linhastotal" style="background-image:url(imagenscrm/risco1.gif); background-repeat:repeat-x;">
		  <div class="linhascentro">
			<div id="risco1"></div>
		  </div>
		</div>
		<div class="linhastotal">
		  <div class="linhascentro">
			<div id="barrausuario">
			  <div id="bemvindo"> 
			  <? 
			  session_start();
			  echo "Bem vindo, ".$_SESSION["usuario"];
			  ?>
			  </div>
			  <div class="branco" style="width:511px; height:45px; float:left;"></div>
			  <div id="ferramentas">
				<div id="trocarsenha">
					<a href="?pg=cadastro_usuario" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image2','','imagenscrm/senha1.gif',1)">
						<img src="imagenscrm/senha2.gif" alt="Trocar Senha" name="Image2" width="124" height="45" border="0" id="Image2" />
					</a>
				</div>
					<div id="suporte">
						<a href="?pg=suporte" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image3','','imagenscrm/suporte1.gif',1)">
							<img src="imagenscrm/suporte2.gif" alt="Suporte" name="Image3" width="114" height="45" border="0" id="Image3" />
						</a>
					</div>
			  </div>
			</div>
		  </div>
		</div>
		<div class="linhastotal" style="background-image:url(imagenscrm/risco1.gif); background-repeat:repeat-x;">
		  <div class="linhascentro">
			<div id="risco1"></div>
		  </div>
		</div>

		<div class="linhastotal" style="background-image:url(imagenscrm/risco1.gif); background-repeat:repeat-x;">
		  <div class="linhascentro">
			<div id="risco1"></div>
		  </div>
		</div>

	
			<div class="menuprincipal">
				<div id="menuscontainer">
					<div id="menudecomando">MENUS CADASTRO</div>
					

					<div id="menudecomando">CADASTRO PRODUTOS</div>
					<ul id="menulateral">					
						<li><a href="?pg=cadastro_categoria" >Menu </a></li>	
						<li><a href="?pg=cadastro_sub_categoria&id_categoria=escolha">Sub Menu</a></li>
						<li><a href="?pg=cadastro_imagem">Produto</a></li>	
						<li><a href="?pg=cadastro_fotos"> +fotos</a></li>	
					</ul>								
					<div id="menudecomando">CADASTRO OUTROS</div>		
					<ul id="menulateral">
						<li><a href="?pg=cadastro_slide">SLIDE</a></li>	
						<li><a href="?pg=cadastro_marcas">Marcas</a></li>	
					</ul>
						
				</div>
			</div>
			<div id="divisorconteudovertical"></div>
		
			<?php 
				$pg=$_GET["pg"];
				if($pg=="inicial.php")
					include('inicial.php');
				else if($pg=="cadastro_marcas")
					include('cadastro_marcas.php');
				else if($pg=="cadastro_agenda")
					include('cadastro_agenda.php');
				else if($pg=="suporte")
					include('suporte.php');
				else if($pg=="cadastro_usuario")
					include('cadastro_usuario.php');
				else if($pg=="cadastro_sub_categoria")
					include('cadastro_sub_categoria.php');
				else if($pg=="cadastro_produtos")
					include('cadastro_produtos.php');
				else if($pg=="cadastro_slide")
					include('cadastro_slide.php');		
				else if($pg=="cadastro_cardapio")
					include('cadastro_cardapio.php');
				else if($pg=="cadastro_video")
					include('cadastro_video.php');
				else if($pg=="cadastro_cervejas")
					include('cadastro_cervejas.php');
				else if($pg=="cadastro_fotos")
					include('cadastro_fotos.php');	
				else if($pg=="cadastro_categoria")
					include('cadastro_categoria.php');
				else if($pg=="cadastro_imagem")
					include('cadastro_imagem.php');	
				else
					include('inicial.php');
			?>
	</div>
	

</body>
</html>
