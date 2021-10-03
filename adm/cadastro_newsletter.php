<?php
	include('cabecalho.php');
		ini_set(“display_errors”, 0 );
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
		$sql	= "SELECT id,e_mail,data_cadastro FROM newsletter where (id=0".$_GET["id"].")";
		$result=mysql_query($sql, $link);
		$row = mysql_fetch_assoc($result);
		if ($result!=null)
		$data_cadastro=$row["data_cadastro"];
	}
		$newsletter=0;
		if (isset($_GET["newsletter"])){
		$newsletter=$_GET["newsletter"];	
	}
		else if (isset($_POST["newsletter"])){
		$newsletter=$_POST["newsletter"];
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
									E-mail:
								</div>
								<div class="left_input">
									<input name="e_mail" style="width:530px;" type="text" value="<?php echo $row["e_mail"]?>">
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
									$_POST["data_cadastro"]=Date("Y-m-d H:i:s");
									$sql = "insert into newsletter (data_cadastro,e_mail) values ('".$_POST["data_cadastro"]."','".$_POST["e_mail"]."');";
									echo $sql;
									if($sql){
												$erro = "Dados salvos com sucesso!";
											  } else{
												  $erro = "Não foi salvar os dados";
											  }
									mysql_query($sql, $link);
									}
									if ($_POST['acao']=='Excluir'){
										$sql = 'delete FROM newsletter where id='.$_POST["id"];
										   if($sql){
												$erro = "Dados excluidos com sucesso!";
											  } else{
												$erro = "Não foi possivel excluir os dados";
											  }
										mysql_query($sql, $link);
									}
									else if ($_POST ['acao']=='Alterar'){
									$_POST["data_cadastro"]=Date("Y-m-d H:i:s"); 
										$sql = "update newsletter set e_mail='".$_POST["e_mail"]."',data_cadastro='".$_POST["data_cadastro"]."' where (id=".$_POST["id"].");";
										//echo $sql;										
										if($sql){

												$erro = "Dados alterados com sucesso!";

											  } else{

												  $erro = "Não foi possivel alterar os dados";

											  }
										mysql_query($sql, $link);
									}
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
			  <div id="relatorio_input" >
				
				<table cellpadding= "7" cellspacing = "0" border= "1" width="1004">
			
					<tr bgcolor="#CCCCCC" height="40" >
						<td>AÇÃO</td>
						<td>Nº</td>
						<td>E-MAIL</td>
						<td>DATA DO CADASTRO</td>
					</tr>
					  <A NAME="resultado"></A>
					<?php
						if ($result!=null){
						mysql_free_result($result);
					}
					$sql    = 'SELECT id,e_mail,data_cadastro FROM newsletter;';
					$result = mysql_query($sql, $link);
					if (!$result) {
						echo "Erro do banco de dados, n䯠foi possivel consultar o banco de dados\n";
						echo 'Erro MySQL: ' . mysql_error();
						exit;
					}
					while ($row = mysql_fetch_assoc($result)){
						
					?>
						<tr>
							<td>
								<a href="?pg=cadastro_newsletter&id=<?php echo $row['id'];?>">
									<div style="color:#000000;">
										<img src="./imagens/editar.gif" width="21" height="21" border="0" />
									</div>
								</a>
							</td>
							<td><p><?php echo $row['id'];?></p> </td>
							<td><p><?php echo $row['e_mail'];?></p> </td>
							<td><p><?php echo $row['data_cadastro'];?></p> </td>

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
