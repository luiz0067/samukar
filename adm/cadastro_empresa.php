<?php	
	include('conecta.php');
	error_reporting(0);
ini_set(ìdisplay_errorsî, 0 );
			
	$row=null;
	$result=null;
	if (($_GET["codigo"]!=null)){
		$sql	= "SELECT codigo,empresa,obs FROM empresa where (codigo=0".$_GET["codigo"].")";
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
					<td>ASU√ÅRIO:<input type="text" name="empresa" size="70" value="<?php if ($result!=null) echo $row["empresa"]?>"></td>
				</tr>
				<tr>
					<td>obs:<input type="text" name="obs" size="70" value="<?php if ($result!=null) echo $row["obs"]?>"></td>
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
						$sql = 'delete FROM empresa where codigo='.$_POST["codigo"];
						//echo $sql;
						mysql_query($sql, $link);
					}
					else if ($_POST ['acao']=='alterar'){
						$sql = "update empresa set empresa='".$_POST["empresa"]."', obs='".$_POST["obs"]."' where (codigo=".$_POST["codigo"].");";
						//echo $sql;
						mysql_query($sql, $link);
					}
					else if( $_POST['acao']=='inserir'){
						$sql = "insert into empresa (empresa, obs) values ('".$_POST["empresa"]."','".$_POST["obs"]."');";
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
				<td>empresa</td>
				<td>obs</td>
			</tr>
		<?php
			if ($result!=null){
				mysql_free_result($result);
			}
			$sql    = 'SELECT codigo,empresa,obs FROM empresa order by empresa asc;';
			$result = mysql_query($sql, $link);
			if (!$result) {
				echo "Erro do banco de dados, n„o foi possivel consultar o banco de dados\n";
				echo 'Erro MySQL: ' . mysql_error();
				exit;
			}
			while ($row = mysql_fetch_assoc($result)){
		?>
				<tr>
					<td><a href="principal.php?pg=cadastro_empresa&codigo=<?php echo $row['codigo'];?>" VALUE="EDITAR" NAME="EDITAR">
						<div style="color:#000000;" VALUE="EDITAR" NAME="EDITAR"><img src="../imagens/editar.gif" width="21" height="21" VALUE="EDITAR" NAME="EDITAR" border="0" />
						
						</div>
						<a/></td>
					<td><?php echo $row['empresa'];?>&nbsp </td>                
					<td><?php echo $row['obs'];?>&nbsp </td>
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
