<?php
	include('conecta.php');

/*
Uploadify
Copyright (c) 2012 Reactive Apps, Ronnie Garcia
Released under the MIT License <http://www.opensource.org/licenses/mit-license.php> 
*/

// Define a destination
$targetFolder = '/abbeyroad/uploads/fotos'; // Relative to the root

$verifyToken = md5('unique_salt' . $_POST['timestamp']);

if (!empty($_FILES) && $_POST['token'] == $verifyToken) {
	$img        = $_FILES['Filedata']['name'];
	$ext      = substr($img, -4);
	$img      = md5($img).date("dmYHis").$ext;
	$tempFile   = $_FILES['Filedata']['tmp_name'];
	$targetPath = $_SERVER['DOCUMENT_ROOT'] . $targetFolder;
	$targetFile = rtrim($targetPath,'/') . '/' . $img;
	
	// Validate the file type
	$fileTypes = array('jpg','jpeg','gif','png'); // File extensions
	$fileParts = pathinfo($_FILES['Filedata']['name']);
	
	
	$sql = "insert into fotos (imagem,id_categoria_fotos,obs) values ('".$img."','".$_GET["id_categoria_fotos"]."','".$_POST["obs"]."');";
	echo $sql;
	mysql_query($sql, $link);
	
	if (in_array($fileParts['extension'],$fileTypes)) {
		move_uploaded_file($tempFile,$targetFile);
		echo '1';
	} else {
		echo 'Invalid file type.';
	}
}
?>