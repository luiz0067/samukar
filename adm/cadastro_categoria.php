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
		$sql	= "SELECT id, titulo FROM categoria where (id=0".$_GET["id"].")";
		$result=mysql_query($sql,$link);
		$row = mysql_fetch_assoc($result);
		//echo $sql;
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
				</div>
				<div style="margin-top:20px; padding-left: 320px; margin:0 auto; margin-left:auto; margin-right:auto;">	
					<input type="submit" name="acao" value="Inserir"/>		
					<input type="submit" name="acao" value="Alterar">
					<input type="submit" name="acao" value="Excluir">					
				</div>
			</form>
		</div>
		<div class="divisor">

		<?php
		
	if ($_POST) {
		 if( $_POST['acao']=='Inserir'){   
			$sql = "insert into categoria (titulo) values ('".$_POST["titulo"]."');";
			echo $sql;
			mysql_query($sql, $link);
				

		}
		else if ($_POST ['acao']=='Alterar'){
			//delete_file($folder . $imagem_antiga);
			$sql = "update categoria set titulo='".$_POST["titulo"]."' where (id=".$_POST["id"].");";
			echo $sql;
			mysql_query($sql, $link);
		}
		
		
		else if ($_POST['acao']=='Excluir'){
			//delete_file($folder . $imagem_antiga);
			$sql = 'delete FROM categoria where id='.$_POST["id"];
			//echo $sql;
			mysql_query($sql, $link);
		}
		}
		
					if(isset($erro)){
						print '<div style="width:80%; font-size:20px; color:#009900; padding: 5px 0px 5px 0px; text-align:center; margin: 0 auto;">'.$erro.'</div>';
						print '<div style="width:80%; height:32px; width:32px;  text-align:center; margin: 0 auto; background-image:url(imagens/loading.gif) ; "></div>';
						echo "<meta HTTP-EQUIV='refresh' CONTENT='5'>";
					}
				?>
	</div>
	
		<div id="relatorio_input">
			<table cellpadding= "4" cellspacing = "0" border= "1" width="1004">
				<tr bgcolor="#CCCCCC" height="40" >
					<td>EDITAR</td>
					<td>TÍTULO</td>
					
				</tr>
				<?php
	
			
			if ($result!=null){
				mysql_free_result($result);
			}
			$sql    = 'SELECT id,titulo FROM categoria;';
			$result = mysql_query($sql, $link);
			if (!$result) {
				echo "Erro do banco de dados, não foi possivel consultar o banco de dados\n";
				echo 'Erro MySQL: ' . mysql_error();
				exit;
			}
			while ($row = mysql_fetch_assoc($result)){
		?>
					<tr>
						<td><a href="principal.php?pg=cadastro_categoria&id=<?php echo $row['id'];?>" VALUE="EDITAR" NAME="EDITAR">
						<div style="color:#000000;" VALUE="EDITAR" NAME="EDITAR"><img src="./imagens/editar.gif" width="21" height="21" VALUE="EDITAR" NAME="EDITAR" border="0" />
						
						</div>
						<a/></td>
						<td><?php echo $row['titulo'];?>&nbsp </td>
						
					</tr>
					<?php
				}
				mysql_free_result($result);
			?>
			</table>
		</div>
</div>	
		</div>
<?php
	include('rodape.php');
?>
