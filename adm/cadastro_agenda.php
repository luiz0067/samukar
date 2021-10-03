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
function redimensiona($origem,$destino,$maxlargura,$maxaltura,$qualidade){
	list($largura, $altura) = getimagesize($origem);
	if($altura>$largura){
		$diferenca=$altura/$maxaltura;
		$maxlargura=$largura/$diferenca;
	}
	else{
		$diferenca=$largura/$maxlargura;
		$maxaltura=$altura/$diferenca;
	}
	$image_p = ImageCreateTrueColor($maxlargura,$maxaltura)	or die("Cannot Initialize new GD image stream");	
	$origem = imagecreatefromjpeg($origem);
	imagecopyresampled($image_p, $origem, 0, 0, 0, 0,  $maxlargura, $maxaltura, $largura, $altura);
	imagejpeg($image_p, $destino, $qualidade);
	imagedestroy($image_p);
	imagedestroy($origem);
}

	$row=null;
	$result=null;
	$result=mysql_query($sql, $link);
	if (($_GET["id"]!=null)){
		$sql	= "SELECT id,imagem,video,facebook,curtir,data_evento,titulo,conteudo FROM agenda where (id=0".$_GET["id"].")";
		$result=mysql_query($sql, $link);
		$row = mysql_fetch_assoc($result);
		if ($result!=null)
		$imagem_antiga=$row["imagem"];
	
	}
		$agenda=0;
		if (isset($_GET["agenda"])){
		$agenda=$_GET["agenda"];	
	}
		else if (isset($_POST["agenda"])){
		$agenda=$_POST["agenda"];
	}	 
?>


<div id="individual_cadastro">
	<div id="nome_cadastro">CADASTRO - EVENTO</div>
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
							Conteudo do Evento:
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
							</script>
						</div>
						<div class="clear"></div>
					</div>
					<div class="tudo_input">
						<div class="input_padrao">
							Imagem:
						</div>
						<div class="left_input">
							<input name="imagem" type="file" value="<?php if ($result!=null) echo $row["imagem"]?>">
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
			$folder = "../produtos/";	
			//$folder = "..\\upload\\imagens\\projetos\\fotos_projetos\\";
			if (
				(
					($_FILES["imagem"]["type"] == "image/gif")
					|| 
					($_FILES["imagem"]["type"] == "image/jpeg")
					|| 
					($_FILES["imagem"]["type"] == "image/pjpeg")
					|| 
					($_FILES["imagem"]["type"] == "image/png")
					|| 
					($_FILES["imagem"]["type"] == "image/bmp")
				)
			)
			{
				if (($_FILES["imagem"]["size"] < 5*1024*1024)){
					if ($_FILES["imagem"]["error"] > 0)
					{
						echo "Return Code: " . $_FILES["imagem"]["error"] . "<br />";
					}
					else
					{
						echo "Tipo: " . $_FILES["imagem"]["type"] . "<br />";
						echo "Tamanho: " . ($_FILES["imagem"]["size"] / 6000) . " Kb<br />";
						$imagem=$_FILES["imagem"]["name"];
						$ext      = substr($imagem, -4);
						$imagem      = md5($imagem).date("dmYHis").$ext;
						$extension=strtolower(end(explode(".", $imagem)));
						if (file_exists($folder . "p_".$imagem))
						{
							$imagem=time().".".$extension;
												
						}
						move_uploaded_file(
							$_FILES["imagem"]["tmp_name"],
							$folder . $imagem
						);				
						redimensiona($folder . $imagem,$folder."h_".$imagem,681,367,75);
						redimensiona($folder . $imagem,$folder."g_".$imagem,225,136,75);
						
						unlink($folder . $imagem);
						//delete_file($folder . $imagem);	
						echo "<a href=\"../produtos/g_".$imagem."\" target=\"blank\">".$imagem."</a><br>";
					}
				}
				else
				{
					echo "Tamanho muito grande<br>";
				}
			}
			else
			{
				$imagem=$imagem_antiga;
			}
			if($result!=null){
				$row = mysql_fetch_assoc($result);
				if ($_POST['acao']=='Inserir'){
				$conteudo=($_POST["conteudo"]);
				$conteudo=str_replace("\\\"", "\"", $conteudo);
				$sql = "insert into agenda (imagem,video,facebook,curtir,data_evento,titulo,conteudo) values ('".$imagem."','".$_POST["video"]."','".$_POST["facebook"]."','".$_POST["curtir"]."','".$_POST["data_evento"]."','".$_POST["titulo"]."','".$conteudo."');";
				echo $sql;
				if($sql){
							$erro = "Dados salvos com sucesso!";
						  } else{
							  $erro = "Não foi salvar os dados";
						  }
				mysql_query($sql, $link);
				}
				if ($_POST['acao']=='Excluir'){
					$sql = 'delete FROM agenda where id='.$_POST["id"];
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
					$sql = "update agenda set imagem='".$imagem."',video='".$_POST["video"]."',facebook='".$_POST["facebook"]."',curtir='".$_POST["curtir"]."',data_evento='".$_POST["data_evento"]."',titulo='".$_POST["titulo"]."',conteudo='".$conteudo."' where (id=".$_POST["id"].");";
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
			
				<td>CONTEUDO</td>
				<td>IMAGEM</td>
				
			</tr>
			  <A NAME="resultado"></A>
			<?php
				if ($result!=null){
				mysql_free_result($result);
			}
			$sql    = 'SELECT id,imagem,video,facebook,curtir,data_evento,titulo,conteudo FROM agenda;';
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
						<a href="?pg=cadastro_agenda&id=<?php echo $row['id'];?>">
							<div style="color:#000000;">
								<img src="./imagens/editar.gif" width="21" height="21" border="0" />
							</div>
						</a>
					</td>
					<td><p><?php echo $row['id'];?></p> </td>
					<td><p><?php echo $row['titulo'];?></p> </td>
					
					<td><p><?php echo $conteudo;?> <?php echo $etc;?></p></td>
					
					<td>
						<img width="60px" height="60px" src="../produtos/g_<?php echo $row['imagem'];?>">
					</td>
					
					
				</tr>
			<?php
				}
				mysql_free_result($result);
			?>
		</table>
		
	</div>
</div>

