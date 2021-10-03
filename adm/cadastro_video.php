 <?php
	include('cabecalho.php');
?>
<head>
	<script type="text/javascript" src="./js/functions.js"></script>
	<script type="text/javascript" src="./js/mascara.js"></script>
	<script type="text/javascript" src="./ckeditor/ckeditor.js"></script>
	<script src="./ckeditor/_samples/sample.js" type="text/javascript"></script>
	<link href="./ckeditor/_samples/sample.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="./js/functions.js"></script>
	  <script src="./js/jquery-1.8.0.min.js" type="text/javascript"></script>
        <script src="./js/jquery.maskedinput-1.3.js" type="text/javascript"></script>
        <script src="./js/jquery.maskedinput-1.3.min.js" type="text/javascript"></script>
        <script language="JavaScript" type="text/javascript">
            jQuery(function($){
           $("#date").mask("99/99/9999");
           $("#phone").mask("(99) 9999-9999");
           $("#cel").mask("(99) 9999-9999");
           $("#tin").mask("99-9999999");
           $("#ssn").mask("999-99-9999");
            });
        </script>
	<script type="text/javascript">
		function calcHeight(){
		  //encontra a altura da página que será exibida no iFrame
		  var the_height=
			document.getElementById('conteudomeio').contentWindow.
			  document.body.offsetHeight;

		  //muda a altura do iframe
		  document.getElementById('conteudomeio').height=
			  the_height + 20; //esse "+20" faz com que a altura ultrapasse um pouco a da pagina interna. Dessa forma, você evita que o iFrame fique móvel ao selecionar seu conteúdo.
		}
		function idJump(element){
			var acc="principal.php?pg=cadastro_agenda&id_agenda=";
			var id_agenda=element.options[element.selectedIndex].value
			acc=acc+id_agenda;
			self.location.href=acc;
		}
			function WinOpen(pagina,janela,opcoes){
		window.open(pagina,janela,opcoes);
	}
	
	</script>
	
</head>
<center>
<?php

	$row=null;
	$result=null;
	$result=mysql_query($sql, $link);
	if (($_GET["id"]!=null)){
		$sql	= "SELECT id,video,data_evento,titulo,conteudo FROM video where (id=0".$_GET["id"].")";
		$result=mysql_query($sql, $link);
		$row = mysql_fetch_assoc($result);
		if ($result!=null)
		$imagem_antiga=$row["imagem"];
	
	}
		$video=0;
		if (isset($_GET["video"])){
		$video=$_GET["video"];	
	}
		else if (isset($_POST["video"])){
		$video=$_POST["video"];
	}	 
?>


