<?php
include('cabecalho.php');
	
?>
<head>
<script type="text/javascript" src="./js/functions.js"></script>
	<script type="text/javascript" src="./ckeditor/ckeditor.js"></script>
	<script src="./ckeditor/_samples/sample.js" type="text/javascript"></script>
	<link href="./ckeditor/_samples/sample.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="./js/functions.js"></script>

	
</head>

<?php	
	$row=null;
	$result=null;
	if (isset($_GET["id"])){
		$sql	= "SELECT id,titulo,data_evento,conteudo FROM categoria_fotos where (id=0".$_GET["id"].")";
		$result=mysql_query($sql,$link);
		$row = mysql_fetch_assoc($result);
		//echo $sql;
	}
	
	$categoria_fotos=0;
	if (isset($_GET["categoria_fotos"])){
		$categoria_fotos=$_GET["categoria_fotos"];	
	}
	else if (isset($_POST["categoria_fotos"])){
		$categoria_fotos=$_POST["categoria_fotos"];
	}
?>

<div id="individual_cadastro">
	<div id="nome_cadastro">CADASTRO - CATEGORIA FOTOS</div>
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
					<div style="margin-top:20px; padding-left: 320px; margin:0 auto; margin-left:auto; margin-right:auto;">	
						<input type="submit" name="acao" value="Inserir"/>		
						<input type="submit" name="acao" value="Alterar">
						<input type="submit" name="acao" value="Excluir">					
					</div>
				</div>
			</form>
		<div class="divisor">
<?php
	if ($_POST) {	
	
		if ($_POST ['acao']=='Alterar'){
			//delete_file($folder . $imagem_antiga);
			$conteudo=($_POST["conteudo"]);
			$conteudo=str_replace("\\\"", "\"", $conteudo);
			$sql = "update categoria_fotos set titulo='".$_POST["titulo"]."',data_evento='".$_POST["data_evento"]."',conteudo='".$conteudo."' where (id=".$_POST["id"].");";
			//echo $sql;
			if($sql){
							$erro = "Dados alterados com sucesso!";
						  } else{
							  $erro = "Não foi possivel alterar os dados";
						  }
			mysql_query($sql, $link);
		}
			else if( $_POST['acao']=='Inserir'){ 
			$conteudo=($_POST["conteudo"]);
			$conteudo=str_replace("\\\"", "\"", $conteudo);
			$sql = "insert into categoria_fotos (titulo,data_evento,conteudo) values ('".$_POST["titulo"]."','".$_POST["data_evento"]."','".$conteudo."');";
			//echo $sql;
			if($sql){
							$erro = "Dados salvos com sucesso!";
						  } else{
							  $erro = "Não foi salvar os dados";
						  }
			mysql_query($sql, $link);
		}
			else if ($_POST['acao']=='Excluir'){
			//delete_file($folder . $imagem_antiga);
			$sql = 'delete FROM categoria_fotos where id='.$_POST["id"];
			  if($sql){
							$erro = "Dados excluidos com sucesso!";
						  } else{
							  $erro = "Não foi possivel excluir os dados";
						  }
			//echo $sql;
			mysql_query($sql, $link);
		}	
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
		<div id="relatorio_input">
			<table cellpadding= "4" cellspacing = "0" border= "1" width="1004">
				<tr bgcolor="#CCCCCC" height="40" >
					<td>EDITAR</td>
					<td>TÍTULO</td>
					<td>DATA DO EVENTO</td>
					<td>CONTEUDO</td>
				</tr>
				<?php
					if ($result!=null){
						mysql_free_result($result);
					}
					$sql    = 'SELECT id,data_evento,titulo,conteudo FROM categoria_fotos;';
					$result = mysql_query($sql, $link);
					if (!$result) {
						echo "Erro do banco de dados, não foi possivel consultar o banco de dados\n";
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
						<td><a href="principal.php?pg=cadastro_categoria_fotos&id=<?php echo $row['id'];?>" VALUE="EDITAR" NAME="EDITAR">
						<div style="color:#000000;" VALUE="EDITAR" NAME="EDITAR"><img src="./imagens/editar.gif" width="21" height="21" VALUE="EDITAR" NAME="EDITAR" border="0" />
						
						</div>
						<a/></td>
						<td><?php echo $row['titulo'];?>&nbsp </td>
						<td><?php echo $row['data_evento'] ;?></td>
						<td><?php echo $conteudo;?> <?php echo $etc;?></td>
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
