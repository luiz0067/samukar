<?php
	include('cabecalho.php');
?>
<head>
 
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
	<script src="uploadify/jquery.uploadify.min.js" type="text/javascript"></script>
	<link rel="stylesheet" type="text/css" href="uploadify/uploadify.css">
	
	<script type="text/javascript" src="./js/functions.js"></script>
	<script type="text/javascript" src="./ckeditor/ckeditor.js"></script>
	<script src="./ckeditor/_samples/sample.js" type="text/javascript"></script>
	<link href="./ckeditor/_samples/sample.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="./js/functions.js"></script>
	<script src="./js/jquery.min.js" type="text/javascript"></script>
	<script src="./js/jquery.uploadify.min.js" type="text/javascript"></script>

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
			var acc="principal.php?pg=cadastro_fotos&id_categoria_fotos=";
			var id_categoria_fotos=element.options[element.selectedIndex].value
			acc=acc+id_categoria_fotos;
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


$fotos_id="";
	$fotos_id_categoria="";
	$fotos_foto="";
	$fotos_imagem="";
	$fotos_categoria="";
	$fotos_data_cadastro="";

	$codigo="";
	if(isset($_GET["codigo"])){
		$codigo=$_GET["codigo"];
	}
	else if(isset($_POST["codigo"])){
		$codigo=$_POST["codigo"];
	}
	
	$sql="";//consulta select
	$linha=null;//registro da consulta
	$row="";//mesma coisa depende do meu estado de humor
	$result=null;//todos os resultados
		if($codigo!=""){//verrifica se o parametro esta vazio se nao preenche com ""
			$sql = "select id,titulo,data_cadastro from categoria_fotos where(id=".$codigo.");";
			$result=mysql_query($sql, $link);//realiza a consulta
			$row = mysql_fetch_assoc($result);//resgata a linha da consulta
			$fotos_id_categoria=$row['id'];
			$fotos_categoria=$row['titulo'];
			$fotos_data_cadastro=$row['data_cadastro'];
		}
		else{//verrifica se o parametro esta vazio se nao preenche com ""
			$sql = "select id,titulo,data_cadastro from categoria_fotos ;";
			$fotos_id_categoria=$row['id'];
			$fotos_categoria=$row['titulo'];
			$fotos_data_cadastro=$row['data_cadastro'];
		}


