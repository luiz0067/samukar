<?php	
	include('conecta.php');
	error_reporting(0);
ini_set(ìdisplay_errorsî, 0 );
			
	$row=null;
	$result=null;
	if (($_GET["codigo"]!=null)){
		$sql	= "SELECT codigo,usuario,senha FROM usuario where (codigo=0".$_GET["codigo"].")";
		$result=mysql_query($sql, $link);
		$row = mysql_fetch_assoc($result);
	}
?>
<div id="individual_cadastro">
	<div id="nome_cadastro">CADASTRO - USU√ÅRIO</div>
		<div id="input_cadastro">
			<form method="post">
				<table >
				<tr>
					<td><input type="hidden" name="codigo" value="<?php if ($result!=null) echo $row["codigo"]?>"></td>
				</tr>
				<tr>
					<td>ASU√ÅRIO:<input type="text" name="usuario" size="70" value="<?php if ($result!=null) echo $row["usuario"]?>"></td>
				</tr>
				<tr>
					<td>SENHA:<input type="text" name="senha" size="70" value="<?php if ($result!=null) echo $row["senha"]?>"></td>
				</tr>
				</table>
				<div style="margin-left:145px; margin-top:20px;">			
						<input type="submit" name="acao" value="inserir">
						<input type="submit" name="acao" value="alterar">
						<input type="submit" name="acao" value="excluir">
						<input type="button" value="limpar" onclick="self.location.href='?id'">	
					</div>	
				<?php
				
					if ($_POST['acao']=='excluir'){
						$sql = 'delete FROM usuario where codigo='.$_POST["codigo"];
						//echo $sql;
						mysql_query($sql, $link);
					}
					else if ($_POST ['acao']=='alterar'){
						$sql = "update usuario set usuario='".$_POST["usuario"]."', senha='".$_POST["senha"]."' where (codigo=".$_POST["codigo"].");";
						//echo $sql;
						mysql_query($sql, $link);
					}
					else if( $_POST['acao']=='inserir'){
						$sql = "insert into usuario (usuario, senha) values ('".$_POST["usuario"]."','".$_POST["senha"]."');";
						//echo $sql;
						mysql_query($sql, $link);
					}
						
				?>
				</form>
</div>

			<div id="relatorio_input">
			<table cellpadding= "4" cellspacing = "0" border= "1" width="1004">
				<tr bgcolor="#CCCCCC" height="40" >
				<td>codigo</td>
				<td>usuario</td>
				<td>senha</td>
			</tr>
		<?php
			if ($result!=null){
				mysql_free_result($result);
			}
			$sql    = 'SELECT codigo,usuario,senha FROM usuario order by usuario asc;';
			$result = mysql_query($sql, $link);
			if (!$result) {
				echo "Erro do banco de dados, n„o foi possivel consultar o banco de dados\n";
				echo 'Erro MySQL: ' . mysql_error();
				exit;
			}
			while ($row = mysql_fetch_assoc($result)){
		?>
				<tr>
					<td><a href="principal.php?pg=cadastro_usuario&codigo=<?php echo $row['codigo'];?>" VALUE="EDITAR" NAME="EDITAR">
						<div style="color:#000000;" VALUE="EDITAR" NAME="EDITAR"><img src="../imagens/editar.gif" width="21" height="21" VALUE="EDITAR" NAME="EDITAR" border="0" />
						
						</div>
						<a/></td>
					<td><?php echo $row['usuario'];?>&nbsp </td>                
					<td><?php echo $row['senha'];?>&nbsp </td>
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
