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
			var acc="principal.php?pg=cadastro_sub_categoria&id_categoria=";
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
include('conecta.php');

$row=null;
$result=null;
if (($_GET["id"]!=null)){
	$sql	= "SELECT id,titulo,id_categoria FROM sub_categoria where (id=0".$_GET["id"].")";
	$result=mysql_query($sql, $link);
	$row = mysql_fetch_assoc($result);
	if ($result!=null)
	$titulo_antiga=$row["titulo"];
}
	
if (($_GET["id_categoria"]!=null)){
	$sql	= "SELECT id,titulo,id_categoria FROM sub_categoria where (id_categoria=0".$_GET["id_categoria"].")";
	$row=mysql_query($sql, $link);
	if ($result!=null)
	$titulo_antiga=$row["titulo"];

}
	$sub_categoria=0;
	if (isset($_GET["sub_categoria"])){
		$sub_categoria=$_GET["sub_categoria"];	
	}
	else if (isset($_POST["sub_categoria"])){
		$sub_categoria=$_POST["sub_categoria"];
	}	 

?>



<div id="individual_cadastro">
	<div id="nome_cadastro">CADASTRO - Sub Categoria</div>
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
					<div class="tudo_input">
						<div class="input_padrao">
							Categoria
						</div>
						<div class="left_input">
							<select name="id_categoria"  <?php echo $row["id_categoria"]?>>
						<option value="Escolha uma categoria">
							Escolha uma categoria
						</option>
							<?php
						$row_sub_categoria=null;
						$result_sub_categoria=null;		
						$sql_categoria_noticias    = 'SELECT id,titulo FROM categoria order by titulo asc;';
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
						<select onchange="idJump(this)" name="id_categoria"  <?php echo $row["id_categoria"]?>>
						<option value="Escolha uma categoria">
							Categoria
						</option>
						<?php
						$row_sub_categoria=null;
						$result_sub_categoria=null;		
						$sql_categoria_noticias    = 'SELECT id,titulo FROM categoria order by titulo asc;';
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
					</div>
					<div class="clear"></div>
				</div>
				<?php
					if ($_POST) {
						
						
						if ($_POST['acao']=='Inserir'){
						$sql = "insert into sub_categoria (titulo,id_categoria ) values ('".$_POST["titulo"]."','".$_POST["id_categoria"]."');";
						//echo $sql;
						if($sql){
									$erro = "Dados salvos com sucesso!";
								  } else{
									  $erro = "Não foi salvar os dados";
								  }
								  mysql_query($sql, $link);
						}
						if ($_POST['acao']=='Excluir'){
							$sql = 'delete FROM sub_categoria where id='.$_POST["id"];
							   if($sql){

									$erro = "Dados excluidos com sucesso!";

								  } else{

									  $erro = "Não foi possivel excluir os dados";

								  }

							mysql_query($sql, $link);
						}
						else if ($_POST ['acao']=='Alterar'){
							$sql = "update sub_categoria set titulo='".$_POST["titulo"]."' where (id=".$_POST["id"].");";
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
				<td style="width:50px;">Ação</td>
				<td>Titulo</td>
				<td  style="width:50px;">Codigo Categoria </td>
				<td style="width:200px;">Categoria</td>
			</tr>
			  
				<?php
					
			if ($result!=null){
				mysql_free_result($result);
			}
			$sql    = 'SELECT sub_categoria.id,  sub_categoria.titulo, sub_categoria.id_categoria AS categoria, categoria.titulo AS categoria_nome
FROM sub_categoria 
LEFT JOIN categoria ON ( sub_categoria.id_categoria = categoria.id );';
			$result = mysql_query($sql, $link);
			if (!$result) {
				echo "Erro do banco de dados, não foi possivel consultar o banco de dados\n";
				echo 'Erro MySQL: ' . mysql_error();
				exit;
			}
			while ($row = mysql_fetch_assoc($result)){
		?>
				<tr>
					<td>
						<a href="principal.php?pg=cadastro_sub_categoria&id=<?php echo $row['id'];?>">
							<div style="color:#000000;">
								<img src="./imagens/editar.gif" width="21" height="21" border="0" />
							</div>
						</a>
					</td>
						<td><?php echo $row['titulo'];?>&nbsp </td>
						<td><?php echo $row['categoria'];?>&nbsp </td>
						<td><?php echo $row['categoria_nome'];?>&nbsp </td>
						
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












