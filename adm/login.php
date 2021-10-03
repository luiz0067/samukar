<?php
	ob_start();
	session_start();
	include('conecta.php');
	$linha=null;
	$result=null;
	$sql	= "SELECT codigo,usuario,senha FROM usuario where (usuario='".$_POST["usuario"]."') and( senha='".$_POST["senha"]."')";
	$result=mysql_query($sql, $link);
	if (($result!=null)&&($_POST["usuario"]!=null)&&($_POST["senha"]!=null)){
		$linha = mysql_fetch_assoc($result);
		if (($_POST["usuario"]==$linha["usuario"]) && ($_POST["senha"]==$linha["senha"])){
			session_start();
			$_SESSION["codigo"]		= $linha["codigo"];
			$_SESSION["usuario"]	= $linha["usuario"];
			$_SESSION["meu_tempo"]  = time();
			header("location:principal.php");
		}
		else{?>
			<div style="color:#FF0000">Usuario ou senha inválido</div>
			<?php mysql_free_result($result);
		}
	}	
?>
<html>
	<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" type="text/css" href="./css/estilocrm.css" />
<style type="text/css">
	body{
		width:100%; height:100; margin-left:0px; margin-right:0px; margin-top:0px; margin-bottom:0px;}
</style>
<script type="text/javascript">
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
</script>
</head>
<body onLoad="MM_preloadImages('./imagens/entrar2.gif','./imagens/login2.gif')">
	 
    <div id="tudo">
    	<div class="linhas">
        	<div class="linhacentro" style="height:33px;"></div>
        </div>
        <div class="linhas">
        	<div class="linhacentro" style="height:81px;">
            	<div style="height:81px; width:232px; float:center; margin-left:auto; margin-right:auto;"><img src="./imagens/logo1.gif" /></div>
            </div>
        </div>
        <div class="linhas" style="height:128px;">
       	  <div class="linhacentro" style="height:15px;"></div>
          <div class="texto1" style="height:23px;">Seja Bem Vindo ao seu </div>
          <div class="texto2" style="height:29px;">Sistema Administrativo da Web</div>
          <div class="linhacentro" style="height:31px;"></div>
          <div class="invalid" style="height:30px;"></div>
        </div>
        <div class="linhas" style="background-color:#D1D1D1;">
        	<div class="linhacentro" style="height:132px;">
            	<div class="input">
                	<form method="post">
                      <div class="espaco" style="width:250px; height:31px;">
                        <div class="espaco" style="width:79px; height:31px; line-height:31px;"><a class="texto3">Usuário:</a></div>
                            <div class="espaco" style="width:151px; height:31px; padding-left:10px; padding-right:10px; padding-top:5px; padding-right:10px;">
                                <input class="input" type="text" name="usuario" />
                            </div>
                      </div>
                        <div class="espaco" style="width:250px; height:9px;"></div>
                        <div class="espaco" style="width:250px; height:31px;">
                            <div class="espaco" style="width:79px; height:31px; line-height:31px;"><a class="texto3">Senha:</a></div>
                            <div class="espaco" style="width:151px; height:31px; padding-left:10px; padding-right:10px; padding-top:5px; padding-right:10px;">
                                <input class="input" type="password" name="senha" />
                            </div>
                        </div>
                        <input type="submit" value="Entrar" name="acao" style="margin-left:100px; display:inline;">
                  </form>
                </div>
            </div>
        </div>
        <div class="linhas" style=" height:4px; background-image:url(./imagens/barradegrade.gif); background-repeat:repeat-x;">
        	<div class="linhacentro">                
            </div>
        </div>
      <div class="linhas">
       	<div class="linhacentro" style="height:110px;">
           	  <div class="espaco" style="width:357px; height:110px;"></div>
              <div class="espaco" style="width:106px; height:110px;">
              	  <div class="espaco" style="width:106px; height:52px; background-image:url(./imagens/cadeado.gif)"></div>
                  <div class="espaco" style="width:106px; height:58px;"></div>	
              </div>
              <div class="espaco" style="width:337px; height:114px;"></div>              
        </div>
       	 </div>
        <div class="linhas">
        	<div class="linhacentro" style="height:110px;">
            	<div class="espaco" style="width:357px; height:110px;"></div>
                <div class="espaco" style="width:106px; height:110px; background-image:url(./imagens/mix.gif);"></div>
                <div class="espaco" style="width:337px; height:110px;"></div>
            </div>
        </div>
</div>
</body>
</html>