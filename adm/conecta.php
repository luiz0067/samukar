	<?php
	$host		=	"mysql07.redehost.com.br";
	$login		=	"samukar";
	$password	=	"M1d14m1x";
	$base_dados	=	"samukar";


if (!$link = mysql_connect($host, $login, $password)) {
    echo 'Não foi possível conectar ao mysql';
    exit;
}
if (!mysql_select_db($base_dados, $link)) {
    echo 'Não foi possível selecionar o banco de dados';
    exit;
}
?>