?>
<div id="individual_cadastro">
	<div id="nome_cadastro">CADASTRO - FOTOS</div>
		<div id="input_cadastro">
			<form method="post" enctype="multipart/form-data" name="form1" id="form1">
				<div id="inputs_formularios">
				
					<div class="tudo_input">
						<div class="input_padrao">
							Evento:
						</div>
						<div class="left_input">
							<select name="id_categoria_fotos"  <?php echo $row["id_categoria_fotos"]?>>
						<option value="Escolha uma categoria">
							Escolha uma categoria
						</option>
						<?php
						$row_categoria_fotos=null;
						$result_categoria_fotos=null;		
						$sql_categoria_fotos    = 'SELECT id,data_evento,titulo,conteudo FROM categoria_fotos order by titulo asc;';
						$result_categoria_fotos = mysql_query($sql_categoria_fotos, $link);
						if (!$result_categoria_fotos) {
							echo "Erro do banco de dados, não foi possivel consultar o banco de dados\n";
							echo 'Erro MySQL: ' . mysql_error();
							exit;
						}
						while ($row_categoria_fotos = mysql_fetch_assoc($result_categoria_fotos)){
							$selected="";
							$id_categoria_fotos=($_POST["id_categoria_fotos"]);
							if ($result!=null){
								if($row["id_categoria_fotos"]==$row_categoria_fotos['id'])
									$selected="selected";
							}	
						?>
							<option value="<?php echo $row_categoria_fotos['id'];?>" <?php echo $selected?> >              
								<?php echo $row_categoria_fotos;?>
							</option>
						<?php
							}
							mysql_free_result($result_categoria_fotos);
						?>
					</select>
						</div>
						<div class="clear"></div>
					</div>
					<div class="tudo_input">
						<div class="input_padrao">
							Cadastro de imagens no Álbum:
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
				<div class="tudo_input" style="font-family:calibra; margin-top:25px;"> 
					<div class="input_padrao" style="font-family:arial; width: 260px;">
						Buscar por Álbum:
					</div>
					<div class="left_input1" style="float:left;">
						<select onchange="idJump(this)" name="id_categoria_fotos"  <?php echo $row["id_categoria_fotos"]?>>
						<option value="Escolha uma categoria">
							Escolha Álbum de fotos
						</option>
						<?php
							$row_categoria_fotos=null;
							$result_categoria_fotos=null;		
							$sql_categoria_fotos    = 'SELECT id,data_evento,titulo FROM categoria_fotos order by titulo asc;';
							$result_categoria_fotos = mysql_query($sql_categoria_fotos, $link);
							if (!$result_categoria_fotos) {
							echo "Erro do banco de dados, não foi possivel consultar o banco de dados\n";
							echo 'Erro MySQL: ' . mysql_error();
							exit;
							}
							while ($row_categoria_fotos = mysql_fetch_assoc($result_categoria_fotos)){
							$selected="";
							$id_categoria_fotos=($_POST["id_categoria_fotos"]);
							if ($result!=null){
							if($row["id_categoria_fotos"]==$row_categoria_fotos['id'])
							$selected="selected";
							}	
						?>
						<option value="<?php echo $row_categoria_fotos['id'];?>#resultado" <?php echo $selected?> >              
							<?php echo $row_categoria_fotos['titulo'];?>
						</option>
							<?php
								}
								mysql_free_result($result_categoria_fotos);
							?>
						</select>
					</div>
					<div class="clear"></div>
				</div>
				<?php
					if ($_POST) {
						$folder = "..//uploads//fotos//";	
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
									redimensiona($folder . $imagem,$folder."h_".$imagem,800,600,75);
									redimensiona($folder . $imagem,$folder."g_".$imagem,580,300,75);
									
									unlink($folder . $imagem);
									//delete_file($folder . $imagem);	
									echo "<a href=\"../fotos/g_".$imagem."\" target=\"blank\">".$imagem."</a><br>";
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
						
						if ($_POST['acao']=='Inserir'){
						$sql = "insert into fotos (imagem,id_categoria_fotos,obs) values ('".$imagem."','".$_POST["id_categoria_fotos"]."','".$_POST["obs"]."');";
						echo $sql;
						if($sql){
									$erro = "Dados salvos com sucesso!";
								  } else{
									  $erro = "Não foi salvar os dados";
								  }
						}
						if ($_POST['acao']=='Excluir'){
							$sql = 'delete FROM fotos where id='.$_POST["id"];
							   if($sql){

									$erro = "Dados excluidos com sucesso!";

								  } else{

									  $erro = "Não foi possivel excluir os dados";

								  }

							mysql_query($sql, $link);
						}
						else if ($_POST ['acao']=='Alterar'){
							$sql = "update fotos set imagem='".$imagem."',id_categoria_fotos='".$_POST["id_categoria_fotos"]."',obs='".$_POST["obs"]."' where (id=".$_POST["id"].");";
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
		<table cellpadding= "4" cellspacing = "0" border= "1" width="1004">

			<tr bgcolor="#CCCCCC" height="40" >
				<td>Ação</td>
				<td>Imagem</td>
			</tr>
			  <A NAME="resultado"></A>
			<?php
				$result = mysql_query($sql, $link);
				if ($result!=null)
				while ($row = mysql_fetch_assoc($result)){
			?>
				<tr>
					<td>
						<a href="principal.php?pg=cadastro_fotos&id_categoria_fotos=<?php echo $row['id_categoria_fotos'];?>&id=<?php echo $row['id'];?>">
							<div style="color:#000000;">
								<img src="./imagens/editar.gif" width="21" height="21" border="0" />
							</div>
						</a>
					</td>
					<td>
						<a href="../uploads/fotos/g_<?php echo $row['imagem'];?>"><a/><br>
						<img  width="60" height="60" src="../uploads/fotos/g_<?php echo $row['imagem'];?>">
					</td>
				</tr>
			<?php
				}
				if ($result!=null){
					mysql_free_result($result);
				}
			?>
		</table>
		
	</div>
</div>




	
<?php
	include('rodape.php');
?>












