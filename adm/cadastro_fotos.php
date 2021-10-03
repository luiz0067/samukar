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
include('conecta.php');

	$row=null;
	$result=null;
	if (isset($_GET["id"])){
		$sql	= "SELECT id,titulo,imagem,id_categoria FROM foto where (id=0".$_GET["id"].")";
		$result=mysql_query($sql,$link);
		$row = mysql_fetch_assoc($result);
		echo $sql;
	}
	
	

?>

<div id="individual_cadastro">
	<div id="nome_cadastro">CADASTRO - FOTOS</div>
		<div id="input_cadastro">
			<form method="post" enctype="multipart/form-data" name="form1" id="form1">

				<div id="inputs_formularios">
				<div class="tudo_input">
						<div class="input_padrao">
							Id:
						</div>
						<div class="left_input">
							<input name="id" style="width:530px;" type="text" value="<?php echo $row["id"]?>">
						</div>
						<div class="clear"></div>
					</div>
					<td> Menu:
			<select name="id_categoria" <?php if ($result!=null) echo $row["id_categoria"]?>>
						<?php
						$row_sub_categoria=null;
						$result_sub_categoria=null;		
						$sql_categoria_noticias    = 'SELECT * FROM imagem order by titulo asc;';
						$result_sub_categoria = mysql_query($sql_categoria_noticias, $link);
						if (!$result_sub_categoria) {
							echo "Erro do banco de dados, não foi possivel consultar o banco de dados\n";
							echo 'Erro MySQL: ' . mysql_error();
							exit;
						}
						while ($row_sub_categoria = mysql_fetch_assoc($result_sub_categoria)){
							$selected="";
							if ($result!=null){
								if($row["id_categoria "]==$row_sub_categoria['id'])
									$selected="selected";
							}
						?>
							<option value="<?php echo $row_sub_categoria['id'];?>" <?php echo $selected?>>              
								<?php echo $row_sub_categoria['titulo'];?>
							</option>
						<?php
							}
							mysql_free_result($result_sub_categoria);
						?>
					</select>
			</td>
					
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
					
					<div class="clear"></div>
				</div>
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
									redimensiona($folder . $imagem,$folder."h_".$imagem,800,600,75);
									redimensiona($folder . $imagem,$folder."g_".$imagem,580,300,75);
									
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
				
						if ($_POST['acao']=='Inserir'){
						$sql = "insert into foto (imagem,titulo,id_categoria) values ('".$imagem."','".$_POST["titulo"]."','".$_POST["id_categoria"]."');";
						echo $sql;
						mysql_query($sql, $link);
						if($sql){
									$erro = "Dados salvos com sucesso!";
								  } else{
									  $erro = "Não foi salvar os dados";
								  }
						}
						if ($_POST['acao']=='Excluir'){
							$sql = 'delete FROM foto where id='.$_POST["id"];
							   if($sql){

									$erro = "Dados excluidos com sucesso!";

								  } else{

									  $erro = "Não foi possivel excluir os dados";

								  }

							mysql_query($sql, $link);
						}
						else if ($_POST ['acao']=='Alterar'){
							$sql = "update imagem set foto='".$imagem."',titulo='".$_POST["titulo"]."' where (id=".$_POST["id"].");";
							//echo $sql;
							if($sql){
									$erro = "Dados alterados com sucesso!";
								  } else{
									  $erro = "Não foi possivel alterar os dados";
								  }
							mysql_query($sql, $link);
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
		<table cellpadding= "4" cellspacing = "0" border= "1" width="1004">

			<tr bgcolor="#CCCCCC" height="40" >
				<td>Ação</td>
				<td>Imagem</td>
				<td>id_categoria</td>
			</tr>
			  <A NAME="resultado"></A>
			<?php
			$sql    = 'SELECT * FROM foto;';
			$result = mysql_query($sql, $link);
			while ($row = mysql_fetch_assoc($result)){
			?>
				<tr>
					<td>
					<a href="principal.php?pg=cadastro_fotos&id=<?php echo $row['id'];?>" VALUE="EDITAR" NAME="EDITAR">
						<div style="color:#000000;" VALUE="EDITAR" NAME="EDITAR"><img src="./imagens/editar.gif" width="21" height="21" VALUE="EDITAR" NAME="EDITAR" border="0" />
						
						</div>
						<a/></td>
					<td>
						<a href="../produtos/g_<?php echo $row['imagem'];?>"><a/><br>
						<img  width="60" height="60" src="../produtos/g_<?php echo $row['imagem'];?>">
					</td>
					<td><?php echo $row['id_categoria'];?>&nbsp </td>
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












