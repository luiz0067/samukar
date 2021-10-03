<?php
	ob_start();
	$minutos=30;
	session_start();
	include('conecta.php');
	$row=null;
	$result=null;
	$sql    = "SELECT * FROM usuario where (codigo=".$_SESSION["codigo"].");";
	//echo $sql;
	$result=mysql_query($sql, $link);
	if (
		($result!=null)
		&&
		($_SESSION["codigo"]!=null)
		&&
		((time()-$_SESSION['meu_tempo'])<($minutos*60))
		//((time()-$_SESSION['time'])<(10))
	)
	{
		$row = mysql_fetch_assoc($result);
		$_SESSION["codigo"]		= $row["codigo"];
		$_SESSION["usuario"]	= $row["usuario"];	
		$_SESSION['meu_tempo'] 	= time();
		mysql_free_result($result);
	}
	else{
		$_SESSION['meu_tempo']=time();
		?> 
		<script type="text/javascript">
			self.location.href="./logout.php"
			//alert("<?php echo ($_SESSION["codigo"]);?>")
		</script>
        <?php
	}
?>		