<div id="individual_cadastro">
	<div id="nome_cadastro">CADASTRO - VÍDEOS</div>
		<div id="input_cadastro">
			<form method="post" enctype="multipart/form-data" name="form1" id="form1">
				<div id="inputs_formularios">
					<div class="tudo_input">
						<div class="left_input">
							<input name="id" style="width:530px;" type="hidden" value="<?php echo $row["id"]?>">
						</div>
						<div class="clear"></div>
					</div>
					<div class="tudo_input">
						<div class="input_padrao">
								Título:
						</div>
						<div class="left_input">
							<input name="titulo" style="width:530px;" type="text" value="<?php echo $row["titulo"]?>">
						</div>
						<div class="clear"></div>
					</div>
					<div class="tudo_input">
						<div class="input_padrao">
								Data do Evento:
						</div>
						<div class="left_input">
							<input name="data_evento" style="width:530px;" type="text" value="<?php echo $row["data_evento"]?>">
						</div>
						<div class="clear"></div>
					</div>
					
					<div class="tudo_input">
						<div class="input_padrao">
							Link do Youtube
						</div>
						<div class="left_input">
							<div class="ajuda_crm">
								<input name="video" style="width:530px;" type="text" value="<?php echo $row["video"]?>">
							</div>
							<div class="imagem_ajuda">
								<a href="javascript:WinOpen('ajuda_video.html','Popup','width=700,height=650,top=10,left=250');">
									<div style="color:#000000;">
										<img src="./ajuda/ajuda.jpg" width="21" height="21" border="0" />
									</div>
								</a>
							</div>
						</div>
						<div class="clear"></div>
					</div>
					<div class="tudo_input">
						<div class="input_padrao">
							Conteudo do Vídeo:
						</div>
						<div class="left_input" style="width:530px;">
							<label for="editor1" ></label>
								<textarea id="editor1" name="conteudo" >
									<?php if ($result!=null) echo $row["conteudo"]?>
								</textarea>
							<script type="text/javascript">
								window.onload = function()  {
									CKEDITOR.replace( 'editor1' );
									};				 
										window.onload = function() {
										CKEDITOR.replace( 'editor1', {
										toolbar:
										[
											{ name: 'basicstyles', items : [ 'Bold','Italic' ] },
											{ name: 'paragraph', items : [ 'NumberedList','BulletedList' ] },
											{ name: 'tools', items : [ 'Maximize','-','About' ] }
											
										]}        
									);
								};
					
										CKEDITOR.stylesSet.add( 'my_styles', [
									// Block-level styles
									{ name : 'Blue Title', element : 'h2', styles : { 'color' : 'Blue' } },
									{ name : 'Red Title' , element : 'h3', styles : { 'color' : 'Red' } },
								 
									// Inline styles
									{ name : 'CSS Style', element : 'span', attributes : { 'class' : 'my_style' } },
									{ name : 'Marker: Yellow', element : 'span', styles : { 'background-color' : 'Yellow' } }
								]);
								
							</script>
						</div>
						<div class="clear"></div>
					</div>
					<div style="margin-top:20px;">	
						<input type="submit" name="acao" value="Inserir"/>		
						<input type="submit" name="acao" value="Alterar">
						<input type="submit" name="acao" value="Excluir">					
					</div>
				</div>
			</form>
			<div class="divisor">
			<?php
				if ($_POST) {
					if($result!=null){
						$row = mysql_fetch_assoc($result);
						if ($_POST['acao']=='Inserir'){
						$conteudo=($_POST["conteudo"]);
						$conteudo=str_replace("\\\"", "\"", $conteudo);
						$sql = "insert into video (video,data_evento,titulo,conteudo) values ('".$_POST["video"]."','".$_POST["data_evento"]."','".$_POST["titulo"]."','".$conteudo."');";
						if($sql){
									$erro = "Dados salvos com sucesso!";
								  } else{
									  $erro = "Não foi salvar os dados";
								  }
						mysql_query($sql, $link);
						}
						if ($_POST['acao']=='Excluir'){
							$sql = 'delete FROM video where id='.$_POST["id"];
							   if($sql){

									$erro = "Dados excluidos com sucesso!";

								  } else{

									  $erro = "Não foi possivel excluir os dados";

								  }

							mysql_query($sql, $link);
						}
						else if ($_POST ['acao']=='Alterar'){
							$conteudo=($_POST["conteudo"]);
							$conteudo=str_replace("\\\"", "\"", $conteudo);
							$sql = "update video set video='".$_POST["video"]."',data_evento='".$_POST["data_evento"]."',titulo='".$_POST["titulo"]."',conteudo='".$conteudo."' where (id=".$_POST["id"].");";
							//echo $sql;
							if($sql){
									$erro = "Dados alterados com sucesso!";
								  } else{
									  $erro = "Não foi possivel alterar os dados";
								  }
							mysql_query($sql, $link);
						}
						
					
					}
					
					$redirect = "upload.php?success";
				}
			?> 
			<?php
				if(isset($erro)){
					print '<div style="width:80%; font-size:20px; color:#009900; padding: 5px 0px 5px 0px; text-align:center; margin: 0 auto;">'.$erro.'</div>';
					print '<div style="width:80%; height:32px; width:32px;  text-align:center; margin: 0 auto; background-image:url(imagens/loading.gif) ; "></div>';
					echo "<meta HTTP-EQUIV='refresh' CONTENT='5'>";
				}
			?>
			</div>
		</div>
	  <div id="relatorio_input" >
		<table cellpadding= "7" cellspacing = "0" border= "1" width="1004">
			<tr bgcolor="#CCCCCC" height="40" >
				<td>AÇÃO</td>
				<td>Nº</td>
				<td>TITULO</td>
				<td>DATA DO EVENTO</td>
				<td>CONTEUDO</td>
				<td>VÍDEO</td>
			</tr>
			  <A NAME="resultado"></A>
			<?php
					if ($result!=null){
					mysql_free_result($result);
				}
				$sql    = 'SELECT id,video,data_evento,titulo,conteudo FROM video;';
				$result = mysql_query($sql, $link);
				if (!$result) {
					echo "Erro do banco de dados, n䯠foi possivel consultar o banco de dados\n";
					echo 'Erro MySQL: ' . mysql_error();
					exit;
				}
				while ($row = mysql_fetch_assoc($result)){
				$conteudo=$row ["conteudo"];
				$conteudo=substr($conteudo, 0, 150);
				$conteudo_limite=$row ["conteudo"];
				if($conteudo_limite == substr($conteudo_limite, 0, 150)){
						$etc = "";
					} 
						else
					{
						$etc = "...";
					}
			?>
				<tr>
					<td>
						<a href="?pg=cadastro_video&id=<?php echo $row['id'];?>">
							<div style="color:#000000;">
								<img src="./imagens/editar.gif" width="21" height="21" border="0" />
							</div>
						</a>
					</td>
					<td><p><?php echo $row['id'];?></p> </td>
					<td><p><?php echo $row['titulo'];?></p> </td>
					<td><p><?php echo $row['data_evento'];?></p> </td>
					<td><p><?php echo $conteudo;?> <?php echo $etc;?></p></td>
					<td>
						<object width="60" height="60">
						<param name="movie" value="<?php echo $row['video'];?>">
						<param name="allowFullScreen" value="true">
						<param name="allowscriptaccess" value="always">
						<embed src="http://www.youtube.com/v/<?php echo $row['video'];?>" type="application/x-shockwave-flash" width="60" height="60" allowscriptaccess="always" allowfullscreen="true">
						</object>
					</td>
				</tr>
			<?php
				}
				mysql_free_result($result);
			?>
		</table>
		
	</div>
</div>
<?php
	include('rodape.php');
?>
